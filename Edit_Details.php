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
$loc = $_GET['loc'];
$_SESSION['ser_no'] = $_GET['num'];
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
              <a class="nav-link" href="Admin.php">Add New Offers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="View_Offers.php">View Current Offers</a>
            </li>
          </ul>
        <br>
            <form class="row g-3" style="padding-left: 50px; padding-right: 50px;" action="Edit_Location.php" method="POST">
                <div class="col-md-6">
                  <label for="location" class="form-label">Enter Location</label>
                  <input type="text" class="form-control" id="location" name="location_" value="<?php echo $loc; ?>">
                </div>
                <div class="col-md-6" style="width: 500px;">
                  
                <label style="margin-bottom: 8px;">Enter Location Url</label><br>

                  <?php
                                    
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "travel_booking";
                    $con = mysqli_connect($server, $username, $password,$dbname);
                    $sql = "SELECT `location_img_link` FROM `location_details` WHERE `location_name` = '$loc';";
                    $result = $con->query($sql);
                    $flight = $railway = $car = $cruise = 0;
                    $pr1 = $pr2 = $pr3 = $pr4 = 0;
                    $sr1 = $sr2 = $sr3 = $sr4 = 0;
                    while($row = mysqli_fetch_row($result)) {
                  ?>

                <input type="text" class="form-control" id="image_" name="image_" value="<?php echo $row[0];?>">
                      <?php }
                      
                      $sql = "SELECT serial_no, mode_of_transport, price FROM `mode_of_transport_available` WHERE location_name = '$loc';";
                      $res = $con->query($sql);
                      while($row = $res->fetch_assoc()) {

                            if($row['mode_of_transport'] == 'Flight') {
                                $flight = 1;
                                $pr1 = $row['price'];
                                $sr1 = $row['serial_no'];
                            }
                            if($row['mode_of_transport'] == 'Car') {
                                $car = 1;
                                $pr2 = $row['price'];
                                $sr2 = $row['serial_no'];
                            }
                            if($row['mode_of_transport'] == 'Cruise') {
                                $cruise = 1;
                                $pr3 = $row['price'];
                                $sr3 = $row['serial_no'];
                            }
                            if($row['mode_of_transport'] == 'Railway') {
                                $railway = 1;
                                $pr4 = $row['price'];
                                $sr4 = $row['serial_no'];
                            }
                        }
                      
                      ?> 
                </div>
                
                <div class="col-12">
                    Mode of transportation available
                  <div class="form-check">
                      <br>
                    <input class="form-check-input" type="checkbox" id="gridCheckflight" name="mode[]" value="Flight" <?php if($flight == 1) {echo 'checked';} ?>>
                    <label class="form-check-label" for="gridCheckflight">
                      Flight
                    </label>
                  </div>
                  <input type='hidden' name='sr1' value='<?php echo $sr1; ?>'>
                  <div class="col-md-6" style="width: 500px;">
                    <label for="flight" class="form-label">Enter price for flight</label>
                    <input type="number" class="form-control" id="flight" name="price1" value="<?php if($pr1!=0) { echo $pr1; } ?>">
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheckcar" name="mode[] " value="Car" <?php if($car == 1) {echo 'checked';} ?>>
                    <label class="form-check-label" for="gridCheckcar">
                      Car
                    </label>
                  </div>
                  <input type='hidden' name='sr2' value='<?php echo $sr2; ?>'>
                  <div class="col-md-6" style="width: 500px;">
                    <label for="car" class="form-label">Enter price for car</label>
                    <input type="number" class="form-control" id="car" name="price2" value="<?php if($pr2!=0) { echo $pr2; } ?>">
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheckcruise" name="mode[]" value="Cruise" <?php if($cruise == 1) {echo 'checked';} ?>>
                    <label class="form-check-label" for="gridCheckcruise">
                      Cruise
                    </label>
                  </div>
                  <input type='hidden' name='sr3' value='<?php echo $sr3; ?>'>
                  <div class="col-md-6" style="width: 500px;">
                    <label for="cruise" class="form-label">Enter price for cruise</label>
                    <input type="number" class="form-control" id="cruise" name="price3" value="<?php if($pr3!=0) { echo $pr3; } ?>">
                  </div>
                  <br>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheckrailway" name="mode[]" value="Railway" <?php if($railway == 1) {echo 'checked';} ?>>
                    <label class="form-check-label" for="gridCheckrailway">
                      Railway
                    </label>
                  </div>
                  <input type='hidden' name='sr4' value='<?php echo $sr4; ?>'>
                  <div class="col-md-6" style="width: 500px;">
                    <label for="railway" class="form-label">Enter price for railway</label>
                    <input type="number" class="form-control" id="railway" name="price4" value="<?php if($pr4!=0) { echo $pr4; } ?>">
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

    

    </body>
</html>