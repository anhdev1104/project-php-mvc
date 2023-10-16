<?php
include('../config/pdo.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/newproduct.css">
    <link rel="stylesheet" href="./css/productdetails.css">
    <link rel="stylesheet" href="./css/viewsearch.css">
</head>

<body>
    <div class="app">
        <?php
        include('./layout/product/header.php');
        include('./layout/product/main.php');
        include('./layout/home/footer.php');
        ?>
    </div>


    <script src="./js/app.js"></script>
    <script>
        // ======== toggle search =========
        const search = document.querySelector('#search')
        const searchBlock = document.querySelector('.search-block')
        const formSearch = searchBlock.querySelector('.search-form')
        formSearch.addEventListener('submit', function(e) {
            const searchInput = this.querySelector('.search-input')
            if (searchInput.value.trim() === '') {
                alert('Vui lòng nhập tên sản phẩm trước khi tìm kiếm.')
                e.preventDefault()
            }
        })
        search.addEventListener('click', () => searchBlock.classList.toggle('active-search'))
        searchBlock.addEventListener('click', (e) => e.stopPropagation())
    </script>
</body>

</html>