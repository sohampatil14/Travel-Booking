<?php
session_start();
?>
<html>
<head>
<title> </title>
    
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
body{
    background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,221,214,1) 0%, rgba(51,102,255,1) 90% );
    }
input[type=checkbox]{
    background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 20%;
  cursor: pointer;
  height: 14px;
  width: 14px;
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
                    <a class="nav-link" href="Booking.php" style="width: 95;">Book a Trip</a>
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
                  <?php
                    if(isset($_SESSION['username'])) { ?>
                      <a class="nav-link" href="logout.php">Logout</a>
                    <?php } else {
                      ?>
                      <a class="nav-link" href="Login.php">Login</a>
                    <?php }
                    ?>
                  </li>
                </ul>
                </div>
                </ul>
              </div>
            </div>
          </nav>
     </div>

    <img src="travels.png" style="margin-right: 360px;">
    <div class="form3">
<form action="Service.php" method="POST">
	<h3 style="text-align: center; color: white;">Services Details</h2>
	<h4 style="text-align: center; color: white; font-size: medium; padding-bottom: 18px;">Check from the following services : </h3>
    <div class="checkBox" style="margin-left: 80px;">
        <input type="checkbox" id="service1" name="Service[]" value="Food">
        <label for="service1" style="padding-left: 10px; color: white;"> Food </label><br>
        <input type="checkbox" id="service2" name="Service[]" value="Child Care">
        <label for="service2" style="padding-left: 10px; color: white;"> Child Care </label><br>
        <input type="checkbox" id="service3" name="Service[]" value="Tour Guide">
        <label for="service3" style="padding-left: 10px; color: white;"> Tour Guide </label><br>
        <input type="checkbox" id="service4" name="Service[]" value="Package Delivery">
        <label for="service4" style="padding-left: 10px; color: white;"> Package Delivery </label><br>
        <input type="checkbox" id="service5" name="Service[]" value="Pick Up">
        <label for="service5" style="padding-left: 10px; color: white;"> Pick up </label>
    </div>
	<input type="submit" name="submit" class="submit" style="margin-top: 15px;">
</form>
    </div>

   <?php
      if(isset($_POST['submit'])) {

        // $service = array();
        $service = $_POST['Service'];
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $con = mysqli_connect($server, $username, $password);
        
        $idd = $_SESSION['new_booking_id'];
        $user = $_SESSION['username'];
        foreach($service as $s) {
          
          $con->query("INSERT INTO `travel_booking`.`services_choosen` (`username`,`services_choosen`,`booking_serial_no`) VALUES ('$user','$s','$idd');");
        }
        $con->close();
        ?>  <script>
        alert("Services Choosen. Conform Payment!");
        window.location = "Payment.php";
    </script><?php
      }
   ?>
 
</body>
</html>

