
<?php
    $conn=mysqli_connect('localhost','root','','chat');

    if(isset($_POST['submit'])) {
        $username=$_POST['username'];
        $name=$_POST['name'];
        $password=$_POST['password'];
        require("datetime.php");
        if ($username!="" && $password!="" && $name!="") {
            $query="INSERT INTO accounts (username,name,password,date) VALUES ('$username','$name','$password','$date')";
            $run=mysqli_query($conn,$query);
            if($run){
                $success="Account created successfully";
            }else{
                echo"error occured";
            }
        }else{
            $blank=1;
            $blank_err="Blanks not allowed";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <title>signup to chatwithtech</title>
</head>
<body text="white">
    <center>
    <div>
    <form  method="post" enctype="multipart/form-data">
    <img src="images/icon.png" width="200px">

        <h2>Create Account</h2>
        <h2>
            Create Username:<input type="text" placeholder="username" name="username" class="txt" min="5" max="10">
            <br><br>
            Create Password:<input type="password" placeholder="password" class="txt" name="password" min="5" max="20">
            <br><br>
            Enter Your name:<input type="text" placeholder="Your name" name="name" class="txt" min="4" max="20">
            <br><br>
            <input type="submit" name="submit" class="btn">

            <br><br>
            <?php
            error_reporting(0);
            if($blank){?>
                <input type="text" size="25" class='error' value="<?php
                echo $blank_err;
                ?>"readonly>
            <?php
            }
            

            if($run){?>
                <input type="text" size="25" class='success' value="<?php
                echo $success;
                ?>"readonly>
                <br>
                <a href='login.php'>
                <input type="button" value="Click here to login" class="btn">
                </a>
            <?php
            }
            ?>
            <br>
            <br>
                <label class="note">if success message not comes and error comes in browser<br>
                 then try different username</label>

        </h2>
    </form>
    </div>
    </center>
    
</body>
</html>