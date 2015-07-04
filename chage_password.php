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
		    <div class="row">
					<form class="form-horizontal" action="phps/changepassword.php"   method="post">
				  
				    <div class="form-group">
					    <label class="col-lg-4 control-label" for="pwd_old">Old password: </label>
					 	 <div class="col-lg-4">
						<input class="form-control" name="pwd_old" id="pwd_old" placeholder="Old password" type="text">
						</div>
					</div>
					
					<div class="form-group">
					
						<label class="col-lg-4 control-label" for="pwd_new">New Password: </label>
						<div class="col-lg-4">
						<input class="form-control" name="pwd_new" id="pwd_new" placeholder="New password" type="text">
					    </div>
					</div>
                    
                    <div class="form-group">
					
						<label class="col-lg-4 control-label" for="pwd_again">Password again: </label>
						<div class="col-lg-4">
						<input class="form-control" name="pwd_again" id="pwd_again" placeholder="" type="text">
					    </div>
					</div>
					
					<label class="col-lg-4"></label>
					<div class="col-lg-8">
					<button type="submit"  class="btn btn-primary" value="Change Password">Change Password</button>
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
