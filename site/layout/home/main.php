<?php
$sql_category = "SELECT * FROM category ORDER BY id_category LIMIT 1";
$query_category = pdo_query($sql_category);


// Render sản phẩm
// Câu truy vấn con - lấy ID nhỏ nhất từ cột category_id
$subquery = "SELECT MIN(category_id) FROM product";
// Câu truy vấn chính - lấy tất cả sản phẩm có ID bằng với ID nhỏ nhất tìm được từ truy vấn con
$sql_product = "SELECT * FROM product WHERE product.category_id = ($subquery) GROUP BY id_product DESC LIMIT 8";
$rows = pdo_query($sql_product);
?>

<section class="content">
    <h1 class="content-heading">
        <?php foreach($query_category as $first_category) {  ?>
        <a href="newproduct.php?menu=sanphamoi&id=<?= $first_category['id_category']; } ?>" class="content-heading-link">NEW ARRIVAL</a>
    </h1>
    <div class="container">
        <div class="product-list wraper">
            <?php
            foreach ($rows as $row) {
                extract($row);
            ?>
                <div class="product-item">
                    <a href="newproduct.php?menu=chitietsanpham&id=<?= $id_product; ?>" class="product-link">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $images; ?>" alt="" class="product-img">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $images_hover; ?>" alt="" class="product-img-hover">
                    </a>
                    <div class="product-price">
                        <span class="new-price"><?= str_replace(',', '.', number_format($price)) . 'đ'; ?></span>
                    </div>
                    <div class="product-name"><a href=""><?= $title; ?></a></div>
                </div>

            <?php } ?>
        </div>
    </div>
    <a href="newproduct.php?menu=sanphamoi&id=<?= $first_category['id_category']; ?>" class="show-more">Xem thêm</a>

</section>
<section class="instagram container">
    <h1 class="insta-heading">INSTAGRAM</h1>
    <p class="insta-hashtag">@sixdo.vn</p>
    <div class="insta-main wraper">
        <div class="insta-item">
            <img src="./img/insta1.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta2.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta3.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta4.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta5.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta6.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta7.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta8.webp" alt="" class="insta-img">
        </div>
        <div class="insta-item">
            <img src="./img/insta9.webp" alt="" class="insta-img">
        </div>
    </div>
</section>
