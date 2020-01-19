<?php
    if(Isset($_POST['login']))
    {    session_start();

        $user_name=$_POST['user_name'];
        $password=$_POST['password'];
        
        $con =mysqli_connect('localhost','root');
        $q="SELECT * FROM user where user_name='.$user_name.' &&  password= '.$password.'";
        $r=mysqli_query($con,$q);
        $_SESSION['user_name']=$user_name;
       
        header("location:indexes.php");
      //  session_write_close();
    }
    
?>