<?php
include '../function/head_body.php';
?>
<div class="menu_giua">
    <div class="bang">
        <table border="1">
        <tr>
				<th>STT</th>
				<th>Mã sinh viên</th>
				<th>Họ và tên*</th>
				<th>Gmail</th>

			</tr>
			<tr>
                <form action="#" method="POST"  enctype="multipart/form-data">
				<td>*</td>
				<td>
					<input type="text" placeholder="Mã sinh viên" class="input" name="Ma_sinh_vien">
				</td>
				<td>
					<input type="text" placeholder="Họ và tên" class="input" name="Ho_ten">
				</td>
				<td>
					
					<input type="text" placeholder="Gmail" class="input" name="Gmail">
				</td>
				<td>
					<input type="submit" onclick="" value="+Tạo" class="Tao_tt_sv" name="submit">
				</td>
            </form>
			</tr>
            <tr>
                <?php
                    $bang=mysqli_query($conn,"SELECT * FROM `quan_ly_hoc_sinh`");
                    if(mysqli_num_rows($bang)>0){
                    while($hien=mysqli_fetch_assoc($bang)){
                        print_r($hien['Ho_ten']);
                        // echo '<td>'.$hien=['Ho_ten'].'</td>';
                    }}
                ?>
            </tr>
        </table>
        <ul>
            
        </ul>
    </div>
</div>
<?php
include '../function/end_body.php';
?>