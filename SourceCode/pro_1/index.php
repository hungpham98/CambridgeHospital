<?php
    require_once('session/initalize.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">    
    <nav>
    <h3>Cambridge Hospital staff</h3>
    </nav>
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-left">
                    <li class="nav active"><a href="index.php" >Main Menu</a></li>
                    <li class="nav "><a href="crud/admin/admin_index.php" >Admin </span></a></li>
                    <li class="nav "><a href="crud/doctor/doctor_index.php">Bác sĩ </a></li>
                    <li class="nav "><a href="crud/khoa/faculty_index.php">Khoa </a></li>
                    <li class="nav "><a href="crud/csvc/co_so_vat_chat_index.php">Cơ sở vật chất </a></li>
                    <li class="nav "><a href="crud/service/service_index.php">Dịch vụ </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav "><?php include('user/user.php'); ?></li>
                </ul>
            </div>
        </nav>
        <h2>Main Menu</h2>
        
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </div>    
</body>
</html>