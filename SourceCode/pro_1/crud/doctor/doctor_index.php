<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>doctor</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <style>
    tr.a{
        background color: black;
    }
    </style>
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
                    <li class="nav active"><a href="../doctor/doctor_index.php">Bác sĩ </a></li>
                    <li class="nav "><a href="../khoa/faculty_index.php">Khoa </a></li>
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
                <li class="nav"><a href="doctor_cr.php">Thêm bác sĩ mới ở đây</a></li>
            </ul>
        </div>
</nav> 
    <h1>Bảng thông tin của bác sĩ</h1>
    <table class="table table-striped">
        <tr class="a">
            <th>Tên bác sĩ</th>
            <th>Giới tính</th>
            <th>Ngày tháng năm sinh</th>
            <th>Địa chỉ email</th>
            <th>Chuyên ngành</th>
            <th>Bằng cấp</th>
            <th>Địa chỉ nhà</th>
            <th>Số điện thoại</th>
            <th>Số năm kinh nghiêm</th>
            <th>Ảnh</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $doctor_set = find_all_doc();
        $count = mysqli_num_rows($doctor_set);
        for ($i = 0; $i < $count; $i++):
            $doc = mysqli_fetch_assoc($doctor_set); 

        ?>
            <tr>
                <td><?php echo $doc['Ten']; ?></td>
                <td><?php echo $doc['Gioi_tinh']; ?></td>
                <td><?php echo $doc['Ngay_sinh']; ?></td>
                <td><?php echo $doc['Email']; ?></td>
                <td><?php echo $doc['Ten_khoa']; ?></td>
                <td><?php echo $doc['Bang_cap']; ?></td>
                <td><?php echo $doc['Dia_chi']; ?></td>
                <td><?php echo $doc['So_dien_thoai']; ?></td>
                <td><?php echo $doc['Nam_kinh_nghiem']; ?></td>
                <td><img src="<?php $anh = '../img/'.$doc['Anh']; echo $anh ?>" alt="..." style = "width:100px;height:100px"></td>
                <td><a href="<?php echo 'doctor_edit.php?id='.$doc['Ma_bac_si']; ?>">Edit<span class="glyphicon glyphicon-pencil"></a></td>
                <td><a href="<?php echo 'doctor_delete.php?id='.$doc['Ma_bac_si']; ?>">Delete<span class="glyphicon glyphicon-trash"></a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($doctor_set);
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