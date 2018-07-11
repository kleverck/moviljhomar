<?php
class Database {
    private static $link = null ;

    private static function getLink ( ) {
		if(self::$link==null){
			try {
				self::$link = new PDO("mysql:host=curi.mysql.database.azure.com; dbname=gps;charset=utf8", "curytravez@curi", "Atahualpacury1993");
				self::$link->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
				return(self::$link);
			} catch (PDOException $e) {
				print($e);
				print "<p>Error: No puede conectarse con la base de datos.</p>\n";
				exit();
			}
		}else return($link);
    }

    public static function __callStatic ( $name, $args ) {
        $callback = array ( self :: getLink ( ), $name ) ;
        return call_user_func_array ( $callback , $args ) ;
    }
	
	public static function execQuery($sql){
		$res=null;
		$stmt = self::prepare($sql);
		$stmt -> execute();
		$res=$stmt->fetchAll();
		$stmt -> closeCursor();
		return $res;
	}
} 

?>