<?php
include '../function/html.php';
include '../function/sql.php';
?>
<body>
<?php
	$kq='';
	$idkh1=$_GET['id_chu_de'];
		if(isset($_POST['saveChuDe'])){
			if($_POST['ten_bai_hoc']==''){
				$kq.='chưa nhập tên chủ đề';
			}
			else{
				$tenbh=$_POST['ten_bai_hoc'];
				
				$sql="INSERT INTO `bai_hoc` (`id_chude`, `id_bai_hoc`, `ten_bai_hoc`) VALUES ('".$idkh1."', NULL, '".$tenbh."');";
				if(mysqli_query($conn,$sql)){
					$kq.= "luu đã thành công";
				}
				else{
					$kq.= "loi";
				}
			}
		}
	?>
		<div class="from">
		<form action="#" method="POST" class="w-50">
			<h3>Thêm chủ đề</h3>
			<div class="text">
			  <label for="ten_bai_hoc">Tên chủ đề</label>
			  <input type="text" id="ten_bai_hoc" name="ten_bai_hoc" placeholder="Nhập tên chủ đề">
			</div>
			<!-- <form method="GET" ></form>
			<input type="hidden" > -->
			<div class="nut">
				<div class="input"><input type="submit" name="saveChuDe" value="Lưu">			
				</div>
				<div class="a"><a href="vaohoc.php?id_chu_de=<?php echo $idkh1;?>" class="btn btn-primary">Trở lại</a>
				</div>
			</div>


		</form>
		
		</div>
		<?php
		if($kq!=''){
			echo'
			<div id="thongbao">
			'.$kq.'
			</div>
			';
		}
		?>
		
</body>
</html>