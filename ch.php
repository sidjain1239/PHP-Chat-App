<?php
     $page=$_SERVER['PHP_SELF'];
     $sec=1;
     ?>
    <meta http-equiv="refresh" content="<?php echo $sec; ?>;URL='<?php echo $page; ?>'"
     
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