
<?php 
session_start();
include '../function/sql.php';
include '../function/function.php';

?>
<?php
include 'html.php'
?>
<body>
    <div class="tong">
    <div class="menu_ngang">
            <div class="logo">
                <a href="../webphp/trangchu.php"><img src="../css/img/logo.png" alt=""></a>
            </div>
            
            <div class="menu_user">
                <ul class="lever_1">
                    <li> <b><?php echo $_SESSION['username'];?></b>
                    <ul class="lever_2">
                        <li><a href="#">Thông tin tài khoản</a></li>
                        <li><a href="#">Đăng Xuất</a></li>
                    </ul>
                </li>
                </ul>
               
            </div>
        </div>
        <div class="menu_chinh">
            <div class="menu_chude">
                <ul>
                    <li><a href="section1.php?id_user=<?php echo $_SESSION['id'];?>">Quản lý học sinh</a></li>
                    <li><a href="section.php?id_user=<?php echo $_SESSION['id'];?>">Quản lý khóa học</a></li>
                    <li><a href="diendan.php?id_user=<?php echo $_SESSION['id'];?>">Diễn đàn hỏi đáp</a></li>
                </ul>
            </div>
        </div>