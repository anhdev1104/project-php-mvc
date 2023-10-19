<?php
    if (isset($_GET['action']) && isset($_GET['query'])) {
        $temp = $_GET['action'];
        $query = $_GET['query'];
    } else {
        $temp = '';
        $query = '';
    }

    if ($temp == 'quanlysanpham' && $query == 'add') { //quản lý sản phẩm
        include 'modules/quanlyproduct/add.php';
        include 'modules/quanlyproduct/listed.php';
    } 
    else if ($temp == 'quanlysanpham' && $query == 'edit') {
        include 'modules/quanlyproduct/edit.php';
    } 
    else if ($temp == 'quanlydanhmuc' && $query == 'add') { //quản lý danh mục
        include 'modules/quanlycategory/add.php';
        include 'modules/quanlycategory/listed.php';    
    } 
    else if ($temp == 'quanlydanhmuc' && $query == 'edit') {
        include 'modules/quanlycategory/edit.php';
    } 
    else if ($temp == 'quanlydonhang' && $query == 'lietke') { // quản lý đơn hàng
        include 'modules/quanlyorder/listed.php';
    } 
    else if ($temp == 'donhang' && $query == 'xemdonhang') {
        include 'modules/quanlyorder/vieworder.php';
    } 
    else if ($temp == 'quanlykhachhang' && $query == 'lietke') { // quản lý Customers
        include 'modules/quanlycustomers/view.php';
    } 
    else if ($temp == 'customers' && $query == 'xemcustomers') {
        include 'modules/quanlycustomers/handle.php';
    } else if ($temp == 'quanlythongke' && $query == 'lietke') { // quản lý thống kê
        include 'modules/quanlystatistical/view.php';
    } else {
        include 'modules/dashboard.php';
    }

?> 

