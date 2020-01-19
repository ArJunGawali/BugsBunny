<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
     *{margin:0px;margin:20px auto;}
     #main{width:200px;margin:20px auto;  }
    </style>
</head>
<body>
    <div id="main">
     <h2 style="text-align:center"></h2>
     <form method="post" action="connection.php">
     username:
     <input type="text" name="user_name" placeholder="user name"  required/><br><br>
     password :<br>
         <input type="password" name="password" placeholder="password" /><br>
         <input type="submit" name="login" value="login" />
     </form>
    </div>
</body>
</html>