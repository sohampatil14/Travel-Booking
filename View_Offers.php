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
        <link rel="stylesheet" href="admin.css">
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
                      echo '<a class="nav-link" href="Admin.php">Admin</a>';
                    } else {
                       echo '<a class="nav-link" href="Account.php" style="color: white; text-decoration: none">Account</a>';
                    
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
            <a class="nav-link active" href="View_Offers.php">View Current Offers</a>
          </li>
        </ul>
      <br> 



      <?php


$server = "localhost";

$username = "root";

$password = "";
$dbname = "travel_booking";
$con = mysqli_connect($server, $username, $password,$dbname);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
$sql = "SELECT serial_no, location_name FROM `location_details`;";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    
    echo '<table class="table"><thead><tr><th scope="col">Location Serial Number</th><th scope="col">Location</th><th scope="col">Edit</th><th scope="col">Delete</th></tr></thead><tbody>';
    while($row = $result->fetch_assoc()) {
      // echo "Sr No: " . $row["Sno"]. " - Name: " . $row["name"]. " - Age: " . $row["age"]. " - Email ID: " . $row["email"].  " <br>";
      echo "<tr><th scope='row'>".$row['serial_no']."</th><td>".$row['location_name']."</td><td><form action='Edit_Details.php' method='GET'><input type='submit' name='edit' value='Edit' class='btn btn-warning'><input type='hidden' name='loc' value='".$row['location_name']."'><input type='hidden' name='num' value='".$row['serial_no']."'></form></td><td><form action='View_Offers.php' method='GET'><input type='submit' name='delete' value='Delete' class='btn btn-danger'><input type='hidden' name='no' value='".$row['serial_no']."'><input type='hidden' name='loc' value='".$row['location_name']."'></form></td></tr>";
    }
    echo '</tbody></table>';
  } else {
    echo "<p style='margin-left: 100px;'>No Location Available</p>";
  }
  
  if(isset($_GET['delete'])) {
    $no = $_GET['no'];
    $loc = $_GET['loc'];
    $sql = "DELETE FROM `location_details` WHERE `location_details`.`serial_no` = '$no';";
    $con->query($sql); 
    $sql = "DELETE FROM `mode_of_transport_available` WHERE `mode_of_transport_available`.`location_name` = '$loc';";
    $con->query($sql); 
    ?> <script>
    window.location.reload();
    window.location.reload();
    window.location.reload();
    window.stop();
    </script>
    <?php
  }
 
$con->close();
?>


    </body>
</html>