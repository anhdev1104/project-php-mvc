<?php
session_start();
include('../config/pdo.php');

if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = md5($_POST['password']); 

    // Kiểm tra thông tin đăng nhập trong bảng 'admin'
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1";
    $account = pdo_query_one($sql);

    // Kiểm tra thông tin đăng nhập trong bảng 'user'
    $user_sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password' LIMIT 1";
    $user_account = pdo_query_one($user_sql);

    if ($account) {
        $_SESSION['login'] = $account;
        header('Location: index.php');
    } else if ($user_account) {
        $_SESSION['login_user'] = $user_account['fullname'];
        $_SESSION['id_user'] = $user_account['id_user'];
        header('Location: ../site/index.php');
    } else {
        $_SESSION['login_error'] = true;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../site/css/base.css">
    <link rel="stylesheet" href="../site/css/register.css">
</head>

<body>
    <div class="app">
        <main class="register wraper">
            <section class="register-left">
                <img src="../site/img/login2.jpg" alt="" class="register-img">
            </section>
            <section class="register-right">
                <h1 class="register-heading">ĐĂNG NHẬP TÀI KHOẢN</h1>

                <?php
                if (isset($_SESSION['login_error']) && $_SESSION['login_error']) {
                    echo "<script>alert('Tài khoản hoặc mật khẩu chưa chính xác, vui lòng nhập lại !')</script>";
                    unset($_SESSION['login_error']); // Xóa login_error sau khi hiển thị cảnh báo
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="form2">
                    <div class="form-group">
                        <label for="email" class="title">Email</label>
                        <input type="email" name="email" id="email" class="input" placeholder="Email đăng nhập" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="title">Mật khẩu</label>
                        <input type="password" name="password" id="password" class="input" placeholder="Nhập tối thiểu 6 kí tự" required>
                    </div>
                    <a href="./changepass.php" class="register-link">Đổi mật khẩu.</a>
                    <a href="./register.php" class="register-link">Đăng ký tài khoản !</a>
                    <button type="submit" name="login" class="btn-form">ĐĂNG NHẬP</button>
                </form>
            </section>
        </main>
    </div>
</body>

</html>