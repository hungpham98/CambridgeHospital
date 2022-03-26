<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "Hospital_project");

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}
$db = db_connect();


function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
}

function confirm_query_result($result){
    global $db;
    if (!$result){
        echo mysqli_error($db);
        db_disconnect($db);
        exit; 
    } else {
        return $result;
    }
}

function insert_admin($doc) {
    global $db;

    $sql = "INSERT INTO `admin` ";
    $sql .= "(Ten_dang_nhap, Mat_khau, Ho_va_ten, Email) ";
    $sql .= "VALUES (";
    $sql .= "'" . $doc['Ten_dang_nhap'] . "',";
    $sql .= "'" . $doc['Mat_khau'] . "',"; 
    $sql .= "'" . $doc['Ho_va_ten'] . "',"; 
    $sql .= "'" . $doc['Email'] . "'"; 
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_admin(){
    global $db;
    $sql = "SELECT * FROM `admin` ";
    $sql .= "ORDER BY Ten_dang_nhap";
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function find_admin_id($adminID) {
    global $db;

    $sql = "SELECT * FROM `admin` ";
    $sql .= "WHERE Ma_admin='" . $adminID . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $doc = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $doc;
}

function update_admin($doc) {
    global $db;

    $sql = "UPDATE `admin` SET ";
    $sql .= "Ten_dang_nhap='" . $doc['Ten_dang_nhap'] . "', ";
    $sql .= "Mat_khau='" . $doc['Mat_khau'] . "', ";
    $sql .= "Ho_va_ten='" . $doc['Ho_va_ten'] . "', ";
    $sql .= "Email='" . $doc['Email'] . "' ";
    $sql .= "WHERE Ma_admin='" . $doc['Ma_admin'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_admin($adminID) {
    global $db;

    $sql = "DELETE FROM `admin` ";
    $sql .= "WHERE Ma_admin='" . $adminID . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function insert_co_so_vat_chat($doc) {
    global $db;

    $sql = "INSERT INTO Co_so_vat_chat ";
    $sql .= "(Ten_thiet_bi, Gia, So_luong, Ngay_nhap, Ngay_bao_duong, Tinh_trang, Ma_khoa) ";
    $sql .= "VALUES (";
    $sql .= "'" . $doc['Ten_thiet_bi'] . "',";
    $sql .= "'" . $doc['Gia'] . "',"; 
    $sql .= "'" . $doc['So_luong'] . "',"; 
    $sql .= "'" . $doc['Ngay_nhap'] . "',"; 
    $sql .= "'" . $doc['Ngay_bao_duong'] . "',"; 
    $sql .= "'" . $doc['Tinh_trang'] . "', ";
    $sql .= "'" . $doc['Ma_khoa'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_co_so_vat_chat(){
    global $db;
    $sql = "SELECT c.*, k.Ten_khoa FROM Co_so_vat_chat AS c ";
    $sql .= "JOIN Khoa AS k ON c.Ma_khoa = k.Ma_khoa ";
    $sql .= "ORDER BY Ten_thiet_bi";
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function find_co_so_vat_chat_id($x) {
    global $db;

    $sql = "SELECT c.*, k.Ten_khoa FROM Co_so_vat_chat AS c ";
    $sql .= "JOIN Khoa AS k ON c.Ma_khoa = k.Ma_khoa ";
    $sql .= "WHERE Ma_thiet_bi='" . $x . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $doc = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $doc;
}

function update_co_so_vat_chat($doc) {
    global $db;

    $sql = "UPDATE Co_so_vat_chat SET ";
    $sql .= "Ten_thiet_bi='" . $doc['Ten_thiet_bi'] . "', ";
    $sql .= "Gia='" . $doc['Gia'] . "', ";
    $sql .= "So_luong='" . $doc['So_luong'] . "', ";
    $sql .= "Ngay_nhap='" . date('d-m-Y',strtotime($doc['Ngay_nhap'])) . "', ";
    $sql .= "Ngay_bao_duong='" . date('d-m-Y',strtotime($doc['Ngay_bao_duong'])) . "', ";
    $sql .= "Tinh_trang='" . $doc['Tinh_trang'] . "', ";
    $sql .= "Ma_khoa='" . $doc['Ma_khoa'] . "' ";
    $sql .= "WHERE Ma_thiet_bi='" . $doc['Ma_thiet_bi'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_co_so_vat_chat($Co_so_vat_chatID) {
    global $db;

    $sql = "DELETE FROM Co_so_vat_chat ";
    $sql .= "WHERE Ma_thiet_bi='" . $Co_so_vat_chatID . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function insert_doctor($doc) {
    global $db;

    $sql = "INSERT INTO Bac_si ";
    $sql .= "(Ten, Gioi_tinh, Ngay_sinh, So_dien_thoai, Bang_cap, Nam_kinh_nghiem, Ma_khoa, Dia_chi, Email, Anh) ";
    $sql .= "VALUES (";
    $sql .= "'" . $doc['Ten'] . "',";
    $sql .= "'" . $doc['Gioi_tinh'] . "',"; 
    $sql .= "'" . $doc['Ngay_sinh'] . "',"; 
    $sql .= "'" . $doc['So_dien_thoai'] . "',"; 
    $sql .= "'" . $doc['Bang_cap'] . "',"; 
    $sql .= "'" . $doc['Nam_kinh_nghiem'] . "',";
    $sql .= "'" . $doc['Ma_khoa'] . "',";
    $sql .= "'" . $doc['Dia_chi'] . "',";
    $sql .= "'" . $doc['Email'] . "',";
    $sql .= "'" . $doc['Anh'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_doctor(){
    global $db;
    $sql = "SELECT * FROM Bac_si ";
    $sql .= "ORDER BY Ten";
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function find_all_doc(){
    global $db;
    $sql = "SELECT b.*, k.Ten_khoa FROM Bac_Si AS b ";
    $sql .= "JOIN Khoa AS k ON b.Ma_khoa = k.Ma_khoa ";
    $result = mysqli_query($db, $sql); 
    return $result; 
}


function find_doctor_id($doctorID) {
    global $db;

    $sql = "SELECT d.*, k.Ten_khoa FROM Bac_si as d ";
    $sql .= "JOIN Khoa AS k ON d.Ma_khoa = k.Ma_khoa ";
    $sql .= "WHERE Ma_bac_si='" . $doctorID . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $doc = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $doc;
}

function update_doctor($doc) {
    global $db;

    $sql = "UPDATE Bac_si SET ";
    $sql .= "Ten='" . $doc['Ten'] . "', ";
    $sql .= "Gioi_tinh='" . $doc['Gioi_tinh'] . "', ";
    $sql .= "Ngay_sinh='" . $doc['Ngay_sinh'] . "', ";
    $sql .= "So_dien_thoai='" . $doc['So_dien_thoai'] . "', ";
    $sql .= "Bang_cap='" . $doc['Bang_cap'] . "', ";
    $sql .= "Nam_kinh_nghiem='" . $doc['Nam_kinh_nghiem'] . "', ";
    $sql .= "Dia_chi='" . $doc['Dia_chi'] . "', ";
    $sql .= "Email='" . $doc['Email'] . "', ";
    $sql .= "Anh='" . $doc['Anh'] . "', ";
    $sql .= "Ma_khoa='" . $doc['Ma_khoa'] . "' ";
    $sql .= "WHERE Ma_bac_si='" . $doc['Ma_bac_si'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_doctor($doctorID) {
    global $db;

    $sql = "DELETE FROM Bac_si ";
    $sql .= "WHERE Ma_bac_si='" . $doctorID . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function insert_faculty($fac) {
    global $db;

    $sql = "INSERT INTO Khoa ";
    $sql .= "(Ten_khoa, Mo_ta, So_dien_thoai, Thanh_tuu, Anh) ";
    $sql .= "VALUES (";
    $sql .= "'" . $fac['Ten_khoa'] . "',";
    $sql .= "'" . $fac['Mo_ta'] . "',"; 
    $sql .= "'" . $fac['So_dien_thoai'] . "',"; 
    $sql .= "'" . $fac['Thanh_tuu'] . "',"; 
    $sql .= "'" . $fac['Anh'] . "'"; 
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_faculty(){
    global $db;
    $sql = "SELECT * FROM Khoa ";
    $sql .= "ORDER BY Ten_khoa";
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function find_faculty_id($facultyID) {
    global $db;

    $sql = "SELECT * FROM Khoa ";
    $sql .= "WHERE Ma_khoa='" . $facultyID . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $fac = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $fac;
}

function update_faculty($fac) {
    global $db;

    $sql = "UPDATE Khoa SET ";
    $sql .= "Ten_khoa='" . $fac['Ten_khoa'] . "', ";
    $sql .= "Mo_ta='" . $fac['Mo_ta'] . "', ";
    $sql .= "Thanh_tuu='" . $fac['Thanh_tuu'] . "', ";
    $sql .= "So_dien_thoai='" . $fac['So_dien_thoai'] . "', ";
    $sql .= "Anh='" . $fac['Anh'] . "' ";
    $sql .= "WHERE Ma_khoa='" . $fac['Ma_khoa'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_faculty($facultyID) {
    global $db;

    $sql = "DELETE FROM Khoa ";
    $sql .= "WHERE Ma_khoa='" . $facultyID . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}


function insert_service($ser) {
    global $db;

    $sql = "INSERT INTO Dich_vu ";
    $sql .= "(Ten_dich_vu, Gia, Thoi_gian_thuc_hien, Ma_khoa, Anh) ";
    $sql .= "VALUES (";
    $sql .= "'" . $ser['Ten_dich_vu'] . "',";
    $sql .= "'" . $ser['Gia'] . "',"; 
    $sql .= "'" . $ser['Thoi_gian_thuc_hien'] . "',"; 
    $sql .= "'" . $ser['Ma_khoa'] . "',"; 
    $sql .= "'" . $ser['Anh'] . "'"; 
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function find_service(){
    global $db;
    $sql = "SELECT s.*, k.Ten_khoa FROM Dich_vu AS s ";
    $sql .= "JOIN Khoa AS k ON s.Ma_khoa = k.Ma_khoa ";
    $sql .= "ORDER BY Ten_dich_vu";
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function find_service_id($serviceID) {
    global $db;

    $sql = "SELECT s.*, k.Ten_khoa FROM Dich_vu AS s ";
    $sql .= "JOIN Khoa AS k ON s.Ma_khoa = k.Ma_khoa ";
    $sql .= "WHERE Ma_dich_vu='" . $serviceID . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $ser = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $ser;
}

function update_service($ser) {
    global $db;

    $sql = "UPDATE Dich_vu SET ";
    $sql .= "Ten_dich_vu='" . $ser['Ten_dich_vu'] . "', ";
    $sql .= "Gia='" . $ser['Gia'] . "', ";
    $sql .= "Thoi_gian_thuc_hien='" . $ser['Thoi_gian_thuc_hien'] . "', ";
    $sql .= "Ma_khoa='" . $ser['Ma_khoa'] . "', ";
    $sql .= "Anh='" . $ser['Anh'] . "' ";
    $sql .= "WHERE Ma_dich_vu='" . $ser['Ma_dich_vu'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

function delete_service($serviceID) {
    global $db;

    $sql = "DELETE FROM Dich_vu ";
    $sql .= "WHERE Ma_dich_vu='" . $serviceID . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}


function check_login($username, $password){
  global $db;

  $sql = "SELECT Ten_dang_nhap, Mat_khau  FROM `admin` ";
  $sql .= "WHERE Ten_dang_nhap ='" . $username . "'";
  
  $result = mysqli_query($db, $sql);
  if(mysqli_num_rows($result)){
      $log = mysqli_fetch_assoc($result);
      if($log['Ten_dang_nhap'] == $username && $log['Mat_khau'] == $password){
          return true;
      }else
          return false;
  }else
      return false;   
}
function adddotstring($strNum) {
 
    $len = strlen($strNum);
    $counter = 3;
    $result = "";
    while ($len - $counter >= 0)
    {
        $con = substr($strNum, $len - $counter , 3);
        $result = '.'.$con.$result;
        $counter+= 3;
    }
    $con = substr($strNum, 0 , 3 - ($counter - $len) );
    $result = $con.$result;
    if(substr($result,0,1)=='.'){
        $result=substr($result,1,$len+1);
    }
    return $result;
}
function insert_feedback($doc) {
    global $db;

    $sql = "INSERT INTO feedback ";
    $sql .= "(Ten_khach_hang, So_dien_thoai, Ma_khoa, Noi_dung) ";
    $sql .= "VALUES (";
    $sql .= "'" . $doc['Ten_khach_hang'] . "',";
    $sql .= "'" . $doc['So_dien_thoai'] . "',"; 
    $sql .= "'" . $doc['Ma_khoa'] . "',"; 
    $sql .= "'" . $doc['Noi_dung'] . "'"; 
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}
?>