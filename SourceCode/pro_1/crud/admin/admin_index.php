<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>admin</title>
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
                    <li class="nav active"><a href="../admin/admin_index.php" >Admin</a></li>
                    <li class="nav "><a href="../doctor/doctor_index.php">Bác sĩ </a></li>
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
                <li class="nav"><a href="admin_cr.php">Thêm admin ở đây</a> </li>
            </ul>
        </div>
    </nav> 
    <h1>Bảng thông tin của admin</h1>
    <table class="table table-striped">
        <tr>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
  	    </tr>

        <?php  
        $admin_set = find_admin();
        $count = mysqli_num_rows($admin_set);
        for ($i = 0; $i < $count; $i++):
            $doc = mysqli_fetch_assoc($admin_set); 

        ?>
            <tr>
                <td><?php echo $doc['Ten_dang_nhap']; ?></td>
                <td><?php echo $doc['Mat_khau']; ?></td>
                <td><?php echo $doc['Ho_va_ten']; ?></td>
                <td><?php echo $doc['Email']; ?></td>
                <td><a href="<?php echo 'admin_edit.php?id='.$doc['Ma_admin']; ?>">Edit <span class="glyphicon glyphicon-pencil"></a></td>
                <td><a href="<?php echo 'admin_delete.php?id='.$doc['Ma_admin']; ?>">Delete <span class="glyphicon glyphicon-trash"></a></td>
            </tr>
        <?php 
        endfor; 
        mysqli_free_result($admin_set);
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