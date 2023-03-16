<!DOCTYPE html>
<html>
<head>
<title>Login</title>
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

<h2>Login</h2>

<?php
	if(isset($_POST["submit"])){
		require("databasecon.php");
		$uname = $_POST['uname'];
		$abfrageErgebnis = $dbVerbindung->query("select * from users where username = '$uname';");
		if($abfrageErgebnis->num_rows == 0){
						echo '<script type="text/javascript"> window.onload = function () { alert("Username wrong");} </script>'; 
						exit();
						// header("refresh:5;url=register.html" );
						// exit()
					}else{
						echo '<script type="text/javascript"> window.onload = function () { alert("Successfull logined. PLS wait a sec");} </script>';
						session_start();
						$_SESSION["uname"] = $uname;
						header("refresh:5;url=home.php" );
					}
		
		
	}

?>

<form action="login.php" method="post">

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" value="cancel" name="clicked" onclick="window.location.href='index.html'">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
