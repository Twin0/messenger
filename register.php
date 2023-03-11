<?php
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$dbname = "messenger";
	
	$uname = $_POST['uname'];
	$pw = $_POST['psw'];
	$rena = $_POST['rena'];
	$datee = date("Ymd");
	echo "$datee";
	
	$dbVerbindung = new mysqli($servername, $username, $password, $dbname);

	if(mysqli_connect_errno() != 0){
		echo	"<h2>Keine Datenbankverbindung</h2>";
		echo	"<p>Fehler: ", mysqli_connect_error(), "</p>";
	}else{
		echo	"<h6>Datenbankverbindung hergestellt</h6>";
	}
	
	
	if (isset($_POST['psw']) && isset($_POST['pswconf'])) {
		if ($_POST['psw'] != $_POST['pswconf']){
			
			echo "<h1>Passwords dont match!!</h1>";
			echo "<h1>You getting redirected any second!!</h1>";
			header("refresh:5;url=register.html");
			exit();
		}
		else {
			$abfrageErgebnis = $dbVerbindung->query("select * from users where username = '$uname';");
			if($abfrageErgebnis->num_rows != 0){
				echo "<h1>Username is already taken! Try again</h1>";
				echo "<h1>You getting redirected any second!!</h1>";
				// header("refresh:5;url=register.html" );
				// exit()
			}else{
			$sql = "insert into users(username,password,name,created_at) values('$uname','$pw','$rena',$datee)";
				if ($dbVerbindung->query($sql) === TRUE) {
				echo "<h1>Succesfull!!!</h1>";
				//mkdir('users/'.$uname, 0777, true);
				header("refresh:5;url=home.php" );
				} else {
				  echo "Error: " . $sql . "<br>" . $dbVerbindung->error;
						}
			}
		}	
	}


// if($abfrageErgebnis = $dbVerbindung->query(select * from useres where username = '$uname';)){
	// echo "<h1>Username is already taken! Try again</h1>";
	// echo "<h1>You getting redirected any second!!</h1>";
	// header("refresh:5;url=register.html" );
// }else{
	// $sql = "insert into users(username,password,name,created_at) values('$uname','$pw','$rena',$date;";
	// if ($dbVerbindung->query($sql) === TRUE) {
	// echo "<h1>Succesfull!!!</h1>";
	// //mkdir('users/'.$uname, 0777, true);
	// header("refresh:5;url=home.php" );		} else {
	  // echo "Error: " . $sql . "<br>" . $dbVerbindung->error;
	// }
// }

?>