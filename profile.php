<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
    <div class="container" id="main">

			<!-- *******For Carousel******** -->
			<hr/><hr/>
            <br/>
            <?php if(isset($_SESSION['notice'])){
                 echo '<br/>'.$_SESSION['notice'].'<br/>';
                 unset($_SESSION['notice']);
                 }?>
            <br />
			
			<div class="row">
				<div class="col-sm-12">
                <hr /><br />
			 <div>
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
        
        $sql = "SELECT * FROM users WHERE `id` = ".$_SESSION['id'];
        $result = $conn->query($sql);
        //$key[]
        //$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        $key_array = array("name"=>"Name:", "contact" => "Contact:", "address" => "Address:", "username" => "Username:",
        "type" => "Type:", "email"=> "Email:" );
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()){
               
             foreach($row as $key => $value ) {
                if($key !='id' && $key != 'password' )
                    { echo "<div>".$key_array[$key]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$value."</div>";}
                }
                echo "</tr>";
            }
            //echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
                    </div>
				</div><!-- end of col-sm-6 -->
			</div><!-- end of row -->
			<br><hr>
            
		

		</div>


      <?php require_once("includes/layouts/bottom.php"); ?>
</body>
</html>