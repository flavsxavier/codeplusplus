<?php
	$user = "root";
	$passwd = "";
	try {$conn = new PDO("mysql:host=localhost;dbname=cp_database", $user, $passwd);} catch (PDOException $e) {echo $e->getMessage();}
?>