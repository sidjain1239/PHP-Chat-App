<?php
session_start();
if (isset($_COOKIE['username'])) {
    $username=$_COOKIE['username'];
    $conn=mysqli_connect('localhost','root','','chat');

    if (isset($_POST['submit'])) {
        $newn=$_POST['name'];
        $query="UPDATE `accounts` SET `name` = '$newn' WHERE `accounts`.`username` = '$username';";
        $run=mysqli_query($conn,$query);
        header("location:profile.php");
    }}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Your Name</title>
    <link rel="stylesheet" href="css/new_conv.css">

</head>
<body text="white">
<form  method="post" enctype="multipart/form-data">
<center>

<img src="images/icon.png" width="220px">
</center>
<a href="welcome.php">
            <img src="images/home.png" width="30px" class='img2'>
        </a>
    <h2>
    <center>

        Change Your Name
        <br>
        <br>
        <br>
       
        Change Name To:<input type="text" class="txt" name="name" placeholder="name">
        <br>
        <br>

        <input type="submit" name="submit" class="btn">
            <br>
            <br>
        
        

        
    
    </h2>
    </center>

</body>
</html>