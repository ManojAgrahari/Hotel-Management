<!DOCTYPE html>
<html>
<head>
    <?php require_once('includes/layouts/head.php'); ?>
</head>

<body>
     <?php require_once('includes/layouts/nav.php') ?>
		<div class="container">
		    <div class=" col-6 panel panel-default" id="panel">
		    <div class="panel-body">
		    <div class="row">
					<form class="form-horizontal" action="phps/logincheck.php"  method="post">
				  
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
					
					<label class="col-lg-4"></label>
					<div class="col-lg-4">
					<button type="submit"  class="btn btn-primary" value="Sign in">Sign in </button>
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
