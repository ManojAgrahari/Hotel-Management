<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
     border: 1px solid black;
}
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Check for form submission
$whr_room_code="";
$whr_ac="";
$whr_bed="";
$whr_booked="";
$rm=$_POST['room_code'];
$ac=$_POST['ac'];
$bed=$_POST['bed'];
$booked=$_POST['booked'];
$andFlag=false;
$and=array("","","");

if ($_POST['room_code']!=""){
$whr_room_code=" `room_code`='$rm'";
$andFlag= true;
}

if($_POST['ac']!=""){
$whr_ac=" `ac`='$ac'";
if($andFlag) $and[0] = " AND ";
$andFlag= true;
}//else{ $andFlag=false;}

if($_POST['bed']!=""){
$whr_bed=" `bed`='$bed'";
if($andFlag) $and[1] = " AND ";
$andFlag= true;
}//else{ $andFlag=false;}

if($_POST['booked']!=""){
$whr_booked=" `booked`='$booked'";
if($andFlag) $and[2] = " AND ";
//$andFlag= true;
}//else{ $andFlag=false;}
$whrsql=$whr_room_code.$and[0].$whr_ac.$and[1].$whr_bed.$and[2].$whr_booked;
echo "<br/>".$whrsql."<br/>";
$sql = "SELECT * FROM `rooms` WHERE ".$whr_room_code.$and[0].$whr_ac.$and[1].$whr_bed.$and[2].$whr_booked;
echo $sql."<br/>";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Room Code</th><th>Ac Availbility</th><th>BED Type</th><th>Booking Status</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["room_code"]."</td><td>".$row["ac"].
		"</td><td>".$row["bed"]."</td><td>".$row["booked"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>


</body>
</html>