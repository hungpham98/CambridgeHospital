<?php
require_once('../../database/database.php');
require_once('../../session/initalize.php');

$error = [];

function isFormValidated(){
    global $error;
    return count($error) == 0;
}

function checkForm(){
    global $error;
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
      elseif(strlen($_POST['sdt'])!=10){
          $error['sdt'] = ' So dien thoai phai co 10 so';
      }
    }    

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $doc = [];
        $doc['Ma_bac_si'] = $_POST['id'];
        $doc['Ten'] = $_POST['ten'];
        $doc['Gioi_tinh'] = $_POST['select'];
        $doc['Ngay_sinh'] = $_POST['dob'];
        $doc['So_dien_thoai'] = $_POST['sdt'];
        $doc['Bang_cap'] = $_POST['bangcap'];
        $doc['Nam_kinh_nghiem'] = $_POST['exp'];
        $doc['Ma_khoa'] = $_POST['Ma_khoa'];
        $doc['Dia_chi'] = $_POST['diachi'];
        $doc['Email']  = $_POST['email'];
        $doc['Anh']  = $_POST['anh'];

        update_doctor($doc);
        redirect_to('doctor_index.php');
    }
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('doctor_index.php');
    }
    $doctorid = $_GET['id'];
    $doc = find_doctor_id($doctorid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit Doctor</title>
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
                <li class="nav"><a href="doctor_index.php">Quay lại danh sách bác sĩ</a> </li>
            </ul>
        </div>
</nav> 
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
    <h1>Chỉnh sửa thông tin của bác sĩ</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="id" 
        value="<?php echo isFormValidated()? $doc['Ma_bac_si']: $_POST['id'] ?>" >
        
        <div class="form-group">
        <label for="ten">Tên bác sĩ:</label><br>
        <input type="text" id="ten" name="ten"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['Ten']: $_POST['ten'] ?>">
        </div>
        <div class="form-group">
        <label for="dob">Ngày tháng năm sinh:</label><br>
        <input type="text" id="dob" name="dob"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['Ngay_sinh']: $_POST['dob'] ?>">
        </div>
        <div class="form-group">
        <label for="email">Địa chỉ email:</label><br>
        <input type="text" id="email" name="email"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['Email']: $_POST['email'] ?>">
        </div>

        <div class="form-group">
        <label for="Ma_khoa">Khoa:</lable>
        <select name="Ma_khoa"class="form-control" >
        <?php
            $list = find_faculty();
            while($khoa = mysqli_fetch_assoc($list)){
        ?>
            <option value="<?php echo $khoa['Ma_khoa'];?>" <?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($khoa['Ma_khoa']==$doc['Ma_khoa']) echo 'selected'; 
            }else{
                if($khoa['Ma_khoa']==$_POST['Ma_khoa']) echo 'selected';
            } 
            ?>>
                <?php echo $khoa['Ten_khoa'];?>
            </option>
        <?php 
            }
        ?>
        </select>
        </div>

        <div class="form-group">
        <label for="bangcap">Bằng cấp:</label><br>
        <input type="text" id="bangcap" name="bangcap"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['Bang_cap']: $_POST['bangcap'] ?>">
        </div>
        <div class="form-group">
        <label for="diachi">Địa chỉ nhà:</label><br>
        <input type="text" id="diachi" name="diachi"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['Dia_chi']: $_POST['diachi'] ?>">
        </div>
        <div class="form-group">
        <label for="sdt">Số điện thoại:</label><br>
        <input type="text" id="sdt" name="sdt"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['So_dien_thoai']: $_POST['sdt'] ?>">
        </div>
        <div class="form-group">
        <label for="exp">Số năm kinh nghiệm:</label><br>
        <input type="number" id="exp" name="exp"  class="form-control" 
        value="<?php echo isFormValidated()? $doc['Nam_kinh_nghiem']: $_POST['exp'] ?>">
        </div>
        <div class="form-group">
        <label for="gioitinh">Giới tính:</label><br>
        <select id="select" name="select"class="form-control" >
            <option value="Nam" <?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($doc['Gioi_tinh']=='Nam') echo 'selected'; 
            }else{
                if($doc['Gioi_tinh']==$_POST['select']) echo 'selected';
            }?>
            >Nam</option>
            <option value="Nữ" <?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($doc['Gioi_tinh']=='Nữ') echo 'selected'; 
            }else{
                if($doc['Gioi_tinh']==$_POST['select']) echo 'selected';
            }?>
            >Nữ</option>
            <option value="Khác" <?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($doc['Gioi_tinh']=='Khác') echo 'selected'; 
            }else{
                if($doc['Gioi_tinh']==$_POST['select']) echo 'selected';
            }?>
            >Khác</option>
        </select>
        </div>
        <div class="form-group">
        <label for="anh">Ảnh:</label
        ><br>
        <input type="file" id="anh" name="anh"  class="form-control" value="">
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        <input type="reset" class="btn btn-primary" name="reset" value="Reset">
        <br>
        
    </form>
    
    

    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>