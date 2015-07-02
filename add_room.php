<?php 
    if( isset($_SESSION['usertype']) ){
        if( $_SESSION['usertype'] != 'admin' ){
            $_SESSION['notice']= 'You must signed in as Adminstrator.';
            //echo $GLOBALS['notice'];
            Header('Location:search_room.php');
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
    <div class="container" id="main">

			<!-- *******For Carousel******** -->
			<hr></hr>
            <br/>
            <?php if(isset($_SESSION['notice'])){
                 echo $_SESSION['notice'];
                 unset($_SESSION['notice']);
                 }?>
			<div class="row" >
            <div class="col-sm-4"></div>
            <div class="col-sm-4" class="" >
            <strong>Add Room:</strong> 
            </div>

            <div class="col-sm-4"></div>
            </div>
            <br />
            
			<div class="row">
				<div class="col-sm-12">
					<div>
                    
                    <form class="form-horizontal" action="phps/insertrooms.php"  method="post">
                <div class="form-group">
					
						<label class="col-lg-4 control-label" for="room_code">Roome Code: </label>
						<div class="col-lg-4">
						<input class="form-control" name="room_code" id="room_code" placeholder="Room Code" type="text">
					    </div>
					</div>
	
				    <div class="form-group">
					    <label class="col-lg-4 control-label" for="ac">AC : </label>
					 	 <div class="col-lg-4">
						<select id="ac" name="ac">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        </select>
						</div>
					</div>
                    
                    <div class="form-group">
					
						<label class="col-lg-4 control-label" for="bed">Bed type: </label>
						<div class="col-lg-4">
						<select id="bed" name="bed">
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                        </select>
					    </div>
					</div>
					
					<div class="form-group">
					
						<label class="col-lg-4 control-label" for="booked">Booked: </label>
						<div class="col-lg-4">
						<select id="booked" name="booked" >
                        <option value="yes">Yes</option>
                        <option value="no" selected> No</option>
                    </select>
					    </div>
					</div>
                    
					
                    
					<label class="col-lg-4"></label>
					<div class="col-lg-8">
					<button type="submit"  class="btn btn-primary" value="Add Room">Add Room</button>
					<a href="index.html" target="_blank"><button class="btn btn-danger" data-dismiss="modal" type="reset">Reset</button></a>
				    </div>
		            </form>
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