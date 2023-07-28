<?php
global $mysqli;
$sql_donhangnew = "SELECT * FROM tbl_giohang WHERE tinhTrang=1";
$query_donhangnew = mysqli_query($mysqli, $sql_donhangnew);
$count = mysqli_num_rows($query_donhangnew);
?>

<div class="menu">
    <div class="navbar_1">
        <ul class="nav_ul">
            <li class="nav_li">
                <a class="nav_a" href="?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="?action=quanlysanpham&query=them">Quản lý sản phẩm</a>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a>
            </li>
            <li class="nav_li">
                <a class="nav_a" href="?action=quanlybaiviet&query=them">Quản lý bài viết</a>
            </li>
            <li class="nav_li">
            <a class="nav_a" href="?action=quanlygiohang&query=lietke">
                <span>Quản lý giỏ hàng</span>
                <span class="badge"><?php echo $count ?></span>
            </a>
            </li>
                <li class="nav_li">
                    <a class="nav_a" href="login.php?dangxuat=1">Đăng xuất</a>
                </li>
        </ul>
    </div>
</div>