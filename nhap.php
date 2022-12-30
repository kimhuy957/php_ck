<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<li>
                    <div class='ten_bt'>
                    <h3>"$hien['ten_bai_hoc'].</h3>
                    <a href='them_thong_tin.php?id_bai_hoc=".$hien['id_bai_hoc']."' id='a1'>Thêm thông tin</a> 
                    <a href='' id='a2'>Xóa</a></div>
                    <ul>
                        <li>
                                <div class='ten_tt'>
                                <a href='xem_bai_tap.php?id_thong_tin=".$hien_bai_tap['id_thong_tin']."'><h5>".$hien_bai_tap['ten_thong_tin']."</h5>
                                </a><div class='menu_cong_cu'>
                                <a href=''><ion-icon name='pencil-outline'></ion-icon></a>
                                <a href=''><ion-icon name='trash-outline'></ion-icon></a>
                                <a href=''><ion-icon name='list-outline'></ion-icon></a>
                                </div>
                                <p>.$hien_bai_tap['han_nop'].</p>
                                </div>
                            </li>;
                </ul></div></li>;
</body>
</html>