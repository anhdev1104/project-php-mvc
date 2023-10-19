<?php 
    if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1)  {
        unset($_SESSION['login']);
        header('Location: ./login.php');
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Navbar brand/logo -->
        <a class="navbar-brand" href="#">SIXDO Admin</a>

        <!-- Toggle button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlysanpham&query=add">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlydanhmuc&query=add">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlykhachhang&query=lietke">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=quanlythongke&query=lietke">Statistical</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?dangxuat=1">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>