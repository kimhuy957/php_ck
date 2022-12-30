<!DOCTYPE html>
<?php

include "../function/dangky.php";
include "../function/sql.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/wed.css">
    
    <title>Đăng Ký</title>
</head>
<body class="tongdn">
    <div class="dangnhap">
            
                <form  method="POST" action="#" >
                    <ul class="nhapdn">

                        <li class="dn1">Đăng Ký</li>
                        <table width="500px"class="dangkybang">
                            <tr>
                                <td class="name">
                                    <p><ion-icon name="body-outline"></ion-icon>Tên tài khoản</p>
                                    <input type="text" id="username" placeholder="Nhập tên" name="username" 
                                    value="<?php if (!empty($_POST['username'])) {$user=$_POST["username"];echo $user;} ?>"> </td>
                            </tr>
                            <tr>
                                <td class="sdt">
                                    <ion-icon name="call-outline"></ion-icon><p>Số điện thoại</p>
                                   <input type="number" id="sdt" name="sdt" placeholder="Nhập số điện thoại"
                                   value="<?php if (!empty($_POST['sdt'])) {$sdt=$_POST["sdt"];;echo $sdt;} ?>"></td>
                            </tr>
                            <tr>
                                <td class="year">
                                    
                                        <ion-icon name="male-female-outline"
                                        value="<?php if (!empty($_POST['sinh'])) {$sinh=$_POST["sinh"];;echo $sinh;} ?>">
                                        </ion-icon><p>Năm sinh</p>
                                        <input type="date" id="sinh" name="sinh" placeholder="Nhập ngày tháng năm sinh">
                                </td>
                            </tr>
                            <tr>
                                <td class="gioit">
                                    
                                        <ion-icon name="male-female-outline"></ion-icon>
                                         <p>Giới tính</p> 
                                        <input type="radio" name="nam" value="Nam" id="nam" checked>Nam ♂;
                                        <input type="radio" name="nam" value="Nu"id="nam" >Nữ ♀;
                                        <input type="radio" name="nam" value="LGBT" id="nam"> Khác;
                                    
                                </td>
                            </tr>
                            <tr> <td class="gmail">
                                
                                    <ion-icon name="at-circle-outline"></ion-icon><p>Email</p>
                                    <input type="email"id="email" name="email" placeholder="Nhập gamil Nhập thư"
                                    value="<?php if (!empty($_POST['email'])) {$email=$_POST["email"];echo $email;} ?>">
                                
                            </td></tr>
                            <tr>
                                <td class="mk">
                                    
                                        <ion-icon name="lock-closed-outline"></ion-icon><p>Nhập mật khẩu</p>
                                        <input type="password" placeholder="Nhập mật khẩu phải nhớ"id="pass" name="pass">
                                </td>
                            </tr>
                            <tr>
                                <td class="andn">
                                      <input type="submit" value="Đăng ký" name="submit" id="submit">
                                        <a href="dangnhap.php" class="quaylai">
                                            <ion-icon name="arrow-back-outline"></ion-icon>
                                        </a>
                                </td>
                            </tr>
                            </ul>
                        </table>
            
            </form>
        <?php
        ?>
        <?php
        if(isset($_POST["submit"])){
        $kq='';
        $user=$_POST["username"];
        $sdt=$_POST["sdt"];
        $sinh=$_POST["sinh"];
        $email=$_POST["email"];
        $gioi=$_POST['nam'];
        $pass=$_POST["pass"];
        $user1=false;
        $sdt1=false;
        $sinh1=false;
        $email1=false;
        $pass1=false;
        $thongtin='';
        $thongtin.=($user=='')?"chưa ghi thông tin tên tài khoản <br>":"";
        $thongtin.=($sdt=='')?"chưa ghi thông tin số điện thoại <br>":"";
        $thongtin.=($sinh=='')?"chưa ghi thông tin ngày sinh <br>":"";
        $thongtin.=($email=='')?"chưa ghi thông tin email <br>":"";
        $thongtin.=($pass=='')?"chưa ghi thông tin mật khẩu <br>":"";
        if($thongtin==''){
            $k=0;
            $baitap="SELECT username from dangky";
            $bang=mysqli_query($conn,$baitap);
            while($hien=mysqli_fetch_assoc($bang)){
                if($hien['username']==$user){
                $kq.="tên tài khoản đã tồn tại<br>";
                $k=1;
            }   
            }
            if($k==0){
            $sql="INSERT INTO `dangky` (`id_user_gv`, `username`, `sdt`, `nam_sinh`, `gioi_tinh`, `email`, `pass`, `quyen`) 
            VALUES (NULL, '$user', '$sdt', '$sinh', '$gioi', '$email', '$pass', '1')";
            if(mysqli_query($conn,$sql)){
                $kq.="Tạo tài khoản thành công<br>";
            }
            else{
                $kq.="Tài khoản lưu ko thành công<br>";
            }    
            }
        }
        
       
    ?>   

<div class="info_php">
    <?php
    if($thongtin!=''||$kq!=''){
     echo "<p>$thongtin<br>$kq</p>";    
    }}
    ?>
</div>
        </div>

    </div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
