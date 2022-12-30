<?php include '../function/head_body.php';?>
<div class="menu_giua">
<ul>
    <?php
        $id1=$_SESSION['id'];
        // $sqlchude="SELECT ten_chu_de,id_chu_de from chude where id_user=".$id1."";
        $bang=mysqli_query($conn,chude());
        if (mysqli_num_rows($bang)>0) {
            while($hien=mysqli_fetch_assoc($bang)){
             echo'
             <li>
        <div class="anh"><img src="../css/img/h.jpg" alt=""></div>
        <div class="ten_cd"><p>'.$hien['ten_chu_de'].'</p></div>
        <div class="nut"><a href="vaohoc.php?id_chu_de='.$hien['id_chu_de'].'">Vào học</a></div>
        </li>';
            }}
    ?>
        <li class="plus"><a href="them_cd.php?id_user_gv=<?php echo $_SESSION['id_user_gv'];?>">+</a></li>   
</ul> 
</div>
<?php 
include '../function/end_body.php';?>