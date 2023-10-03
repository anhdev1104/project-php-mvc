<?php
session_start();
include('../../../../config/pdo.php');

// add sản phảm vào giỏ hàng
if (isset($_POST['addproductdetails'])) {
    // session_destroy();
    $id = $_GET['idsanpham'];

    // Số lượng sản phẩm mặc định khi thêm vào giỏ hàng
    $quantity = 1;

    // Truy vấn để lấy thông tin sản phẩm từ cơ sở dữ liệu
    $sql = "SELECT * FROM product WHERE id_product = '$id' LIMIT 1";
    $row = pdo_query_one($sql);

    if ($row) {
        // Tạo một mảng chứa thông tin sản phẩm mới
        $new_product = array(
            'nameProduct' => $row['title'],
            'id' => $id,
            'quantity' => $quantity,
            'price' => $row['price'],
            'imageProduct' => $row['images']
        );

        // Kiểm tra xem giỏ hàng đã tồn tại hay chưa
        if (isset($_SESSION['cart'])) {
            $found = false;

            // Duyệt qua từng sản phẩm trong giỏ hàng
            foreach ($_SESSION['cart'] as &$cart_item) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng lên
                if ($cart_item['id'] == $id) {
                    $cart_item['quantity'] += $quantity;
                    $found = true;
                }
            }

            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào
            if (!$found) {
                $_SESSION['cart'][] = $new_product;
            }
        } else {
            // Nếu giỏ hàng chưa tồn tại, tạo giỏ hàng mới và thêm sản phẩm vào
            $_SESSION['cart'][] = $new_product;
        }
    }

    header('Location: ../../../viewcart.php');
}

// delete all sản phẩm
if (isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1) {
    unset($_SESSION['cart']); // xoá sessison được chỉ định
    header('Location: ../../../viewcart.php');
}

// Delete một sản phẩm 
if (isset($_SESSION['cart']) && isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $new_cart = array(); // Tạo một mảng mới để lưu giỏ hàng đã cập nhật

    foreach($_SESSION['cart'] as $cart_item) {
        if ($cart_item['id'] != $id) {
            // Nếu sản phẩm hiện tại không phải sản phẩm cần xoá, thêm nó vào mảng giỏ hàng mới
            $new_cart[] = $cart_item;
        }
    }

    $_SESSION['cart'] = $new_cart; // Cập nhật giỏ hàng với mảng giỏ hàng mới

    header('Location: ../../../viewcart.php');
}

// thêm số lượng sản phẩm 
if (isset($_GET['cong'])) {
    $id = $_GET['cong'];
    foreach($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $id) {
            if ($cart_item['quantity'] < 6) {
                $cart_item['quantity'] += 1;   
            }
            break;
        }
    }
    header('Location: ../../../viewcart.php');
}

// trừ số lượng sản phẩm 
if (isset($_GET['tru'])) {
    $id = $_GET['tru'];
    foreach($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['id'] == $id) {
            if ($cart_item['quantity'] > 1) {
                $cart_item['quantity'] -= 1;   
            }
            break;
        }
    }
    header('Location: ../../../viewcart.php');
}
?>
