<?php
include('../conn.php');

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $query = "SELECT * FROM product WHERE productName LIKE :input OR productCode LIKE :inputCode OR author LIKE :inputAuthor OR ISBN LIKE :inputISBN";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':input', '%' . $input . '%', PDO::PARAM_STR);
    $stmt->bindValue(':inputCode', $input . '%', PDO::PARAM_STR);
    $stmt->bindValue(':inputAuthor', '%' . $input . '%', PDO::PARAM_STR);
    $stmt->bindValue(':inputISBN', $input . '%', PDO::PARAM_STR);
    $stmt->execute();


    if ($stmt->rowCount() > 0) { ?>
        <ul class="list-group mt-4">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <li class="list-group-item">
                    <a class="d-block stretched-link" href="product.php?id_product=<?php echo $row['id_product']; ?>">
                        <?php echo $row['productName']; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
<?php } else {
        echo "<h6 class='text-danger text-center'>Không có kết quả </h6>";
    }
}
?>