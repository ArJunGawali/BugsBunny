<?php
  echo "<h2>Connected</h1><br>";
  session_start();
   
   $uname = $_SESSION['unames'];
   $id=$_POST['id'];
   
     #code
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "original";
  
        //create connection
        $conn = new mysqli( $host , $user , $password , $db);
        if(mysqli_connect_error()){die("Connect Error");}
        else{    
            $t_DISEASE = mysqli_query($conn,"SELECT DISEASE from books  where id = $id");// transaction_id
            $ROW1 = mysqli_fetch_assoc($t_DISEASE);
            $ROW = mysqli_fetch_array($t_DISEASE);
            $DISEASE = $ROW1['DISEASE'];
            $RESULT = mysqli_query($conn,"SELECT * from transaction  where DISEASE = '$DISEASE' ");
            echo "<table border = 1>";
            echo"<tr> <td>SNo</td>  <td>month</td>  <td>value</td> </tr>";
            while($ROW = mysqli_fetch_assoc($RESULT)) {
                 // echo $ROW;
                 echo"<tr> <td>".$ROW['id']."</td>  <td>".$ROW['month']."</td>  <td>".$ROW['value']."</td> </tr>";
            
            echo "</table>";
            
        }  
      }
?>
