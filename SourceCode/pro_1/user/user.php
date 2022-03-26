<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../crud/css/bootstrap.min.css">
</head>
<body>
<p>User: <?php echo isset($_SESSION['username'])?$_SESSION['username']: ''; ?>
    <span class="glyphicon glyphicon-user">&emsp;&emsp;</span><a href=<?php echo '/pro_1/logout.php'; ?>> 
   <span class="glyphicon glyphicon-log-out"></span> Logout </a>
</p>
    <script src="../crud/js/jquery-2.2.4.min.js"></script>
    <script src="../cruid/js/bootstrap.min.js"></script>
</body>
</html>




