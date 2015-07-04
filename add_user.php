<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>
<body>
     <?php require_once('includes/layouts/nav.php'); ?>
		<div class="container">
		    <div class=" col-6 panel panel-default" id="panel">
		    <div class="panel-body">
            <div class="row" >
            <div class="col-sm-2"></div>
            <div class="col-sm-6" class="" >
            <strong>Add User:</strong> 
            </div>
            <div class="col-sm-4"></div>
            </div>
            <br />
		    <div class="row">
            <form class="form-horizontal" action="phps/insertusers.php"  method="post">
                <div class="form-group">
					
						<label class="col-lg-4 control-label" for="name">Name: </label>
						<div class="col-lg-4">
						<input class="form-control" name="name" id="name" placeholder="full name" type="text">
					    </div>
					</div>
					
				  
				    <div class="form-group">
					    <label class="col-lg-4 control-label" for="username">User name: </label>
					 	 <div class="col-lg-4">
						<input class="form-control" name="username" id="username" placeholder="username" type="text">
						</div>
					</div>
					
					<div class="form-group">
					
						<label class="col-lg-4 control-label" for="password">Password: </label>
						<div class="col-lg-4">
						<input class="form-control" name="password" id="password" placeholder="Password" type="password">
					    </div>
					</div>
                    
					<div class="form-group">
					
						<label class="col-lg-4 control-label" for="email">Email: </label>
						<div class="col-lg-4">
						<input class="form-control" name="email" id="email" placeholder="email" type="email" >
					    </div>
					</div>
                    
                    <div class="form-group">
					
						<label class="col-lg-4 control-label" for="address">Address: </label>
						<div class="col-lg-4">
						<input class="form-control" name="address" id="address" placeholder="address" type="text">
					    </div>
					</div>
                    <div class="form-group">
					
						<label class="col-lg-4 control-label" for="contact">Contact: </label>
						<div class="col-lg-4">
						<input class="form-control" name="contact" id="contact" placeholder="contact" type="text">
					    </div>
					</div> 
                               
                    
					<label class="col-lg-4"></label>
					<div class="col-lg-8">
					<button type="submit"  class="btn btn-primary" value="Add User">Add User</button>
					<a href="index.html" target="_blank"><button class="btn btn-danger" data-dismiss="modal" type="reset">Reset</button></a>
				    </div>
		            </form>
	        </div><!-- end row -->
	        </div>
            </div>
		</div><!--end container-->
	     <?php require_once("includes/layouts/bottom.php"); ?>
	</body>
	
</html>
