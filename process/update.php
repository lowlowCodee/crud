<?php
require "../connection.php";

$name = htmlspecialchars($_POST['name']);
$barcode = htmlspecialchars($_POST['barcode']);
$quantity = htmlspecialchars($_POST['quantity']);
$price = htmlspecialchars($_POST['price']);
$id = $_POST['id'];

$insert = "UPDATE products SET
                    name= :name,
                    barcode= :barcode,
                    quantity=:quantity,
                    price=:price
                WHERE id=:id";

$stmt = $pdo->prepare($insert);
$stmt->execute([
    ":name" => $name,
    ":barcode" => $barcode,
    ":quantity" => $quantity,
    ":price" => $price,
    ":id" => $id,
]);
?>
<p style="color:green">Succesfully Edited a product</p>
<a href="../index.php">Back to home</a>