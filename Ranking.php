<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body><div>
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
                    <a class="nav-link" href="Ranking.php"style="color: white; text-decoration: none;">Rankings</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Booking.php" style="text-decoration: none;">Book a Trip</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Groups.php">Groups</a>
                  </li>
                  <div class="end" style="margin-left: 1300px;">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="Signup.php">Signup</a>
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
    
    echo '<table class="table"><thead><tr><th scope="col">Rank</th><th scope="col">Location</th></tr></thead><tbody>';
    while($row = $result->fetch_assoc()) {
      // echo "Sr No: " . $row["Sno"]. " - Name: " . $row["name"]. " - Age: " . $row["age"]. " - Email ID: " . $row["email"].  " <br>";
      echo '<tr><th scope="row">'.$row["serial_no"].'</th><td><a href="Booking.php?book='.$row["location_name"].'" style="padding: 0px;">'.$row["location_name"].'</a></td></tr>';
    }
    echo '</tbody></table>';
  } else {
    echo "No Location Available";
  }
$con->close();
?>
</body>
</html>


