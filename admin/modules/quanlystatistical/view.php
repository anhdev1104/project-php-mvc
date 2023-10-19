<?php
// $sql = "SELECT category.*, COUNT(product.category_id) AS number_cate
// FROM category
// LEFT JOIN product ON category.id_category = product.category_id
// GROUP BY category.id_category;
// ";

// $rows = pdo_query($sql);
$pdo = pdo_get_connection();
$query = $pdo->query("SELECT `category`.*, COUNT(product.category_id) AS 'category_id' FROM `product` INNER JOIN `category` ON product.category_id = category.id_category GROUP BY product.category_id");

$data = [];
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    // Sử dụng dữ liệu trong mỗi dòng
    $data[] = $row;
}

?>

<div>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="myChart" style="width:100%; max-width:600px; height:500px; margin: 0 auto;">
    </div>

    <script>
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Set Data
            const data = google.visualization.arrayToDataTable([
                ['category_name', 'category_id'],
                <?php
                foreach ($data as $key) {
                    echo "['" . $key['category_name'] . "' , " . $key['category_id'] . "],";
                }
                ?>

            ]);

            // Set Options
            const options = {
                title: 'Biểu đồ thống kê số lượng sản phẩm trong từng danh mục',
                is3D: true
            };

            // Draw
            const chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);

        }
    </script>

</div>