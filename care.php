<?php
include './conn.php';
require './PHP/header.php';

$products = $pdo->query("SELECT repair.repair_type, repair.price, product.productName 
FROM repair 
JOIN product ON repair.id_product = product.id_product 
WHERE product.id_catalog = 1;
")->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="row">
        <div class="col-12 care">
            <h1>Dịch vụ sửa chữa Macbook</h1>
            <img src="../ASSETS/IMG/front/apple-macbook-pro-m2-2022-16gb-256gb-bac-1-2-650x650.jpg" alt="">
            <table class="table table-hover care_table">
                <thead>
                    <tr>
                        <th>Loại</th>
                        <th>Dòng máy</th>
                        <th>Chi phí</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?php echo $product['repair_type']; ?></td>
                            <td><?php echo $product['productName']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script>
    document.title = "Bảo hành";
</script>

<?php include './PHP/footer.php'; ?>