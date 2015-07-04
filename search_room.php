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
            <div class="row" >
            <div class="col-sm-4"><strong><?php if( isset($_POST['room_code']) ){ ?>Search Results:<?php }else{
                echo "Please type on top search bar for searching room.";
                }?>
                
            </strong></div>
            <div class="col-sm-6" class="" >
             
            </div>
            <div class="col-sm-2"></div>
            </div>
			<div class="row">
				<div class="col-sm-12 feature">
					<div>
                    <table class="table table-hover table-bordered table-striped">
    <thead>
    <?php if( isset($_POST['room_code']) ){ ?>
      <tr>
        <th>S NO.</th>
        <th>Room Code</th>
        <th>AC</th>
        <th>Bed Type</th>
        <th>Booked</th>
      </tr>
     <?php } ?>
    </thead>
    <tbody>
    <?php if(isset($_SESSION['notice'])){
    echo $_SESSION['notice'];
    unset($_SESSION['notice']);
    }?>
			<?php
            if( isset($_POST['room_code']) ){
            
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
            
            if($_POST['ac']!="any"){
            $whr_ac=" `ac`='$ac'";
            if($andFlag) $and[0] = " AND ";
            $andFlag= true;
            }//else{ $andFlag=false;}
            
            if($_POST['bed']!="any"){
            $whr_bed=" `bed`='$bed'";
            if($andFlag) $and[1] = " AND ";
            $andFlag= true;
            }//else{ $andFlag=false;}
            
            if($_POST['booked']!="any"){
            $whr_booked=" `booked`='$booked'";
            if($andFlag) $and[2] = " AND ";
            $andFlag= true;
            }
            $whr = "";
            if($andFlag) $whr = "WHERE ";
            
            //else{ $andFlag=false;}
            $whrsql = $whr.$whr_room_code.$and[0].$whr_ac.$and[1].$whr_bed.$and[2].$whr_booked;
            //echo "<br/>".$whrsql."<br/>";
            $sql = "SELECT * FROM `rooms` ".$whr.$whr_room_code.$and[0].$whr_ac.$and[1].$whr_bed.$and[2].$whr_booked;
            //echo $sql."<br/>";
            $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                        $sno = 1;
                        // output data of each row
                        while($row = $result->fetch_assoc()){
                            echo "<tr><td>".$sno."</td>";
                            $sno++;
                         foreach($row as $key => $value ) {
                            if($key == 'id'){ $current_id = $value; }
                            if($key == 'booked'){ $isBooked = $value; }
                            
                            if($key !='id')
                                { echo "<td>".$value."</td>";}
                            }
                            if( $isBooked == 'no') {
                                echo "<td><a href='reserve_room.php?room_id=".$current_id."' > Reserve</a></td>";
                            }else{
                                echo "<td><a href='checkout_room.php?room_id=".$current_id."' > Check-Out</a></td>";
                            }
                            echo "</tr>";
                        }
                        //echo "</table>";
                    } else if($result->num_rows == 0) {
                echo "0 results";
            }
            
            $conn->close();
            }?>
      
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