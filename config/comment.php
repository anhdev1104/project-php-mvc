<?php 
    function insert_comment() {
        $comment = $_POST['comment'];
        $product_id = $_POST['product_id_comment'];
        $name_user_comment = $_POST['name_user_comment'];

        if ($name_user_comment === '' || $comment === '') {
            return "comment_required";
        } else {
            $querry = "INSERT INTO comment(note, product_id, fullname) VALUES('$comment', '$product_id', '$name_user_comment')";
            $result = pdo_execute($querry);
            if ($result) {
                return "Bình luận sẽ được admin kiểm duyệt !";
            } else {
                return "Bình luận không thành công";
            }
        }
    }

    function select_comment() {
        return "SELECT * FROM comment WHERE comment.product_id='$_GET[id]' ORDER BY id_comment DESC";
    }
?>