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
      $target_dir = "upload/";
      // $target_file = $target_dir . basename($_FILES["image_"]["name"]);
      // $uploadOk = 1;
      // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // // Check if image file is a actual image or fake image
      // if(isset($_POST["submit"])) {
      //     $check = getimagesize($_FILES["image_"]["tmp_name"]);
      //     if($check !== false) {
      //         echo "";
      //         $uploadOk = 1;
      //     } else {
      //         die( "<center>File is not an image.</center>");
      //         $uploadOk = 0;
      //     }
      // }

      // // Check if file already exists
      // if (file_exists($target_file)) {
      //     die( "<center>Sorry, file already exists.</center>");
      //     $uploadOk = 0;
      // }

      // // Check file size
      // // if ($_FILES["event-image"]["size"] > 500000) {
      // //     die ("<center>Sorry, your file is too large.</center>");
      // //     $uploadOk = 0;
      // // }

      // // Allow certain file formats
      // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      //     die ("<center>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</center>");
      //     $uploadOk = 0;
      // }

      // // Check if $uploadOk is set to 0 by an error
      // if ($uploadOk == 0) {
      //     die ("<center>Sorry, your file was not uploaded.</center>");

      //     // if everything is ok, try to upload file
      // } else {
           if (move_uploaded_file($_FILES["image_"]["tmp_name"], $target_file)) {
               echo "<center><i><h4>The file ". basename( $_FILES["image_"]["name"]). " has been uploaded.</h4></i></center>";
         } //else {
      //         die ("<center>Sorry, there was an error uploading your file.</font></center>");
      //     }
      // }
    
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
      // $location_name = $_POST['location_image'];
      $location_image = $target_dir . basename($_FILES['image_']['name']);
      // $location_entry = $_FILES["location_entry"]["tmp_name"];	
      // $mode_entry = $_FILES["mode_entry"]["tmp_name"];	
      $server = "localhost";
    
      $username = "root";
      
      $password = "";
      
      $con = mysqli_connect($server, $username, $password);
      
      $sql = "INSERT INTO `travel_booking`.`location_details` (`location_name`, `location_img_link`) VALUES ('$location_', '$location_image');";
      $con->query($sql);
      foreach($mode as $m) {
        if($price1!="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price1');";
        $con->query($sql);
        }
        if($price2!="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price2');";
        $con->query($sql);
        }
        if($price3!="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price3');";
        $con->query($sql);
        }
        if($price4!="") {
        $sql = "INSERT INTO `travel_booking`.`mode_of_transport_available` (`location_name`, `mode_of_transport`, `price`) VALUES ('$location_', '$m', '$price4');";
        $con->query($sql);
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
    header("Location: Admin.php");
    ?>
</body>
</html>