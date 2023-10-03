<?php
    $sql_category = "SELECT * FROM category ORDER BY stt ASC";
    $query_category = pdo_query($sql_category);
?>

<div class="nav-menu">
    <ul class="menu-list wraper">
        <?php
            foreach($query_category as $row) {
                extract($row);
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