<?php
session_start();
?>
<html>
<head>
<title> </title>
    <link rel="stylesheet" href="form.css">
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
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
                  <li class="nav-item" style="margin-top : 8px;">
                    <a class="nav-link-active" aria-current="page" href="Signup.php" style="color: white; text-decoration: none;">Signup</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login</a>
                  </li>
                </ul>
                </div>
                </ul>
              </div>
            </div>
          </nav>
     </div>
     <!-- onsubmit="return validateForm()" -->
    <img src="travels.png" style="margin-right: 360px;">
    <div class="form" style="margin-top: 75px; height: 830px;">
<form action="Signup.php" method="post" name="form" onsubmit="return validateForm()">
	<h2 style="text-align: center;">Sign Up</h2>
	   
        <div class="input-container ic1">
	       <input type="text" name="full_name" id="full_name" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="name" class="placeholder">Name</label>
        </div>
		
        <div class="input-container ic2">
	       <input type="text" name="e-mail" id="e-mail" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="email" class="placeholder">E-mail ID</label>
        </div>
    
        <div class="input-container ic2">
            <input type="text" name="user_name" id="user_name" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="username" class="placeholder">Username</label>
        </div>

        <div class="input-container ic2">
            <input type="password" name="password" id="password" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="password" class="placeholder">Password</label>
        </div>

        <div class="input-container ic2">
            <input type="password" name="passwordre" id="passwordre" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="passwordre" class="placeholder">Conform Password</label>
        </div>
    
        <div class="input-container ic2">
            <input type="number" name="phone" id="phone" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="phone" class="placeholder">Phone No.</label>
        </div>
    
        <div class="input-container ic2">
            <input type="text" name="address" id="address" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="address" class="placeholder">Address</label>
        </div>
    
	<input type="submit" class="submit" name="submit">
</form>
    <p style="text-align: center;">If you already have a account, click to <a href="Login.php">Login</a></p>
    <div id="err" style="text-decoration-color: red; text-align: center;">

    </div>
    </div>

        <!-- <script type="text/javascript" src='script.js'></script> -->
<?php
if(isset($_POST['submit'])){


        if(empty($_POST['full_name']) || empty($_POST['e-mail']) || empty($_POST['user_name']) || empty($_POST['password']) || empty($_POST['phone']) || empty($_POST['address'])) {

          ?><script>
          var message = document.createElement('div');
                    
          // Then add the content (a new input box) of the element.
        message.innerHTML = "<p> <strong>Please fill all fields! </strong></p>";
          // Finally put it where it is supposed to appear.
        document.getElementById("err").appendChild(message);
        </script><?php
          // echo 'Please fill all fields!';
        }

     else{
      error_reporting(0);

      $server = "localhost";

      $username = "root";
      
      $password = "";
      
      $con = mysqli_connect($server, $username, $password);
      //echo $con;
      if(!$con){
          die("connection to this database failed due to" . mysqli_connect_error());
      }
      
      
      $name = $_POST['full_name'];
      $email = $_POST['e-mail'];
      $username = $_POST['user_name'];
      $password = $_POST['password'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $flag = true;
      $sq = "SELECT username FROM `travel_booking`.`signup`;";
      $res = $con->query($sq);
      
      while($row = $res->fetch_assoc()) {
       
        if($username == "abc") {
          ?>
        <script>
            alert("Username already exists!");
            window.location = "Signup.php";
        </script>
         <?php
         $flag = false;
        }
      }


     if($flag) {
      $sql = "INSERT INTO `travel_booking`.`signup` (`name`, `email`, `username`, `password`, `phone`, `address`) VALUES ('$name', '$email', '$username', '$password', '$phone', '$address');";
      $con->query($sql);
      $con->close();
     } 
      

      ?>
      
      <script>
      var message = document.createElement('div');
                
      // Then add the content (a new input box) of the element.
    message.innerHTML = "<p> <strong>Sign Up Successful </strong></p>";
      // Finally put it where it is supposed to appear.
    document.getElementById("err").appendChild(message);
    </script>
    
    <?php
      $_SESSION['flag'] = 'authorized';
      // header('Location : index.html');
     
    }
      }
        ?>


</body>
</html>


