
<?php
$id1=$_GET['id_chu_de'];
include '../function/head_body.php';?>
<div class="menu_giua">
<div class="nut"> 
        <div><a href="section.php?id_user=<?php echo $_SESSION['id'];?>" class="quaylai">Quay lại</a></div>
        <div>
            <a href="themtiethk.php?id_chu_de=<?php echo $id1;?>">Thêm bài học</a>
        </div>
    </div>    
<div class="bai_hoc">
    
    <ul class="ul_bh">
        <?php
            $bai_hoc=bai_hoc();
            $sql_bt="$bai_hoc where id_chude=$id1";
            $bang_bt=mysqli_query($conn,$sql_bt);
            if (mysqli_num_rows($bang_bt)>0) {
                while($hien=mysqli_fetch_assoc($bang_bt)){
                    echo"
                    <li>
                    <div class='ten_bt'>
                    <h3>".$hien['ten_bai_hoc']."</h3>
                    <a href='them_thong_tin.php?id_bai_hoc=".$hien['id_bai_hoc']."' id='a1'>Thêm thông tin</a> 
                    <a href='' id='a2'>Xóa</a></div>
                    </li>
                    ";
                }}
        ?>
    </ul>
</div>
</div>
<?php
include '../function/end_body.php';
?>