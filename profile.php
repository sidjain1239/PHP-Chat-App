<?php
session_start();
$conn=mysqli_connect('localhost','root','','chat');

    $username=$_SESSION['username'];
    $query="SELECT * FROM accounts WHERE username='$username'";
    $run=mysqli_query($conn,$query);
    $num= mysqli_num_rows($run);
    $row = mysqli_fetch_assoc($run);
    $name=$row['name'];
    $date=$row['date'];

    if (isset($_POST['submit'])) {
        header("location:changename.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/myp.css">

</head>
<body text="white">
<form  method="post" enctype="multipart/form-data">
<center>

<img src="images/icon.png" width="220px">
</center>
<a href="welcome.php">
            <img src="images/home.png" width="30px" class='img2'>
        </a><br>
    <img src="images/profile.png" width="180px">
    <h2>
        <?php
        echo "Username: ". $username."<br><br>";
        echo "Name: ". $name."<br><br>";
        echo "Account Made On: ". $date."<br><br>";

        
        ?>
        <input type="button" name="submit" class="btn" value="change name">

    
        <a href="logout.php">
        <br>
    <br>
            <input type="button"  class="btn" value="Log Out">

        </a>
</body>
</html>