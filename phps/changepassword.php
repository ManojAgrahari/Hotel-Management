 <?php
 session_start();
	$erors = array();// set an empty array that will contains the errors

	// Check for form submission
	if (isset($_POST['pwd_old']) && isset($_POST['pwd_new'])&& isset($_POST['pwd_again'])) {
		// remove tags and whitespace from the beginning and end of form data
		$_POST = array_map("strip_tags", $_POST);
		$_POST = array_map("trim", $_POST);
		
		// check if all form fields are filled in correctly
		// the minimum number of characters
		if (strlen($_POST['pwd_old'])<4) $erors[] = 'Old Password must contain minimum 4 characters';
		if (strlen($_POST['pwd_new'])<6) $erors[] = 'Password must contain minimum 6 characters';
		if (strlen($_POST['pwd_again'])<6) $erors[] = 'Confirm Password must contain minimum 6 characters';
		
		
		if ($_POST['pwd_new']==$_POST['pwd_again']){		
				// if no errors ($error array empty)
				if(count($erors)<1) {
					// connect to the "registration"
					$conn = new mysqli('localhost', 'root', '', 'hrs');

					// check connection
					if (mysqli_connect_errno()) {
					exit('Connect failed: '. mysqli_connect_error());
					}

					// store the values in an Array, escaping special characters for use in the SQL statement
					$old = sha1($conn->real_escape_string($_POST['pwd_old']));
					$new = sha1($conn->real_escape_string($_POST['pwd_new']));	
					$iid=$_SESSION['id'];
					
					// UPDATE sql query
					$sql = "UPDATE `users` SET `password`='$new' WHERE `id`='$iid' AND `password`='$old' ";
					
					//if insertion of datais successful
					if ($conn->query($sql) === TRUE) {
							//Here, replace with html. take session if you need
                             // echo "You have successfully the password";
							 $_SESSION['notice']="Password changed successfully.<br/>";
							Header('Location:../search_room.php');
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
		else{
			//Here, replace with html. take session if you need
			echo "Passwords do not match";
		}
	}		
	else {
		echo 'Fill each row in the form';
	}
?>