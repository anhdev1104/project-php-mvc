<?php 
    $sql_get_customers = "SELECT * FROM user";
    $sql_customers_query = pdo_query($sql_get_customers);
?>


<div class="container mt-5">
    <h2>Danh sách Customers</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-primary">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Mật khẩu mã hoá MD5</th>
                <th scope="col">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sql_customers_query as $row) {
                extract($row);
            ?>
                <tr>
                    <th scope="row"><?= $id_user; ?></th>
                    <td><?= $fullname; ?></td>
                    <td><?= $email; ?></td>
                    <td><?= '0' . $phonenumber; ?></td>
                    <td style="width: 250px;"><?= $address; ?></td>
                    <td><?= $password; ?></td>
                    <td>
                        <a href="index.php?action=customers&query=xemcustomers&iduser=<?= $id_user ?>" class="nav-link btn btn-danger mx-2">DELETE</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>