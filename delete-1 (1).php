<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'bxy5094';
$password = 'Yu4125121070';
$host = 'localhost';
$dbname = 'bxy5094_431W';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Deleting user: " . $_POST["uid"] . "..."; 
				$sql = 'DELETE FROM users WHERE uid = "' . $_POST["uid"] . '"';
				try {
					$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$conn->exec($sql);
					echo "User deleted successfully";
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
