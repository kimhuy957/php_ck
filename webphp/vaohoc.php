
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
                    </li>";

                    $thong_tin=thong_tin();
                    $thong_tin_sql=mysqli_query($conn,"$thong_tin where id_bai_hoc=".$hien['id_bai_hoc']."");
                    if(mysqli_num_rows($thong_tin_sql)>0){
                        while($hien_bai_tap=mysqli_fetch_assoc($thong_tin_sql)){
                            // echo "".$hien_bai_tap["file"]."<br>";
                            // echo "".$hien_bai_tap["url"]."";
                            if($hien_bai_tap["file"]!=="../file_gv/"&&$hien_bai_tap["url"]===""){
                                echo"<li class='li_tt'>
                                    <ion-icon name='document-outline' id='icon-file'></ion-icon>
                                    <div class='ten_tt'>
                                    <a href='xem_bai_tap.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."&file=0'><h2>".$hien_bai_tap['ten_thong_tin']."</h2>
                                    </a>
                                    <p>Hạn nộp bài: ".$hien_bai_tap['han_nop']."</p>
                                    <div class='menu_cong_cu'>
                                    <a href='sua_thong_tin.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."' hreflang='chỉnh sửa'><ion-icon name='pencil-outline' id='but'></ion-icon></a>
                                    <a href=''><ion-icon name='trash-outline' id='xoa'></ion-icon></a>
                                    <a href=''><ion-icon name='list-outline' id='lk'></ion-icon></a>
                                    </div>
                                    </div>
                                </li>";
                            }
                            elseif($hien_bai_tap["url"]!==""&&$hien_bai_tap["file"]==="../file_gv/"){
                                echo"<li class='li_tt'>
                                    
                                    <ion-icon name='link-outline' id='icon-file'></ion-icon>
                                    <div class='ten_tt'>
                                    <a href='xem_bai_tap.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."&file=1'><h2>".$hien_bai_tap['ten_thong_tin']."</h2>
                                    </a>
                                    <p>Hạn nộp bài: ".$hien_bai_tap['han_nop']."</p>
                                    <div class='menu_cong_cu'>
                                    <a href='sua_thong_tin.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."' hreflang='chỉnh sửa'><ion-icon name='pencil-outline' id='but'></ion-icon></a>
                                    <a href=''><ion-icon name='trash-outline' id='xoa'></ion-icon></a>
                                    <a href=''><ion-icon name='list-outline' id='lk'></ion-icon></a>
                                    </div>
                                    </div>
                                </li>";
                            }
                            elseif($hien_bai_tap["file"]!=="../file_gv/"&&$hien_bai_tap["url"]!==""){
                                if($hien_bai_tap["file"]!=="../file_gv/"){
                                    echo"<li class='li_tt'>
                                        <ion-icon name='document-outline' id='icon-file'></ion-icon>
                                        <div class='ten_tt'>
                                        <a href='xem_bai_tap.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."&file=0'><h2>".$hien_bai_tap['ten_thong_tin']."</h2>
                                        </a>
                                        <p>Hạn nộp bài: ".$hien_bai_tap['han_nop']."</p>
                                        <div class='menu_cong_cu'>
                                        <a href='sua_thong_tin.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."' hreflang='chỉnh sửa'><ion-icon name='pencil-outline' id='but'></ion-icon></a>
                                        <a href=''><ion-icon name='trash-outline' id='xoa'></ion-icon></a>
                                        <a href=''><ion-icon name='list-outline' id='lk'></ion-icon></a>
                                        </div>
                                        </div>
                                    </li>";
                                }
                                if($hien_bai_tap["url"]!==""){
                                    echo"<li class='li_tt' id='hai_loai'>
                                    <ion-icon name='link-outline' id='icon-file'></ion-icon>
                                        <div class='ten_tt'>
                                        <a href='xem_bai_tap.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."&file=1'><h2>".$hien_bai_tap['ten_thong_tin']."</h2>
                                        </a>
                                        <p>Hạn nộp bài: ".$hien_bai_tap['han_nop']."</p>
                                        <div class='menu_cong_cu'>
                                        <a href='sua_thong_tin.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."' hreflang='chỉnh sửa'><ion-icon name='pencil-outline' id='but'></ion-icon></a>
                                        <a href=''><ion-icon name='trash-outline' id='xoa'></ion-icon></a>
                                        <a href=''><ion-icon name='list-outline' id='lk'></ion-icon></a>
                                        </div>
                                        </div>
                                    </li>";
                                }
                            }
                        }
                    }

                }}
        ?>
    </ul>
</div>

</div>
<?php
include '../function/end_body.php';
?>