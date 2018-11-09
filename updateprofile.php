<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$passwordc="";

//Next two brought outside if statement to become global
$UM=new UserManager();
$existuser=$UM->getUserByEmail($_SESSION["email"]);

if(!isset($_POST["submitted"])){
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $password=$existuser->password;
  $subscribe=$existuser->subscribe;
}else{
  $firstName=$_POST["firstName"];
  $lastName=$_POST["lastName"];
  $email=$_POST["email"];
  
  
  //20181029 for subscribe status
  //update table_column to 0 if unsubscribe or 1 if subscribed
  if (!isset($_POST["subscribe"])){
	$subscribe=0;
   } else{
	$subscribe=$_POST["subscribe"];
   }
  
  if($_POST["password"]==$existuser->password){
	  $password=$_POST["password"];
	  $passwordc=$_POST["cpassword"];
  } else {
	  $password=md5($_POST["password"]);
	  $passwordc=md5($_POST["cpassword"]);
  }

  if($firstName!='' 
  && $lastName!='' 
  && $email!='' 
  && $password!=''
  && $passwordc!='')
  {
      if ($password==$passwordc){
	  $update=true;
       $UM=new UserManager();
       if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User Email already in use, unable to update email";
               $update=false;
           }
       }
       if($update){
           $existuser=$UM->getUserByEmail($_SESSION["email"]);
           $existuser->firstName=$firstName;
           $existuser->lastName=$lastName;
           $existuser->email=$email;
           $existuser->password=$password;
           $existuser->subscribe=$subscribe;	//added for subscribe status from db 20181029
           
		   $UM->saveUser($existuser);
           $_SESSION["email"]=$email;
           header("Location:../../home.php");
       }
  }else {
      $formerror="Password does not match";
		}
  }else {
      $formerror="Please provide required values";
  }
}
?>
<link rel="stylesheet" href="..\..\bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="..\..\ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="..\..\bootstrap/3.3.7/js/bootstrap.min.js"></script>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<h1>Update Profile</h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td>First Name</td>
    <td><input type="text" name="firstName" value="<?=$firstName?>" size="50"></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="lastName" value="<?=$lastName?>" size="50"></td>
  </tr>
  <tr>
    <td>Email <i><font color="red"><h6>To update your email, please email your request to admin@abcjobs.com</h6></i> </td>
    <td><input type="text" name="email" value="<?=$email?>" readonly size="50"></td>
	
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" value="<?=$password?>" size="20"></td>
  </tr>
  <tr>
    <td>Confirm Password</td>
    <td><input type="password" name="cpassword" value="<?=$password?>" size="20"></td>
  </tr>
  
  
  
  
  <tr>
    <td><h1>Subscribe / Unsubscribe to a Newsletter / Mailing List</h1></td>
    <td>
		<h3>Select Newsletter / Mailing List</h3>
<h4><b>CPSP Updates:</b>&nbsp&nbsp<input type="checkbox" name="subscribe" value="1" <?php if ($subscribe == 1) echo "checked";  ?>/></h4></td>  <!--checked and value remove to allow db value to be reflected-->
  </tr>
  
  
  
  
  
  
  
  
  <tr>
	<td></td>
    <td><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary"></td>
    </td>
  </tr>
</table>
</form>


<?php
include '../../includes/footer.php';
?>