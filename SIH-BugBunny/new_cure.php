<?php 

$name = $_POST['name'];
  $id=$_POST['id'];
  $disease = $_POST['DISEASE'];

  $type = "doctor";
  
echo '<link rel="stylesheet" type="text/css" href="css/style_login.css">'; 

echo "
<form id='01' action='cure_add.php' method='POST'>
<h2>enter the cure of :  ".$disease."</h2>";?>
<input type='hidden' name='name' value= '<?php echo $name;?>'>
<input type='hidden' name='id' value= "<?php echo $id;?>">
<input type='hidden' name='DISEASE' value= "<?php echo $disease;?>">

<input type='hidden' name='type' value= "<?php echo $type;?>">
<?php
echo "
<textarea  name='cure' rows='20' cols='180'> </textarea><br>
<button type='submit' onclick='cure_add.php'>ADD</button>
";


?>