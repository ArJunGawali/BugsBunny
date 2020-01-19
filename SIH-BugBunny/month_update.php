<?php
$uname = $_POST['unames'];
$active_month = $_POST['month'];
  echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 
echo $active_month;
  #code
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "original";

  //session_id($ROW['id']); session_start();$_SESSION['indicator']=$ROW['INDICATOR'] ;$_SESSION['radio']= $ROW['radio'];session_write_close();
   //create connection
    $conn = new mysqli( $host , $user , $password , $db);
    if(mysqli_connect_error()){die("Connect Error");}
    else{    
    
        $UPDATE = mysqli_query($conn, "UPDATE active_month SET active_month = '$active_month' ");
    
    
    }



