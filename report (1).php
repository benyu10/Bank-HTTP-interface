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
				echo "Generating Transactions Report for " . $_POST["uid"] . ""; 

				try {
    				    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    				    $sql = "select date, type, amount from Transaction where uid = '$uid' order by date DESC";
    				    $q = $pdo->query($sql);
    				    $q->setFetchMode(PDO::FETCH_ASSOC);
				} catch (PDOException $e) {
    				    die("Could not connect to the database $dbname :" . $e->getMessage());
				}
			?>
				<table border=1 cellspacing=5 cellpadding=5>
				    <thead>
                   			<tr>
					   <th>Date</th>
                        		   <th>Type</th>
                       			   <th>Amount</th>
					</tr>
				    </thead>
                		    <tbody>
				   	<?php while ($row = $q->fetch()): ?>
					   <tr>
					   	<td><?php echo htmlspecialchars($row['date']) ?></td>
					   	<td><?php echo htmlspecialchars($row['type']) ?></td>
					   	<td><?php echo htmlspecialchars($row['amount']) ?></td>
					   </tr>
				   	<?php endwhile; ?>
				    </tbody>
            			</table>		
		</p>
    </body>
</div>
</html>
