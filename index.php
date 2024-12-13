<?php
$insert = false;
if(isset($_POST['name'])){
     // set connection variables
$server="localhost";
$username="root";
$password="";

// create a db connection 
$con=mysqli_connect($server,$username,$password);

// check for connection success
if(!$con){
die("connection to this database failed due to".mysqli_connect_error());
}

// collect post variables
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

// execute the query
if($con-> query($sql)==true){
     // echo " Successfully inserted";

     // flag for successful insertion
     $insert = true;
}
else{
     echo " ERROR: $sql <br> $con->error";
     
}

// close the db connection
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Welcome to Travel From</title>
     <link rel="stylesheet" href="index.css">
</head>
<body>
     <img class="bg"  src="download.jpg" alt="DBUU image">
     <div class="container">
          <h2>Welcome to Dev Bhoomi Uttarakhand University (DBUU) Trip form</h2>
          <p> Enter your details and submit this form to confirm your participation in the trip. </p>
          <?php
          if($insert == true)
          echo "<p class='submitmsg'> Thanks for submitting your form. We are happy to see you joining with for the DBUU Trip. </p>"
          
          ?>
          <form action="index.php" method="post">
               <input type="text" name="name" id="name" placeholder="Enter your Name">
               <input type="text" name="age" id="age" placeholder="Enter your Age">
               <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
               <input type="email" name="email" id="email" placeholder="Enter your E-mail">
               <input type="phone" name="phone" id="phone" placeholder="Enter your Contact No.">
               <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
               <button class="btn">Submit</button>
               
          </form>
     </div>
     <script src="index.js"></script>
     
</body>
</html>
