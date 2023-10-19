<?php
include "../config/product.php";
include "../config/comment.php";
$sql_details = "SELECT * FROM product, category WHERE product.category_id=category.id_category AND product.id_product='$_GET[id]' ORDER BY id_product LIMIT 1";
$query_details = pdo_query($sql_details);
foreach ($query_details as $row) {
    extract($row);
?>

    <section class="product-details">
        <form action="layout/product/main/cart.php?idsanpham=<?= $id_product; ?>" method="POST">
            <div class="breadcrumb">
                <a href="#!" class="breadcrumb-link">TRANG CHỦ</a>
                <a href="#!" class="breadcrumb-link"><?= $category_name; ?></a>
                <a href="#!" class="breadcrumb-link"><?= $title; ?></a>
            </div>
            <div class="main-details wraper">
                <div class="details-left">
                    <ul class="details-list-img">
                        <li class="details-item-img active-img">
                            <img src="../admin/modules/quanlyproduct/uploads/<?= $images; ?>" alt="">
                        </li>
                        <li class="details-item-img">
                            <img src="../admin/modules/quanlyproduct/uploads/<?= $images_hover; ?>" alt="">
                        </li>
                    </ul>
                    <div class="details-box">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $images; ?>" alt="" class="details-img">

                        <div class="image-cover"></div>
                    </div>
                </div>
                <div class="details-right">
                    <h2 class="details-title"><?= $title; ?></h2>
                    <span class="details-quantity">SL KHO CÒN: <?= $quantity; ?></span>
                    <p class="details-price">
                        <span class="current-price"><?= str_replace(',', '.', number_format($price)) . 'đ'; ?></span>
                        <span class="details-old-price"><?= str_replace(',', '.', number_format($old_price)) . 'đ'; ?></span>
                    </p>
                    <p class="details-size">
                        SIZE :
                        <span></span>
                    </p>
                    <div class="details-options wraper">
                        <div class="options-size wraper">
                            <a href="#!" class="item-option">S</a>
                            <a href="#!" class="item-option">M</a>
                            <a href="#!" class="item-option">L</a>
                        </div>
                        <div class="modal-size" id="modal-size">
                            Tìm đúng kích thước →
                        </div>
                        <div class="overlay" id="overlay">
                            <div class="box-size" id="box-size">
                                <div class="box-size-close" id="close-icon">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <img src="./img/boxsize.jpg" alt="" class="box-size-img">
                            </div>
                        </div>

                    </div>
                    <div class="details-add wraper">
                        <input type="submit" name="addproductdetails" class="add-cart" value="THÊM VÀO GIỎ HÀNG">
                        <a href="#!" class="details-heart">
                            <i class="fa-regular fa-heart heart-icon heart-details"></i>
                        </a>
                    </div>
                    <div class="details-description">
                        <h3 class="description-tile">CHI TIẾT SẢN PHẨM</h3>
                        <p class="descripton-content">Hoa Poppy – loài hoa gây nghiện và sở hữu trong mình nét đẹp tiềm tàng. Sở hữu ngay làn gió mới với họa tiết hoa Poppy thuộc BST Colorfull Poppy của SIXDO ngay thôi!</p>
                        <p class="descripton-content"><?= $descript ?></p>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <div class="details-comment">
        <div class="comment-heading">ĐÁNH GIÁ SẢN PHẨM</div>
        <form action="" method="POST" class="comment-form">
            <div class="form-control">
                <input type="hidden" name="product_id_comment" value="<?= $id_product ?>">
                <?php
                $name_user_comment = $_SESSION['login_user'] ?? '';
                $name_register_comment = $_SESSION['register'] ?? '';
                ?>
                <input type="hidden" name="name_user_comment" value="<?php
                    if ($name_user_comment) {
                        echo $name_user_comment;
                    } else if ($name_register_comment) {
                        echo $name_register_comment;
                    } else {
                        echo "";
                    }
                    ?>">
                <input type="text" class="comment-input" name="comment" placeholder="Comment">
                <button type="submit" name="submit_comment" class="comment-submit" title="Gửi"><i class="fa-regular fa-paper-plane"></i></button>
            </div>
        </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_comment'])) {
                $comment = insert_comment();
                if ($comment === 'comment_required') {
            ?>
                    <script>
                        alert('Vui lòng đăng nhập để đánh giá sản phẩm !');
                    </script>
                <?php }
                ?>

                
            <?php 
            } 
            $sql = select_comment();
                $rows = pdo_query($sql);
                foreach ($rows as $row) { 
                    extract($row);
                    ?>
        <div class="comment-user">
        <h2 class="comment-name"><?= $fullname ?></h2>
        <p class="comment-note"><?= $note ?></p>
        </div>
    <?php } ?>
    </div>
<?php } ?>

<section class="favorite-product">
    <div class="favorite-head wraper">
        <h1 class="favorite-heading">CÓ THỂ BẠN CŨNG THÍCH</h1>
        <div class="favorite-btn-wrap wraper">
            <div class="favorite-btn-box">
                <i class="fa fa-angle-left btn-prev"></i>
            </div>
            <div class="favorite-btn-box">
                <i class="fa fa-angle-right btn-next"></i>
            </div>
        </div>
    </div>

    <div class="main-favorite wraper">
        <div class="favorite-list wraper">
            <?php
            $sql = random_product();
            $sql_ramdom = pdo_query($sql);
            foreach ($sql_ramdom as $ramdom) {
                extract($ramdom);
            ?>
                <div class="favorite-item">
                    <a href="newproduct.php?menu=chitietsanpham&id=<?= $id_product; ?>" class="favorite-link-item">
                        <img src="../admin/modules/quanlyproduct/uploads/<?= $images ?>" alt="" class="favorite-img">
                    </a>
                    <h3 class="favorite-title"><?= $title ?></h3>
                    <p class="favorite-price"><?= str_replace(',', '.', number_format($price)) . 'VNĐ'; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>


</section>