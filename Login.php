<?php
// error_reporting(0);

// session_start();
// if($_COOKIE['login']!="false") {
// 
//   // alert("Logged in.");
//   window.location = "index.php";
// 
// }
$_SESSION['username'] = null;
$_SESSION['password'] = null;  
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
                    <a class="nav-link" href="Booking.php">Book a Trip</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Groups.php">Groups</a>
                  </li>
                  <div class="end" style="margin-left: 1300px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                  
                    <a class="nav-link" href="Signup.php">Signup</a>
                  </li>
                  <li class="nav-item"  style="margin-top : 8px;">
                  
                   <a class="nav-link-active" aria-current="page" href="Login.php">Login</a>
                  
                    
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

<?php

if(isset($_POST['submit_login'])) {

$server = 'localhost';
$username = 'root';
$password = '';
$con = mysqli_connect($server, $username, $password);
$user = $_POST['user_name'];
$pass = $_POST['pass_word'];

$sql = "SELECT `password` from `travel_booking`.`signup` where username = '$user';";
$result = $con->query($sql);
$flag = 0;
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        if($row["password"] == $pass && $row["username"] = $user) {

            $flag = 1;
        }
    }
}
else {
  ?>

<script>
            alert("No such account exists. Please Sign Up!");
            window.location = "Login.php";
        </script>

        <?php
}
if($flag == 1) {

    $_SESSION['username'] = $user;
    $_SESSION['password'] = $pass;  


   
    if(!isset($_SESSION['username'])) {
        setcookie('user_logged',''); 
    }
    setcookie('user_logged',$user);
    setcookie('login','true');
    if(isset($_COOKIE['user_logged'])) {
        // echo '<center><strong style="color: white;">Login Successful. Welcome Back '.$_COOKIE['user_logged'].'!</strong></center><br>';
?>
        <script>
            alert("Login Successful. Welcome User!");
            window.location = "index.php";
        </script> <?php
    }
    
}    
else {
?>
<script>
            alert("Invalid Credentials! Login not successful.");
            window.location = "Login.php";
        </script>
    <?php

    
}
}


?>
</body>
</html>