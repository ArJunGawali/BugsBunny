<?php
  echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 
  //echo "<h2>Connected</h1><br>";

//include 'month_update.php';



  
  $uname = $_POST['unames'];
  $type=$_POST['type'];
 

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
        $month1 = mysqli_query($conn,"SELECT * from active_month  where 1");
        $ROW2 = mysqli_fetch_assoc($month1);
          $month= $ROW2["active_month"];
         
            if($type != 'doctor'){

              //navigation bar
              echo '
              <div class="topnav" >
              <a class="active" href="#home">Home</a>
              <a href="info.php">Contact</a>
              <a href="home.html">Logout</a>
              <form id="id02"  action="transaction.php" method="POST" align="right" target="blank">
                   <input type="hidden" name="unames" value='.$uname.'>
                   <input type="hidden" name="type" value='.$type.'>
                   <h2 > id <input type="number"  placeholder="Enter id " name="id"></h2>
                   </form>
              </div>
            ';
?>

<!DOCTYPE html>
<html lang="en">
<style>

input[type=text] {
  width: 220px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>



<body>
  
<form>
  <input type="text"  name="search" placeholder=" Disease Search..">
</form>
<form>
  <input type="text"  name="search" placeholder=" Symptom Search..">
</form>

</body>
</html>



<?php          
            $RESULT = mysqli_query($conn,"SELECT * from DISEASES  where 1"); //or die("failed".mysqli_error());
            //$ROW = mysqli_fetch_array($RESULT);
            //echo $ROW->num_rows();
           
           
            echo "<table border = 1>";
            echo"<tr> <td>ID</td> <td>DISEASE</td>    <td>NAME</td><td>cure</td> </tr>";
            while($ROW = mysqli_fetch_assoc($RESULT)) {
                 // echo $ROW;
                  $row_ind = $ROW['DISEASE'];
                  $VALUE=mysqli_query($conn,"SELECT * from DISEASES where DISEASE=' $row_ind'  ");
                  $ROW1=mysqli_fetch_assoc($VALUE);

                  
                  
                  //session_id($ROW['id']); session_start();$_SESSION['DISEASE']=$ROW['DISEASE'] ;$_SESSION['cure']= $ROW['cure'];session_write_close();


?>
<!DOCTYPE html>
<html lang="en">
<body>
<script>



</script>
<form id='01' action='cure_update.php' method='POST'  >
<tr> <td><?php echo $ROW['id'];?></td>  
<td><?php echo  $ROW['DISEASE'];?></td>  
<td><?php echo $ROW['name'];?></td> 
<td><?php echo substr($ROW['cure'],0,10);echo"..."?></button></td>

<input type='hidden' name='unames' value= '<?php echo $uname;?>'>
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>">
<input type='hidden' name='cure' value= "<?php echo $ROW['cure'];?>">
</tr>
</form>




</body>
</html>
                                  
<?php            

                      
    }
  echo "</table>";
                
            
            
        }
        
          
        else {

                  //navigation bar
                  echo '
                  <div class="topnav">
                  <a class="active" href="#home">Home</a>
                  
                  <a href="target.php" target="blank">New DISEASE</a>
                  <a href="home.html">Logout</a>
                  
                  <form id="id02"  action="transaction.php" method="POST" align="right" target="blank">
                   <input type="hidden" name="unames" value='.$uname.'>
                   <input type="hidden" name="type" value='.$type.'>
                   <h2 > id <input type="number"  placeholder="Enter id " name="id"></h2>
                   </form>
                  
                  </div>
                ';
      ?>

<!DOCTYPE html>
<html lang="en">
<style>

input[type=text] {
  width: 220px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  
 

  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>



<body>
  
<form action="search_disease.php" aligh="left" method="POST" >
  <input type="text"  name="search" placeholder="Disease Search..">
</form>
<form action="search_symptom.php" aligh="right" method="POST"  > 
  <input type="text"  name="search" placeholder="Symptom Search..">
</form>

</body>
</html>



<?php          


          $RESULT = mysqli_query($conn,"SELECT * from DISEASES  where 1"); //or die("failed".mysqli_error());
          //$ROW = mysqli_fetch_array($RESULT);
          session_start();
          $_SESSION['uname']=$uname ;
          session_write_close();
          

          //echo $ROW->num_rows();
          echo "<table border = 1>";
          echo"<tr> <td>ID</td> <td>DISEASE</td>   <td>NAME</td> <td> cure</td> <td>IMAGE</td><td></td></tr>";
          while($ROW = mysqli_fetch_assoc($RESULT)) {
          
            //session_id($ROW['id']); session_start();$_SESSION['DISEASE']=$ROW['DISEASE'] ;        $_SESSION['cure']= $ROW['cure'];session_write_close();

          //get the enable and disable value
         $name=$ROW['name'];

          
            // echo $ROW;
?>            


<!DOCTYPE html>
<html lang="en">
<body>




<tr> <td><?php echo $ROW['id'];?></td>  
<td><?php echo $ROW['DISEASE'];?></td>  
<td><?php echo $ROW['name'];?></td> 
<td><?php echo substr($ROW['cure'],0,10);echo"..."?></button></td>
<td><img src="<?php echo $ROW['image'];?>" height="100" width="100"></td> 

<form id='01' action='cure_update.php' method='POST' target='_blank' >
<input type='hidden' name='unames' value= '<?php echo $uname;?>'>
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>">
<input type='hidden' name='cure' value= "<?php echo $ROW['cure'];?>">

 <td><button type='submit'  required >Update</button></td>
 </form>

 <form id='01' action='new_cure.php' method='POST' target='_blank'>
<input type='hidden' name='name' value= '<?php echo $name;?>'>
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>">
 <td><button type='submit'  required >add new </button></td>
 </form>

</body>
</html>             


<?php               
               //hide the warnings
               //error_reporting(E_ERROR | E_PARSE);
               
               
               
               
              // session_id($ROW['id']); session_start();$_SESSION['DISEASE']=$ROW['DISEASE'] ;  $_SESSION['cure']= $ROW['cure'];session_write_close();

               //cure update
               echo"</form>"; 
               
                 echo "<form  action='cure_update.php' method='POST' >";
                 echo "<input type='hidden' name='unames' value= '".$uname."'>";
                 echo "<input type='hidden' name='id' value= '".$ROW['id']."'>";
                 echo " <input type='hidden' name='cure' value= '".$ROW['cure']."'></tr>" ;
                 echo"</form>";
                }
          echo "</table>";

              
          } 
      }



  ?>