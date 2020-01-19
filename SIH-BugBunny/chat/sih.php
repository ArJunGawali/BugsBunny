<?php
 session_start();
include("connection.php");
if(isset($_POST['submit']))
{$con =mysqli_connect('localhost','root');
    $message=$_POST['message'];
    $u=$_SESSION['user_name'];
   $q="INSERT INTO message (message,user_name) VALUES('$message','$u')";
   if(mysqli_query($con,$q))
    {
           echo '<h4 style="color:red">'.$_SESSION['user_name'].'</h4>';
           echo'<p>'.$message.'</p>';
    }

}

?>