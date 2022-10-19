<?php
			function get_user($conn){
				try{
					$pdo = new PDO(
						"mysql:host=".DB_HOST.";charset=".DB_CHARSET.";dbname=".DB_NAME,DB_USER, DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO:: fetch_assoc ]

					);
				}
				catch (Exception $ex){ exit($ex->getMessage());}

				$stmt = $pdo->prepare("SELECT * FROM `identity` WHERE `id` Like ? OR `country` Like ?");
				$stmt->execute(["%".$_POST["search_id"]."%", "%".$_POST["search_country"]."%"]);
				$results6 = $stmt->fetchall();
				if(isset($_POST["ajax"])){
					echo json_encode($results6);
				}
				return $results6;

			}

?>


<?php
	session_start();
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = "thriving";

	  define("DB_HOST", "localhost");
    define("DB_NAME", "thriving");
    define("DB_CHARSET", "utf8");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");

	$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(! $conn){
		die('Could not connect to the database: '.mysql_error());
	}

	function display_bids($conn){
		
		$sql = "SELECT * FROM identity order by id desc";
		$results = $conn->query($sql);
		$id = array();
		while($data = $results -> fetch_assoc()){
			array_push($id, $data);
		}
		return $id;

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="admin_style2.css">
</head>
<style>

.button1{
	background-color: blue;
	color: white;
	border: none;
	font-size: 20px;
	border-radius: 5px;
	cursor: pointer;
	text-decoration: none;
	padding: 4px;
}
.button2{
	background-color: red;
	color: white;
	border: none;
	font-size: 20px;
	border-radius: 5px;
	cursor: pointer;
	text-decoration: none;
	padding: 4px;
}
.button1:hover{
	background-color: #576afe;
}
.button2:hover{
	background-color: #fa6988;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;

}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 6px;
  width: 10%;

}

tr:nth-child(even) {

  background-color: #dddddd;
}
</style>
<body>
	
	<div class="left_sidebar">
		<img class="logo" src="thrivingstudylogo.png">
	<h1>Admin Panel</h1>
	<hr>
	<div class="items_wrapper">
		<button class="items" onclick="openThis()" id="dash">Dashboard</button>
		<button class="items" onclick="openAnalytics()" id="ana">Analytics</button>
		<button class="items" >Clients</button>
		<button class="items">Tutors</button>
		<button class="items">Bids</button>
		<button class="items">Transactions</button>
		<button class="items">Account</button>
		<button class="items">Logout</button>
	</div>

		
	</div>
	<div class="main_dashboard" id="main_dashboard" style="display:none; margin-left: 2%; margin-top: 3%; width:80%; float:left;">
		<form class="search_users" method="post" action="">
			<h2>Search by ID or Country</h2>
			<div style="float: left;" class="search_id">
			<label>Enter User ID</label>
			<input type="text" name="search_id">
			</div>
			<div class="search_country" style="margin-left: 40%;">
			<label>Enter Country</label>
			<select>
					<option>Afghanistan</option>
					<option>Albania</option>
					<option>Algeria</option>
					<option>Andora</option>
					<option>Angola</option>
					<option>Antigua and Barmuda</option>
					<option>Argentina</option>
					<option>Armenia</option>
					<option>Australia</option>
					<option>Austria</option>
					<option>Azerbaijan</option>
					<option>Bahamas</option>
					<option>Bahrain</option>
					<option>Bangladesh</option>
					<option>Barbados</option>
					<option>Belarus</option>
					<option>Belgiam</option>
					<option>Belize</option>
					<option>Benin</option>
					<option>Bhutan</option>
					<option>Bolivia</option>
					<option>Bosnia and Herzegovina</option>
					<option>Botswana</option>
					<option>Brazil</option>
					<option>Brunei</option>
					<option>Bulgaria</option>
					<option>Burkina Faso</option>
					<option>Burundi</option>
					<option>Cote d'Ivore</option>
					<option>Cabo Verde</option>
					<option>Cambodia</option>
					<option>Cameroon</option>
					<option>Canada</option>
					<option>Central African Repuplic</option>
					<option>Chad</option>
					<option>Chile</option>
					<option>China</option>
					<option>Colombia</option>
					<option>Comoros</option>
					<option>Congo</option>
					<option>Costa</option>
					<option>Costa Rica</option>
					<option>Croatia</option>
					<option>Cuba</option>
					<option>Cyprus</option>
					<option>Czechia(Czech Republic)</option>
					<option>Democratic Republic of Congo</option>
					<option>Denmark</option>
					<option>Djibouti</option>
					<option>Dominica</option>
					<option>Dominican Republic</option>
					<option>Ecuador</option>
					<option>Egypt</option>
					<option>El savador</option>
					<option>Equitorial Guinea</option>
					<option>Eritrea</option>
					<option>Estonia</option>
					<option>Eswatini(fmr. "Swaziland")</option>
					<option>Ethiopia</option>
					<option>Fiji</option>
					<option>Finland</option>
					<option>France</option>
					<option>Gabon</option>
					<option>Gambia</option>
					<option>Georgia</option>
					<option>Germany</option>
					<option>Ghana</option>
					<option>Greece</option>
					<option>Grenada</option>
					<option>Guatamela</option>
					<option>Guinea</option>
					<option>Guinea Bissau</option>
					<option>Guyana</option>
					<option>Haiti</option>
					<option>Holy See</option>
					<option>Honduras</option>
					<option>Hungary</option>
					<option>Iceland</option>
					<option>India</option>
					<option>Indonesia</option>
					<option>Iran</option>
					<option>Ireland</option>
					<option>Israel</option>
					<option>Italy</option>
					<option>Jamaica</option>
					<option>Japan</option>
					<option>Jordan</option>
					<option>Kazakhstan</option>
					<option>Kenya</option>
					<option>Kiribati</option>
					<option>Kuwait</option>
					<option>Kyrgyzstan</option>
					<option>Laos</option>
					<option>Latvia</option>
					<option>Lebanon</option>
					<option>Lesotho</option>
					<option>Liberia</option>
					<option>Libya</option>
					<option>Lienchtenstein</option>
					<option>Lithuania</option>
					<option>Luxembourg</option>
					<option>Madagascar</option>
					<option>Malawi</option>
					<option>Malaysia</option>
					<option>Maldives</option>
					<option>Mali</option>
					<option>Malta</option>
					<option>Marshall Islands</option>
					<option>Mauritania</option>
					<option>Mauritius</option>
					<option>Mexico</option>
					<option>Micronesia</option>
					<option>Moldova</option>
					<option>Monaco</option>
					<option>Mongolia</option>
					<option>Montenegro</option>
					<option>Morocco</option>
					<option>Mozambique</option>
					<option>Myanmar(formerly Burma)</option>
					<option>Namibia</option>
					<option>Nauru</option>
					<option>Nepal</option>
					<option>Netherlands</option>
					<option>New Zealand</option>
					<option>Nicaragua</option>
					<option>Niger</option>
					<option>Nigeria</option>
					<option>North Korea</option>
					<option>North Macedonia</option>
					<option>Norway</option>
					<option>Oman</option>
					<option>Pakistan</option>
					<option>Palau</option>
					<option>Palestine State</option>
					<option>Panama</option>
					<option>Papua New Guinea</option>
					<option>Paraguay</option>
					<option>Peru</option>
					<option>Philippines</option>
					<option>Poland</option>
					<option>Portugal</option>
					<option>Qatar</option>
					<option>Romania</option>
					<option>Saint Kitts and Nevis</option>
					<option>Saint Lucia</option>
					<option>Saint Vincent and the Granadines</option>
					<option>Samoa</option>
					<option>San Marino</option>
					<option>Sao Tome and Principe</option>
					<option>Saudi Arabia</option>
					<option>Senegal</option>
					<option>Serbia</option>
					<option>Sychelles</option>
					<option>Sierra Leone</option>
					<option>Singapore</option>
					<option>Slovakia</option>
					<option>Slovenia</option>
					<option>Solomon Islands</option>
					<option>Somalia</option>
					<option>South Africa</option>
					<option>South Korea</option>
					<option>South Sudan</option>
					<option>Spain</option>
					<option>Sri Lanka</option>
					<option>Sudan</option>
					<option>Suriname</option>
					<option>Sweden</option>
					<option>Switzerland</option>
					<option>Syria</option>
					<option>Tajikistan</option>
					<option>Tanzania</option>
					<option>Thailand</option>
					<option>Timor-Leste</option>
					<option>Togo</option>
					<option>Tonga</option>
					<option>Trinidad and Tobago</option>
					<option>Tunisia</option>
					<option>Turkey</option>
					<option>Turkmenistan</option>
					<option>Tuvalu</option>
					<option>Uganda</option>
					<option>Ukraine</option>
					<option>United Arab Emirates</option>
					<option>Uruguay</option>
					<option>Uzbekistan</option>
					<option>Vanuatu</option>
					<option>Venezuela</option>
					<option>Vietnam</option>
					<option>Yemen</option>
					<option>Zambia</option>
					<option>Zimbabwe</option>
			</select>
			<input type="submit" name="submit" value="Search" onclick="openThis()">
		    </div>


			
		</form>
		<hr>

		<?php

			if (isset($_POST["submit"])){
				?>
				<div style="margin-left: 50%; margin-top: 50;">
					<h2>Masila</h2>
					
				</div>
			<?php } ?>

		
	</div>



	<div id="main" class="main" style="display: none;margin-left: 2%; margin-top: 2%; width: 80%; float: left;" >
		<?php
	if(isset($_GET['id'])){
		$user_id = $_GET['id'];
		$sql5 = "UPDATE identity set status='Verified' where id= '$user_id'";

		$results5 = mysqli_query($conn, $sql5);

		if($results5){
			echo "<script> window.location.href='admin-panel.php';</script>";

		}
	}
	else{
		
	}
	

 ?>
		<table>
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Country</th>
			<th>City</th>
			<th>Phone</th>
			<th>Education</th>
			<th>ID Card</th>
			<th>Status</th>
		</tr>
	</table>

		<?php
		$bids_made = display_bids($conn);
		$i = 0;
		foreach($bids_made as $key=>$row):
			if($i>5)
				break;
			$i++;


		
?>
	 <?php
	  $stat1 = 'Unverified';

	  ?>
	<table>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['user']; ?></td>
			<td><?php echo $row['country']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['level']; ?></td>
			<td>View ID</td>
			<td><?php 
			if($row['status'] != $stat1){
				?>
				<a class="button1" href=""><?php echo $row['status']; ?></a>
			<?php
			}
			else{
				?>
				<a class="button2" href="admin-panel.php?id= <?= $row['id'] ?>"><?php echo $row['status']; ?></a>

			
			<?php	
			}
			?>

			 </td>
		</tr>
	</table>
	<?php endforeach; ?>

	
	</div>

	<div class="analytics" id="analytics" style="display: none;margin-left: 2%; margin-top: 2%; width: 80%; float: left;">
		<h1>Victor Masila</h1>
		<h1>Victor Masila</h1>
		<h1>Victor Masila</h1>
		<h1>Victor Masila</h1>
		<h1>Victor Masila</h1>
		<h1>Victor Masila</h1>

		
	</div>

	<script>
		function openThis(){
			closeAnalytics();
			changeColor();
			returnColorAna()
			document.getElementById("main_dashboard").style.display = "block";


		}
		function closeThis(){
			document.getElementById("main_dashboard").style.display= "none";
		}
		function openAnalytics(){
			closeThis();
			returnColor()
			changeColorAna()
			document.getElementById("analytics").style.display = "block";

		}
		function closeAnalytics(){

			document.getElementById("analytics").style.display= "none";
		}
		function changeColor(){
			document.getElementById("dash").style.background = "blue";
		}
		function changeColorAna(){
			document.getElementById("ana").style.background = "blue";
			document.getElementById("ana").style.color = "#fff";
		}
		function returnColor(){
			document.getElementById("dash").style.background = "#1f1f1f";
			document.getElementById("dash").style.color = "#fff";
		}
		function returnColorAna(){
			document.getElementById("ana").style.color = "#fff";
			document.getElementById("ana").style.background = "#1f1f1f";
		}


	</script>

</body>
</html>