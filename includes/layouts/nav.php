
              <?php 
              /*  
               <div class="container">
               	<a class="navbar-brand" id="logo" href="#"><img src="images/small1.jpg"></a>
                
                </div>
              */  
              ?>
<div class="navbar navbar-fixed-top" role="navigation">
	    <div class="container">
		  
		     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>      
		    </button>
		       <a class="navbar-brand" href="index.php">Hotel Reservation System</a>
		  <div class="nav-collapse collapse navbar-responsive-collapse ">
		   <!--<ul class="nav navbar-nav">
		       <li class="active">
				   <a href="index.html">Home</a>
			    </li>
				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bed<b class="caret"></b></a>
		          <ul class="dropdown-menu">
		            <li><a href="Singal bed.html">Singal Bed</a></li>
		            <li class="divider"></li>
		            <li><a href="Double.html">Double Bed</a></li>
		            <li class="divider"></li>
		            <li><a href="other.html">Other types</a></li>
		           </ul>
		        </li>
			</ul>-->
            <?php if(isset($_SESSION['id'])){ ?>
				<form class="navbar-form pull-left" action="search_room.php" method="post">
					<input type="text" name="room_code" 
                                <?php if(isset($_POST['room_code']))   
                                    echo 'value="'.$_POST['room_code'].'" ';
                                else echo 'value="" ';
           // $ac=$_POST['ac'];
         //   $bed=$_POST['bed'];
            //$booked=$_POST['booked']; ?> 
                class="form-content" placeholder="Room Code" />
                    &nbsp;&nbsp;&nbsp;&nbsp;
                  
                    <label for="bed" >Bed type: </label>
                    <select id="bed" name="bed">
                        <option value="any">any</option>
                        <option value="single">Single</option>
                        <option value="double">Double</option>
                    </select>
                                        
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="ac" >AC: </label>
                    <select id="ac" name="ac">
                        <option value="any">any</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="booked" >Booked: </label>
                    <select id="booked" name="booked"  >
                        <option value="any">any</option>
                        <option value="yes">Yes</option>
                        <option value="no" selected>No</option>
                    </select>
					&nbsp;&nbsp;<button type="submit" class="button">search</button>
                </form><!--end-navbar-form-->
                <?php 
                }
                ?>
				<ul class="nav navbar-nav pull-right">
                <?php 
                    if(isset($_SESSION['id'])){
                        ?>
				<li class="dropdown">
                     <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?> <strong class="caret"></strong></a>
		            <ul class="dropdown-menu">
		                <li><a href="profile.php"> View Profile</a></li>
                      <!--    <li class="divider"></li>                        
                       <li><a href="guest_search.php"> Guest Search</a></li> -->
                        <?php if($_SESSION['usertype']=='admin'){ ?>
		                <li class="divider"></li>
                        <li><a href="manage_user.php"> Manage User</a></li>
                        <li class="divider"></li>
                        <li><a href="manage_room.php"> Manage Room</a></li>
                        <?php } ?>
                        <li class="divider"></li>
		                <li><a href="chage_password.php"> Change Password</a></li>
		                <li class="divider"></li>
		                <li><a href="logout.php"> Sign out</a></li>
		            </ul>
              </li><?php } 
              else {              
               ?><li class="dropdown">
                     <a href="login.php" class="" ><span class="glyphicon glyphicon-user"></span>
                      Log in</a>
              </li><?php }?>
			    </ul><!--end-pull-right-->
		</ul><!--end-nav-->
			</div>
		        
		</div>
</div>