<?php 
	// Web Service
	include("db.php");
	
	$output=(isset($_REQUEST['o']))?strtolower($_REQUEST['o']):'xml';
	
	$registrogps=Database::execQuery("SELECT * FROM gps.registrogps;");
	

		header("Content-Type: text/xml");
		echo("<?xml version=\"1.0\" ?>
		<Listado>");
		for($i=0; $i<count($registrogps); $i++){
			$u=$registrogps[$i];
			
			echo("<registrogps>
					<id>$u[id]</id>
					<fecha>".utf8_encode($u['fecha'])."</fecha>
					<imei>".utf8_encode($u['imei'])."</imei>
					<longitud>".utf8_encode($u['longitud'])."</longitud>
					<latitud>".utf8_encode($u['latitud'])."</latitud>
					<speed>".utf8_encode($u['speed'])."</speed>
					
				</registrogps>");
		}
		echo("</Listado>");
	
?>