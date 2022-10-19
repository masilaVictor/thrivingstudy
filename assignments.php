<?php

include('header.php');

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = "thriving";

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(! $conn){
		die('Could not connect to the database: '.mysql_error());
	}
	$uname = $_SESSION['Uname'];
	function get_bids($conn){
		$uname = $_SESSION['Uname'];
		$sql = "SELECT bid_title,bid_binder, bid_question, COUNT(*) FROM bids where bid_user = '$uname' GROUP BY bid_binder ";
		$results = $conn->query($sql);
		$bids = array();
		while($data = $results->fetch_assoc()){
			array_push($bids, $data);
		}
		return $bids;
	}



	$sql2 = "SELECT * FROM bids where bid_user = '$uname' ";
	if($res = mysqli_query($conn, $sql2)){
		$rowcount = mysqli_num_rows($res);
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Submitted Assignments</title>
 	<link rel="stylesheet" type="text/css" href="assignment_style5.css">
 </head>
 <body>
 	<div class="title_container">
 		<h1>Your Submitted Assignments</h1>
 		<hr>
 		
 	</div>

 	<div class="assignments_container">
 	<?php 
 		$retrieved_bids = get_bids($conn);

 		$i = 0;
 		foreach($retrieved_bids as $key => $row):
 			if($i>5)
 				break;
 			$i++;

 	?>
 	<div class="display_bids">
 		<h4>
 			<a href="myassignments.php?id=<?=$row['id'] ?>"><?php echo $row['bid_title']; ?>
 				
 			</a>

 		 </h4>
 		<br>
 		<h6>Total Bids:  <?php echo $row['COUNT(*)']; ?></h6>
 		<br>
 		<p><?php echo $row['bid_question'] ?></p>
 		<br>
 		
 	
 		<?php
 		echo "

 		";

 		 ?>

 	</div>
 	<?php endforeach ?>
 	</div>
 </body>
 </html>