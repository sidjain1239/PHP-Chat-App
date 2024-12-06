<?php
    error_reporting(0);

    $conn=mysqli_connect('localhost','root','','chat');

if (isset($_COOKIE['username'])) {
    session_start();
        $_SESSION['username']=$_COOKIE['username'];
        header("location:welcome.php");
}
if(isset($_POST['submit'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM accounts WHERE username='$username'";
    $run=mysqli_query($conn,$query);
    $num= mysqli_num_rows($run);
    $row = mysqli_fetch_assoc($run);
    if (!$run) {
        $wrong_user="enter correct username or password";
        $wp=1;
    }
    if ($password===$row['password']) {
        echo "correct";
        session_start();
        $_SESSION['username']=$username;
        setcookie("username",$username,time() + 2592000,"/");
        header("location:welcome.php");
    }else{
        $wrong_pass="enter correct username or password";
        $wp=1;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login to chatwithtech</title>
</head>
<body text="white">
    <center>
    <img src="images/icon.png" width="220px">
    <h2>Login Your Account</h2>

    <form  method="post" enctype="multipart/form-data">
        <h2>
        Enter Your Username <input type="text" name="username" class="txt" placeholder="Enter Username">
        <br><br>
        Enter Your Password  <input type="password" class="txt" name="password" placeholder="Enter Password"></p>
    
        <input type="submit" name="submit"  class="btn">
    </h2><?php
    error_reporting(0);

    if($wp){?>
        <input type="text" size="35" class='error' value="<?php
        echo $wrong_pass;
        ?>"readonly>
    <?php
    }?>
    </form>
</center>
</body>
</html>