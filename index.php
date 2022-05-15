<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>


    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    />
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
    </div>
    <div
      id="carouselExampleIndicators"
      class="carousel slide"
      data-ride="carousel"
    >
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
        
        <?php
        
        $server = "localhost";
        $username = "root";
        $password = "";
        $con = mysqli_connect($server, $username, $password);
        
        $sql = "SELECT location_name, location_img_link from `travel_booking`.`location_details`;";
        $result = $con->query($sql);
            for($i = 0; $i < 1; $i++) {
        while($row = mysqli_fetch_row($result)) {


        if(isset($_SESSION['username'])) { ?>
                  <a class="nav-link" href="Booking.php?book=<?php echo $row[0]; ?>" style="padding: 0px;">
                  <?php
          $sq = "SELECT location_name, min(price) FROM `travel_booking`.`mode_of_transport_available` WHERE location_name = '$row[0]';";
          $res = $con->query($sq);
          while($roww = mysqli_fetch_row($res)) {
          ?>
          <div style="background-color: black; padding-top: 20px;">
    <h5 style="color: white; text-align: center;">Trip to <?php echo $roww[0]; ?></h5>
    <p style="color: white; text-align: center;">Starting from <?php echo $roww[1]; ?></p>
    <img
              class="d-block w-100"
              src="<?php echo $row[1]; ?>"
              alt="<?php echo $row[0]; ?>"
              />
</a>
</div>
                  <?php }} 
                  else { ?>
                   <a class="nav-link" href="Login.php" style="padding: 0px;">
            
          <?php
          $sq = "SELECT location_name, min(price) FROM `travel_booking`.`mode_of_transport_available` WHERE location_name = '$row[0]';";
          $res = $con->query($sq);
          while($roww = mysqli_fetch_row($res)) {
          ?>
      <div style="background-color: black; padding-top: 20px;">
    <h5 style="color: white; text-align: center;">Trip to <?php echo $roww[0]; ?></h5>
    <p style="color: white; text-align: center;">Starting from <?php echo $roww[1]; ?></p>
          
    <img
              class="d-block w-100"
              src="<?php echo $row[1]; ?>"
              alt="<?php echo $row[0]; ?>"
          />
          </a></div><?php
                  }} }}
                  ?>
        </div>



      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </body>
</html>


