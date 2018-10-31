<?php 
	$firstname = "";
	$lastname = "";
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
	    	        $firstname = $_REQUEST['firstname'];
					 $lastname = $_REQUEST['lastname'];
	    }
	
?>

<h3>
<?php
echo "Thank you $firstname $lastname";
?></h3>
<br/><br/>
Thank you for submitting your feedback. We are reviewing your feedback.