<?php 
require_once('../../database/database.php');
require_once('../../session/initalize.php');
$error = ['Ten_dang_nhap'=>'',
          'Mat_khau'=>'',
          'Ho_va_ten' =>'',
          'Email'=>'',
        ];
function isFormValidated(){
    global $error;
    foreach ($error as $value){
        if (!empty($value)) return false;
    }
    return true;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
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
        $error['Email'] = 'email khong duoc trong';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Admin</title>
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
                <li class="nav"><a href="admin_index.php">Xem thông tin Admin</a></li>
            </ul>
        </div>
    </nav> 
    <h1>Thêm admin</h1>
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
        <label for="Ten_dang_nhap">Tên đăng nhập:</label>
        <br>
        <input type="text" id="Ten_dang_nhap" name="Ten_dang_nhap" class="form-control" 
        value="<?php echo empty($_POST['Ten_dang_nhap'])? '': $_POST['Ten_dang_nhap'] ?>">
        </div>     
    <div class="form-group">
        <label for="Mat_khau">Mật khẩu:</label>
        <br>
        <input type="password" id="Mat_khau" name="Mat_khau"  class="form-control" 
        value="<?php echo empty($_POST['Mat_khau'])? '': $_POST['Mat_khau'] ?>">
    </div> 
        <div class="form-group"> 
        <label for="Ho_va_ten">Họ và tên:</label>
        <br>
        <input type="text" id="Ho_va_ten" name="Ho_va_ten"  class="form-control" 
        value="<?php echo empty($_POST['Ho_va_ten'])? '': $_POST['Ho_va_ten'] ?>">
    </div>     
        <div class="form-group">
        <label for="Email">Email:</label>
        <br>
        <input type="text" id="Email" name="Email"  class="form-control" 
        value="<?php echo empty($_POST['Email'])? '': $_POST['Email'] ?>">
    </div>     
        <br>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">

</form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $doc = [];
        $doc['Ten_dang_nhap'] = $_POST['Ten_dang_nhap'];
        $doc['Mat_khau'] = sha1($_POST['Mat_khau']);
        $doc['Ho_va_ten'] = $_POST['Ho_va_ten'];
        $doc['Email'] = $_POST['Email'];
        $result = insert_admin($doc);
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
</div>  
</body>
</html>
<?php
db_disconnect($db);
?>




