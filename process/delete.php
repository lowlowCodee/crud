<?php
require "../connection.php";

$id = $_GET['id'];

$insert = "DELETE FROM products WHERE id=:id";

$stmt = $pdo->prepare($insert);
$stmt->execute([

    ":id" => $id,
]);
?>
<p style="color:red">Succesfully deleted a product</p>
<a href="../index.php">Back to home</a>