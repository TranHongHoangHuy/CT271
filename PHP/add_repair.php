<?php
include '../conn.php';
// Nếu form đã submit, thực hiện lưu thông tin sản phẩm vào CSDL
if (isset($_POST['submit'])) {
    // Lấy thông tin sản phẩm từ form
    $id_product = $_POST['id_product'];
    $repair_type = $_POST['repair_type'];
    $price = $_POST['price'];


    // Chuẩn bị câu truy vấn SQL để thêm sản phẩm vào CSDL
    $sql = "INSERT INTO `repair` (`id_product`, `repair_type`, `price`) VALUES (:id_product, :repair_type, :price)";
    $stmt = $pdo->prepare($sql);

    // Thực hiện truy vấn SQL với thông tin sản phẩm vừa lấy từ form
    $stmt->execute([
        ':id_product' => $id_product,
        ':repair_type' => $repair_type,
        ':price' => $price
    ]);

    // Hiển thị thông báo thành công và xóa thông tin trong form
    echo "<p class='alert alert-success'>Thêm sản phẩm thành công</p>";
    $_POST = array();
}
// Lấy thông tin danh mục sản phẩm để hiển thị trong form
$sql = "SELECT * FROM `product`";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<?php
require './admin_header.php'
?>
<div class="container">
    <h1>Thêm đồ bảo hành</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="id_product">Danh mục sản phẩm:</label>
            <select class="form-control" id="id_product" name="id_product">
                <?php foreach ($products as $product) : ?>
                    <option value="<?= $product['id_product'] ?>"><?= $product['productName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="repair_type">Loại:</label>
            <select name="repair_type" id="repair-type">
                <option value="pin">Pin</option>
                <option value="man-hinh">Màn hình</option>
                <option value="ban-phim">Bàn phím</option>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Giá sửa chữa:</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>

</body>

</html>