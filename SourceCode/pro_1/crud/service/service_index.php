<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Service</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
<div class="container">
    <?php //include('../nav/nav.php'); ?>
    <nav>
    <h3>Cambridge Hospital staff</h3>
    </nav>
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav navbar-left">
                    <li class="nav"><a href="../../index.php" >Main Menu</a></li>
                    <li class="nav "><a href="../admin/admin_index.php" >Admin</a></li>
                    <li class="nav "><a href="../doctor/doctor_index.php">Bác sĩ </a></li>
                    <li class="nav "><a href="../khoa/faculty_index.php">Khoa </a></li>
                    <li class="nav "><a href="../csvc/co_so_vat_chat_index.php">Cơ sở vật chất </a></li>
                    <li class="nav active"><a href="../service/service_index.php">Dịch vụ </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav "><?php  include('../../user/user.php'); ?></li>
                </ul>
            </div>
</nav>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="nav"><a href="service_cr.php">Thêm dịch vụ mới ở đây</a> </li>
            </ul>
        </div>
</nav> 
<h1>Bảng thông tin các dịch vụ</h1>
    <table class="table table-striped">
        <tr>
            <th>Tên dịch vụ</th>
            <th>Giá</th>
            <th>Số giờ thực hiện</th>
            <th>Khoa </th>
            <th>Ảnh </th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $service_set = find_service();
        $count = mysqli_num_rows($service_set);
        for ($i = 0; $i < $count; $i++):
            $ser = mysqli_fetch_assoc($service_set); 

        ?>
            <tr>
                <td><?php echo $ser['Ten_dich_vu']; ?></td>
                <td><?php echo $ser['Gia']; ?></td>
                <td><?php echo $ser['Thoi_gian_thuc_hien']; ?></td>
                <td><?php echo $ser['Ten_khoa']; ?></td>
                <td><img src="<?php $anh = '../img/'.$ser['Anh']; echo $anh ?>" alt="..." style = "width:100px;height:100px"></td>
                <td><a href="<?php echo 'service_edit.php?id='.$ser['Ma_dich_vu']; ?>">Edit<span class="glyphicon glyphicon-pencil"></a></td>
                <td><a href="<?php echo 'service_delete.php?id='.$ser['Ma_dich_vu']; ?>">Delete<span class="glyphicon glyphicon-trash"></a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($service_set);
        ?>
    </table>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </div>
</body>
</html>

<?php
db_disconnect($db);
?>