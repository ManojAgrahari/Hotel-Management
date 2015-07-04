<?php
 session_start();
$erors = array();                      // set an empty array that will contains the errors



// Check for form submission
if (isset($_POST['room_code']) && isset($_POST['ac']) && isset($_POST['bed']) && isset($_POST['booked']) ){
  // remove tags and whitespace from the beginning and end of form data
  $_POST = array_map("strip_tags", $_POST);
  $_POST = array_map("trim", $_POST);

  // check if all form fields are filled in correctly
  // the minimum number of characters
  
  if (strlen($_POST['room_code'])<3) $erors[] = 'Room Code must contain minimum 3 characters';
  if (strlen($_POST['ac'])<2) $erors[] = 'AC must contain minimum 2 characters';
  if (strlen($_POST['bed'])<3) $erors[] = 'Bed must contain minimum 3 characters';
  if (strlen($_POST['booked'])<2) $erors[] = 'Booked must contain minimum 2 characters';
  

  // if no errors ($error array empty)
  if(count($erors)<1) {
    // connect to the "hrs"
    $conn = new mysqli('localhost', 'root', '', 'hrs');

    // check connection
    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }

    // store the values in an Array, escaping special characters for use in the SQL statement
    $adds['room_code'] = $conn->real_escape_string($_POST['room_code']);
    $adds['ac'] = $conn->real_escape_string($_POST['ac']);
	$adds['bed'] = $conn->real_escape_string($_POST['bed']);
	$adds['booked'] = $conn->real_escape_string($_POST['booked']);
	
    // sql query for INSERT INTO users
    $sql = "INSERT INTO `rooms` (`room_code`, `ac`, `bed`, `booked`)
	VALUES ('". $adds['room_code']. "', '". $adds['ac']. "', '". $adds['bed']. "', '". $adds['booked']. "')"; 
	
    // Performs the $sql query on the server to insert the values
    if ($conn->query($sql) === TRUE) {
		$conn->close();
     // echo 'Rooms entry saved successfully';
	 $_SESSION['notice']="New Room added successfully.<br/><hr/>";
	 Header('Location:../manage_room.php');
    }
    else {
      echo 'Error: '. $conn->error;
    }
	$conn->close();
    
  }
  else {
    // else, if errors, it adds them in string format and print it
    echo implode('<br />', $erors);
  }
}
else {
  echo 'No data from form';
}
?>