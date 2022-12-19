<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'bxy5094';
$password = 'Yu4125121070';
$host = 'localhost';
$dbname = 'bxy5094_431W';

$uid = $_POST["uid"];

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Report</title>
    </head>
    <body>
		<p>
			<?php 
				echo "Account under " . $_POST["uid"] . ""; 

				try {
    				    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    				    $sql = "select a.acc_num, a.type, a.balance from Account a, userAcc ua where ua.uid = '$uid' and ua.acc_num = a.acc_num";
    				    $q = $pdo->query($sql);
    				    $q->setFetchMode(PDO::FETCH_ASSOC);
				} catch (PDOException $e) {
    				    die("Could not connect to the database $dbname :" . $e->getMessage());
				}
			?>
				<table border=1 cellspacing=5 cellpadding=5>
				    <thead>
                   			<tr>
					   <th>Account Number</th>
                        		   <th>Type</th>
                       			   <th>Balance</th>
					</tr>
				    </thead>
                		    <tbody>
				   	<?php while ($row = $q->fetch()): ?>
					   <tr>
					   	<td><?php echo htmlspecialchars($row['acc_num']) ?></td>
					   	<td><?php echo htmlspecialchars($row['type']) ?></td>
					   	<td><?php echo htmlspecialchars($row['balance']) ?></td>
					   </tr>
				   	<?php endwhile; ?>
				    </tbody>
            			</table>		
		</p>
    </body>
</div>
</html>
