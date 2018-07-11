<?php 
	// Web Service
	include("db.php");
	
	$output=(isset($_REQUEST['o']))?strtolower($_REQUEST['o']):'xml';
	
	$tabla=Database::execQuery("SELECT * FROM registro.tabla;");
	

		header("Content-Type: text/xml");
		echo("<?xml version=\"1.0\" ?>
		<Listado>");
		for($i=0; $i<count($tabla); $i++){
			$u=$tabla[$i];
			
			echo("<tabla>
					<id>$u[id]</id>
				
					<imei>".utf8_encode($u['imei'])."</imei>
	<fecha>".utf8_encode($u['fecha'])."</fecha>
					<longitud>".utf8_encode($u['longitud'])."</longitud>
					<latitud>".utf8_encode($u['latitud'])."</latitud>
				
					
				</tabla>");
		}
		echo("</Listado>");
	
?>