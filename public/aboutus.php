<?php session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>
<link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
<br><h3>
<b>Jobs @ Community Portal for Software Programmers</b>
</h3>
 
<p>
Tired searching for a job? Feeling helpless? Tired of waiting for a response after applying on those job portals? We are here to help you out.</p>

<p><b>ABC Jobs</b> has come up with an amazing <b>Job Portal</b> within this Community Portal where candidates can apply for desired jobs, and where employers or recruiters can post their requirements. 
With two separate registrations, this portal provides both candidates and the employers a convenient way in searching for the suitable match for each other. 
It enables the employers to send an email or sms to the candidates they feel are fit for the vacancy they have.
</p>
 
<p>
<b>Features for Candidates:</b>

Candidates can search for a job according to their preferred city.
Candidates can send their resumes to the companies which are located in their preferred cities.
Candidates can fill the bio data form which is designed for them in the portal with an attachment of their resume.
Candidates shall receive an email or sms if they are being short listed for the interview by an employer.
 </p>
<p>
<b>Features for Employers:</b>

Employers can find suitable candidates by searching with the desired key words for the vacancy.
Employers can post the vacancies by filling up a form designed for the same. They can mention the job description and salary offered in that.
Employers will be able to send out an email to those candidates directly who fit the criteria of the job opening.
</p>
<?php
include 'includes/footer.php';
?>