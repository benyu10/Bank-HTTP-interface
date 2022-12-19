<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = 'bxy5094';
$password = 'Yu4125121070';
$host = 'localhost';
$dbname = 'bxy5094_431W';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = 'SELECT uid, fname, mname, lname, state, phone FROM users';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
    </head>
    <body>
        <div id="container">
            <h2>Users of the Bank</h2>
            <table border=1 cellspacing=5 cellpadding=5>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
			<th>State</th>
			<th>Phone Number</th>
			<th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['uid']) ?></td>
                            <td><?php echo htmlspecialchars($row['fname']); ?></td>
                            <td><?php echo htmlspecialchars($row['mname']); ?></td>
			    <td><?php echo htmlspecialchars($row['lname']); ?></td>
			    <td><?php echo htmlspecialchars($row['state']); ?></td>
			    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo '<form action="/delete-1.php" method="post"><input type="submit" value="DELETE"><input type="hidden" name="uid" value="' . htmlspecialchars($row['uid']) . '"></form>'; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
		<br><h2>Insert a new user:</h2>
		<form action="/insert-1.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="uid" name="uid" value="" placeholder="##XX##"></td></tr>
				<tr><td>First name:</td><td><input type="text" id="fname" name="fname" value="" placeholder="Benjamin"></td></tr>
				<tr><td>Middle name:</td><td><input type="text" id="mname" name="mname" value="" placeholder="D"></td></tr>
				<tr><td>Last name:</td><td><input type="text" id="lname" name="lname" value="" placeholder="Yu"></td></tr>
				<tr><td>State:</td><td><input type="text" id="state" name="state" value="" placeholder="PA"></td></tr>
				<tr><td>Phone number:</td><td><input type="text" id="phone" name="phone" value="" placeholder="XXX-XXX-XXXX"></td></tr>
			</table>
			<input type="submit" value="INSERT">
		</form>
		<br>


		<h2>Update:</h2>
		<form action="/update.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="uid" name="uid" value="" placeholder="##XX##"></td></tr>
				<tr><td>First name:</td><td><input type="text" id="fname" name="fname" value="" placeholder="Benjamin"></td></tr>
				<tr><td>Middle name:</td><td><input type="text" id="mname" name="mname" value="" placeholder="D"></td></tr>
				<tr><td>Last name:</td><td><input type="text" id="lname" name="lname" value="" placeholder="Yu"></td></tr>
				<tr><td>State:</td><td><input type="text" id="state" name="state" value="" placeholder="PA"></td></tr>
				<tr><td>Phone number:</td><td><input type="text" id="phone" name="phone" value="" placeholder="XXX-XXX-XXXX"></td></tr>
			</table>
			<input type="submit" value="UPDATE">
		</form>
		<br>


		<h2>Generate Report for User</h2>
		<form action="/report.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="uid" name="uid" value="" placeholder="##XX##"></td></tr>
			</table>
			<input type="submit" value="GENERATE">
		</form>

		<br>


		<h2>Find Account Number</h2>
		<form action="/acc.php" method="post">
			<table>
				<tr><td>User ID:</td><td><input type="text" id="uid" name="uid" value="" placeholder="##XX##"></td></tr>
			</table>
			<input type="submit" value="FIND">
		</form>
		<br><br><br>
    </body>
</div>
</html>
