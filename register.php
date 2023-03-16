<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

</head>
<body>

<h2>Register</h2>


<form action="register.php" method="post">

	
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
	
    <label for="uname"><b>Real Name</b></label>
    <input type="text" placeholder="Real Name" name="rena" required>
	
	<label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswconf" required>
        
    <button type="submit" name = "submit">Register</button>
  </div>
  
  	 <?php
		if(isset($_POST["submit"])){
			require("databasecon.php");

			
			
			if (isset($_POST['uname'])) {
				$uname = $_POST['uname'];
			} else {
			}
			if (isset($_POST['psw'])) {
				$pw = $_POST['psw'];
			} else {
			}
			if (isset($_POST['rena'])) {
				$rena = $_POST['rena'];
			} else {
			}		
			$datee = date('Ymd');
			
			
			
			if (isset($_POST['psw']) && isset($_POST['pswconf'])) {
				if ($_POST['psw'] != $_POST['pswconf']){
					
					echo '<script type="text/javascript"> window.onload = function () { alert("Passwords Dont Match");} </script>'; 
					exit();
				}
				else {
					$abfrageErgebnis = $dbVerbindung->query("select * from users where username = '$uname';");
					if($abfrageErgebnis->num_rows != 0){
						echo '<script type="text/javascript"> window.onload = function () { alert("Username already taken");} </script>'; 
						exit();
						// header("refresh:5;url=register.html" );
						// exit()
					}else{
					$sql = "insert into users(username,password,name,created_at) values('$uname','$pw', '$rena',$datee)";
						if ($dbVerbindung->query($sql) === TRUE) {
						echo "<h1>Succesfull!!!</h1>";
						session_start();
						$_SESSION["uname"] = $uname;
						//mkdir('users/'.$uname, 0777, true);
						header("refresh:5;url=home.php" );
						} else {
						  echo "Error: " . $sql . "<br>" . $dbVerbindung->error;
								}
					}
				}	
			}
		 
		}
	?> 

  <div class="container">
    <button type="button" class="cancelbtn" onclick="window.location.href='index.html'">Cancel</button>
  </div>
</form>
</body>
</html>