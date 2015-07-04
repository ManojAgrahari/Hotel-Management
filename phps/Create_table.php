<?php
// connect to the MySQL server
$conn = new mysqli('localhost', 'root', '', 'hrs');

// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}

// sql query for CREATE TABLE
$sql = "CREATE TABLE `reservation` (
 `id` INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 `room_id` VARCHAR(20),
 `quest_id` VARCHAR(20) NOT NULL,
 `checkin_date` VARCHAR(20) NOT NULL,
 `checkout_date` VARCHAR(20) NOT NULL,
 `reservation_date` VARCHAR(100) NOT NULL
 ) CHARACTER SET utf8 COLLATE utf8_general_ci"; 

// Performs the $sql query on the server to create the table
if ($conn->query($sql) === TRUE) {
  echo 'Table "customers" successfully created';
}
else {
 echo 'Error: '. $conn->error;
}

$conn->close();
?>