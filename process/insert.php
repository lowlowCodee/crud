<?php
require "../connection.php";

$name = htmlspecialchars($_POST['name']);
$barcode = htmlspecialchars($_POST['barcode']);
$quantity = htmlspecialchars($_POST['quantity']);
$price = htmlspecialchars($_POST['price']);

$insert = "INSERT INTO products (name, barcode, quantity, price) VALUES(:name, :barcode, :quantity, :price)";
$stmt = $pdo->prepare($insert);
$stmt->execute([
    ":name" => $name,
    ":barcode" => $barcode,
    ":quantity" => $quantity,
    ":price" => $price,
]);
?>
<p style="color:green">Succesfully inserted a product</p>
<a href="../index.php">Back to home</a>