<main>
    <section class="main-product wraper container">
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-search'])) {
            $item = $_POST['search-item'];
        } else {
            $item = '';
        }

        if ($item) {
            include "main/viewsearch.php";
        } else {
            if (isset($_GET['menu'])) {
                $temp = $_GET['menu'];
            } else {
                $temp = '';
            }

            if ($temp != 'chitietsanpham') {
                include('sidebar.php');
            }
    ?>
            <div class="list-product">
                <?php
                if ($temp == 'chitietsanpham') {
                    include('main/productdetail.php');
                } else {
                    include('main/index.php');
                }
                ?>
            </div>
    <?php } ?>
    </section>

</main>