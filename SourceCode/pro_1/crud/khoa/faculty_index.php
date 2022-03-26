<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>faculty</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <style>
    </style>
</head>
<body>
<div class="container">
<nav>
    <h3>Cambridge Hospital staff</h3>
    </nav>
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-left">
                    <li class="nav"><a href="../../index.php" >Main Menu</a></li>
                    <li class="nav"><a href="../admin/admin_index.php" >Admin</a></li>
                    <li class="nav "><a href="../doctor/doctor_index.php">Bác sĩ </a></li>
                    <li class="nav active"><a href="../khoa/faculty_index.php">Khoa </a></li>
                    <li class="nav "><a href="../csvc/co_so_vat_chat_index.php">Cơ sở vật chất </a></li>
                    <li class="nav "><a href="../service/service_index.php">Dịch vụ </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav "><?php  include('../../user/user.php'); ?></li>
                </ul>
            </div>
</nav>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="nav"><a href="khoa_cr.php">Thêm khoa mới ở đây</a> </li>
            </ul>
        </div>
</nav> 
<h1>Bảng thông tin các khoa</h1>
    <table class="table table-striped">
        <tr>
            <th>Tên Khoa</th>
            <th>Mô tả về khoa</th>
            <th>Số điện thoại của khoa</th>
            <th>Thành tựu của khoa</th>
            <th>Ảnh</th>
            <th>&nbsp;</th>
  	    </tr>
        <?php  
        $faculty_set = find_faculty();
        $count = mysqli_num_rows($faculty_set);
        for ($i = 0; $i < $count; $i++):
            $fac = mysqli_fetch_assoc($faculty_set); 

        ?>
            <tr>
                <td><?php echo $fac['Ten_khoa']; ?></td>
                <td><?php echo mb_strimwidth($fac['Mo_ta'],0,20,'...');?></td>
                <td><?php echo $fac['So_dien_thoai']; ?></td>
                <td><?php echo mb_strimwidth($fac['Thanh_tuu'],0,15,'...'); ?></td>
                <td><img src="<?php $anh = '../img/'.$fac['Anh']; echo $anh ?>" alt="..." style = "width:100px;height:100px"></td>
                <td><a href="<?php echo 'link.php?id='.$fac['Ma_khoa']; ?>">detail <span class="glyphicon glyphicon-eye-open"></a></td>
                
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($faculty_set);
        ?>
    </table>
    </div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </div>  
</body>
</html>

<?php
db_disconnect($db);
?>