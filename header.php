<?php
  session_start();
  $conn = new mysqli("localhost","root","","thriving");

  $name = $_SESSION['Uname'];

  function get_user($conn, $b_name){
    $sql3 = "SELECT * FROM messages where to_user = '$b_name' ";
    $res3 = $conn->query($sql3);
    $data3 = $res3->fetch_assoc();
    return $data3;
  }

  $b_name = $_SESSION['Uname'];
  $thisUser = get_user($conn,$b_name);
  $nm = $thisUser['to_user'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link rel="stylesheet" type="text/css" href="headerstyle7.css">
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title></title>
  <style type="text/css">
  @media screen and (max-width: 480px) {
    .dropdown{
      
    }
    .navContainer{
    

    }
    .navbar{
      width: 92%;
    }

}
.navbar{
  width: 100%;
}
  
</style>
</head>
<body>


<!-- MOBILE NAVIGATION BAR -->












	<!-- Navbar -->
<div class="navContainer">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed;  top: 0%; z-index: 1;">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <?php
      $sql = "SELECT * FROM notifications where user = '$name' and status='Unseen' ";
      if($res = mysqli_query($conn, $sql)){
        $rowcount = mysqli_num_rows($res);
      }

      $sql2 = "SELECT * FROM messages where to_user = '$name' and status = 'Unread' ";
      if($res2 = mysqli_query($conn, $sql2)){
        $rowcount2 = mysqli_num_rows($res2);
      }

     ?>
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="thrivingstudylogo.png"
          height="50"
          alt="MDB Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <div class="menu__wrapper">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="https://thrivingstudy.com">Home</a>
        </li>
        <li>
          <a class="nav-link" href="https://www.paypal.com/signin">Funds</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="questions.php?id=<?=$name; ?>">Questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://thrivingstudy.com/contacts-1">Help</a>
        </li>

      </ul>
  </div>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="wrapper2">
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <div class="message">
          <i class="glyphicon glyphicon-envelope"></i>
          <span class="badge rounded-pill badge-notification bg-danger"><a href="messages.php?name= <?=$nm ?>"><?php echo $rowcount2; ?></a></span>
        </a>
      </div>

      <!-- Notifications -->
      <div class="dropdown">
        <a
          class="text-reset me-3 dropdown-toggle hidden-arrow"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        > </a>
          <i class="fas fa-bell"></i>
          <span class="badge rounded-pill badge-notification bg-danger"><a href="notifications.php?id=<?=$name ?>"><?php echo $rowcount; ?></a></span>

       


      </div>
      <!-- Avatar -->
      <div class="dropdown">
        <a
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <p style="margin-top:9px;"><?php echo "$name"; ?></p>

        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="myprofile.php">My profile</a>
          </li>

          <li>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
</div>
  <!-- Container wrapper -->
</nav>
</div>
<!-- Navbar -->

</body>
</html>