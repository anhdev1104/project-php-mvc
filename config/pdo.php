<?php
// Thông tin kết nối đến cơ sở dữ liệu sử dụng PDO
function pdo_get_connection() {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_fashionpage';

    try {
        // Kết nối vào cơ sở dữ liệu bằng PDO
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Thiết lập chế độ lấy dữ liệu trả về là mảng kết hợp (associative array)
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Xử lý nếu có lỗi kết nối hoặc truy vấn
        echo "Lỗi kết nối: " . $e->getMessage();
    }
    return $conn;
}

// Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


// Truy vấn nhiều dữ liệu (SELECT)
function pdo_query($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn một dữ liệu bảng ghi
function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn một giá trị
function pdo_query_value($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

// Truy vấn đếm số hàng
function pdo_row_count($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rowCount = $stmt->rowCount();
        return $rowCount;
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
?>
