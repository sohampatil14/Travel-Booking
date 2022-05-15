<?php
session_start();
?>
<html>
<head>
<title> </title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    a:link {
  color: white;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color: white;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
} 
body{
    background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,221,214,1) 0%, rgba(51,102,255,1) 90% );
    }
</style>
</head>
<body>
 
    <div class="navi">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">Travel Booking</a>
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Ranking.php">Rankings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="width: 96px;" href="Booking.php">Book a Trip</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Groups.php">Groups</a>
                  </li>
                  <div class="end" style="margin-left: 1300px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                  <?php
                  if(isset($_SESSION['username'])) {
                      echo '<a class="nav-link" href="Account.php">Account</a>';
                    } else {

                      echo '<a class="nav-link" href="Signup.php">Signup</a>';
                    }
                    ?>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="logout.php">Logout</a>
                    
                  </li>
                </ul>
                </div>
                </ul>
              </div>
            </div>
          </nav>
     </div>
     <img src="travels.png" style="margin-right: 360px;">
    <div class="form2" style="height: 450px;">
      <!-- onsubmit="return login_check()" -->
<form action="Login.php" method="POST">
	<h2 style="text-align: center;">Login</h2>
	
    <div class="input-container ic1">
	<input type="text" name="user_name" class="input" placeholder=" ">
	    <div class="cut"></div>
        <label for="user_name" class="placeholder">Username</label>
        </div>
    
    <div class="input-container ic2">
	<input type="password" name="pass_word" class="input" placeholder=" ">
                        <div class="cut"></div>
                <label for="pass_word" class="placeholder">Password</label>
        </div>
	
	<input type="submit" name="submit_login" class="submits" style="margin-top: 30px;"><br>

</form>
<p style="text-align: center;">If you don't have a account, click to <a href="Signup.php">Signup</a></p>
<div class="err"></div>
    </div>
    <script src="script.js"></script>

</body>
</html>