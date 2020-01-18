<?php
  echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 



  
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
  width: -100%;
}
#idid{
  margin-right: 1000px;
}
</style>



<body> 
<div style="position : fixed; padding: 5px 0 0 5px; height: 140px; width: 150px;">
<form id="idid">
  <input type="text"  name="search" placeholder=" Disease Search..">
</form>
<form id="idid">
  <input type="text"  name="search" placeholder=" Symptom Search..">
</form>
</div>

</body>
</html>



<?php 

            $RESULT = mysqli_query($conn,"SELECT * from DISEASES  where 1"); //or die("failed".mysqli_error());
            //$ROW = mysqli_fetch_array($RESULT);
            //echo $ROW->num_rows();
           
           
            
            
            while($ROW = mysqli_fetch_assoc($RESULT)) {
                 // echo $ROW;
                  $row_ind = $ROW['DISEASE'];
                  $VALUE=mysqli_query($conn,"SELECT * from DISEASES where DISEASE=' $row_ind'  ");
                  $ROW1=mysqli_fetch_assoc($VALUE);

                  $name=$ROW['name'];
                  
            ?>
<!DOCTYPE html>
<html lang="en">
<style>
#id07{
  margin-left: 330px;
  margin-right: 50px;
  border-style: double;
  background-color:white;
}


#id01{ 
  
  
  background-color:white;
}

img{
  background-color:white;
  display: block;
  height: 390px ;
  width: 390px; 
}

#d_name{
  background-color:white;
  align:left;
  
  background-color:white;
  
}
#cure{
  width:450px;
  height:400px;
  word-wrap: break-word;
  font-size:auto;
  border-style: solid;
  float:right;
  background-color:white; 
}
#chat{
  float:right;  
  border-style: double;
  width:85px;
  height:35px;
  background-color:white;

}
#image-container{
  background-color:white;
  margin-left:0px;
  margin-right:0px;
  border-style: double;
}
h4{
  display:block;
}
</style>

<body>

<div id="id07" align="left">

<a id="chat"  href="chat1/main.php?myid=<?php echo $uname;?> & fid=<?php echo $ROW['username'];?> " target='_blank' >message</a> 


<div id="d_name">
<b><?php echo $ROW['DISEASE'];?></b>
</div>

<div id="image-container">
<div id="cure"><?php 

echo"<b>SYMPTOMS :- </b><br><br>";echo substr($ROW['symptoms'],0,200);echo".....<br><br><br>";
echo"<b>CURE :- </b><br><br>";echo substr($ROW['cure'],0,200);echo'.....';?>

<form id='id01'action='transaction.php' method='POST' target='_blank' >
<input type='hidden' name='unames' value= '<?php echo $uname;?>'> 
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>">
<button type='submit'> details </button>
</form>
</div>

<img src="<?php echo $ROW['image'];?>">

</div>
<div id="d_name" align="right">
<a href="doc_details.php?name=<?php echo $name;?>" ><strong><?php echo" Dr. ";echo  $ROW['name'];?></strong> </a> 
</div>


</div><br><br><br>


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


</style>



<body> 

<div style="position : fixed; padding: 5px 0 0 5px; height: 140px; width: 150px;">
<form id="idid">
  <input type="text"  name="search" placeholder=" Disease Search..">
</form>
<form id="idid">
  <input type="text"  name="search" placeholder=" Symptom Search..">
</form>
</div>
</body>
</html>



<?php          


          $RESULT = mysqli_query($conn,"SELECT * from DISEASES  where 1"); //or die("failed".mysqli_error());
          //$ROW = mysqli_fetch_array($RESULT);
          session_start();
          $_SESSION['uname']=$uname ;
          session_write_close();
          

          //echo $ROW->num_rows();
          
          while($ROW = mysqli_fetch_assoc($RESULT)) {
          
            //session_id($ROW['id']); session_start();$_SESSION['DISEASE']=$ROW['DISEASE'] ;        $_SESSION['cure']= $ROW['cure'];session_write_close();

          //get the enable and disable value
         $name=$ROW['name'];

?>            

<!DOCTYPE html>
<html lang="en">
<body>
<style>
#id07{
  margin-left: 330px;
  margin-right: 50px;
  border-style: double;
  background-color:white;
}


#id01f{ 
  
  float:right;
  background-color:white;}

  #id01{ 
    width:120px;
  background-color:white;}


img{
  background-color:white;
  display: block;
  height: 390px ;
  width: 390px;
  
  
}

#d_name{
  background-color:white;
  align:left;
  
  background-color:white;
  
}
#cure{
  width:450px;
  height:400px;
  word-wrap: break-word;
  font-size:auto;
  float:right;
  background-color:white; 
}

#image-container{
  background-color:white;
  margin-left:0px;
  margin-right:0px;
}
</style>

<body>

<div id="id07" align="left">
<div id="d_name">
<b><?php echo $ROW['DISEASE'];?></b>
</div>


<div id="image-container">
<div id="cure"><?php 

echo"<b>SYMPTOMS :- </b><br><br>";echo substr($ROW['symptoms'],0,200);echo".....<br><br><br>";
echo"<b>CURE :- </b><br><br>";echo substr($ROW['cure'],0,200);echo".....<br><br>";?>
<form id="id01"action='transaction.php' method='POST' target='_blank' >
<input type='hidden' name='unames' value= '<?php echo $uname;?>'> 
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>">
<button type='submit'> details </button>
</form>
 
 <!--
               update
<form id='id01f' action='cure_update.php' method='POST' target='_blank' >
<input type='hidden' name='unames' value= '<?php echo $uname;?>'>
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>"> 
<input type='hidden' name='cure' value= "<?php echo $ROW['cure'];?>">
<button type='submit'  required >Update</button>
 </form>
-->



<form id='id01' action='new_cure.php' method='POST' target='_blank'>
<input type='hidden' name='name' value= '<?php echo $name;?>'>
<input type='hidden' name='id' value= "<?php echo $ROW['id'];?>">
<input type='hidden' name='DISEASE' value= "<?php echo $ROW['DISEASE'];?>">
 <td><button type='submit'  required >add new cure</button></td>
 </form>



</div>

<img src="<?php echo $ROW['image'];?>">

</div>
<div id="d_name" align="right">
<a href="doc_details.php?name=<?php echo $name;?>" ><strong><?php echo" Dr. ";echo  $ROW['name'];?></strong> </a> 
</div>


</div><br><br><br>


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