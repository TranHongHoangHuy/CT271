<?php
include '../conn.php';

// Lấy ID của sản phẩm từ form POST
$id_product = $_POST['id_product'];
// Lấy danh sách hình ảnh từ bảng img_list
$stmt = $pdo->prepare('SELECT * FROM img_list WHERE id_product = :id_product');
$stmt->bindParam(':id_product', $id_product);
$stmt->execute();
$img_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Lấy danh sách hình ảnh từ bảng img_info
$stmt = $pdo->prepare('SELECT * FROM img_info WHERE id_product = :id_product');
$stmt->bindParam(':id_product', $id_product);
$stmt->execute();
$img_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
require './admin_header.php'
?>
<main style="min-height: 500px;">
    <div class="container mt-5 mb-5 row">
        <h1 class="text-center mb-4"> Thông tin ảnh</h1>
        <div class="col-md-6">
            <h2 class="text-center">img_list</h2>
            <a href="./add_list_img.php" class="btn btn-primary" style="margin-bottom: 30px;">
                <i class="fa fa-plus"></i> Thêm img_list</a>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($img_list as $img) : ?>
                        <tr>
                            <td><img src="<?php echo $img['url']; ?>" style="height: 200px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Ảnh</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-md-6">
            <h2 class="text-center">img_info</h2>
            <a href="./add_img_info.php" class="btn btn-primary" style="margin-bottom: 30px;">
                <i class="fa fa-plus"></i> Thêm img_info</a>
            <table id="example2" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Ảnh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($img_info as $img) : ?>
                        <tr>
                            <td><img src="<?php echo $img['url_info']; ?>" style="height: 200px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Ảnh</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>

<?php include './footer.php'; ?>

</html>