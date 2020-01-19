<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
    <style>
   
    *{margin:0px;padding:0px;}
    #main{border:1px solid black; width:450px; height:500px; margin:24px auto;
       
    }
    #message_area{width:98%;border:1px solid blue; height:400px; overflow-y: scroll;}
    </style>
</head>
<body>
    <?php
          session_start();
          $con =mysqli_connect('localhost','root');
         $user_name=$_SESSION['user_name'];
         if(isset($user_name))
         {
           
          ECHO '<A HREF="home.html">LOGOUT</a>';
    
         }
         else
         {
             header("location:login.php");
         }
         session_write_close();
    ?>
   
    </script>
    <div id="main">
    <div id="message_area"> 
    <?php
    session_start();
include("connection.php");
$con =mysqli_connect('localhost','root');
mysqli_select_db($con,'original');
$q2="SELECT * FROM message ";
$r5=mysqli_query($con,$q2);
//$row=mysqli_fetch_assoc($r5);

 while($row=mysqli_fetch_assoc($r5))
 { 
     $message=$row['message'];
     $user_name=$row['user_name'];
     echo '<h4 style="color:red">'.$user_name.'</h4>';
     echo'<p>'.$message.'</p>';
     echo '<hr>';
         }
if(isset($_POST['submit']))

{
    $message=$_POST['message'];
    $u=$_SESSION['user_name'];
    
   $q="insert into message (message,user_name) VALUES('$message','$u')";
  // $r=mysqli_query($con,$q);
   if(mysqli_query($con,$q))
    {  
           echo '<h4 style="color:red">'.$_SESSION['user_name'].'</h4>';
           echo'<p>'.$message.'</p>';
    }

}

?> 
 </div>
    <form method="post">
      <input type="text" name="message" placeholder="type your message" />
      <input type="submit" name="submit" value="message"/>
    </form>
    
   
    </div>
</body>
</html>