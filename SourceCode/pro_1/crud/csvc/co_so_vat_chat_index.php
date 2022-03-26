<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>csvc</title>
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
                    <li class="nav active"><a href="../csvc/co_so_vat_chat_index.php">Cơ sở vật chất </a></li>
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
                <li class="nav"><a href="co_so_vat_chat_cr.php">Thêm cơ sở vật chất mới ở đây</a> </li>
            </ul>
        </div>
    </nav> 
    <h1>Bảng thông tin thiết bị</h1>
    <table class="table table-striped">
        <tr>
            <th>Tên thiết bị</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Ngày nhập</th>
            <th>Ngày bảo dưỡng</th>
            <th>Tình trạng</th>
            <th>Khoa</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $co_so_vat_chat_set = find_co_so_vat_chat();
        $count = mysqli_num_rows($co_so_vat_chat_set);
        for ($i = 0; $i < $count; $i++):
            $doc = mysqli_fetch_assoc($co_so_vat_chat_set); 

        ?>
            <tr>
                <td><?php echo $doc['Ten_thiet_bi']; ?></td>
                <td><?php echo $doc['Gia']; ?></td>
                <td><?php echo $doc['So_luong']; ?></td>
                <td><?php echo $doc['Ngay_nhap']; ?></td>
                <td><?php echo $doc['Ngay_bao_duong']; ?></td>
                <td><?php echo $doc['Tinh_trang']; ?></td>
                <td><?php echo $doc['Ten_khoa']; ?></td>
                <td><a href="<?php echo 'co_so_vat_chat_edit.php?id='.$doc['Ma_thiet_bi']; ?>">Edit <span class="glyphicon glyphicon-pencil"></a></td>
                <td><a href="<?php echo 'co_so_vat_chat_delete.php?id='.$doc['Ma_thiet_bi']; ?>">Delete <span class="glyphicon glyphicon-trash"></a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($co_so_vat_chat_set);
        ?>
    </table>
    
    </div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>

<?php
db_disconnect($db);
?>