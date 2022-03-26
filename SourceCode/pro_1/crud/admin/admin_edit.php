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
    if(empty($_POST['Ten_dang_nhap'])){
        $error['Ten_dang_nhap'] = 'Ten dang nhap khong duoc trong';
      }
      if(empty($_POST['Mat_khau'])){
        $error['Mat_khau'] = 'Mat khau khong duoc trong';
      }
      if(empty($_POST['Ho_va_ten'])){
          $error['Ho_va_ten'] = 'Ho va ten khong duoc trong';
      }
      if(empty($_POST['Email'])){
          $error['Email'] = 'Email khong duoc trong';
      }
      
    }    

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    checkForm();
    if (isFormValidated()){
        $doc = [];
        $doc['Ma_admin'] = $_POST['id'];
        $doc['Ten_dang_nhap'] = $_POST['Ten_dang_nhap'];
        $doc['Mat_khau'] = sha1($_POST['Mat_khau']);
        $doc['Ho_va_ten'] = $_POST['Ho_va_ten'];
        $doc['Email'] = $_POST['Email'];
        update_admin($doc);
        redirect_to('admin_index.php');
    }
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('admin_index.php');
    }
    $adminid = $_GET['id'];
    $doc = find_admin_id($adminid);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Edit admin</title>
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
                    <li class="nav active"><a href="../admin/admin_index.php" >Admin</a></li>
                    <li class="nav "><a href="../doctor/doctor_index.php">Bác sĩ </a></li>
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
                <li class="nav"><a href="admin_index.php">Quay lại danh sách admin</a></li>
            </ul>
        </div>
</nav> 
<h1>Chỉnh sửa thông tin admin</h1>
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
        value="<?php echo isFormValidated()? $doc['Ma_admin']: $_POST['id'] ?>" >
        <br>
        <div class="form-group">
        <label for="Ten_dang_nhap">Tên đăng nhập:</label>
        <br>
        <input type="text" id="Ten_dang_nhap" name="Ten_dang_nhap"  class="form-control"
        value="<?php echo isFormValidated()? $doc['Ten_dang_nhap']: $_POST['Ten_dang_nhap'] ?>">
        </div> 
        
        <div class="form-group">
        <label for="Mat_khau">Mật khẩu mới:</label>
        <br>
        <input type="text" id="Mat_khau" name="Mat_khau"  class="form-control"
        value="">
        
        </div> 
        <div class="form-group">
        <label for="Ho_va_ten">Họ và tên:</label>
        <br>
        <input type="text" id="Ho_va_ten" name="Ho_va_ten"  class="form-control"
        value="<?php echo isFormValidated()? $doc['Ho_va_ten']: $_POST['Ho_va_ten'] ?>">
        
        </div> 
        <div class="form-group">
        <label for="Email">Email:</label>
        <br>
        <input type="text" id="Email" name="Email"  class="form-control"
        value="<?php echo isFormValidated()? $doc['Email']: $_POST['Email'] ?>">
        
        </div> 
        <br>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        <input type="reset" class="btn btn-primary" name="reset" value="Reset">
    </form>
    

    </div>
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>


<?php
db_disconnect($db);
?>