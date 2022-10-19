<?php
	session_start();

	$uname = $_SESSION['Uname'];

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'thriving';
	$dbname2 = 'testingdatabase';

	$conn2 = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname2);
	if(! $conn2){
		die('could not connect to the database: '.mysql_error());

	}

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(! $conn){
		die('could not connect to the database: '.mysql_error());

	}
	
	
	function get_work($conn, $id){
		$sql = "SELECT * FROM bids WHERE bid_id = '{$id}' ";
		$results = $conn->query($sql);
		$data = $results -> fetch_assoc();

		return $data;
	}
	$id = $_GET['id'];
	$works = get_work($conn, $id);
	$question_title = $works['bid_title'];
	$name = $works['bidder'];
	$amount = $works['bid'];
	$id3 = $works['bid_binder'];
	$id4 = $works['bid_id'];

	$_SESSION['id3'] = $id3;
	$_SESSION['id4'] = $id4;

	function get_email($conn2, $user){
		$sql2 = "SELECT * FROM users WHERE username = '$user'";
		$res = $conn2->query($sql2);
		$data2 = $res -> fetch_assoc();

		return $data2;
	}

	$user = $works['bidder'];
	$email = get_email($conn2, $user);
	$this_email = $email['email'];  

	$_SESSION['bidder'] = $user;
	$_SESSION['bid_user'] = $uname;
	$_SESSION['question'] = $question_title;
	$_SESSION['amount'] = $amount;
	$_SESSION['id'] = $id;


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bidderProfile_style5.css">
	<title>Thriving Study</title>
</head>
<body>
	
	<script type="text/javascript">
		function insertNow(){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.open("GET","insert_accepted.php?Fname="+document.getElementById("fname").value+"&Lname="+document.getElementById("lname").value+"&Bid="+document.getElementById("bid").value,false);
	            xmlhttp.send(null);

			document.getElementById("di").innerHTML=xmlhttp.responseText;

		}

	</script>
	<div class="top-bar">
		
	</div>
	<div class="main_wrap">
		
		<h1 class="title">Question: <?php echo $question_title; ?></h1>

		<div class="left_photo">
			<img src="avatar2a.png">
			<h2><?php echo $name; ?>  </h2>	
			<p>Email: <?php echo $this_email; ?></p>	
		</div>
		<div class="right_details">
			<div class="display_success" id="form_display" style="display: none;">
				<h4 style="color: green;">Bid Accepted Successfully!</h4>
				
			</div>
			<h2>Name: <?php echo $name; ?> </h2>
			<h4>Works Completed: </h4>
			<h4>Ratings: </h4>
			<h4>Percentage Ratings</h4>
				<div style="height:21px; background-color: #f6f6f6; width:50%;">
					<hr style="height: 20px; width: 70%; margin-left: 0px; background-color: orange;">
				</div>
			<h4>70%</h4>
			<h4>Bid Amount: <?php echo $amount; ?> </h4>
			<button onclick="openSuccess();"><a href="pay.php?id= <?=$amount ?>">Accept Bid</a></button>

			
		</div>
		
	</div>



</body>
</html>