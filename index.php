<?php

echo "Idemooo web";

$servername = "localhost";
$username = "todo";
$password = "todo";
$schema = "todo";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  $stmt = $conn->prepare("SELECT * FROM todos");
  $result = $stmt->execute();
  print_r($result);


} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

 ?>
