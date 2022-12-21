<?php
include '../function/html.php';
include '../function/sql.php';

?>
<body class="ttt">
	<div class="from">
		<form action="#" method="POST"  enctype="multipart/form-data">
			<h3>Thêm Thông tin</h3>
			<div class="mb-3">
			  <label for="ten_Thong_tin">Tên chủ đề</label>
			  <input type="text" class="text" id="ten_Thong_tin" name="ten_Thong_tin" placeholder="Nhập tên bài tập">
			</div>
			<div class="mb-3">
			  <label for="so_bai_nop">Số bài nộp tối đa</label>
			  <input type="number" class="number" id="so_bai_nop" name="so_bai_nop" placeholder="Nhập Số bài nộp tối đa">
			</div>
			<div class="mb-3">
			  <label for="han_nop">Hạn nộp</label>
			  <input type="datetime-local" class="datetime-local" id="han_nop" name="han_nop" placeholder="Nhập hạn nộp">
			</div>
			<div class="mb-3">   
			  <label for="file_de_bai" >Chọn file đề bài <font color='red'>*</font></label>
			  <input type="file" class="file" id="file_de_bai" name="file_de_bai">
			</div>
            <div class="mb-3">
			  <label for="url_de_bai">Chọn url đề bài <font color='red'>*</font></label>
			  <input type="url" class="url" id="url_de_bai" name="url_de_bai">
			</div>
			<input type="submit" class="submit1" name="saveThongtin" value="Lưu">
			<a href="" class="quaylai">Trở lại</a>
			</div>
		</form>
        

<?php
    $kq='';
	
	
	// // $file=$_POST['file_de_bai'];			

	$id=$_GET['id_bai_hoc'];
	if(isset($_POST['saveThongtin'])){
	$tbt=$_POST["ten_Thong_tin"];
	$sbt=$_POST['so_bai_nop'];
	$hn=$_POST['han_nop'];
	
		echo "<pre>";
		print_r($_FILES);
		echo $tbt;
		echo $sbt;
		echo $hn;
		echo "</pre>";
		$name=$_FILES['file_de_bai']['name'];
		$xong=kiemtra($name);
		$nhanfile="../file/$xong";
		move_uploaded_file($_FILES['file_de_bai']['tmp_name'], $nhanfile);
		if($_POST['ten_Thong_tin']==''||$_POST['so_bai_nop']==''||$_POST['han_nop']==''){
			$kq='có một hoặc nhiều phần chưa có thông tin';
		}
		else{

			$sql="INSERT INTO `baitap` (`id_bai_tap`,
			 `id_chu_de`, `ten_Thong_tin`, 
			 `so_bai_tap`, `han_nop`, `file`) 
			VALUES (NULL, 
			$idcd1, '$tbt'
			, '$sbt', '$hn', '$nhanfile');";
			if(mysqli_query($conn,$sql)){
				$kq= "luu đã thành công";
			}
			else{
				$kq= "loi";
			}
		}
	}
		echo $id;
	?>
	</div>
    <?php
		if($kq!=''){
			echo'
			<div id="thongbao">
			'.$kq.'
			</div>
			';
		}
        else{
            echo "<div id='thongbao'>(<font color='red'>*</font>) bạn có thể chọn nhiều hơn 1</div>";
        }
		?>
</body>
</html>