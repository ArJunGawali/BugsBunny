<?php
$uname=$_POST['unames'];
$radio = $_POST['radio'];
echo $uname;
$id = $_POST['id'];
//get the new radio
if($radio =='on' ){
    $new_radio='off';
}else{$new_radio='on';}
echo $new_radio;
#code
$host = "localhost";
$user = "root";
$password = "";
$db = "original";
$conn = new mysqli( $host , $user , $password , $db);
 if(mysqli_connect_error()){die("Connect Error");}
 else {
    $UPDATE = mysqli_query($conn, "UPDATE books SET radio = '$new_radio' where id = '$id'");
   // echo "<script>alert('RECORD UPDATED')</script>";
   echo "<form id='01' action='show.php' method='POST' >";
    echo "<input type='hidden' name= 'unames' value ='".$uname."' > ";
    echo"</form>";
    echo"<script> document.getElementById('01').submit(); </script>";
   

 }
?>