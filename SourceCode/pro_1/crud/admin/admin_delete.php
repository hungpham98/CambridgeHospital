<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_admin($_POST['id']);
    redirect_to('admin_index.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('admin_index.php');
    }
    $adminID = $_GET['id'];
    $doc = find_admin_id($adminID);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Xóa admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <style>
        .a {
            font-weight: bold;
            font-size: large;
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
                <li class="nav"><a href="admin_index.php">Quay lại thông tin Admin</a></li>
            </ul>
        </div>
    </nav> 
    <h1>Xóa admin</h1>
    <h2>Bạn có chắc chắn muốn xóa tài khoản?</h2>
    <p><span class="a">Tên tài khoản: </span><?php echo $doc['Ten_dang_nhap']; ?></p>
    <p><span class="a">Mật khẩu: </span><?php echo $doc['Mat_khau']; ?></p>
    <p><span class="a">Họ và tên: </span><?php echo $doc['Ho_va_ten']; ?></p>
    <p><span class="a">Email: </span><?php echo $doc['Email']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $doc['Ma_admin']; ?>" >
     
        <input type="submit" class="btn btn-primary" name="submit" value="xóa tài khoản">
     
    </form>
    </div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>