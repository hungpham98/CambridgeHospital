<?php
   require_once('database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
    body{
        background:rgb(173 ,216 ,230);
    }
    #filtersubmit {
    position: relative;
    z-index: 1;
    left: -25px;
    top: 1px;
    color: #7B7B7B;
    cursor:pointer;
    width: 0;
}
    .white{
        color: white;
    }
    </style>
</head>
<body  >
<div>    
    <nav>
    <div>
        <img src="crud/img/logo4.jpg" alt="..." style = "width:60%; height:60%">
    </div > 
    <!-- <div class="white">
        <h1>Cambridge Hospital</h1>
    </div> -->
    </nav>
    
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
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="crud/img/img1.jpg" style="width:100%;height:600px">
    </div>

    <div class="item">
      <img src="crud/img/img2.jpg" style="width:100%;height:600px">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <img src="" style="width:100%;">
        <h1 style = "text-align:center;">Về chúng tôi</h1>
        
        <p style = "text-align:center;">Ra đời năm 2008, Cambridge hiện có 7 bệnh viện đa khoa 
        đi vào hoạt động và xây dựng chiến lược phát triển với 10 bệnh viện trên cả nước vào năm
         2020. Với cơ sở vật chất vượt trội; đội ngũ chuyên gia, bác sỹ đầu ngành; liên tục ứng dụng
          các phương pháp điều trị mới nhất thế giới cùng chất lượng dịch vụ hoàn hảo, đến nay bệnh viện của chúng tôi
           đã trở thành địa chỉ chăm sóc sức khỏe tiêu chuẩn quốc tế tại Việt Nam.
            Trong những năm qua, chúng tôi không ngừng phấn đấu để khẳng định sứ mệnh lớn
             lao mà mình theo đuổi bằng việc trở thành Hệ thống Y tế tư nhân DUY NHẤT ở Việt Nam</p>
             <br><br>
        
    <h1 style = "text-align:center;">Một số dịch vụ nổi bật của chúng tôi</h1>
    <hr>
        <?php
            $service_set = find_service();
            $count = mysqli_num_rows($service_set);
                for ($i = 0; $i < 3; $i++):
                $ser = mysqli_fetch_assoc($service_set);
        ?>
        <div class="col-md-4">
            <ul class="list-group">
                <img src="<?php $anh = 'crud/img/'.$ser['Anh']; echo $anh ?>" alt="..." style = "width:250px;height:250px"><br>
                    <p>Dịch vụ: <?php echo $ser['Ten_dich_vu']; ?></p>
                    <p>Giá: <?php echo adddotstring($ser['Gia']) . 'vnđ'; ?></p>
                    <br><br>
            </ul>
        </div>
        <?php
        endfor;
        mysqli_free_result($service_set);
        ?>        
        <div class="container-fluid">
        <h1 style = "text-align:center;">Tại sao nên chọn bệnh viện của chúng tôi</h1> 
        <hr>
        </div> 
        <div class="row">     
            <div class="col-md-3" style = "text-align:center;" >
                <ul class="list-group">
                <i class="fa fa-user-md" style="font-size:36px; padding: 10px;height:60px;width:60px;background-color:DodgerBlue;border-radius: 50%; "></i>
                    <h3  class="text-primary">Đội ngũ bác sĩ chất lượng cao</h3>
                        <p>Bệnh viện của chúng tôi quy tụ những bác sĩ có trình độ cao,tay nghề giỏi 
                        tâm huyết với nghề được đào tạo kĩ càng,  luôn đặt sức khỏe của bệnh nhân lên
                        hàng đầu,nhiều bác sĩ đạt những thành tựu nổi bật về y học qua nhiều năm.                                                        
                        </p>
                </ul>
                </div>     
            <div class="col-md-3"style = "text-align:center;" >
                <ul class="list-group">
                <i class="fa fa-ambulance"  style="font-size:36px; padding: 10px; height:60px;width:60px;background-color:DodgerBlue;border-radius: 50%; "></i>
                    <h3  class="text-primary">Dịch vụ đa dạng, chuẩn quốc tế</h3>
                        <p>Bệnh viện của chúng tôi đem đến cho mọi người nhiều gói dịch vụ theo tiêu chuẩn
                        quốc tế thuộc nhiều chuyên ngành khác nhau, giá thành và chất lượng đều được đảm bảo 
                        hông gian khám chữa bệnh an toàn và thân thiện.
                        </p>
                </ul>
            </div>   
            <div class="col-md-3"style = "text-align:center;" >
                <ul class="list-group">
                <i class="fa fa-medkit" style="font-size:36px; padding: 10px; height:60px;width:60px;background-color:DodgerBlue;border-radius: 50%; "></i>
                    <h3 class="text-primary">Trang thiết bị hiện đại nhất thế giới</h3>
                        <p>Toàn bộ máy móc của bệnh viện chúng tôi được đầu tư những thiết bị
                        y khoa tân tiến nhất,tương đương với các bệnh viện hàng đầu thế giới của 
                        Anh,Mĩ,Singapore.., để hỗ trợ cho công cuộc chuẩn đoán và điều trị.
                        </p>
                </ul>
            </div>   
            <div class="col-md-3"style = "text-align:center;" >
                <ul class="list-group">
                <i class="fa fa-stethoscope" style="font-size:36px; padding: 10px; height:60px;width:60px;background-color:DodgerBlue;border-radius: 50%; "></i>
                    <h3 class="text-primary">Liên tục đào tạo-thúc đẩy nghiên cứu</h3>
                        <p>Vì bệnh viện có nhiều khoa nghành khác nhau nên chúng tôi 
                        thúc đẩy công cuộc đào tạo và chiêu mộ những nhân tài y khoa trên 
                        khắp Việt Nam và toàn thế giới nhằm đem lại cho cộng đồng những 
                        dịch vụ chất lượng
                        </p>
                </ul>
            </div> 
        
         
       
        </div>     
         <?php include('footer.php')?> 
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</div>   

</body>

</html>