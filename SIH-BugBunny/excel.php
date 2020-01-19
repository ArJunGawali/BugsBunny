<?php
$uname = $_POST['unames'];
//$uname="not coming";

#code
$host = "localhost";
$user = "root";
$password = "";
$db = "original";
$output='';
//session_id($ROW['id']); session_start();$_SESSION['DISEASE']=$ROW['DISEASE'] ;$_SESSION['radio']= $ROW['radio'];session_write_close();
 //create connection
  $conn = new mysqli( $host , $user , $password , $db);
  if(mysqli_connect_error()){die("Connect Error");}
else{    
    if($uname == 'admin'){

        $SELECT=mysqli_query($conn,"SELECT * from transaction  where 1");
        //if(mysqli_num_rows >0 ){
            $output .= '<table border = 1>
            <tr> <th>SNo</th>  
            <th>month </th>
            <th>DISEASE</th>  
            <th>value</th> </tr>
            ';
            while($ROW = mysqli_fetch_assoc($SELECT)) {
              $output .='
                <tr> <th>'.$ROW["id"].'</th>  
                <th>'.$ROW["month"].'</th>  
                <th>'.$ROW["DISEASE"].'</th>
                <th>'.$ROW["value"].'</th> </tr>
           
          ';
           
       } $output .='</table>';
        header("Content-type: application/xls");
        header("Content-Disposition:attachment; filename=download.xls");
        echo $output;
        
   // }else{ echo " nothing is in the table "; }



  }
  else{

    $SELECT=mysqli_query($conn,"SELECT * from transaction  where username='$uname'");
    //if(mysqli_num_rows >0 ){
        $output .= '<table border = 1>
        <tr> <th>SNo</th>  
        <th>month(mmyy)</th>
        <th>DISEASE</th>  
        <th>value</th> </tr>
        ';
        while($ROW = mysqli_fetch_assoc($SELECT)) {
          $output .='
            <tr> <th>'.$ROW["id"].'</th>  
            <th>'.$ROW["month"].'</th>  
            <th>'.$ROW["DISEASE"].'</th>
            <th>'.$ROW["value"].'</th> </tr>
       
      ';
       
   } $output .='</table>';
    header("Content-type: application/xls");
    header("Content-Disposition:attachment; filename=download.xls");
    echo $output;
  }
}

?>