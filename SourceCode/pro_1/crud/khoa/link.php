<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    delete_faculty($_POST['id']);
    redirect_to('faculty_index.php');
} else {
    if(!isset($_GET['id'])) {
        redirect_to('faculty_index.php');
    }
    $facultyid = $_GET['id'];
    $fac = find_faculty_id($facultyid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>faculty information</title>
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
                <li class="nav"><a href="faculty_index.php">Xem thông tin các khoa</a> </li>
            </ul>
        </div>
    </nav> 
<h1>Thông tin chi tiết của khoa</h1>
    <p><span class="a">Tên khoa: </span><?php echo $fac['Ten_khoa']; ?></p>
    <p><span class="a">Mô tả về khoa: </span><?php echo $fac['Mo_ta']; ?></p>
    <p><span class="a">Thành tựu của khoa: </span><?php echo $fac['Thanh_tuu']; ?></p>
    <p><span class="a">Số điện thoại: </span><?php echo $fac['So_dien_thoai']; ?></p>
    <p><img src="<?php $anh = '../img/'.$fac['Anh']; echo $anh ?>" alt="..." style = "width:100px;height:100px"></p>
    <td><a href="<?php echo 'faculty_edit.php?id='.$fac['Ma_khoa']; ?>">Edit <span class="glyphicon glyphicon-pencil"></a></td>
    
    <td><a href="<?php echo 'faculty_delete.php?id='.$fac['Ma_khoa']; ?>">Delete <span class="glyphicon glyphicon-trash"></a></td><br><br> 
    
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    </div>
</body>
</html>


<?php
db_disconnect($db);
?>