<?php
// Lấy dữ liệu từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['search-item'];

    // Truy vấn cơ sở dữ liệu
    $query = "SELECT * FROM product WHERE title LIKE '%$item%'";
    $result = pdo_query($query);
    $numResults = count($result);
?>

    <section class="view-search">
        <h1 class="search-heading">Có <?= $numResults ?> kết quả cho từ khóa</h1>
        <div class="product-list2 wraper">
            <?php
            foreach ($result as $row) { ?>
                <div class="product-item2">
                    <a href="" class="product-link2">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $row['images'] ?>" alt="" class="product-img2">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $row['images_hover'] ?>" alt="" class="product-img-hover2">
                    </a>
                    <div class="product-price2">
                        <span class="new-price2"><?= str_replace(',', '.', number_format($row['price'])) . 'đ'; ?></span>
                    </div>
                    <div class="product-name2"><a href=""><?= $row["title"] ?></a></div>
                </div>
        <?php }
        } ?>
        </div>
    </section>