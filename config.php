<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'btth03_cse485');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
	$connection = new PDO(
		"mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS
	);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Connection failed: ". $e->getMessage();
	$connection = null;
}
?>
