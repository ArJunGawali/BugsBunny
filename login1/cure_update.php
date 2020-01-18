<?php 

$uname = $_POST['unames'];
  $id=$_POST['id'];
  $disease = $_POST['DISEASE'];
  $cure=$_POST['cure'];
  $type = "doctor";
  
echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 

echo "
<form id='01' action='transaction_update.php' method='POST'>
<h2>enter the cure</h2>";?>
<input type='hidden' name='unames' value= '<?php echo $uname;?>'>
<input type='hidden' name='id' value= "<?php echo $id;?>">
<input type='hidden' name='disease' value= "<?php echo $disease;?>">
<input type='hidden' name='cure' value= "<?php echo $cure;?>">
<input type='hidden' name='type' value= "<?php echo $type;?>">
<?php
echo "
<textarea  name='cure' rows='20' cols='180'> </textarea><br>
<button type='submit' onclick='cure_update.php'>Update</button>
";


?>