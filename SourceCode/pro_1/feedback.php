<?php
   require_once('database/database.php');
   $error = ['Ten_khach_hang'=>'',
          'So_dien_thoai'=>'',
          'Noi_dung' =>'',
        ];
function isFormValidated(){
    global $error;
    foreach ($error as $value){
        if (!empty($value)) return false;
    }
    return true;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['Ten_khach_hang'])){
      $error['Ten_khach_hang'] = 'Ten khach hang khong duoc trong';
    }
    if(empty($_POST['So_dien_thoai'])){
      $error['So_dien_thoai'] = 'So dien thoai khong duoc trong';
    }
    if(empty($_POST['Noi_dung'])){
        $error['Noi_dung'] = 'Noi dung khong duoc trong';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
        #doc{
        background:rgb(173 ,216 ,230);
    };
    #filtersubmit {
    position: relative;
    z-index: 1;
    left: -25px;
    top: 1px;
    color: #7B7B7B;
    cursor:pointer;
    width: 0;
    };
    .white{
        color: white;
    }
    </style>
</head>
<body>
<div >    
    <nav>
    <div>
    <img src="crud/img/logo4.jpg" alt="..." style = "width:60%; height:60%">
    </div > 
    </nav>
    <div class="row">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-left" >
                <li class="nav "><a href="welcom.php"><span class="fa fa-home" style="font-size:25px;padding: 15px;"> Trang chủ</a></li>
                <li class="nav "><a href="doctor.php"><span class="fa fa-user-md" style="font-size:25px;padding: 15px;"> Bác sĩ </a></li>
                <li class="nav "><a href="faculty.php"><span class="fa fa-hospital-o" style="font-size:25px;padding: 15px;"> Khoa </a></li>
                <li class="nav "><a href="service.php"><span class="fa fa-ambulance" style="font-size:25px;padding: 15px;"> Dịch vụ </a></li>
                <li class="nav "><a href="feedback.php"><span class="glyphicon glyphicon-floppy-disk" style="font-size:25px;padding: 15px;"> Feedback </a></li>
            </ul>
            <form class="navbar-form navbar-right" style="padding:15px;">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
                </button>
                </div>
            </div>
            </form>
        </div>
    </nav> 
    </div>
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
        <label for="Ten_khach_hang">Tên khách hàng:</label>
        <br>
        <input type="text" id="Ten_khach_hang" name="Ten_khach_hang"  class="form-control"
        value="">
        </div>

        <div class="form-group">
        <label for="So_dien_thoai">Số điện thoại:</label>
        <br>
        <input type="number" id="So_dien_thoai" name="So_dien_thoai"  class="form-control"
        value="">
        </div>

        <div class="form-group">
        <label for="Ma_khoa">Khoa:</lable>
        <select name="Ma_khoa" class="form-control">
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
        <label for="Noi_dung">Nội dung:</label>
        <br>
        <input type="text-area" id="Noi_dung" name="Noi_dung"  class="form-control"
        value="">
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        <br><br>
        
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?> 
        <?php 
        $doc = [];
        $doc['Ten_khach_hang'] = $_POST['Ten_khach_hang'];
        $doc['So_dien_thoai'] = $_POST['So_dien_thoai'];
        $doc['Ma_khoa'] = $_POST['Ma_khoa'];
        $doc['Noi_dung'] = $_POST['Noi_dung'];
        $result = insert_feedback($doc);
        $newsubid = mysqli_insert_id($db);
        ?>
        <h2>Nội dung của bạn đã được chúng tôi ghi nhận</h2>
    <?php endif; ?>
    </div>   
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>