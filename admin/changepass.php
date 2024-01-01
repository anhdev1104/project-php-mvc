<?php
session_start();
include('../config/pdo.php');

if (isset($_POST['changepass'])) {
    $username = $_POST['email'];
    $password_old = md5($_POST['password_old']); 
    $password_new = md5($_POST['password_new']); 

    // Kiểm tra thông tin đăng nhập trong bảng 'user'
    $user_sql = "SELECT * FROM user WHERE email = '$username' AND password = '$password_old' LIMIT 1";
    $user_result = mysqli_query($conn, $user_sql);
    $user_account = mysqli_fetch_array($user_result);
    
    if ($user_account) {
        $sql_update = mysqli_query($conn, "UPDATE user SET password = '$password_new' WHERE email = '$username' AND password = '$password_old' LIMIT 1");

        echo "<script>alert('Tạo lại mật khẩu thành công !')</script>";
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu chưa chính xác, vui lòng nhập lại !')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
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
                <h1 class="register-heading">ĐỔI MẬT KHẨU</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" id="form2">
                    <div class="form-group">
                        <label for="email" class="title">Email</label>
                        <input type="email" name="email" id="email" class="input" placeholder="Email đăng nhập" required>
                    </div>
                    <div class="form-group">
                        <label for="password_old" class="title">Mật khẩu cũ</label>
                        <input type="password" name="password_old" id="password_old" class="input" placeholder="Nhập tối thiểu 6 kí tự" required>
                    </div>
                    <div class="form-group">
                        <label for="password_new" class="title">Mật khẩu mới</label>
                        <input type="password" name="password_new" id="password_new" class="input" placeholder="Nhập tối thiểu 6 kí tự" required>
                    </div>
                    <a href="./login.php" class="register-link">Quay về trang đăng nhập.</a>
                    <button type="submit" name="changepass" class="btn-form">THIẾT LẬP LẠI MẬT KHẨU</button>
                </form>
            </section>
        </main>
    </div>
</body>

</html>
