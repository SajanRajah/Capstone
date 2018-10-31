<?php
require_once '../../includes/autoload.php';
include '../../includes/header.php';
use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$formerror="";

$name="";
$email="";
$gender="";
$hobbies="";
$comments="";

if(isset($_REQUEST["submitted"])){
    $name=$_REQUEST["name"];
    $email=$_REQUEST["email"];
    $gender=$_REQUEST["gender"];
	$hobbies=$_REQUEST["hobbies"];
    $comments=$_REQUEST["comments"];
	
    if($name!='' && $email!=''){
        $UM=new UserManager();
        $user=new User();
        $user->name=$name;
        $user->email=$email;
        $user->gender=$gender;
        $user->hobbies=$hobbies;
		$user->comments=$comments;
        $user->role="user";
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            #header("Location:registerthankyou.php");
			echo '<meta http-equiv="Refresh" content="1; url=./registerthankyou.php">';
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<script><link rel="stylesheet" href="..\..\bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="..\..\ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="..\..\bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function validateForm() {
					
		var firstName = document.forms["tb_leads"]["firstName"].value;
		//First Name cannot be blank
		if (First_Name == "") {
		alert("First Name must be filled out");
		return false;    
		}
		if (firstName.length>50) {
		alert("First Name cannot be more than 50 characters");
		return false;    
		}
		
			var email = document.forms["tb_leads"]["email"].value;
		//Phone number cannot be blank
		if (email == "") {
		alert("Email must be filled out");
		return false;    
		}
		</script>
		

<form name="myForm" method="post" onsubmit='return validateForm()'  class="pure-form pure-form-stacked">
<form action="register_iu8.php" method="get">
<h1>Registration Form</h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td>Name</td>
    <td><input type="text" name="name" value="<?=$name?>" size="50"></td>
	<td><?=$formerror?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" value="<?=$email?>" size="50"></td>
	<td><?=$formerror?></td>
  </tr>
  <tr>    
    <td>Gender</td>
    <td><input type="radio" name="gender" value="Male"> Male <input type="radio" name="gender" value="Female"> Female</td>
  </tr>
  <tr>    
    <td>Hobbies</td>
	 <td>
		
  <input type="checkbox" name="Cycling" value="Cycling"> Cycling <br>
  <input type="checkbox" name="" value="Dancing"> Dancing <br> 
   <input type="checkbox" name="" value="Music"> Music <br> 
  <input type="checkbox" name="" value="Running"> Running <br> 
  <input type="checkbox" name="" value="Racing"> Racing <br> </td>
    
       
  </tr>  
  <tr>    
    <td>Comments</td>
    <td><input type="text" name="comments" value="<?=$comments?>" size="textarea"></td>
  </tr>  
  <tr>
   <br> <td>
       <input type="submit" name="submitted" value="Submit">
       <input type="reset" name="reset" value="Reset">
    </td>
  </tr>
</table>
</form>
</body>
</html>

<?php
include '../../includes/footer.php';
?>