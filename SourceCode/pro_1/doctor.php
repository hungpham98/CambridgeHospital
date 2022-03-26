<?php
   require_once('database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bác sĩ</title>
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
    
    <br><br>
        <?php
            $doctor_set = find_doctor();
            $count = mysqli_num_rows($doctor_set);
                for ($i = 0; $i < $count; $i++):
            $doc = mysqli_fetch_assoc($doctor_set);
        ?>
        <div  id="doc" style="border-style: groove;border-width:2px;">
            <div class="row" style="font-size:20px;">
                <div class="col-md-4">
                    <ul >
                        <img src="<?php $anh = 'crud/img/'.$doc['Anh']; echo $anh ?>" alt="..." style = "width:400px;">
                    </ul>
                </div>
                <div class="col-md-8" >
                    <ul >
                        <br>
                            <p style="font-size:20px;"><span class="fa fa-user-md" style="font-size:20px;"> Tên bác sĩ:  </span><?php echo $doc['Ten']; ?></p>
                            <hr>
                            <p style="font-size:20px;"><span class="fa fa-intersex" style="font-size:20px;"> Giới tính:  </span><?php echo $doc['Gioi_tinh']; ?></p>
                            <hr>
                            <p style="font-size:20px;"><span class="fa fa-calendar" style="font-size:20px;"> Ngày tháng năm sinh:  </span><?php echo date('d-m-Y', strtotime($doc['Ngay_sinh'])); ?></p>
                            <hr>
                            <p style="font-size:20px;"><span class="fa fa-graduation-cap" style="font-size:20px;"> Bằng cấp:  </span><?php echo $doc['Bang_cap']; ?></p>
                            <hr>
                    </ul>
                </div>

            </div>
        </div>
                    <br><br>
                    <br><br>
                    <?php
                        endfor;
                        mysqli_free_result($doctor_set);
                    ?>

       
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</div>    
</body>
</html>