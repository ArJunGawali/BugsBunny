<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="css/style_login.css"> 


        <title>!Target Page!</title>
    </head>

    <body>
    <style>
h2{

  background-color:white;
}
textarea{
    background-color:white;
}
input[type=file] {
    
    background-color:white;
}
</style>
    
<?php

          session_start();
          $uname=$_SESSION['uname'] ;
          session_write_close();

         //navigation bar
         
         
       $date = date("dmy");
       $type='doctor';
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "original";
 
        //create connection
        $conn = new mysqli( $host , $user , $password , $db);
        if(mysqli_connect_error()){die("Connect Error");}
        else{    
        $users = mysqli_query($conn,"SELECT name,username from login_doc where login_doc.username='$uname'");
        $ROW = mysqli_fetch_assoc($users);
        $name=$ROW['name'];
        $uname=$ROW['username'];
        echo "<form action='insert.php' class='form' method='POST' enctype='multipart/form-data' target='_blank'>";
        echo "<h2>NAME OF DISEASE &ensp; <input type='text' placeholder='Title Of DISEASE' name='btitle' required></h2>";
        echo "<input type='hidden' value='".$date."' name='md' required><br><br><br>";
        echo "<input type='hidden' value='".$uname."' name='unames'> ";
        echo " CURE<br> <textarea  name='cure' rows='10' cols='132'> </textarea>";
        echo " symptoms<br> <textarea  name='symptoms' rows='10' cols='132'> </textarea>";
        echo "<br><br>";
        echo '<input type="file" name="images" >';
        echo "<input type='hidden' value='".$name."' name='name' required>";
        echo "<button type='submit' action='update.php' target='_blank'>Submit</button>";
        echo "</form>";}
        echo "</table>";
       
            
    
?>
       