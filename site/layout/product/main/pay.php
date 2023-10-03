<?php 
    session_start();
    include('../../../../config/pdo.php');

    $id_user = $_SESSION['id_user'];
    $code_order = rand(0, 9999);
    $insert_cart = "INSERT INTO cart_order(user_id, code_cart, order_status) VALUE ('$id_user','$code_order', 1)";
    $cart_query = pdo_execute($insert_cart);

    if ($cart_query) {
        // Thêm giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value) {
            $id_product = $value['id'];
            $quantity = $value['quantity'];
            $insert_order_details = "INSERT INTO order_details(id_product, code_cart, quantity_buy) VALUE('$id_product', '$code_order', '$quantity')";
            pdo_execute($insert_order_details);
        }
    }

    if (!$cart_query) {
        echo "Lỗi khi thực hiện truy vấn: " . print_r($stmt->errorInfo(), true);
    }

    unset($_SESSION['cart']);
    header('Location: ../../../thanksbuy.php');
?>
