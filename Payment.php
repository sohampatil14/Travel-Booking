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
?>
<html>
<head>
<title> </title>
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="pay.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
        <style>
body{
    background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,221,214,1) 0%, rgba(51,102,255,1) 90% );
    }
h4, h3 {
    font-size: medium;
    margin-top: 21.280px;
    margin-bottom: 21.280px;
}
.pay{
    background-color: #08d; 
    border-radius: 12px; 
    text-align: center;
    height: 50px;
    width: 450px;
    margin-left: 26px;
    margin-right: 20px;
    border: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI';
    font-size: 18px;
    color: #eee;
}

.info {
  margin-top: 40px;
  margin-left: 245px;
  margin-right: -100px;
  padding-top: 50px;
  padding-bottom: 50px;
  border-radius: 20px;
  color: #dc2f55;
  background-color: #15172b;
  width: 500px;
}

h4 {
  font-size: medium;
}

.cost-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 2fr;
    gap: 0px 0px;
    grid-auto-flow: row;
    grid-template-areas:
      ". ."
      ". .";
      margin-top: 40px;
    margin-left: 60px;
    margin-right: 40px;
    color: white;
}

.static {
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 1;
  grid-row-end: 2;
}
.dynamic {
  grid-column-start: 2;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-end: 2;
  margin-left: 80px;
}
.price {
  grid-column-start: 1;
  grid-column-end: 2;
  grid-row-start: 2;
  grid-row-end: 3;
}

.dyn {
  grid-column-start: 2;
  grid-column-end: 3;
  grid-row-start: 2;
  grid-row-end: 3;
  margin-left: 80px;
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
                    <a class="nav-link" href="Account.php">Account</a>
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

     <img src="travels.png" style="margin-right: 200px;">
<div class="info">
	<h2 style="text-align: center;">Total Cost Details</h2>
    <div class="cost-details">
        <div class="static">
            <h4>Travelling cost of adults : </h4>
            <h4>Travelling cost of children : </h4>
            
        </div>

    <?php
    $service_price = 0;
    $id = $_SESSION['new_booking_id'];
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travel_booking";

    $con = mysqli_connect($server, $username, $password,$dbname);
    $sql = "SELECT destination, mode_of_transport, no_adults, no_children FROM `booking_details` WHERE booking_serial_no = '$id';";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
      $destination = $row['destination'];
      $mode = $row['mode_of_transport'];
      $adult = $row['no_adults'];
      $child = $row['no_children'];
    }
    $sql = "SELECT price FROM `mode_of_transport_available` WHERE location_name = '$destination' AND mode_of_transport = '$mode';";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
      $price = $row['price'];
    }
    
?>
 
 <div class="dynamic">
            <h4><?php $tp = $adult*$price; echo $tp;?></h4>
            <h4><?php echo $child*$price;  $tp = $child*$price + $tp;?></h4>
            </div>
            <div class="price">
              
    <?php
    
    

    $sql = "SELECT services_choosen FROM `services_choosen` WHERE booking_serial_no = '$id';";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
      $service = $row['services_choosen'];
      $sql = "SELECT service_name FROM `services` WHERE `service_name` = '$service';";
      $res = $con->query($sql);
      while($row1 = $res->fetch_assoc()) {
        
        echo "<h4> Service Cost - ".$row1['service_name']." : </h4>";
      }
    }
    
    ?>


</div>
   
      <div class="dyn">
        <?php
        
        
        $sql = "SELECT services_choosen FROM `services_choosen` WHERE booking_serial_no = '$id';";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
      $service = $row['services_choosen'];
      $sql = "SELECT price FROM `services` WHERE `service_name` = '$service';";
      $res = $con->query($sql);
      while($row1 = $res->fetch_assoc()) {
        $service_price = $row1['price'] + $service_price;
        echo "<h4>".$row1['price']."</h4>";
      }
    }
$_SESSION['booking_status'] = true;
        ?>
      </div>      
    
    </div>
        <h3 style="text-align: center; color: #eee;">Total cost : <?php echo $tp+$service_price; ?></h3>
    
    <a href="Account.php"><button class="pay"><b>Conform Payment</b></button></a>
    </div>
    
  
</body>
</html>

