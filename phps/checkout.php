<?php
$erors = array();
if (isset($_POST['room_id']) ){
  // remove tags and whitespacee from the beginning and end of form data
  $_POST = array_map("strip_tags", $_POST);
  $_POST = array_map("trim", $_POST);

  // check if all form fields are filled in correctly
  // the minimum number of characters  
  if (strlen($_POST['room_id'])<1) $erors[] = 'Room id must contain minimum 1 characters';
    // if no errors ($error array empty)
  if(count($erors)<1) {
    // connect to the "hrs"
    $conn = new mysqli('localhost', 'root', '', 'hrs');
    
    // check connection
    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	$delete_id=$_POST['room_id'];
	// UPDATE sql query
	$sql = "UPDATE `rooms` SET `booked`='no' WHERE `id`='$delete_id'";

	// perform the query and check for errors
	if (!$conn->query($sql)) {
		echo 'Error in first query: '. $conn->error;
	}
	
	
	// DELETE sql query
	$sql2 = "DELETE FROM `reservation` WHERE `room_id`='$delete_id'";

	// perform the query and check for errors	
	if (!$conn->query($sql2)) {
	echo 'Error in SECOND query: '. $conn->error;
	}
	
	// DELETE sql query
	$sql3 = "DELETE FROM `guests` WHERE `room_id`='$delete_id'";

	// perform the query and check for errors	
	if (!$conn->query($sql3)) {
	echo 'Error in THIRD query: '. $conn->error;
	}else{
        $_SESSION['notice']="Checked out successfully.";
         //echo 'huhaachkchk'.$delete_id;
        Header('Location:search_room.php');  
	}
}
}	
$conn->close();
?>