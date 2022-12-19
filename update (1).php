<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'bxy5094';
$password = 'Yu4125121070';
$host = 'localhost';
$dbname = 'bxy5094_431W';

$uid = $_POST["uid"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$state = $_POST["state"];
$phone = $_POST["phone"];


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
    </head>
    <body>
		<p>
			<?php 
				
				echo "Updating: " . $_POST["uid"] . " " . $_POST["fname"] . " " . $_POST["mname"] . " " . $_POST["lname"] . " " . $_POST["state"] . " " . $_POST["phone"] . "..."; 
				$sql = "UPDATE users SET fname= '$fname', mname= '$mname', lname= '$lname', state= '$state', phone= '$phone' where uid = '$uid'";
				
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "New record created successfully";
			?>
				<p>You will be redirected in 3 seconds</p>
				<script>
					var timer = setTimeout(function() {
						window.location='start.php'
					}, 3000);
				</script>
			<?php
				} catch(PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
			?>
		</p>
    </body>
</div>
</html>
