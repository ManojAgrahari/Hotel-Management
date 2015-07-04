<?php
$erors = array();                      // set an empty array that will contains the errors
$regexp_mail = '/^([a-zA-Z0-9]+[a-zA-Z0-9._%-]*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4})$/'; // an e-mail address pattern


// Check for form submission
if (isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['email']) ){
  // remove tags and whitespace from the beginning and end of form data
  $_POST = array_map("strip_tags", $_POST);
  $_POST = array_map("trim", $_POST);

  // check if all form fields are filled in correctly
  // the minimum number of characters
  
  if (strlen($_POST['name'])<3) $erors[] = 'Name must contain minimum 3 characters';
  if (strlen($_POST['contact'])<3) $erors[] = 'Contact must contain minimum 3 characters';
  if (strlen($_POST['address'])<3) $erors[] = 'Address must contain minimum 3 characters';
  if (strlen($_POST['username'])<3) $erors[] = 'Username must contain minimum 3 characters';
  if (strlen($_POST['password'])<6) $erors[] = 'Password must contain minimum 6 characters';  
  if (!preg_match($regexp_mail, $_POST['email'])) $erors[] = 'Invalid e-mail address';

  // if no errors ($error array empty)
  if(count($erors)<1) {
    // connect to the "hrs"
    $conn = new mysqli('localhost', 'root', '', 'hrs');

    // check connection
    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }

    // store the values in an Array, escaping special characters for use in the SQL statement
    $adds['name'] = $conn->real_escape_string($_POST['name']);
    $adds['contact'] = $conn->real_escape_string($_POST['contact']);
	$adds['address'] = $conn->real_escape_string($_POST['address']);
	$adds['username'] = $conn->real_escape_string($_POST['username']);
	$adds['password'] = sha1($conn->real_escape_string($_POST['password']));
	$adds['email'] = $conn->real_escape_string($_POST['email']);
	
	

    // sql query for INSERT INTO users
    $sql = "INSERT INTO `users` (`name`, `contact`, `address`, `username`, `password`, `email`)
	VALUES ('". $adds['name']. "', '". $adds['contact']. "', '". $adds['address']. "', '". $adds['username']. "', '". $adds['password']. "', '". $adds['email']. "')"; 

    // Performs the $sql query on the server to insert the values
    if ($conn->query($sql) === TRUE) {
      //echo 'Users entry saved successfully';
		$conn->close();
		$_SESSION['notice']="New user added successfully.";
		Header('Location:../manage_user.php');
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