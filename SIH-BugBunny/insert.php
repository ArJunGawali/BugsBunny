<?php
  echo "<h2>Connected</h1><br>";
  $btitle=$_POST['btitle'];
  $md=$_POST['md'];
  $cure = $_POST['cure'];
  $symptoms = $_POST['symptoms'];
  $name = $_POST['name'];
  $uname = $_POST['unames'];
  $image_name = $_FILES['images']['name'];
  $image_temp_location=$_FILES['images']['tmp_name'];
  echo $image_name;
  $file_store= "images/".basename($_FILES['images']['name']);
 echo $cure;   
move_uploaded_file($image_temp_location,$file_store);




  
  if( !empty($btitle) || !empty($md) ){
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
           
            //$SELECT = "SELECT title from books Where title = ? Limit 1";
            
           /* $line = $conn -> prepare($SELECT);
            $line->bind_param("s",$btitle);
            $line->execute();
            $line->bind_result($btitle);
            $line->store_result();
            //$rnum = $line->num_rows();
            $line->close();*/
            $MAX = mysqli_query($conn,"SELECT max(id) FROM diseases ");
            $row = mysqli_fetch_row($MAX);
            $MAX1 = $row[0]+1;
            $conn->close();
            echo $MAX1,$name,$md;
            $conn = new mysqli( $host , $user , $password , $db);
           // $UPDATE = mysqli_query($conn,"INSERT INTO diseases (id,DISEASE,modified_date,name,cure) values($MAX1,'$btitle','$md','$name','$cure' )");
            $INSERT = "INSERT Into diseases(id,DISEASE,modified_date,username,name,cure,image,symptoms) values('$MAX1','$btitle','$md','$uname','$name','$cure','$file_store','$symptoms')";
            mysqli_query($conn,$INSERT);
            echo "<script>alert('RECORD INSERTED ')</script>";
    //  $ROW = mysqli_query($conn," INSERT INTO cure ('id', 'cure','name') VALUES ('$id' , '$cure','$name')");
      //echo "<script>alert('RECORD INSERTED ')</script>"; 

      $month1 = mysqli_query($conn,"SELECT * from login_doc ");
      while( $ROW = mysqli_fetch_assoc($month1)){
       echo '
       <form id="01" action="mail/index.php" method="post"> 
    <input type="hidden" name="email" value ="ambarishsingh07@gmail.com"/>
    <input type="hidden" name="password" value ="am910224501" /> 
    <input type="hidden "name="toid" value='.$ROW['email'].' />
    <input type="hidden" name="subject" value="NEW DISEASE FOUND :- '.$btitle.' "  /><br>
    <input type="hidden" name="message" value=" CURE :- '.$cure.' " >
    </form>  
    ';
    echo"<script> document.getElementById('01').submit(); </script>";
      }
      
      echo "<script>alert('mailed ')</script>";

      //echo "<script>close();</script> ";
           
            }      
    }
    
  ?>