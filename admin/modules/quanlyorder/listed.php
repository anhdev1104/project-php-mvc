<?php
$sql_get_cart = "SELECT * FROM cart_order, user WHERE cart_order.user_id=user.id_user ORDER BY cart_order.id_order DESC";
$query_get_cart = pdo_query($sql_get_cart);
?>

<div class="container mt-5">
    <h2>Danh sách Orders sản phẩm</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($query_get_cart as $row) {
                extract($row);
                $i++;
            ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $code_cart; ?></td>
                    <td><?= $fullname; ?></td>
                    <td style="width: 250px;"><?= $address; ?></td>
                    <td><?= $email; ?></td>
                    <td><?= '0' . $phonenumber; ?></td>
                    <td>
                        <select class="form-select" name="orderStatus">
                            <?php
                            if ($order_status == 1) {
                            ?>
                                <option value="1" selected>Đơn hàng mới</option>
                                <option value="0">Đã giao hàng</option>
                            <?php
                            } else {
                            ?>
                                <option value="0" selected>Đã giao hàng</option>
                                <option value="1">Đơn hàng mới</option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <a href="index.php?action=donhang&query=xemdonhang&code=<?= $code_cart; ?>" class="nav-link btn btn-success mx-2">CHI TIẾT</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>