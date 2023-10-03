<?php 
    $id = $_GET['iduser'];
    $sql_delete = "DELETE FROM user WHERE id_user = '$id'";
    pdo_execute($sql_delete);
    header('Location: index.php?action=quanlykhachhang&query=lietke');
?>