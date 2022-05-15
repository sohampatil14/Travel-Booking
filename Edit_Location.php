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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    
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
  $sr1 = $_POST['sr1'];
  $sr2 = $_POST['sr2'];
  $sr3 = $_POST['sr3'];
  $sr4 = $_POST['sr4'];
  $pr1 = $pr2 = $pr3 = $pr4 = 0;
  $con = mysqli_connect($server, $username, $password);
  $num = $_SESSION['ser_no'];
  $sql = "UPDATE `travel_booking`.`location_details` SET `location_name` = '$location_', `location_img_link` = '$location_image' WHERE `serial_no` = '$num';";
  $con->query($sql);
  foreach($mode as $m) {

    if($pr1 != 1 && $price1 !="") {
        if($sr1 == 0) {
            $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price1');";
        } else {
            $sql = "UPDATE `travel_booking`.`mode_of_transport_available` SET `location_name` = '$location_', `mode_of_transport` = '$m', `price` = '$price1' WHERE `serial_no` = '$sr1';";
        }
    $con->query($sql);
    $pr1 = 1;
    continue;
    }
    if($pr2 != 1 && $price2 !="") {
        if($sr2 == 0) {
            $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price2');";
        } else {
        $sql = "UPDATE `travel_booking`.`mode_of_transport_available` SET `location_name` = '$location_', `mode_of_transport` = '$m', `price` = '$price2' WHERE `serial_no` = '$sr2';";
        }
    $con->query($sql);
    $pr2 = 1;
    continue;
    }
    if($pr3 != 1 && $price3 !="") {
        if($sr3 == 0) {
            $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price3');";
        } else {
        $sql = "UPDATE `travel_booking`.`mode_of_transport_available` SET `location_name` = '$location_', `mode_of_transport` = '$m', `price` = '$price3' WHERE `serial_no` = '$sr3';";
        }
    $con->query($sql);
    $pr3 = 1;
    continue;
    }
    if($pr4 != 1 && $price4 !="") {
        if($sr4 == 0) {
            $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price4');";
        } else {
        $sql = "UPDATE `travel_booking`.`mode_of_transport_available` SET `location_name` = '$location_', `mode_of_transport` = '$m', `price` = '$price4' WHERE `serial_no` = '$sr4';";
        }
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
  ?> <script>
      alert("Location Details Updated!");
            window.location = "View_Offers.php";
  </script>
  <?php
//   header('Location : Edit_Details.php');
}

?>

</body>
</html>