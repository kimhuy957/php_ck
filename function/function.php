<?php
// session_start();
// include 'sql.php';
function dangnhap(){
$dangnhap="SELECT * from dangnhap";

return $dangnhap;
}
function chude(){
    $id=$_SESSION['id'];
    $chude="SELECT * from chude where id_user=$id";
    return $chude;
}
function bai_hoc(){
    $bai_hoc="SELECT * from bai_hoc";
    return $bai_hoc;
}
function kiemtra($d) {
    $d = preg_replace("(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)", 'a', $d);
    $d = preg_replace("(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)", 'e', $d);
    $d = preg_replace("(ì|í|ị|ỉ|ĩ)", 'i', $d);
    $d = preg_replace("(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)", 'o', $d);
    $d = preg_replace("(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)", 'u', $d);
    $d = preg_replace("(ỳ|ý|ỵ|ỷ|ỹ)", 'y', $d);
    $d = preg_replace("(đ)", 'd', $d);
    $d = preg_replace("(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)", 'A', $d);
    $d = preg_replace("(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)", 'E', $d);
    $d = preg_replace("(Ì|Í|Ị|Ỉ|Ĩ)", 'I', $d);
    $d = preg_replace("(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)", 'O', $d);
    $d = preg_replace("(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)", 'U', $d);
    $d = preg_replace("(Ỳ|Ý|Ỵ|Ỷ|Ỹ)", 'Y', $d);
    $d = preg_replace("(Đ)", 'D', $d);
    $d = preg_replace("(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)", '-', $d);

    $d = preg_replace("( )", '_', $d);
    return $d;
}
?>