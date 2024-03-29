<?php
// Phân trang
if(isset($_GET['pages'])){
    $pages=$_GET['pages'];
}
else{
    $pages='1';
}
if($pages=='' || $pages==1){
    $begin=0;
}
else{
    $begin=($pages*12)-12;
}
$sql_sanpham = "SELECT * FROM tbl_sanpham LIMIT $begin,12";
$query_sanpham = mysqli_query($mysqli, $sql_sanpham);
// Tìm số lượng sản phẩm
$sql_number_product = "SELECT * FROM tbl_sanpham";
$query_number_product = mysqli_query($mysqli, $sql_number_product);
$number_products = mysqli_num_rows($query_number_product);
$number_pages = ceil($number_products / 12);
?>
<div class="gird product_auto">
    <div class="row">
        <div class="col l-4 m-0 c-0">
            <div>
                <h3 class="product_title">SẢN PHẨM</h3>
                <form action="index.php?quanly=timkiem" method="POST">
                    <ul class="product_list">
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
                        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                        while ($row = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                            <li class="product_item">
                                <input type="checkbox" name="<?php echo $row['tenDanhMuc'] ?>" id="<?php echo $row['tenDanhMuc'] ?>">
                                <label class="checkbox_text" for="<?php echo $row['tenDanhMuc'] ?>"><?php echo $row['tenDanhMuc'] ?></label>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <h3 class="product_title">TÌM THEO</h3>
                    <h6 class="product_title">Giá sản phẩm</h6>
                    <ul class="product_list">
                    <li class="product_item">
                            <input type="checkbox" name="price_100" id="1">
                            <label class="checkbox_text" for="1">Giá dưới 5.000.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_200" id="2">
                            <label class="checkbox_text" for="2">500.000đ - 10.000.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_300" id="3">
                            <label class="checkbox_text" for="3">10.000.000đ - 15.000.000đ</label>
                        </li>
                        <li class="product_item">
                            <input type="checkbox" name="price_600" id="6">
                            <label class="checkbox_text" for="6">Giá trên 15.000.000đ</label>
                        </li>
                    </ul>
                    
                    
                    <input class="search_filter" type="submit" value="Tìm kiếm" name="filter">
                </form>
            </div>
        </div>
        <div class="col l-8">
            <div class="grid product">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_array($query_sanpham)) {
                    ?>

                        <div class="col l-3 m-4 c-6 margin product_new">
                            <div>
                                <a href="?quanly=sanpham&idsanpham=<?php echo $row['id_sanpham'] ?>">
                                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhAnh'] ?>" alt="" class="product_img">
                                </a>
                            </div>
                            <div class="product_text-4">
                                <h3 class="product_name"><?php echo $row['tenSanPham'] ?></h3>
                                <div class="change-1">
                                    <div class="after">
                                        <i class="fa-regular fa-heart"></i>
                                    </div>
                                    <div class="before">
                                        <i class="fa-solid fa-heart heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product_text-5">
                                <i class="fa-solid fa-star active star"></i>
                                <i class="fa-solid fa-star active star"></i>
                                <i class="fa-solid fa-star active star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <i class="fa-solid fa-star star"></i>
                                <div class="product_border"></div>
                                <p class="product_p"> Đã bán <?php echo $row['soLuong'] ?> </p>
                            </div>
                            <p class="product_price"><?php echo number_format($row['gia'], 0, ',', '.') . 'đ' ?></p>
                            <div class="product_new-1">
                                <p class="product_new-text">Mới</p>
                            </div>
                            <div class="product_new-2">
                                <p class="product_new-text-1">Xem Ngay</p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="page_next">
                <button class="page_btn btn_next">
                    <a class="page_link black" href="<?php if($pages>1){ echo 'index.php?pages='.($pages-1);}?>"><i class="fa-solid fa-angles-left"></i></a>
                </button>
                <?php       
                for ($i = 0; $i < $number_pages; $i++) {
                ?>
                    <button class="page_btn btn_current" <?php if($pages==($i+1)){ echo 'style="background: #117369;"';}else{ echo '';} ?>>
                        <a class="page_link" href="index.php?pages=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a>
                    </button>
                <?php
                }
                ?>
                <button class="page_btn btn_next">
                    <a class="page_link black" href="<?php if($pages<$number_pages){ echo 'index.php?pages='.($pages+1);}?>">
                        <i class="fa-solid fa-angles-right"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>