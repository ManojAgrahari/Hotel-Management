<?php
// connect to the MySQL server
$conn = new mysqli('localhost', 'root', '');

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

// sql query with CREATE DATABASE
$sql = "CREATE DATABASE `hrs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";

// Performs the $sql query on the server to create the database
if ($conn->query($sql) === TRUE) {
  echo 'Database "registration" successfully created';
}
else {
 echo 'Error: '. $conn->error;
}

$conn->close();
?>