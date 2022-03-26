<?php 
require_once('../../database/database.php');
require_once('../../session/initalize.php');
$error = ['ten'=>'',
          'mota'=>'',
          'sdt' =>'',
          'thanhtuu'=>'',
          'anh'=>''
        ];
function isFormValidated(){
    global $error;
    foreach ($error as $value){
        if (!empty($value)) return false;
    }
    return true;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['ten'])){
      $error['ten'] = 'Ten Khoa khong duoc trong';
    }
    if(empty($_POST['mota'])){
      $error['mota'] = 'Mo ta ve khoa khong duoc trong';
    }
    if(empty($_POST['sdt'])){
        $error['sdt'] = 'So dien thoai cua khoa khong duoc trong';
    }
    if(!empty($_POST['sdt'])&&!is_numeric($_POST['sdt'])){
        $error['sdt'] = 'So dien thoai phai la so';
    }
    elseif(!empty($_POST['sdt'])&&strlen($_POST['sdt'])!=10){
        $error['sdt'] = ' So dien thoai phai co 10 so';
    }
    if(empty($_POST['thanhtuu'])){
        $error['thanhtuu'] = 'Thanh tuu cua khoa khong duoc trong';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>faculty</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <style>
        .error {
            color: #FF0000;
        }
        div.error{
            border: thin solid red; 
            display: inline-block;
            padding: 5px;
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
<h1>Thêm khoa mới</h1>
<?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Please fix the following errors </span>
            <ul>
                <?php
                foreach ($error as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div><br><br>
    <?php endif; ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
        <label for="ten">Tên khoa:</label><br>
        <input type="text" id="ten" name="ten"   class="form-control" 
        value="<?php echo empty($_POST['ten'])? '': $_POST['ten'] ?>">
        </div>
        <div class="form-group form-group-lg">
        <label for="mota">Mô tả về khoa:</label><br>
        <input type="text-area" id="mota" name="mota"   class="form-control" 
        value="<?php echo empty($_POST['mota'])? '': $_POST['mota'] ?>">
        </div>
        <div class="form-group form-group-lg">
        <label for="thanhtuu">Thành tựu của khoa:</label><br>
        <input type="text-area" id="thanhtuu" name="thanhtuu"   class="form-control" 
        value="<?php echo empty($_POST['thanhtuu'])? '': $_POST['thanhtuu'] ?>">
        </div>
        <div class="form-group">
        <label for="sdt">Số điện thoại của khoa:</label><br>
        <input type="number" id="sdt" name="sdt"   class="form-control" 
        value="<?php echo empty($_POST['sdt'])? '': $_POST['sdt'] ?>">
        </div>
        <div class="form-group">
        <label for="anh">Ảnh:</label
        ><br>
        <input type="file" id="anh" name="anh"  class="form-control" value="">
        </div>
        <input type="submit" name="submit"  class="btn btn-primary" value="Submit">
        <br><br>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $fac = [];
        $fac['Ten_khoa'] = $_POST['ten'];
        $fac['Mo_ta'] = $_POST['mota'];
        $fac['Thanh_tuu'] = $_POST['thanhtuu'];
        $fac['So_dien_thoai'] = $_POST['sdt'];
        $fac['Anh'] = $_POST['anh'];

        $result = insert_faculty($fac);
        $newsubid = mysqli_insert_id($db);
        ?>
        <h2>Success</h2>
        <ul>
        <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>
    <?php endif; ?>
    
    </div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
db_disconnect($db);
?>




