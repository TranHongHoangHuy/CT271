<?php
include '../conn.php';
// Nếu form đã submit, thực hiện lưu thông tin sản phẩm vào CSDL
if (isset($_POST['submit'])) {
    // Lấy thông tin sản phẩm từ form
    $id_product = $_POST['id_product'];
    $url = $_POST['url'];


    // Chuẩn bị câu truy vấn SQL để thêm sản phẩm vào CSDL
    $sql = "INSERT INTO `img_list` (`id_product`, `url`) VALUES (:id_product, :url)";
    $stmt = $pdo->prepare($sql);

    // Thực hiện truy vấn SQL với thông tin sản phẩm vừa lấy từ form
    $stmt->execute([
        ':id_product' => $id_product,
        ':url' => $url
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
    <h1>Thêm img mới</h1>
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
            <label for="url">Link ảnh sản phẩm:</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Nhập link ảnh sản phẩm" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>

</body>

</html>