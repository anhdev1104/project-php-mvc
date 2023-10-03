<?php
$limit = 6;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = '';
}

if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * $limit) - $limit;
}

$sql_product = "SELECT * FROM product WHERE product.category_id='$_GET[id]' ORDER BY id_product DESC LIMIT $begin, $limit";
$query_product = pdo_query($sql_product);
// GET category_name 
$sql_category = "SELECT * FROM category WHERE category.id_category = '$_GET[id]' LIMIT 1";
$query_category = pdo_query($sql_category);
foreach ($query_category as $row_title) {
?>

<form action="">
    <div class="list-product-head wraper">
        <div class="product-head-wrap wraper">
            <p class="category-title"><?= $row_title['category_name']; }?></p>
            <span>(486 Item)</span>
        </div>
        <div class="product-sort wraper">
            <i class="fa-solid fa-list-ol"></i>
            <span>SORT</span>
        </div>
    </div>

    <div class="product-list wraper">
        <?php
        foreach ($query_product as $row_product) {
            if ($row_product['statuser'] == 1) {
        ?>
                <div class="product-item">
                    <a href="newproduct.php?menu=chitietsanpham&id=<?= $row_product['id_product']; ?>" class="product-link">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $row_product['images']; ?>" alt="" class="product-img">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $row_product['images_hover']; ?>" alt="" class="product-img-hover">
                    </a>
                    <div class="product-price-heart wraper">
                        <div class="product-price wraper">
                            <span class="new-price"><?= str_replace(',', '.', number_format($row_product['price'])) . 'đ'; ?></span>
                            <span class="old-price"><?= str_replace(',', '.', number_format($row_product['old_price'])) . 'đ'; ?></span>
                        </div>
                        <i class="fa-regular fa-heart heart-icon heart"></i>
                        <i class="fa-solid fa-heart heart-icon heartRed"></i>
                    </div>
                    <div class="product-name"><a href=""><?= $row_product['title']; ?></a></div>
                </div>
        <?php }
        } ?>
    </div>
</form>

<?php 
    $sql_page = "SELECT * FROM product WHERE product.category_id='$_GET[id]'";
    $row_page = pdo_row_count($sql_page);
    $pages = ceil($row_page / $limit);
?>
<div class="pagination"> 
        <span>Page:</span>
    <?php 
        for($i = 1; $i <= $pages; $i++) {
    ?>
        <a 
        <?= ($i == $page) ? 'style="background-color: var(--second-color); color: var(--primary-color);"' : ''; ?>
        href="newproduct.php?menu=sanphamoi&id=<?= $row_title['id_category']; ?>&page=<?= $i ?>" class="page"><?= $i ?></a>
    <?php } ?>
</div>