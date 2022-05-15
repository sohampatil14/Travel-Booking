<?php
session_start();
$ad = 'admin';
if(isset($_SESSION['username'])) {
  if($_SESSION['username'] != $ad) {
    ?> <script>
    alert("You are not an Admin.");
    window.location = "index.php";
  </script><?php
} }
else {
  ?> 
    <script>
        alert('Not Logined in yet!');
        window.location = "Login.php";
    </script>
  <?php
}

?>
<html>
    <head>
        <title> </title> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
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
              <li class="nav-item" style="margin-top: 8px">
                <a
                  class="nav-link-active"
                  aria-current="page"
                  href="index.html"
                  style="color: white; text-decoration: none"
                  href="index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Ranking.php">Rankings</a>
              </li>
              <li class="nav-item">
              <?php if(isset($_SESSION['username'])) { ?>
                  <a class="nav-link" href="Booking.php" style="width: 100px;">Book a Trip</a>
                  <?php } 
                  else { ?>
                   <a class="nav-link" href="Login.php" style="width: 100px;">Book a Trip</a>
                  <?php
                  }
                  ?>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Groups.php">Groups</a>
              </li>
              <div class="end" style="margin-left: 1300px">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                  <?php
                  if(isset($_SESSION['username'])) {
                    $ad = 'admin';
                    if($_SESSION['username'] == $ad) {
                      echo '<a class="nav-link" href="Admin.php" style="color: white; text-decoration: none">Admin</a>';
                    } else {
                       echo '<a class="nav-link" href="Account.php">Account</a>';
                    
                    } }
                    else {

                      echo '<a class="nav-link" href="Signup.php">Signup</a>';
                    }
                    ?>
                  </li>
                  <li class="nav-item">
                  <?php if(isset($_SESSION['username'])) { ?>
                  <a class="nav-link" href="logout.php">Logout</a>
                  <?php } 
                  else { ?>
                   <a class="nav-link" href="Login.php">Login</a>
                  <?php
                  }
                  ?>
                  </li>
                </ul>
              </div>
            </ul>
          </div>
        </div>
      </nav>
        <ul class="nav nav-tabs" style="padding-left: 50px; padding-right: 50px;">
            <li class="nav-item">
              <a class="nav-link active" href="Admin.php">Add New Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="View_Offers.php">View Current Offers</a>
            </li>
          </ul>
        <br>
            <form class="row g-3" style="padding-left: 50px; padding-right: 50px;" action="Admin.php" method="POST">
                <div class="col-md-6">
                  <label for="location" class="form-label">Enter Location</label>
                  <input type="text" class="form-control" id="location" name="location_">
                </div>
                <div class="col-md-6" style="width: 500px;">
                  
                <label style="margin-bottom: 8px;">Enter Location Url</label><br>
                <input type="text" class="form-control" id="image_" name="image_">
                       
                </div>
                
                <div class="col-12">
                    Mode of transportation available
                  <div class="form-check">
                      <br>
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="mode[]" value="Flight">
                    <label class="form-check-label" for="gridCheck">
                      Flight
                    </label>
                  </div>
                  
                  <div class="col-md-6" style="width: 500px;">
                    <label for="flight" class="form-label">Enter price for flight</label>
                    <input type="number" class="form-control" id="flight" name="price1">
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="mode[] " value="Car">
                    <label class="form-check-label" for="gridCheck">
                      Car
                    </label>
                  </div>
                  
                  <div class="col-md-6" style="width: 500px;">
                    <label for="car" class="form-label">Enter price for car</label>
                    <input type="number" class="form-control" id="car" name="price2">
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="mode[]" value="Cruise">
                    <label class="form-check-label" for="gridCheck">
                      Cruise
                    </label>
                  </div>
                  
                  <div class="col-md-6" style="width: 500px;">
                    <label for="cruise" class="form-label">Enter price for cruise</label>
                    <input type="number" class="form-control" id="cruise" name="price3">
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="mode[]" value="Railway">
                    <label class="form-check-label" for="gridCheck">
                      Railway
                    </label>
                  </div>
                  
                  <div class="col-md-6" style="width: 500px;">
                    <label for="railway" class="form-label">Enter price for railway</label>
                    <input type="number" class="form-control" id="railway" name="price4">
                  </div>
                </div>
                <br>
                <div class="col-12">
                       <div class="form-group">
                       <label>Upload CSV File for Location Data Entry</label><br><br>
                          <input type="file" name="location_entry" class="form-control" accept=".csv" style="width: 500px;">
                          <br><br>
                          <label>Upload CSV File for Mode of Transport Data Entry</label><br><br>
                          <input type="file" name="mode_entry" class="form-control" accept=".csv" style="width: 500px;">
                      </div>
                       <br>
                  <input name="submit" type="submit" class="btn btn-primary">
                  
                </div>
              </form>

    <?php
      $target_dir = "upload/";

    
    if(isset($_POST['submit'])) {

      $location_ = $_POST['location_'];
      // $llink = $_POST['location_image'];
      // $days = $_POST['day_'];
      // $nights = $_POST['night'];
      $price1 = $_POST['price1'];
      $price2 = $_POST['price2'];
      $price3 = $_POST['price3'];
      $price4 = $_POST['price4'];
      $mode = $_POST['mode'];
      $location_image = $_POST['image_'];
      // $location_name = $_POST['location_image'];
      // $location_image = $target_dir . basename($_FILES['image_']['name']);
      // $location_entry = $_FILES["location_entry"]["tmp_name"];	
      // $mode_entry = $_FILES["mode_entry"]["tmp_name"];	
      $server = "localhost";
    
      $username = "root";
      
      $password = "";
      
      $con = mysqli_connect($server, $username, $password);
      
      $sql = "INSERT INTO `travel_booking`.`location_details` (`location_name`, `location_img_link`) VALUES ('$location_', '$location_image');";
      $con->query($sql);
      $pr1 = $pr2 = $pr3 = $pr4 = 0;
      foreach($mode as $m) {

        if($pr1 != 1 && $price1 !="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price1');";
        $con->query($sql);
        $pr1 = 1;
        continue;
        }
        if($pr2 != 1 && $price2 !="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price2');";
        $con->query($sql);
        $pr2 = 1;
        continue;
        }
        if($pr3 != 1 && $price3 !="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price3');";
        $con->query($sql);
        $pr3 = 1;
        continue;
        }
        if($pr4 != 1 && $price4 !="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price4');";
        $con->query($sql);
        $pr4 = 1;
        continue;
        }
      }
      
      // foreach($price as $p) {
      //   $pr = $p;
      //   $sql = "UPDATE `travel_booking`.`mode_of_transport_available` SET `price` = '$pr' WHERE `mode_of_transport_available`.`location_name` = '$location_';";
      //   $con->query($sql);
      // }
      // foreach($mode as $index => $value) {
      //   $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$mode[$index]', '$price[$index]');";      
      //  }
      //  $con->query($sql);
      

      $con->close();
    }
    
    ?>


    </body>
</html>