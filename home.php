<?php 
    ?>
    <div class="header"> 
	<?php include('header.php'); ?>
    </div>
    <?php

    $username = $_SESSION['Uname'];
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "thriving";

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(! $conn){
        die('Could not connect to the database: '.mysql_error());
    }

    function display_works($conn){
        $userName = $_SESSION['Uname'];
        $sql = "SELECT * FROM works where user = '$userName' order by id desc ";
        $results = $conn->query($sql);
        $works = array();
        while($data=$results -> fetch_assoc()){
            array_push($works, $data);
        }
        return $works;
    }



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Thriving Study</title>
 	<link rel="stylesheet" type="text/css" href="homestyle8.css">

    <style type="text/css">
        @media screen and (max-width: 480px) {
            .content_container{
                width: 120%;
                margin-left: -8%;
            }
            .display_works a{
                font-size: 19px;
            }
            .display_works h5{
                font-size: 16px;
            }
            .display_works p{
                font-size: 14px;
            }
            form textarea{
                width: 80%;

            }
            .title_header h1{
                font-size: 25px;
            }
            .title_header span{
                margin-top: -20%;
            }
            .upqus{
                margin-top: 5%;
                margin-bottom: 5%;
            }
            .filen{
                margin-top: 13%;
            }
            .upload__content{
                margin-top: -10%;
            }
            .upload__content label{
                font-size: 16px;
            }
            .upload__content h3{
                font-size: 19px;
                color: #fff;
            }
            .upload__content select{
                font-size: 16px;

            }
            .part3{
                margin-top: 17%;
                width: 60%;
                margin-left: 18%;
            }
            .part3 label{
                margin-left: -30%;
                margin-top: 7%;
            }
            .part3 input{
                width: 40%;
            }
            .part2{
                margin-left: 15%;
                margin-top: -16%;
                
            }
            .part2 select{
                width: 60% ;
              
                margin-left: 8%;

            }
            .part2 label{
                font-size: 15px;
                margin-left: 8%;
            }



        }

    </style>
 </head>
 <body>
 	<div class="banner">
 		<div class="title_header">
 			<h1>Welcome Back,<br><span class="user_name"><?php echo $username; ?></span></h1>			
 		</div> 
 		<div class="upload__content">
 			<form action="insert.php" method="post" enctype="multipart/form-data">
 				<label style="color:#000">Question Title</label><br>
 				<input type="text" name="title"><br>
 				<label style="color:#000">Your Question</label><br>
 				<textarea rows = "5" cols = "50" name="description"></textarea>
 				<h3>Additional Information</h3>
 				<div class="part1" style="float: left;">
 					<label style="color:#000">Duration</label><br>
 					<select name="duration" >
 						<option >1 hour</option>
 						<option >1 Day</option>
 						<option >2 Days</option>
 						<option >3 Days</option>
 						<option >4 Days</option>
 						<option >5 Days</option>
 					</select>
 				</div>
 				<div class="part2">
 					<label style="color:#000">Field of Study</label><br>
 					<select name="field">
 						<option>Applied Science</option>
                        <option>Architecture and Design</option>
                        <option>Biology</option>
                        <option>Biology-Anatomy</option>
                        <option>Biology-Ecology</option>
                        <option>Biology-Physiology</option>
                        <option>Business Finance-Accounting</option>
                        <option>Business Finance-Economics</option>
                        <option>Business Finance-Management</option>
                        <option>Business Finance-Operations & Management</option>
                        <option>Business & Finance</option>
                        <option>Business & Finance-Financial Market</option>
                        <option>Business & Finance-Marketing</option>
                        <option>Chemistry</option>
                        <option>Chemistry-Chemical Engineering</option>
                        <option>Chemistry-Organic Chemistry</option>
                        <option>Chemistry-Pharmacology</option>
                        <option>Chemistry-Physical Chemistry</option>
                        <option>Computer Science</option>
 						
 						<option>Earth Science-Geography</option>
 						<option>Earth Science-Geology</option>
 						
 						<option>Education</option>
 						<option>Engineering</option>
 						<option>Engineering-civil engineering</option>
 						<option>Engineering-Electrical Engineering</option>
 						<option>Engineering-Electronic Engineering</option>
 						<option>Engineering-Mechanical Engineering</option>
 						<option>Engineering-Telecommunications Engineering</option>
 						<option>English</option>
 						<option>English-Article Writing </option>
 						<option>Environmental Science</option>
 						<option>Foreign Language-Spanish</option>
 						<option>Govornment</option>
 						<option>History</option>
 						<option>History-American History</option>
 						<option>History-Ancient History</option>
 						<option>History-World History</option>
 						<option>Human Resource Management</option>
 						<option>Information Systems</option>
 						<option>Law</option>
 						<option>Law-Civil</option>
 						<option>Law-Crminal</option>
 						<option>Literature</option>
 						<option>Mathematics</option>
 						<option>Mathematics-Algebra</option>
 						<option>Mathematics-Calculus</option>
 						<option>Mathematics-Geometry</option>
 						<option>Mathematics-Numerical Analysis</option>
 						<option>Mathematics-Precalculus</option>
 						<option>Mathematics-Probability</option>
 						<option>Mathematics-Statistics</option>
 						<option>Mathematics-Trigometry</option>
 						<option>Nursing</option>
 						<option>Physics</option>
 						<option>Physics-Electromagnetism</option>
 						<option>Physics-Geophysics</option>
 						<option>Physics-Mechanics</option>
 						<option>Physics-Optics</option>
 						<option>Political Science</option>
 						<option>Psychology</option>
 						<option>Reading</option>
 						<option>Science</option>
 						<option>Social Sciences</option>
 						<option>Social Sciences-Philosophy</option>
 						<option>Social Sciences-Sociology</option>


 					</select>			
 				</div>
 				 <div class="part3">
 					<label style="color:#000">Budget</label><br>
 					<input type="text" name="budget" placeholder="$">			
 				</div>
                <div class="upqus">
                    <h4 style="position: absolute;left: 0%;margin-top: 1%; color:#fff;">Upload Question</h4>
                  

                    <hr style="width:60%; border-style: none none dashed; margin-left: 0px;color:#0281aa;">
                    <input class="filen" type="file" id="ass_file" name="ass_file" required style="margin-top: 3%; position:relative;">
                    
                </div>
 				<div class="submit__btn">
 					<input type="submit" name="submit">
              
 					
 				</div>


 			</form>
 			
 		</div>		
 							
 	</div>
    <div class="content_container">
        <?php
            $my_works = display_works($conn);
            $i = 0;
            foreach($my_works as $key=>$row):
                if($i>5)
                    break;
                $i++;
         ?>
         <div class="display_works">
            <h4>
                <a href="myassignments.php?id= <?= $row['id'] ?>"><?php echo $row['title']; ?>
                    
                </a>
            </h4>
            <br>
            <h5>
                 <?php echo $row['description'];  ?>
            </h5>
            <br>
            <p>
                Field: <?php echo $row['field'];  ?>
            </p>
            <br>
            <p>
                Budget: <?php echo $row['budget'];  ?>
            </p>

             
         </div>
         <hr>

     <?php endforeach ?>
    </div>   
<?php include('footer.php'); ?> 
 </body>
 </html>
 