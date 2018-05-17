<?php
	$user = "root";
	$passwd = "";
	try {$conn = new PDO("mysql:host=localhost;dbname=", $user, $passwd);} catch (PDOException $e) {echo $e->getMessage();}
?>