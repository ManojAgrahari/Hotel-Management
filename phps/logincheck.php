<?php
$erors = array();                      // set an empty array that will contains the errors
if(session_id()=="") {
  session_start();
}
// Check for form submission
if (isset($_POST['username']) && isset($_POST['password']) ) {
 
  // the minimum number of characters
   if (strlen($_POST['username'])<3) $erors[] = 'Username must contain minimum 3 characters';
   if (strlen($_POST['password'])<3) $erors[] = 'Password must contain minimum 3 characters';
   	// if no errors ($error array empty)
	if(count($erors)<1) {
    // connect to the "hrs"
    $conn = new mysqli('localhost', 'root', '', 'hrs');

    // check connection
    if (mysqli_connect_errno()) {
      exit('Connect failed: '. mysqli_connect_error());
    }
	$name = $_POST['username'];	
	$pass = sha1($_POST['password']);
	
	// SELECT sql query
	$sql = "SELECT * FROM `users` WHERE `username`='$name' && `password`='$pass'" ;

	// perform the query and store the result
	$result = $conn->query($sql);

	// if the $result contains at least one row
	if ($result->num_rows > 0)
	{
		// output data of each row from $result
		while($row = $result->fetch_assoc())
		{	 
			
			$_SESSION['usertype']=$row['type'];
            $_SESSION['username']=$row['username'];
            $_SESSION['id'] = $row['id'];
			if ($row['type']=="admin")
			{
			}
            echo "logined succed.";
            echo $_SESSION['username'];
            Header('Location:../search_room.php');
		}
	}
	else {		
		echo 'No match found'.$name.$pass;
	}		
	}
	else{
		    // else, if errors, it adds them in string format and print it
			echo implode('<br />', $erors);
			echo '</br>'.'Fill in rows properly.';
	}
	}

?>