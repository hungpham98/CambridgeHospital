<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_service($_POST['id']);
    redirect_to('service_index.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('service_index.php');
    }
    $serviceid = $_GET['id'];
    $ser = find_service_id($serviceid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Delete service</title>
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
                <li class="nav"><a href="service_index.php">Xem thông tin các dịch vụ</a> </li>
            </ul>
        </div>
</nav> 
    <h1>Xóa Dịch vụ</h1>
    <h2>Bạn có chắc chắn muốn xóa Dịch vụ này?</h2>
    <p><span class="a">Tên dịch vu: </span><?php echo $ser['Ten_dich_vu']; ?></p>
    <p><span class="a">giá: </span><?php echo $ser['Gia']; ?></p>
    <p><span class="a">Số giờ thực hiện: </span><?php echo $ser['Thoi_gian_thuc_hien']; ?></p>
    <p><span class="a">Khoa: </span><?php echo $ser['Ten_khoa']; ?></p>
    <p><span class="a">Ảnh: </span><img src="<?php $anh = '../img/'.$ser['Anh']; echo $anh ?>" alt="..." style = "width:100px;height:100px"></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" value="<?php echo $ser['Ma_dich_vu']; ?>" >
     
        <input type="submit" name="submit" class="btn btn-primary" value="Delete Service">
        <br><br>
    </form>
    
    </div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>