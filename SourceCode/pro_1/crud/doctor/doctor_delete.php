<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_doctor($_POST['id']);
    redirect_to('doctor_index.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('doctor_index.php');
    }
    $doctorID = $_GET['id'];
    $doc = find_doctor_id($doctorID);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete doctor</title>
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
                <li class="nav"><a href="doctor_index.php">Xem thông tin các bác sĩ</a> </li>
            </ul>
        </div>
</nav> 
    <h1>Xóa bác sĩ</h1>
    <h2>Bạn có chắc chắn muốn xóa bác sĩ này?</h2>
    <p><span class="a">Tên bác sĩ: </span><?php echo $doc['Ten']; ?></p>
    <p><span class="a">Giới tính: </span><?php echo $doc['Gioi_tinh']; ?></p>
    <p><span class="a">Ngày tháng năm sinh: </span><?php echo $doc['Ngay_sinh']; ?></p>
    <p><span class="a">Địa chỉ email: </span><?php echo $doc['Email']; ?></p>
    <p><span class="a">Khoa: </span><?php echo $doc['Ten_khoa']; ?></p>
    <p><span class="a">Bằng cấp: </span><?php echo $doc['Bang_cap']; ?></p>
    <p><span class="a">Địa chỉ nhà: </span><?php echo $doc['Dia_chi']; ?></p>
    <p><span class="a">Số điện thoại: </span><?php echo $doc['So_dien_thoai']; ?></p>
    <p><span class="a">Ảnh: </span><img src="<?php $anh = '../img/'.$doc['Anh']; echo $anh ?>" alt="..." style = "width:100px;height:100px"></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $doc['Ma_bac_si']; ?>" >
     
        <input type="submit" name="submit" class="btn btn-primary" value="Delete doctor">
    </form>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</div>
</body>
</html>


<?php
db_disconnect($db);
?>