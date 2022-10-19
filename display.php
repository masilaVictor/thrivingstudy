 <?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'thriving';
   
   $link = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
   
   if(! $link ) {
      die('Could not connect: ' . mysql_error());
   }
   // Escape user inputs for security
$duration = mysqli_real_escape_string($link, $_REQUEST['due_date']);
$field = mysqli_real_escape_string($link, $_REQUEST['field']);
$budget = mysqli_real_escape_string($link, $_REQUEST['budget']);
$sql = 'SELECT title, description, duration,field,budget,id FROM works Where field=$field order by id desc';
   $retval = mysqli_query( $link, $sql );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
    }
   ?>