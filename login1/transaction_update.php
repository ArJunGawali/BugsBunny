<?php
$id = $_POST['id'];
echo "$id";
$uname=$_POST['unames'];
$disease = $_POST['disease'];
$cure = $_POST['cure'];
$type = $_POST['type'];
echo $cure;
echo $disease;
//$month = date('m');
#code
 $host = "localhost";
 $user = "root";
 $password = "";
 $db = "original";

 //create connection
 $conn = new mysqli( $host , $user , $password , $db);

 if(mysqli_connect_error()){die("Connect Error");}
 else {
    $SELECT = mysqli_query($conn,"SELECT * FROM DISEASES where 1");
    $ROW = mysqli_fetch_assoc($SELECT);
    
    
    
    
        $id = $ROW['id'];
        $id1= $ROW['DISEASE'];
        
        $UPDATE = mysqli_query($conn,"UPDATE DISEASES SET cure = '$cure' where DISEASES.DISEASE = '$id1'");
        echo "<script>alert('RECORD UPDATED ')</script>"; 
        //redirect to show.php
        echo "<form id='01' action='show.php' method='POST' >";
        echo "<input type='hidden' name= 'unames' value ='".$uname."' > ";
        echo "<input type='hidden' name= 'type' value ='".$type."' > ";
        echo"</form>";
        echo"<script> document.getElementById('01').submit(); </script>";
    
 }
?>
