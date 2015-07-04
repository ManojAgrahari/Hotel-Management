<?php
 session_start();
$erors = array();                      // set an empty array that will contains the errors
$iid;
// Check for form submission
if (isset($_POST['gname']) && isset($_POST['gaddress']) && isset($_POST['gcontact']) && isset($_POST['room_id']) &&
isset($_POST['checkin_date']) && isset($_POST['checkout_date']) && isset($_POST['reservation_date']) ){
  // remove tags and whitespace from the beginning and end of form data
  $_POST = array_map("strip_tags", $_POST);
  $_POST = array_map("trim", $_POST);

  // check if all form fields are filled in correctly
  // the minimum number of characters
  
  if (strlen($_POST['gname'])<3) $erors[] = 'Name must contain minimum 3 characters';
  if (strlen($_POST['gaddress'])<5) $erors[] = 'Address must contain minimum 5 characters';
  if (strlen($_POST['gcontact'])<10) $erors[] = 'Contact must contain minimum 10 characters';
  if (strlen($_POST['room_id'])<1) $erors[] = 'Room_id must contain minimum 1 characters';  
  if (strlen($_POST['checkin_date'])<8) $erors[] = 'Check In date must contain minimum 8 characters';
  if (strlen($_POST['checkout_date'])<8) $erors[] = 'Check Out date must contain minimum 8 characters';
  if (strlen($_POST['reservation_date'])<8) $erors[] = 'Reservation date must contain minimum 8 characters';
  

  // if no errors ($error array empty)
  if(count($erors)<1) {
    // connect to the "hrs"
    $conn = new mysqli('localhost', 'root', '', 'hrs');

    // check connection
    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }

    // store the values in an Array, escaping special characters for use in the SQL statement
    $adds['gname'] = $conn->real_escape_string($_POST['gname']);
    $adds['gaddress'] = $conn->real_escape_string($_POST['gaddress']);
	$adds['gcontact'] = $conn->real_escape_string($_POST['gcontact']);
	$adds['room_id'] = $conn->real_escape_string($_POST['room_id']);	
    $adds['checkin_date'] = $conn->real_escape_string($_POST['checkin_date']);
	$adds['checkout_date'] = $conn->real_escape_string($_POST['checkout_date']);
	$adds['reservation_date'] = $conn->real_escape_string($_POST['reservation_date']);
	
    // sql query for INSERT INTO users
    $sql1 = "INSERT INTO `guests` (`gname`,`room_id`, `gaddress`, `gcontact`)
	VALUES ('". $adds['gname']. "','". $adds['room_id']. "', '". $adds['gaddress']. "', '". $adds['gcontact']. "')"; 
	
    // Performs the $sql query on the server to insert the values
    if ($conn->query($sql1) === TRUE) {
      //echo 'Guests entry saved successfully';
    }
    else {
      echo 'Error: '. $conn->error.'<br />';
    }
	$ggname=$adds['gname'];
	$ggaddress=$adds['gaddress'];

	
	  // sql query for INSERT INTO users
    $sql2 = "INSERT INTO `reservation` (`room_id`, `checkin_date`, `checkout_date`, `reservation_date`)
	VALUES ('". $adds['room_id']. "', '". $adds['checkin_date']. "', '". $adds['checkout_date']. "', '". $adds['reservation_date']. "')"; 

    // Performs the $sql query on the server to insert the values
    if ($conn->query($sql2) === TRUE) {
     // echo 'Reservation entry saved successfully';
    }
    else {
      echo 'Error: '. $conn->error;
    }
	$romid=$adds['room_id'];
	
	// UPDATE sql query
	$sql4 = "UPDATE `rooms` SET `booked`='yes' WHERE `id`='$romid'";

	// perform the query and check for errors	
	if (!$conn->query($sql4)) {
		echo 'Error: '. $conn->error;
	}
	
  //  echo "Checked in successfully.";
    $conn->close();
		$_SESSION['notice']="Checked in successfully.";
		Header('Location:../search_room.php');
    
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