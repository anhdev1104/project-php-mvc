<?php
$sql_category = "SELECT * FROM category ORDER BY stt ASC";
$rows_category = pdo_query($sql_category);
?>

<div class="nav-menu">
    <ul class="menu-list wraper">
        <?php
        foreach ($rows_category as $row_category) {
            extract($row_category);
        ?>
            <li class="menu-item">
                <a href="newproduct.php?menu=sanphamoi&id=<?= $id_category; ?>" class="item-link"><?= $category_name; ?></a>
            </li>
        <?php } ?>
        <li class="menu-item">
            <a href="collection.php" class="item-link">BỘ SƯU TẬP</a>
        </li>
        <li class="menu-item">
            <a href="fashionshow.php" class="item-link">TRÌNH DIỄN
                THỜI TRANG</a>
        </li>
    </ul>
</div>