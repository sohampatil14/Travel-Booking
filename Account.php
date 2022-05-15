<?php
session_start();
if(!isset($_SESSION['username'])) {
  ?> <script>
                      alert("Login Required.");
                      window.location = "Login.php";
                    </script><?php
}
        $ad = 'admin';
        if($_SESSION['username'] == $ad) {
          ?> <script>
          alert("Admin doesn't have an account.");
          window.location = "Admin.php";
        </script><?php }
                    
if($_SESSION['booking_status']==false) {
  ?> <script>
  alert("Please Complete Booking.");
  window.location = "Booking.php";
</script><?php
}
?>
<html>
<head>
<title> </title>
    <!-- <link rel="stylesheet" href="profile.css"> -->
    <link rel="stylesheet" href="pay.css">
        <style>
body {
  background-image: url('ACCOUNT.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
}

img {
  height: 150px;
  width: 150px;
  border: 1px solid white;
}

.outer-section {
  padding-top: 50px;
  padding-left: 50px;
  padding-right: 50px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 0.8fr 0.2fr 2fr;
  gap: 0px 0px;
  grid-auto-flow: row;
  grid-template-areas:
    ". . . ."
    ". . . ."
    ". . . .";
}

.acc-image {
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 1;
  grid-row-end: 2;
  height: 100%;
  width: 100%;
  padding-bottom: 10px;
}

.personal-details {
  padding-left: 25px;
  grid-column-start: 2;
  grid-column-end: 5;
  grid-row-start: 1;
  grid-row-end: 2;
  justify-self: left;
  align-self: center;
  color: white;
  height: 100%;
  width: 100%;
  padding-bottom: 20px;
}


.heading-cur {
  margin-top: 20px;
  grid-column-start: 1;
  grid-column-end: 5;
  grid-row-start: 2;
  grid-row-end: 3;
  justify-self: center;
  align-self: center;
  height: 100%;
  width: 100%;
  text-align: center;
  border-top: 1px solid rgb(255, 255, 255);
  color: white;
  padding-top: 20px;
}

.details-current {
  padding-top: 10px;
  grid-column-start: 1;
  grid-column-end: 5;
  grid-row-start: 3;
  grid-row-end: 4;
  justify-self: center;
  align-self: center;
  border-top: 1px solid rgb(255, 255, 255);
  color: white;
  height: 100%;
  width: 100%;
  text-align: center;
}

    </style>  
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Ranking.php">Rankings</a>
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
                  <?php
                  if(isset($_SESSION['username'])) {
                      echo '<a class="nav-link" href="Account.php" style="color:white;">Account</a>';
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
    
<?php
$server = "localhost";

$username = "root";

$password = "";
$dbname = "travel_booking";
$user = $_SESSION['username'];
$con = mysqli_connect($server, $username, $password,$dbname);
$sql = "SELECT username, email, username, phone, address FROM `signup` where username='$user';";
$result = $con->query($sql);
?>
      <div class="outer-section">
        <div class="acc-image">
            <img src="profile.png" alt="#" style="border-radius: 50%;">
        </div>
        <div class="personal-details">
            Name : <?php while($row = mysqli_fetch_row($result)) {
                echo $row[0];
            ?>
            <br><br>
            Email : <?php echo $row[1]; ?>
            <br><br>
            Username : <?php echo $row[2]; ?>
            <br><br>
            Phone no. : <?php echo $row[3]; ?>
            <br><br>
            Address : <?php echo $row[4]; } ?>
        </div>
        <!-- <div class="booking-details"> -->
          <div class="heading-cur">
            Booking History
          </div>
          <div class="details-current" id="for-Date">
            
          <?php


$server = "localhost";

$username = "root";

$password = "";
$dbname = "travel_booking";
$con = mysqli_connect($server, $username, $password,$dbname);

if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
$user = $_SESSION['username'];
$sql = "SELECT destination, from_, to_, no_adults, no_children, mode_of_transport, time_date, booking_serial_no	FROM `booking_details` where username = '$user';";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    
    echo '<table class="table"><thead><tr><th scope="col">Desination</th><th scope="col">From</th><th scope="col">To</th><th scope="col">No. of Adults</th><th scope="col">No. of Children</th><th scope="col">Mode of Transport</th><th scope="col">Time of Booking</th><th scope="col">Booking Cancellation</th></tr></thead><tbody>';
    while($row = $result->fetch_assoc()) {
      // echo "Sr No: " . $row["Sno"]. " - Name: " . $row["name"]. " - Age: " . $row["age"]. " - Email ID: " . $row["email"].  " <br>";
      echo "<tr><td scope='row'>".$row['destination']."</td><td>".$row['from_']."</td><td>".$row['to_']."</td><td>".$row['no_adults']."</td><td>".$row['no_children']."</td><td>".$row['mode_of_transport']."</td><td>".$row['time_date']."</td><td><form action='Account.php' method='GET'><input type='submit' name='submit' value='Cancel' class='btn btn-danger'><input type='hidden' name='no' value='".$row['booking_serial_no']."'></form></td></tr>";
    }
    echo '</tbody></table>';
  } else {
    echo 'No Booking Yet! <a href="Booking.php" style="color: white;">Book a Trip</a>';
  }

  if(isset($_GET['submit'])) {
    $no = $_GET['no'];
    $sql = "DELETE FROM `booking_details` WHERE `booking_details`.`booking_serial_no` = '$no';";
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
            
          

          </div>
          <!-- <div class="heading-his">
            Booking History
          </div>
          <div class="details-history">
            Booking Details
          </div> -->
        <!-- </div> -->
      </div>
</body>
</html>