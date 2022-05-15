<?php

session_start();

if(!isset($_SESSION['username'])) {
  ?>
  <script>
alert('Not Logined in yet!');
window.location = "Login.php";
</script>
  <?php
}

$ad = 'admin';
        if($_SESSION['username'] == $ad) {
          ?> <script>
          alert("Admin doesn't Books a trip.");
          window.location = "Admin.php";
        </script><?php }
if(isset($_GET['book'])) {
$booking_loc = $_GET['book'];
}
?>
<html>
<head>
<title> </title>
    
    <link rel="stylesheet" href="form.css">
    <style>
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
                  <li class="nav-item" style="margin-top: 8px;  width: 80px;">
                    <a class="nav-link-active" aria-current="page" href="Booking.php" style="color: white; text-decoration: none;">Book a Trip</a>
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
                    if(isset($_SESSION['username'])) {
                      echo '<a class="nav-link" href="logout.php">Logout</a>';
                    } else {

                      echo '<a class="nav-link" href="Login.php">Login</a>';
                    }
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
    <div class="form1">
<form action="Booking.php" method="POST">
	<h2>Booking Details</h2>
	
    <div class="input-container ic1">
        <input type="date" name="from"  class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="from" class="placeholder">From Date</label>
        </div>
    
    <div class="input-container ic2">
        <input type="date" name="to" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="to" class="placeholder">to Date</label>
        </div>
    
    <div class="input-container ic2">    
        <input type="number" name="adult" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="adult" class="placeholder">No. of Adults</label>
        </div>
    
    <div class="input-container ic2">    
        <input type="number" name="child" class="input" placeholder=" ">
                <div class="cut"></div>
                <label for="child" class="placeholder">No. of Children</label>
        </div>
        <div class="input-container ic2"> 
    <select name="destination" id="destination" class="input-var">
    
    <?php
     $server = "localhost";
     $username = "root";
     $password = "";
     $dbname = "travel_booking";
     $con = mysqli_connect($server, $username, $password,$dbname);
     if(!$con){
         die("connection to this database failed due to" . mysqli_connect_error());
     }
     $sql = "SELECT location_name FROM `location_details`;";
     $result = $con->query($sql);

     if(isset($_GET['book'])) {

?>
     <option value="<?php echo $booking_loc; ?>"><?php echo $booking_loc; ?></option>
	  <?php } else { ?>
      <option>Select a Destination</option>
<?php
     if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $loc = $row['location_name'];
    ?>
        
	   <option value="<?php echo $loc; ?>"><?php echo $loc; ?></option>
	  <?php }}} ?>
	 </select>
    </div>
    
    <div class="input-container ic2"> 
    <select name="mode" id="mode" class="input-var">
	   <option value="flight">Flight</option>
	   <option value="car">Car</option>
	   <option value="cruise">Cruise</option>
	   <option value="railway">Railway</option>
	 </select>
    </div>
    <input type="submit" class="submit" name="submit">
</form>
    </div>
    
    <?php
    if($booking_loc = "") {
      echo 'good';
    }
    if(isset($_POST['submit'])){

        if(isset($_SESSION['username'])) {
            $server = "localhost";
    
            $username = "root";
            
            $password = "";
            
            $con = mysqli_connect($server, $username, $password);
            //echo $con;
            if(!$con){
                die("connection to this database failed due to" . mysqli_connect_error());
            }
            
            
            $from = $_POST['from'];
            $to = $_POST['to'];
            $adult = $_POST['adult'];
            $child = $_POST['child'];
            $destination = $_POST['destination'];
            $mode = $_POST['mode'];
            $user_ = $_SESSION['username'];

            $to_ = strtotime($to);
            $from_ = strtotime($from);
            $today = strtotime(date("d-m-Y"));
            if(($from_ - $today)/60/60/24 < 0) {
              ?> <script>
              alert("Cannot Select Todays Date or before dates.");
                    window.location = "Booking.php";
          </script>
          <?php
            }
            if(($to_ - $from_)/60/60/24 < 0) {
              ?>
                 <script>
            alert("To Date cannot be greater than after From Date");
            window.location = "Booking.php";
            </script>
            <?php
       
            }

            $sql = "INSERT INTO `travel_booking`.`booking_details` (`username`,`from_`, `to_`, `no_adults`, `no_children`, `destination`, `mode_of_transport`) VALUES ('$user_','$from', '$to', '$adult', '$child', '$destination', '$mode');";
            
            $con->query($sql);
            $sql = "select last_insert_id();";
          $result = $con->query($sql);
            
            while($row = mysqli_fetch_row($result)) {
              $id = $row[0];
            }
            $_SESSION['new_booking_id'] = $id;
            $_SESSION['booking_status'] = false;
            ?>
        <script>
            alert("Select Services!");
            window.location = "Service.php";
        </script> 
        <?php
          }
          
          }
            ?>
 
</body>
</html>