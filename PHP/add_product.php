<?php
include '../conn.php';
// Nếu form đã submit, thực hiện lưu thông tin sản phẩm vào CSDL
if (isset($_POST['submit'])) {
    // Lấy thông tin sản phẩm từ form
    $id_catalog = $_POST['id_catalog'];
    $productName = $_POST['productName'];
    $productOption = $_POST['productOption'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    $image_link = $_POST['image_link'];
    $content = $_POST['content'];

    // Chuẩn bị câu truy vấn SQL để thêm sản phẩm vào CSDL
    $sql = "INSERT INTO `product` (`id_catalog`, `productName`, `productOption`, `price`, `discount`, `image_link`, `content`) VALUES (:id_catalog, :productName, :productOption, :price, :discount, :image_link, :content)";
    $stmt = $pdo->prepare($sql);

    // Thực hiện truy vấn SQL với thông tin sản phẩm vừa lấy từ form
    $stmt->execute([
        ':id_catalog' => $id_catalog,
        ':productName' => $productName,
        ':productOption' => $productOption,
        ':price' => $price,
        ':discount' => $discount,
        ':image_link' => $image_link,
        ':content' => $content
    ]);

    // Hiển thị thông báo thành công và xóa thông tin trong form
    echo "<p class='alert alert-success'>Thêm sản phẩm thành công</p>";
    $_POST = array();
}
// Lấy thông tin danh mục sản phẩm để hiển thị trong form
$sql = "SELECT * FROM `catalog`";
$stmt = $pdo->query($sql);
$catalogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
require './admin_header.php'
?>
<div class="container">
    <h1>Thêm sản phẩm mới</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="id_catalog">Danh mục sản phẩm:</label>
            <select class="form-control" id="id_catalog" name="id_catalog">
                <?php foreach ($catalogs as $catalog) : ?>
                    <option value="<?= $catalog['id_catalog'] ?>"><?= $catalog['catalogName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="productName">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="productName" name="productName" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="form-group">
            <label for="productOption">Tùy chọn sản phẩm:</label>
            <input type="text" class="form-control" id="productOption" name="productOption" placeholder="Nhập tùy chọn sản phẩm" required>
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm:</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm" required>
        </div>
        <div class="form-group">
            <label for="discount">Giảm giá sản phẩm:</label>
            <input type="number" class="form-control" id="discount" name="discount" placeholder="Nhập giảm giá sản phẩm">
        </div>
        <div class="form-group">
            <label for="image_link">Link ảnh sản phẩm:</label>
            <input type="text" class="form-control" id="image_link" name="image_link" placeholder="Nhập link ảnh sản phẩm" required>
        </div>
        <div class="form-group">
            <label for="content">Mô tả sản phẩm:</label>
            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Nhập mô tả sản phẩm" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>

</body>

</html>