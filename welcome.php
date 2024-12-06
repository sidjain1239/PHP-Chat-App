<?php
session_start();
$conn=mysqli_connect('localhost','root','','chat');

if (isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    $query="SELECT * FROM accounts WHERE username='$username'";
    $run=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($run);
    
    $n='Hi '.$username.' ('.$row['name'].')!';

}else {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome <?php echo $name?></title>
    <link rel="stylesheet" href="css/welcome.css">

</head>
<body>
<form  method="post" enctype="multipart/form-data">



<div class="header" id="myHeader">
<center>
<img src="images/icon.png" width="220px">
</center>

    <?php
    echo $n;
    ?>
     <a href="profile.php">
        <img src="images/profile.png" width="30px" class='img2'>
    </a>
    <a href="new_conv.php" >
        <img src="images/new_conv.png" width="30px" class='img1'>
    </a>
    <br>
    Chats
</div>
<div class="homechat">
    <?php
          $username=$_SESSION['username'];

        $query="SELECT  * FROM messages WHERE touser='$username' OR fromuser='$username'";
        $run=mysqli_query($conn,$query);
        $num= mysqli_num_rows($run);
        $row =mysqli_fetch_assoc($run);
        $chats=array();
    
         while ($row =mysqli_fetch_assoc($run)) {
            if ($row['touser']===$username) {
        

                array_push($chats,$row['fromuser']);
            }else {
        
                array_push($chats,$row['touser']);
            }
         }

         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";

         $unique=array_unique($chats);
         foreach($unique as $ch){
            $query="SELECT * FROM accounts WHERE username='$ch'";
          $run=mysqli_query($conn,$query);
        $num= mysqli_num_rows($run);
        $row = mysqli_fetch_assoc($run);
        $name=$row['name'];

             echo "<button onclick='myfn()'value='$ch' name='submit' style='background-color: darkmagenta;border-radius: 5px;border: none;color: aliceblue;font-size: 17px;width:100%;height:30px;text-align:left;'>".$ch." (".$name.")"."</button>";
         echo "<br>";
         echo "<br>";
            
         }
         if(isset($_POST['submit'])){
            $btv=$_POST['submit'];
            $query="SELECT * FROM accounts WHERE username='$btv'";
          $run=mysqli_query($conn,$query);
        $num= mysqli_num_rows($run);
        $row = mysqli_fetch_assoc($run);
        
         $chatusername=$row['username'];
         $name=$row['name'];
         $_SESSION["chatwith"]=$chatusername;
         $_SESSION['chatname']=$name;
         header("location:chat.php");
         }
    ?>


</script>
</div>
</html>