<?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $temp = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $temp = '';
        $query = '';
    }

    if ($temp == 'quanlysanpham' && $query == 'add') { //quản lý sản phẩm
        include('modules/quanlyproduct/add.php');
        include('modules/quanlyproduct/listed.php');
    } else if ($temp == 'quanlysanpham' && $query == 'edit') {
        include('modules/quanlyproduct/edit.php');
    } else if ($temp == 'quanlydanhmuc' && $query == 'add') { //quản lý danh mục
        include('modules/quanlycategory/add.php');
        include('modules/quanlycategory/listed.php');
    } else if ($temp == 'quanlydanhmuc' && $query == 'edit') {
        include('modules/quanlycategory/edit.php');
    } else{
        include('modules/dashboard.php');
    }


?> 

<!-- } else if ($temp == 'quanlydonhang') {
        
    } else if ($temp == 'caidat') {
        
    } else if ($temp == 'dangxuat') {
         -->

