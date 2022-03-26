<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_co_so_vat_chat($_POST['id']);
    redirect_to('co_so_vat_chat_index.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('co_so_vat_chat_index.php');
    }
    $co_so_vat_chatID = $_GET['id'];
    $doc = find_co_so_vat_chat_id($co_so_vat_chatID);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Xóa thiết bị</title>
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
                <li class="nav"><a href="co_so_vat_chat_index.php">Quay lại thông tin thiết bị</a></li>
            </ul>
        </div>
    </nav> 
    <h1>Xóa thiết bị</h1>
    <h2>Bạn có chắc chắn muốn xóa thiết bị này?</h2>
    <p><span class="a">Tên thiết bị: </span><?php echo $doc['Ten_thiet_bi']; ?></p>
    <p><span class="a">Giá: </span><?php echo $doc['Gia']; ?></p>
    <p><span class="a">Số lượng: </span><?php echo $doc['So_luong']; ?></p>
    <p><span class="a">Ngày nhập: </span><?php echo $doc['Ngay_nhap']; ?></p>
    <p><span class="a">Ngày bảo dưỡng: </span><?php echo $doc['Ngay_bao_duong']; ?></p>
    <p><span class="a">Tình trạng: </span><?php echo $doc['Tinh_trang']; ?></p>
    <p><span class="a">Khoa: </span><?php echo $doc['Tinh_trang']; ?></p>
    <p><span class="a">Khoa: </span><?php echo $doc['Ten_khoa']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $doc['Ma_thiet_bi']; ?>" >
     
        <input type="submit" name="submit" class="btn btn-primary" value="Xóa thiết bị">
     
    </form>
    
    <br> 
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </div>
</body>
</html>


<?php
db_disconnect($db);
?>