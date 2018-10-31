<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();
//echo $_SESSION["role"]."<br>";
//echo $_SERVER['PHP_SELF'];

if(isset($users)){
    ?>
	<link rel="stylesheet" href="..\..\bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="..\..\ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="..\..\bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <br/><br/>Below is the list of Developers registered in this Community Portal <br/><br/>
    <table class="pure-table pure-table-bordered" width="800">
            <tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>    
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
               <td><?=$user->id?></td>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>
			   <td>
			   <?php
			   if ($user->role=="user"){
				   ?>
			   
					<a href='deleteuser.php?id=<?php echo $user->id ?>'>Delete</a>
					<a href='edituser.php?id=<?php echo $user->id ?>'>Edit</a>
			   
			   <?php
			   }
			   ?>
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/>
    <?php 
}
?>
<!--This form was added for search function - 20180917-->
<br>
<form action="userlist.php" method="post">
First Name: <input type="text" name="firstName"><br>
Last Name: <input type="text" name="lastName"><br>
Email: <input type="text" name="email"><br>
<input type="submit" name="search" value="SEARCH USER">
</form>

<!--This whole section was copied from above and added for search firstname/lastname/email function - 20180917-->
<?php
if(isset($_POST["search"])){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br/><br/>SEARCH RESULTS<br/><br/>
    <table class="pure-table pure-table-bordered" width="800">
            <tr>
			<thead>
               <th><b>Id</b></th>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>    
    <?php 
		$UM=new UserManager();
		$results=$UM->searchByCriteria($_POST["firstName"],$_POST["lastName"],$_POST["email"]);
		//$results=$UM->searchByLastname($_POST["lastName"]);
		//$results=$UM->searchByEmail($_POST["email"]);
    foreach ($results as $result) {
        if($result!=null){
            ?>
            <tr>
               <td><?=$result->id?></td>
               <td><?=$result->firstName?></td>
               <td><?=$result->lastName?></td>
               <td><?=$result->email?></td>
			   <td>
			   <?php
			   if ($result->role=="user"){
				   ?>
			   
					<a href='deleteuser.php?id=<?php echo $result->id ?>'>Delete</a>
					<a href='edituser.php?id=<?php echo $result->id ?>'>Edit</a>
			   
			   <?php
			   }
			   ?>
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/>
    <?php 
}
?>



    


<?php
include '../../includes/footer.php';
?>