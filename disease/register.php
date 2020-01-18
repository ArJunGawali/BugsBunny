<?php
  echo "<h2>Connected</h1><br>";
  $uname=$_POST['uname'];
  $pass=$_POST['pass'];
  $mob=$_POST['mob'];
  $email=$_POST['email'];
  $fname=$_POST['fname'];
  $type=$_POST['type'];

  if( !empty($uname) || !empty($pass) || !empty($fname) ){
    #code
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "original";
  
    //create connection
    $conn = new mysqli( $host , $user , $password , $db);
    if(mysqli_connect_error()){die("Connect Error");}
    else{    

      $SELECT = "SELECT username from login_doc Where username = ? Limit 1";
      $INSERT = "INSERT Into login_doc (username,password,name,type,mobile,email) values (?,?,?,?,?,?)";

      //prepare statement 
      $stmt = $conn -> prepare($SELECT);
      $stmt->bind_param("s",$uname);
      $stmt->execute();
      $stmt->bind_result($uname);
      $stmt->store_result();
      $rnum = $stmt->num_rows();
      
      if($rnum==0){
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssss",$uname,$pass,$fname,$type,$mob,$email);
        $stmt->execute();
        echo "<script>alert('RECORD INSERTED ')</script>"; 
      echo "<script>close();</script> ";
      }
      else{echo " Username Already Exists!!!";}
        $stmt->close();
        $conn->close();
      }
    }
    else{
      echo  "All fields are required !!!!";
      die();
    }     
  ?>