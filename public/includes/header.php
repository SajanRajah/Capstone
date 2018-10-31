<!-- Navigation Bar -->
<?php 
   if(isset($_SESSION["email"]))
   {
?>

<link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
<script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>



		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
				</div>
				
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><img src="/students/SG0318A17/m5project/CommunityPortal/public/images/logo.png" align="left" style="width:55px; height:55px"></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/home.php"><font color="white">Home</font></a></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/aboutus.php">About Us</a></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/contactus.php">Contact Us</a></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/modules/user/updateprofile.php">Profile Settings</a></li>
						<!--<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/modules/user/m6_manage.php">Subscription to Newsletter</a></li>-->
						
				<?php
						if($_SESSION["role"]=="admin") //added for admin role - 20180905
						{
				?>
							<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/modules/user/userlist.php"><font color="orange">ADMIN: View Users</font></a></li>
							<!--<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/modules/user/feedbacklist.php"><font color="orange">ADMIN: View Feedback</font></a></li>-->
							<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/modules/user/bulkmail.php"><font color="orange">ADMIN: Send Bulk Email</font></a></li>
				<?php		
						}	
				?>
						
					</ul>
      
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>


<?php 
   } 
        else
   {
?>

<link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
<script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
				</div>
				
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><img src="/students/SG0318A17/m5project/CommunityPortal/public/images/logo.png" align="left" style="width:55px; height:55px"></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/home.php"><font color="white">Home</font></a></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/aboutus.php">About Us</a></li>
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/contactus.php">Contact Us</a></li>
											
						
					</ul>
      
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/students/SG0318A17/m5project/CommunityPortal/public/login.php">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>


<?php 
   } 
?>