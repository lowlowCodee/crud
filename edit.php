<?php

require "connection.php";
$id = $_GET['id'];

$editProduct = "SELECT  * FROM products WHERE id=:id";
$stmt = $pdo->prepare($editProduct);
$stmt->execute([
    ":id" => $id
]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>


<form action="./process/update.php" method="post">
    <input type="hidden" name="id" required value="<?= $row['id'] ?>">
    <label for="name">PRODUCT NAME:</label>
    <input type="text" name="name" required value="<?= $row['name'] ?>"> <br><br>

    <label for="barcode">BARCODE:</label>
    <input type="text" name="barcode" required value="<?= $row['barcode'] ?>"> <br><br>

    <label for="quantity">QUANTITY:</label>
    <input type="number" name="quantity" required value="<?= $row['quantity'] ?>"> <br><br>

    <label for="price">PRICE:</label>
    <input type="number" name="price" required value="<?= $row['price'] ?>"> <br><br>
    <button type="submit">SUBMIT</button>
</form>