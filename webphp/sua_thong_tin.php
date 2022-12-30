<?php
include '../function/html.php';
include '../function/sql.php';
include '../function/function.php';
$id=$_GET['id_thong_tin'];
echo $id;
$docsql="SELECT * from thong_tin where id_thong_tin=$id";
$s=mysqli_query($conn,$docsql);
$doc_dc=mysqli_fetch_row($s);
printf($doc_dc["0"]);
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);

?>
<body class="ttt">
	<div class="from">
		<form action="#" method="POST"  enctype="multipart/form-data">

			<h3>Thêm Thông tin</h3>
			<div class="mb-3">
			  <label for="ten_Thong_tin">Tên chủ đề</label>
			  <input type="text" class="text" id="ten_Thong_tin" name="ten_Thong_tin" placeholder="
			  <?php if (!empty($_GET['ten_Thong_tin'])) {
					$ttt=$_GET['ten_Thong_tin'];
					echo $ttt;}
					else{
						printf($doc_dc["2"]);;
					}?>">  
			</div>
			<div class="mb-3">
			  <label for="so_bai_nop">Số bài nộp tối đa</label>
			  <input type="number" class="number" id="so_bai_nop" name="so_bai_nop" placeholder="
			  <?php if (!empty($_GET['so_bai_nop'])) {
					$sbt=$_GET['so_bai_nop'];
					echo $sbt;}
					else{printf($doc_dc["3"]);}?>
			  ">
			</div>
			<div class="mb-3">
			  <label for="han_nop">Hạn nộp</label>
			  <input type="datetime-local" class="datetime-local" id="han_nop" name="han_nop" placeholder="
			  <?php if (!empty($_GET['ten_Thong_tin'])) {
					$ttt=$_GET['ten_Thong_tin'];
					echo $ttt;}
					else{printf($doc_dc["4"]);}?>">
			</div>
			<div class="mb-3">   
			  <label for="file_de_bai" >Chọn file đề bài <font color='red'>*</font></label>
			  <input type="file" class="file" id="file_de_bai" name="file_de_bai">
			</div>
            <div class="mb-3">
			  <label for="url_de_bai">Chọn url đề bài <font color='red'>*</font></label>
			  <input type="url" class="url" id="url_de_bai" name="url_de_bai" placeholder="
			  <?php if (!empty($_GET['ten_Thong_tin'])) {
					$urlx=$_GET['ten_Thong_tin'];
					echo $urlx;}
					else{printf($doc_dc["6"]);}?>">
			</div>
			<input type="submit" class="submit1" name="saveThongtin" value="Lưu">
			<a href="<?php echo $url;?>"  class="quaylai" >Trở lại</a>
			</div>
		</form>
        

<?php
	$kq='';
	if(isset($_POST['saveThongtin'])){
		$tbt=$_POST["ten_Thong_tin"];
		$sbn=$_POST['so_bai_nop'];
		$hn=$_POST['han_nop'];
		$url=$_POST['url_de_bai'];
		$kq.=($tbt=="")?"bạn chưa ghi tên thông tin <br>":"";
		$kq.=($sbn=="")?"bạn chưa ghi  số bài nộp<br>":"";
		$kq.=($hn=="")?"bạn chưa chọn thời gian nộp<br>":"";
		$kq.=($_FILES['file_de_bai']['name']==""&&$url=="")?"bạn chưa gửi lên file hoặc website<br>":"";
		if($kq==""){

		$name=$_FILES['file_de_bai']['name'];
		$xong=kiemtra($name);
		$nhanfile="../file_gv/$xong";
		move_uploaded_file($_FILES['file_de_bai']['tmp_name'], $nhanfile);
		if($_POST['ten_Thong_tin']==''||$_POST['so_bai_nop']==''||$_POST['han_nop']==''){
			$kq='có một hoặc nhiều phần chưa có thông tin';
		}
		else{

			$sql="UPDATE `thong_tin` SET `ten_thong_tin` = '$tbt', 
			`so_bai_tap` = '$sbn', `han_nop` = '$hn',
			 `file` = '$nhanfile', `url` = '$url' 
			 WHERE `thong_tin`.`id_thong_tin` = 5;";
			if(mysqli_query($conn,$sql)){
				$kq= "luu đã thành công";
			}
			else{
				$kq= "loi";
			}
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