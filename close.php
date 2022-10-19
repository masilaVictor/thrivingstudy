<?php
session_start();
$id=$_SESSION['thiID'];

$ass_id = $_GET['c'];

$link = mysqli_connect("localhost", "root", "", "thriving");

$sql = "UPDATE bids SET status='CLOSED' where bid_id='$ass_id' ";
if(mysqli_query($link,$sql)){
	

}
else{

}


?>