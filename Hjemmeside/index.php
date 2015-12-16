<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>
			Password Manager
		</title>
		<link rel="shortcut icon" href="icon.png">
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
    <div class="indhold">
      <h1>Password Manager</h1>
			<div id="content">
				<form id="form" method="post">
	        <label class="label">Email</label>
	        <p><input type="email" name="email" class="input"></p>
	        <label class="label">Password</label>
	        <p><input type="password" name="password" class="input"></p>
	        <p id="special"><input type="submit" name="submit" value="Submit" class="submit"></p>
	      </form>
				<div id=secret>
					<table class="table">
						<thead>
						<tr>
							<th>Website</th>
							<th>Password</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td id="website"></td>
							<td id="secret_password"></td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
    </div>
	</body>
</html>



<?php

//Database indstillinger
$db_server = "localhost";
$db_username = "root";
$db_password = "password";
$db_dbname = "mysql";


if (isset($_SESSION["userid"])) {
  echo "<script type='text/javascript'>document.getElementById('form').style.display = 'none'</script>";
}

if (isset($_COOKIE["login"])) {
	$con = mysqli_connect($db_server, $db_username, $db_password, $db_dbname);
	$result = mysqli_query($con, 'SELECT * FROM `passwordmanager` WHERE 1');
	while ($row = mysqli_fetch_array($result)){
		if($row["cookie_value"] == $_COOKIE["login"]) {
			viewtable($row["secret"]);
		}
	}
	mysqli_close($con);
}

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = sha1($_POST["password"]);

	$con = mysqli_connect($db_server, $db_username, $db_password, $db_dbname);
  $result = mysqli_query($con, 'SELECT * FROM `passwordmanager` WHERE 1');
  while ($row = mysqli_fetch_array($result)){
    if($row["email"] == $email && $row["password"] == $password) {
			$cookie_value = sha1(rand(0,999999999999));
			mysqli_query($con, 'UPDATE `passwordmanager` SET `cookie_value`="' . $cookie_value . '" WHERE `userid`= "' . $row["userid"] . '"');
			setcookie("login", $cookie_value, null ); //https://davidwalsh.name/php-cookies
			viewtable($row["secret"]);
    }
  }
	mysqli_close($con);
}

function viewtable($secret) {
	$data = explode("=", $secret);
	echo "<script type='text/javascript'>document.getElementById('form').style.display = 'none'</script>";
	echo "<script type='text/javascript'>document.getElementById('secret').style.display = 'inline'</script>";
	echo "<script type='text/javascript'>document.getElementById('website').innerHTML = '" . $data[0] . "'</script>";
	echo "<script type='text/javascript'>document.getElementById('secret_password').innerHTML = '" . $data[1] . "'</script>";
}
?>
