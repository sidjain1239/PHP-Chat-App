<?php
session_start();
if (isset($_COOKIE['username'])) {
    $username=$_COOKIE['username'];
    $conn=mysqli_connect('localhost','root','','chat');

    if (isset($_POST['submit'])) {
        if($_POST['username']===$_COOKIE['username']){
            $wrong_user="It is your username";
            $wp=1;
        }else {
        $touser=$_POST['username'];
        $query="SELECT * FROM accounts WHERE username='$touser'";
        $run=mysqli_query($conn,$query);
        $num= mysqli_num_rows($run);
        $row = mysqli_fetch_assoc($run);
        if ($row) {
            $name=$row['name'];
            $_SESSION["chatwith"]=$row['username'];
            $_SESSION['chatname']=$name;
            header("location:chat.php");
        }else {
            $wrong_user="enter correct username";
            $wp=1;
        }
        
        }
    }
    
}else {
    header("location:index.html");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start New Chat</title>
    <link rel="stylesheet" href="css/new_conv.css">

</head>
<body text="white">
<form  method="post" enctype="multipart/form-data">
<img src="images/icon.png" width="220px">

    <h2>
        <center>
        Start A New chat
        <br>
        <br>
        <br>
       
        Start chat with:<input type="text" class="txt" name="username" placeholder="username">
        <br>
        <br>

        <input type="submit" name="submit" class="btn">
            <br>
            <br>
        <?php
        error_reporting(0);

        
        if($wp){
            ?>
        <input type="text" size="35" class='error' value="<?php
        echo $wrong_user;
        ?>"readonly>
        <?php
        }?>
    </h2>
    </center>

</body>
</html>