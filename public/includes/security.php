<?php
if(!isset($_SESSION['role'])){
    header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
}
//To prevent users accessing Admin pages
if($_SERVER['PHP_SELF']=="/students/SG0318A17/M5Project/CommunityPortal/public/modules/user/userlist.php")
{
	if($_SESSION['role']=="user")
	{
		header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
	}
}

if($_SERVER['PHP_SELF']=="/students/SG0318A17/M5Project/CommunityPortal/public/modules/user/edituser.php")
{
	echo "security -a <br>"; 
	if($_SESSION['role']=="user")
	{
		echo "security -b <br>"; 
		header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
	}
}

if($_SERVER['PHP_SELF']=="/students/SG0318A17/M5Project/CommunityPortal/public/modules/user/deleteuser.php")
{
	if($_SESSION['role']=="user")
	{
		header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
	}
}

if($_SERVER['PHP_SELF']=="/students/SG0318A17/M5Project/CommunityPortal/public/modules/user/feedbacklist.php")
{
	if($_SESSION['role']=="user")
	{
		header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
	}
}

if($_SERVER['PHP_SELF']=="/students/SG0318A17/M5Project/CommunityPortal/public/modules/user/editfeedback.php")
{
	echo "security -a <br>"; 
	if($_SESSION['role']=="user")
	{
		echo "security -b <br>"; 
		header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
	}
}

if($_SERVER['PHP_SELF']=="/students/SG0318A17/M5Project/CommunityPortal/public/modules/user/deletefeedback.php")
{
	if($_SESSION['role']=="user")
	{
		header("Location:/students/SG0318A17/M5Project/CommunityPortal/public/login.php");
	}
}
?>