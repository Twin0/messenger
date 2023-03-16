<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "mysql";
			$dbname = "messenger";
		
			
			$dbVerbindung = new mysqli($servername, $username, $password, $dbname);

			if(mysqli_connect_errno() != 0){
				echo	"<h2>Keine Datenbankverbindung</h2>";
				echo	"<p>Fehler: ", mysqli_connect_error(), "</p>";
			}else{
				echo	"<h6>Datenbankverbindung hergestellt</h6>";
			}
?>