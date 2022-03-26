<?php 
require_once('../../database/database.php');
require_once('../../session/initalize.php');
$error = ['ten'=>'',
          'bangcap'=>'',
          'sdt' =>'',
          'diachi'=>'',
          'dob'=>'',
          'exp'=>'',
          'email'=>'',
          'anh' =>''
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
      $error['ten'] = 'Ten bac si khong duoc trong';
    }
    if(empty($_POST['dob'])){
      $error['dob'] = 'Ngay sinh khong duoc trong';
    }
    if(empty($_POST['bangcap'])){
        $error['bangcap'] = 'Bang cap khong duoc trong';
    }
    if(empty($_POST['diachi'])){
        $error['diachi'] = 'Dia chi khong duoc trong';
    }
    if(empty($_POST['exp'])){
        $error['exp'] = 'Kinh nghiem khong duoc trong';
    }
    if(($_POST['exp']<0)){
        $error['exp'] = 'Kinh nghiem phai lon hon 0 nam';
    }
    if(empty($_POST['email'])){
        $error['email'] = 'Dia chi email khong duoc trong';
    }
    if(empty($_POST['sdt'])){
        $error['sdt'] = 'So dien thoai khong duoc trong';
    }
    if(!is_numeric($_POST['sdt'])){
        $error['sdt'] = 'So dien thoai phai la so';
    }
    if(!empty($_POST['sdt'])&&(strlen($_POST['sdt'])!=10)){
        $error['sdt'] = ' So dien thoai phai co 10 so';
    }
    if(!empty($_POST['sdt'])&&($_POST['sdt']<0)){
        $error['sdt'] = 'So dien thoai phai lon hon 0';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Doctor</title>
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
<h1>Thêm bác sĩ</h1>
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
        <label for="ten">Tên bác sĩ:</label>
        <br>
        <input type="text" id="ten" name="ten"  class="form-control" 
        value="<?php echo empty($_POST['ten'])? '': $_POST['ten'] ?>">
        </div>

        <div class="form-group">
        <label for="dob">Ngày tháng năm sinh:</label>
        <br>
        <input type="date" id="dob" name="dob"  class="form-control" 
        value="<?php echo empty($_POST['dob'])? '': $_POST['dob'] ?>">
        </div>

        <div class="form-group">
        <label for="email">Địa chỉ email:</label>
        <br>
        <input type="text" id="email" name="email"  class="form-control" 
        value="<?php echo empty($_POST['email'])? '': $_POST['email'] ?>">
        </div>

        <div class="form-group">
        <label for="Ma_khoa">Khoa:</lable>
        <br>
        <select name="Ma_khoa" class="form-control" >
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
        <label for="bangcap">Bằng cấp:</label>
        <br>
        <input type="text" id="bangcap" name="bangcap"  class="form-control" 
        value="<?php echo empty($_POST['bangcap'])? '': $_POST['bangcap'] ?>">
        </div>

        <div class="form-group">
        <label for="diachi">Địa chỉ nhà:</label>
        <br>
        <input type="text" id="diachi" name="diachi"  class="form-control" 
        value="<?php echo empty($_POST['diachi'])? '': $_POST['diachi'] ?>">
        </div>

        <div class="form-group">
        <label for="sdt">Số điện thoại:</label
        ><br>
        <input type="text" id="sdt" name="sdt"  class="form-control" 
        value="<?php echo empty($_POST['sdt'])? '': $_POST['sdt'] ?>">
        </div>

        <div class="form-group">
        <label for="exp">Số năm kinh nghiệm:</label>
        <br>
        <input type="number" id="exp" name="exp"  class="form-control" 
        value="<?php echo empty($_POST['exp'])? '': $_POST['exp'] ?>">
        </div>

        <div class="form-group">
        <label for="gioitinh">Giới tính:</label>
        <br>
        <select id="select" name="select"class="form-control" >
            <option value="Nam"<?php if(!empty($_POST['select']) && $_POST['select'] == 'Nam') echo 'selected';?>
            >Nam</option>
            <option value="Nữ"<?php if(!empty($_POST['select']) && $_POST['select'] == 'Nữ') echo 'selected';?>
            >Nữ</option>
            <option value="Khác"<?php if(!empty($_POST['select']) && $_POST['select'] == 'Khác') echo 'selected';?>
            >Khác</option>
        </select>
        </div>

        <div class="form-group">
        <label for="anh">Ảnh:</label
        ><br>
        <input type="file" id="anh" name="anh"  class="form-control" value="">
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $doc = [];
        $doc['Ten'] = $_POST['ten'];
        $doc['Gioi_tinh'] = $_POST['select'];
        $doc['Ngay_sinh'] = $_POST['dob'];
        $doc['So_dien_thoai'] = $_POST['sdt'];
        $doc['Bang_cap'] = $_POST['bangcap'];
        $doc['Nam_kinh_nghiem'] = $_POST['exp'];
        $doc['Dia_chi'] = $_POST['diachi'];
        $doc['Email']  = $_POST['email'];
        $doc['Anh']  = $_POST['anh'];
        $doc['Ma_khoa']  = $_POST['Ma_khoa'];
        $result = insert_doctor($doc);
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
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>
<?php
db_disconnect($db);
?>




