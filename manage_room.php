<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
    <div class="container" id="main">

			<hr/><hr/>
            <br/>
            <?php if(isset($_SESSION['notice'])){
                 echo '<br/>'.$_SESSION['notice'].'<br/>';
                 unset($_SESSION['notice']);
                 }?>
            <br />
			
			<div class="row">
				<div class="col-sm-12">
                <div>
                <a href="add_room.php"  >
                   <button class="btn btn-primary" type="button" >Add Room  <span class="badge" > +  </span></button>
                </a>
                </div>
               <hr /><br />
			 <div>
                    <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <th>S NO.</th>
        <th>Room Code</th>
        <th>AC</th>
        <th>Bed Type</th>
        <th>Booked</th>
      </tr>
      
    </thead>
    <tbody>
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
        
        $sql = "SELECT * FROM rooms";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $sno = 1;
            // output data of each row
            while($row = $result->fetch_assoc()){
                echo "<tr><td>".$sno."</td>";
                $sno++;
             foreach($row as $key => $value ) {
                if($key == 'id'){ $current_id = $value; }
                if($key !='id')
                    { echo "<td>".$value."</td>";}
                }
                echo "<!--<td><a href='reserve_room.php?id=".$current_id."' > Check In</a></td>--> </tr>";
            }
            //echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
    </tbody>
  </table>
                    </div>
				</div><!-- end of col-sm-6 -->
			</div><!-- end of row -->
			<br><hr>
            
		<div class="backtotop">
				<a class="back-to-top" href="#top"><button class="btn btn-default"><span class="glyphicon glyphicon-arrow-up"></span></button></a>
		</div>

		</div>


      <?php require_once("includes/layouts/bottom.php"); ?>
</body>
</html>