<?php 

$name = $_POST['name'];
  $id=$_POST['id'];
  $disease = $_POST['DISEASE'];
  echo $disease;
  $cure = $_POST['cure'];
  $type = "doctor";
  
echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 


    #code
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "original";

    
      $conn = new mysqli( $host , $user , $password , $db);
      if(mysqli_connect_error()){die("Connect Error");}
      else{    

        
        echo $name; 


        $INSERT = "INSERT Into cure (id,cure,name) values (?,?,?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("iss",$id,$cure,$name);
        $stmt->execute();
        echo "<script>alert('RECORD INSERTED ')</script>";
    //  $ROW = mysqli_query($conn," INSERT INTO cure ('id', 'cure','name') VALUES ('$id' , '$cure','$name')");
      //echo "<script>alert('RECORD INSERTED ')</script>"; 
      echo "<script>close();</script> ";
      }
?>