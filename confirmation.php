<?php
session_start();

$user = $_SESSION['Uname'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirmation</title>
	<link rel="stylesheet" type="text/css" href="confirmation_style3.css">
</head>
<body>

	<div class="main_content">
		<h2>Dear <?php echo $user; ?>, Your application has been Submitted for Review Successfully!</h2>
		<p>Review of your application will take not more than 2hours. You can check status of your application on your profile. <br><br>For any assistance, <a href="">Contact us</a>.</p>

		<div class="buttons">
		<button class="proceed"><a href="index.php">Proceed to Dashboard</a></button>
		<button class="back">Go Back</button>
	</div>
		
	</div>

</body>
</html>