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
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        checkForm();
        if (isFormValidated()){
            $fac = [];
            $fac['Ma_khoa'] = $_POST['id'];
            $fac['Ten_khoa'] = $_POST['ten'];
            $fac['Mo_ta'] = $_POST['mota'];
            $fac['So_dien_thoai'] = $_POST['sdt'];
            $fac['Thanh_tuu'] = $_POST['thanhtuu'];
            $fac['Anh'] = $_POST['anh'];
    
            update_faculty($fac);
            redirect_to('faculty_index.php');
        }
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
    <title>Edit faculty</title>
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
                <li class="nav"><a href="faculty_index.php">Quay lại danh sách khoa</a> </li>
            </ul>
        </div>
</nav> 
<h1>Chỉnh sửa thông tin của khoa</h1>
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
        <input type="hidden" name="id" 
        value="<?php echo isFormValidated()? $fac['Ma_khoa']: $_POST['id'] ?>" >
        

        <div class="form-group">
        <label for="ten">Tên Khoa:</label><br>
        <input type="text" id="ten" name="ten"   class="form-control" 
        value="<?php echo isFormValidated()? $fac['Ten_khoa']: $_POST['ten'] ?>">
        </div>

        <div class="form-group form-group-lg">
        <label for="mota">Mô tả về khoa:</label><br>
        <input type="text-area" id="mota" name="mota"   class="form-control" 
        value="<?php echo isFormValidated()? $fac['Mo_ta']: $_POST['mota'] ?>">
        </div>

        <div class="form-group">
        <label for="sdt">Số điện thoại:</label><br>
        <input type="number" id="sdt" name="sdt"   class="form-control" 
        value="<?php echo isFormValidated()? $fac['So_dien_thoai']: $_POST['sdt'] ?>">
        </div>

        <div class="form-group form-group-lg">
        <label for="thanhtuu">Thành tựu:</label><br>
        <input type="text-area" id="thanhtuu" name="thanhtuu"   class="form-control" 
        value="<?php echo isFormValidated()? $fac['Thanh_tuu']: $_POST['thanhtuu'] ?>">
        </div>

        <div class="form-group">
        <label for="anh">Ảnh:</label
        ><br>
        <input type="file" id="anh" name="anh"  class="form-control" value="">
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        <input type="reset" name="reset" class="btn btn-primary" value="Reset">
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