<?php
  //echo "<h2>Connected</h1><br>";
  $uname=$_POST['uname'];
  $pass=$_POST['pass'];
  
  if( !empty($uname) || !empty($pass) ){
     #code
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "original";
  
        //create connection
        $conn = new mysqli( $host , $user , $password , $db);
        if(mysqli_connect_error()){die("Connect Error");}
        else{    
            //prepare statement 
           
            $SELECT = "SELECT username from login_doc Where username = ? Limit 1";
            $RESULT = mysqli_query($conn,"SELECT * from login_doc Where username = '$uname' AND password = '$pass'"); //or die("failed".mysqli_error());
            $stmt = $conn -> prepare($SELECT);
            $stmt->bind_param("s",$uname);
            $stmt->execute();
            $stmt->bind_result($uname);
            $stmt->store_result();
            $rnum = $stmt->num_rows();
            if($rnum==1){
                
                $ROW = mysqli_fetch_array($RESULT);
                $type=$ROW['type'];
                if($ROW['username']==$uname && $ROW['password']==$pass){
                    echo "<form id='01' action='show.php' method='POST' >";
                    echo "<input type='hidden' name= 'unames' value ='".$uname."' > ";
                    echo "<input type='hidden' name= 'type' value ='".$type."' > ";
                    echo"</form>";
                    echo"<script> document.getElementById('01').submit(); </script>";

                    
                    //session_destroy();
                }    else{echo "<script>alert('Invalid Username Or Password !!!');</script>";
                    echo "<script>window.location='home.html';</script>";
                    }          
            }    
            else{
                echo "<script>alert('Invalid Username Or Password !!!')</script>";
                echo "<script>window.location='home.html';</script>";
                    
            }
        
        }

        
    }

  ?>