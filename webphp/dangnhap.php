<!DOCTYPE html>
<?php
session_start();
include "../function/function.php";
include "../function/sql.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/wed.css">

    <title>Đăng nhập</title>
    <style>
    </style>
</head>
<body class="tongdn"> 
    <div class="dangnhap">
        
            <form method="POST" action="#">
            <ul class="nhapdn">
                <li class="dn1">Đăng nhập</li>
                <li class="nametk">Tên tài khoản
                    <input type="text" id="username" name='username' value="<?php if (!empty($_POST['username'])) {$user_dn=$_POST["username"];echo $user_dn;} ?>">
                </li>
                <li class="pass">Mật khẩu
                    <input type="password"  id="pass" name='pass'>
                </li>
                <li>
                    
                </li>
                <li class="andn"> 
                <input type="submit" value="Đăng nhập" name="submit" id="submit">
                <li class="quen"><a href="#">Bạn quên mật khẩu</a></li>
                <li class="dk"><a href="dangky.html"> Đăng ký</a></li>
                
            </ul>
           </form>
        

    </div>
    <?php
    if (isset($_POST['submit'])){
        $user=$_POST['username'];
        $pass=$_POST['pass'];
        // function check($user,$pass,$conn){
            $sql="SELECT * FROM dangky  WHERE `username`='$user' AND `pass`='$pass' ";
            echo $sql."<br>";
            $query=mysqli_query($conn,$sql);
            $flay1=false;
            $id ='';
            $quyen='';
            if(mysqli_num_rows($query)>0){
                $flay1=true;
                $user1 =mysqli_fetch_array($query);
                $id=$user1['id_user_gv'];
                $_SESSION['id']=$id;
                $_SESSION['loai']=$user1['loai'];
                // $_SESSION['fullname']=$_POST['username'];
                $_SESSION['username']=$user;
                
            }
            // return $flay1;
        // }
        if ($flay1==true) {

            header("location: section.php?id_user=$id");
            
            
            echo"ra";
        }
        else{
            echo"ko ra";
        }
    }
    ?>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>









 <!-- <li class="hinhtron"><a href="trangwebbanvaodautien.html" class="quaylai " >
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a></li>-->