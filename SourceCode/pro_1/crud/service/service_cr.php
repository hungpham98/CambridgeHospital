<?php 
require_once('../../database/database.php');
require_once('../../session/initalize.php');
$error = ['ten'=>'',
          'gia'=>'',
          'time' =>'',
          'Khoa'=>'',
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
      $error['ten'] = 'Ten dich vu khong duoc trong';
    }
    if(empty($_POST['gia'])){
      $error['gia'] = 'Gia dich vu khong duoc trong';
    }
    if(!empty($_POST['gia'])&&!is_numeric($_POST['gia'])){
        $error['gia'] = 'Gia dich vu phai la so';
    }
    if(!empty($_POST['gia'])&&($_POST['gia']<0)){
        $error['gia'] = 'Gia dich vu phai lon hon 0';
    }
    if(empty($_POST['time'])){
        $error['time'] = 'So gio thuc hien khong duoc trong';
    }
    if(!empty($_POST['time'])&&!is_numeric($_POST['time'])){
        $error['time'] = 'So gio thuc hien phai la so';
    }
    if(!empty($_POST['time'])&&($_POST['time']<0)){
        $error['time'] = 'So gio thuc hien phai lon hon 0';
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
<h1>Thêm dịch vụ mới</h1>
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
        <label for="ten">Tên dịch vụ:</label><br>
        <input type="text" id="ten" name="ten"  class="form-control" 
        value="<?php echo empty($_POST['ten'])? '': $_POST['ten'] ?>">
        </div>
        <div class="form-group">
        <label for="gia">Giá:</label><br>
        <input type="text" id="gia" name="gia"  class="form-control" 
        value="<?php echo empty($_POST['gia'])? '': $_POST['gia'] ?>">
        </div>
        <div class="form-group">
        <label for="time">số giờ thực hiện:</label><br>
        <input type="text" id="time" name="time"  class="form-control" 
        value="<?php echo empty($_POST['time'])? '': $_POST['time'] ?>">
        </div>
        <div class="form-group">
        <label for="Ma_khoa">Khoa:</lable>
        <select name="Ma_khoa"class="form-control" >
        <?php
            $list = find_faculty();
            while($khoa = mysqli_fetch_assoc($list)){
        ?>
            <option value="<?php echo $khoa['Ma_khoa'];?>" <?php if(!empty($_POST['Ma_khoa']) && $_POST['Ma_khoa'] == $khoa['Ma_khoa']) echo 'selected'; ?>>
                <?php echo $khoa['Ten_khoa'];?>
            </option>
        <?php 
            }
        ?>
        </select>
        </div>
        <div class="form-group">
        <label for="anh">Ảnh:</label
        ><br>
        <input type="file" id="anh" name="anh"  class="form-control" value="">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">

    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $ser = [];
        $ser['Ten_dich_vu'] = $_POST['ten'];
        $ser['Gia'] = $_POST['gia'];
        $ser['Thoi_gian_thuc_hien'] = $_POST['time'];
        $ser['Ma_khoa'] = $_POST['Ma_khoa'];
        $ser['Anh']  = $_POST['anh'];

        $result = insert_service($ser);
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




