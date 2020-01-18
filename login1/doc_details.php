<?php
  echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 

 $name=$_GET['name'];
 echo $name;
 #code
 $host = "localhost";
 $user = "root";
 $password = "";
 $db = "original";

 //session_id($ROW['id']); session_start();$_SESSION['DISEASE']=$ROW['DISEASE'] ;$_SESSION['cure']= $ROW['cure'];session_write_close();
  //create connection
   $conn = new mysqli( $host , $user , $password , $db);
   if(mysqli_connect_error()){die("Connect Error");}
   else{    
   $month1 = mysqli_query($conn,"SELECT * from login_doc  where login_doc.name='$name'");
   $ROW = mysqli_fetch_assoc($month1);
   
   
   echo "<table border = 1>";
   echo"<tr> <td>NAME</td> <td>email</td> <td>mob no.</td> </tr>";
echo "
<tr> <td>  ".$ROW['NAME']."</td>  
<td>  ".$ROW['email']."</td>  
<td> ".$ROW['mobile']."</td> </tr>
";
}
 ?>