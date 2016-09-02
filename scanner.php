<!DOCTYPE html>
<html>
<head>
	<title>Scanning</title>
</head>
<body>

	<form action="" method="POST">
		
	<input type="text" name="target">
	<button name="submit">Scan</button>
	</form>

</body>
</html>
<?php
if (isset($_POST['submit'])) {
$target = $_POST['target'];
$host = $target;
	$ports = array(21, 22, 23,25,53, 80, 81, 110, 143, 443, 3306, 3389);

		foreach ($ports as $port)
		{
		    $connection = @fsockopen($host, $port);

		    if (is_resource($connection))
		    {
		        echo '<br>' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.' . "\n";

		        fclose($connection);
		    }

		    else
		    {
		        echo '<br>' . $host . ':' . $port . ' is not responding.' . "\n";
		    }
		}
}
?>
