<?php
    function insert_product($name_product, $image_product, $image_product2, $price_product, $price2_product, $quantity_product, $desc_product, $status_product, $category_product)  {
        return "INSERT INTO product(title, images, images_hover, price, old_price, quantity, descript, statuser, category_id) VALUE ('$name_product', '$image_product', '$image_product2', '$price_product', '$price2_product', '$quantity_product', '$desc_product', '$status_product', '$category_product')";
    }

    function handle_upload_img_success($name_product, $image_product, $price_product, $price2_product, $quantity_product, $desc_product, $status_product, $category_product, $id) {
        return "UPDATE product SET title='$name_product', images='$image_product', price='$price_product', old_price='$price2_product', quantity='$quantity_product', descript='$desc_product', statuser='$status_product', category_id='$category_product' WHERE id_product='$id'";
    }

    function handle_img_nothing_change($name_product, $price_product, $price2_product, $quantity_product, $desc_product, $status_product, $category_product, $id) {
        return "UPDATE product SET title='$name_product', price='$price_product', old_price='$price2_product', quantity='$quantity_product', descript='$desc_product', statuser='$status_product', category_id='$category_product' WHERE id_product='$id'";
    }

    function handle_upload_img2_success($name_product, $image_product2, $price_product, $price2_product, $quantity_product, $desc_product, $status_product, $category_product, $id) {
        return "UPDATE product SET title='$name_product', images_hover='$image_product2', price='$price_product', old_price='$price2_product', quantity='$quantity_product', descript='$desc_product', statuser='$status_product', category_id='$category_product' WHERE id_product='$id'";
    }

    function view_product() {
        header('Location: ../../index.php?action=quanlysanpham&query=add');
    }

    function random_product() {
        return "SELECT * FROM product ORDER BY RAND() LIMIT 10";
    }
?>