<!DOCTYPE html>
<html lang="en">

<style>
  
  #id09{
    border-style:double;
    word-wrap: break-word;
    background-color:white;

  }
  h3{
    background-color:white;
  }

  
</style>
</html>



<?php
 echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 
 
   
   $uname = $_POST['unames'];
   $id=$_POST['id'];
   //$type=$_POST['type'];
   
     #code
        $host = "localhost";
        $user = "root";
        $password = "";
        $db = "original";
  
        //create connection
        $conn = new mysqli( $host , $user , $password , $db);
        if(mysqli_connect_error()){die("Connect Error");}
        else{
            $t_DISEASE = mysqli_query($conn,"SELECT * from DISEASES  where id = $id");// transaction_id
            $ROW1 = mysqli_fetch_assoc($t_DISEASE);
            $DISEASE = $ROW1['DISEASE'];
            $cure = $ROW1['cure'];
            $uname1 = $ROW1['username'];
            $symptoms = $ROW1['symptoms'];
            $image = $ROW1['image'];
            $sql= mysqli_query($conn,"SELECT name from DISEASES where diseases.id=$id");
            $ROW = mysqli_fetch_assoc($sql);        
            
    
         

      }
        echo"
      <h1> ".$DISEASE." </h1>";?>
      
      <!DOCTYPE html>
      <html lang="en">
      <style>
#image-container{
  background-color: rgb(230, 228, 228);
  margin-left:0px;
  margin-right:0px;
}
img{
  background-color: rgb(230, 228, 228);
  display: block;
}

</style>
      <body>
        
      <div id="image-container">
      <img src="<?php echo $image;?>">
      </div>
      </body>
      </html>
      <?php echo "
      <h2> SYMPTOMS :-  </h2>
      <div id='id09'>
      &ensp;&ensp;&ensp;&ensp;&ensp; ".$symptoms."</div><br><br>
      

      <h2> CURE BY:  </h2>
      <div id='id09'>
      <h3> ".$ROW['name']." :- </h3><br>
      &ensp;&ensp;&ensp;&ensp;&ensp; ".$cure."</div>
      <br><br>

      ";


      $RESULT = mysqli_query($conn,"SELECT cure,name from cure  where id = $id");
      while($ROW = mysqli_fetch_assoc($RESULT)) {
        $name = $ROW['name'];
        $cure = $ROW['cure'];
        echo"
        <div id='id09'>
        <h3> ".$name." :- </h3><br>
        &ensp;&ensp;&ensp;&ensp;&ensp; ".$cure."
        </div>
        <br><br>
        ";

      }



      
    
?>
