<?php 
    $sql_get_cart = "SELECT * FROM order_details, product WHERE order_details.id_product=product.id_product AND order_details.code_cart='$_GET[code]' ORDER BY order_details.id_orderdetails DESC";
    $query_get_cart = pdo_query($sql_get_cart);
?>

<div class="container mt-5">
    <h2>Chi tiết Orders sản phẩm</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 0;
                $result = 0;
                foreach ($query_get_cart as $row) {
                    extract($row);
                    $i++;
                    $total = $price * $quantity_buy;
                    $result += $total;
                ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $code_cart; ?></td>
                        <td><?= $title; ?></td>
                        <td><?= str_replace(',', '.', number_format($price)).'đ'; ?></td>
                        <td><?= $quantity_buy; ?></td>
                        <td><?= str_replace(',', '.', number_format($total)).'đ'; ?></td>

                    </tr>
            <?php } ?>
            <tr>
                <th scope="row" colspan="6" style="text-align: right; padding-right: 25px; color:red">Tổng tiền: <?= str_replace(',', '.', number_format($result)).'đ'; ?></th>

            </tr>
        </tbody>
    </table>
</div>




