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
    if(empty($_POST['Ten_thiet_bi'])){
        $error['Ten_thiet_bi'] = 'Ten thiet bi khong duoc trong';
      }
      if(empty($_POST['Gia'])){
        $error['Gia'] = 'Gia khong duoc trong';
      }
      if(($_POST['Gia'] <0)){
          $error['Gia'] = 'Gia phai lon hon 0';
      }
      if(empty($_POST['So_luong'])){
          $error['So_luong'] = 'So luong khong duoc trong';
      }
      if(($_POST['So_luong'] <0)){
        $error['So_luong'] = 'So luong phai lon hon 0';
      }
      if(empty($_POST['Ngay_nhap'])){
          $error['Ngay_nhap'] = 'Ngay nhap khong duoc trong';
      }
      if(($_POST['Ngay_nhap'] <0)){
        $error['Ngay_nhap'] = 'Ngay nhap phai lon hon 0';
      }
      if(empty($_POST['Ngay_bao_duong'])){
          $error['Ngay_bao_duong'] = 'Ngay bao duong khong duoc trong';
      }
      if(($_POST['Ngay_bao_duong'] <0)){
        $error['Ngay_bao_duong'] = 'Ngay bao duong phai lon hon 0';
      }
      if(empty($_POST['Tinh_trang'])){
          $error['Tinh_trang'] = 'Tinh trang khong duoc trong';
      }
    }    

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $doc = [];
        $doc['Ma_thiet_bi'] = $_POST['id'];
        $doc['Ten_thiet_bi'] = $_POST['Ten_thiet_bi'];
        $doc['Gia'] = $_POST['Gia'];
        $doc['So_luong'] = $_POST['So_luong'];
        $doc['Ngay_nhap'] = $_POST['Ngay_nhap'];
        $doc['Ngay_bao_duong'] = $_POST['Ngay_bao_duong'];
        $doc['Tinh_trang'] = $_POST['Tinh_trang'];
        $doc['Ma_khoa'] = $_POST['Ma_khoa'];

        update_co_so_vat_chat($doc);
        redirect_to('co_so_vat_chat_index.php');
    }
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('co_so_vat_chat_index.php');
    }
    $co_so_vat_chatid = $_GET['id'];
    $doc = find_co_so_vat_chat_id($co_so_vat_chatid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>csvc</title>
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
            <li class="nav"><a href="co_so_vat_chat_index.php">Quay lại danh sách thiết bị</a></li>
        </ul>
    </div>
</nav> 
    <h1>Chỉnh sửa thông tin cơ sở vật chất</h1>
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
        value="<?php echo isFormValidated()? $doc['Ma_thiet_bi']: $_POST['id'] ?>" >
        <div class="form-group">
        <label for="Ten_thiet_bi">Tên thiết bị:</label>
        <br>
        <input type="text" id="Ten_thiet_bi" name="Ten_thiet_bi"  class="form-control"
        value="<?php echo isFormValidated()? $doc['Ten_thiet_bi']: $_POST['Ten_thiet_bi'] ?>">
        </div>

        <div class="form-group">
        <label for="Gia">Giá:</label>
        <br>
        <input type="text" id="Gia" name="Gia"  class="form-control"
        value="<?php echo isFormValidated()? $doc['Gia']: $_POST['Gia'] ?>">
        </div>

        <div class="form-group">
        <label for="So_luong">Số lượng:</label>
        <br>
        <input type="number" id="So_luong" name="So_luong"  class="form-control"
        value="<?php echo isFormValidated()? $doc['So_luong']: $_POST['So_luong'] ?>">
        </div>

        <div class="form-group">
        <label for="Ngay_nhap">Ngày nhập:</label>
        <br>
        <input type="date" id="Ngay_nhap" name="Ngay_nhap"  class="form-control"
        value="<?php echo isFormValidated()?  date('Y-m-d',strtotime($doc["Ngay_nhap"])) : $_POST['Ngay_nhap'] ?>">
        </div>

        <div class="form-group">
        <label for="Ngay_bao_duong">Ngày bảo dưỡng:</label>
        <br>
        <input type="date" id="Ngay_bao_duong" name="Ngay_bao_duong"  class="form-control"
        value="<?php echo isFormValidated()? date('Y-m-d',strtotime($doc["Ngay_bao_duong"])) : $_POST['Ngay_bao_duong'] ?>">
        </div>

        <div class="form-group">
        <label for="Tinh_trang">Tình trạng:</label>
        <select id="Tinh_trang" name="Tinh_trang" class="form-control">
            <option value="Mới"<?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($doc['Tinh_trang']=='Mới') echo 'selected'; 
            }else{
                if($doc['Tinh_trang']==$_POST['select']) echo 'selected';
            }?>
            >Mới</option>
            <option value="Cũ"<?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($doc['Tinh_trang']=='Cũ') echo 'selected'; 
            }else{
                if($doc['Tinh_trang']==$_POST['select']) echo 'selected';
            }?>
            >Cũ</option>
            <option value="Đang sửa"<?php if($_SERVER["REQUEST_METHOD"] == 'GET'){
                if($doc['Tinh_trang']=='Đang sửa') echo 'selected'; 
            }else{
                if($doc['Tinh_trang']==$_POST['select']) echo 'selected';
            }?>
            >Đang sửa</option>
        </select>
        </div>
        <div class="form-group">
        <label for="Ma_khoa">Khoa:</lable>
        <select name="Ma_khoa" class="form-control">
        <?php
            $list = find_co_so_vat_chat();
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
        <br>
        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        <input type="reset" name="reset" class="btn btn-primary" value="Reset">
        
    </form>
    </div> 
    <br><br>
     
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>