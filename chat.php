<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','chat');


    if (isset($_SESSION["chatwith"])) {
        $touser=$_SESSION['chatwith'];
        $toname=$_SESSION['chatname'];
       
        if(isset($_POST['submit'])){
            
            $touser=$_SESSION['chatwith'];
            $toname=$_SESSION['chatname'];
            $from=$_SESSION['username'];
            $message=$_POST['message'];
            require('datetime.php');
            

            $query="INSERT INTO messages (fromuser,touser,message,date,time) VALUES ('$from','$touser','$message','$date','$time')";
            $run=mysqli_query($conn,$query);
        }
    }else {
        
        header("location:welcome.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="css/chat.css">

</head>


<script>
  function refreshDiv() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("chat").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "chat.php", true); // Replace with your script path
    xhttp.send();
  }

  // Set the refresh interval (in milliseconds)
  setInterval(refreshDiv, 1000); // Refreshes every 5 seconds, adjust as needed

  // Call the function initially to populate the div on page load
  window.onload = refreshDiv;
</script>


<form  method="post" enctype="multipart/form-data">
    <div class="header">
         <center><img src="images/icon.png" width="220px"></center>
        
         <a href="welcome.php">
            <img src="images/home.png" width="30px" class='img2'>
        </a>
        <a href="chat_profile.php">
         <img src="images/profile.png" width="30px" class='img1'>
    </a>  
    <?php
    echo " ". $touser."(". $toname.')'  ;
    ?>


    </div>

    <div class="chat" id="chat">
        
    
    <?php
     $page=$_SERVER['PHP_SELF'];
     $sec=1;
     ?>
     <?php
                    $touser=$_SESSION['chatwith'];
                    $toname=$_SESSION['chatname'];
                    $from=$_SESSION['username'];

        $query="SELECT * FROM messages WHERE fromuser IN ('$from ','$touser')  AND  touser IN ('$touser ','$from')";
        $run=mysqli_query($conn,$query);
        $num= mysqli_num_rows($run);
        $row =mysqli_fetch_assoc($run);
    
    

        if ($num>0) {
            echo $num;
        } else {
            echo "errr";
        }
        
    ?>
    <br>
    <br><br>

    <h1><?php 
    echo"<br>";
    
    $touser=$_SESSION['chatwith'];

    while ($row =mysqli_fetch_assoc($run)) {
        $cLass=($row['fromuser']==$touser) ? "recieve" : "send" ;
        $btncls="more";
        echo "<p class='$cLass' >".$row['message']."<br> <button  style='font-size: 10px;color:grey'>".$row['date']."  ".$row['time']."</button></p>";
    }
    echo"<br>";
    ?>
    </div>
    <div class="footer">
    <center>

        <input type="text"  placeholder="message" class="txt" name="message">
        <button class="sendbtn" name="submit">
            
        <img src="images/send.png" width="30px" class='img'>
        
        </button>

    </div>
    
</form>
</body>
</html>