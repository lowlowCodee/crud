<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        width: 60%;
        margin: auto;
        /* margin-right: auto; */
    }

    tr,
    td,
    th {
        border: 1px solid black;
        padding: 7px;
    }

    .container {
        display: flex;
        justify-content: center;
    }

    .card {
        width: 500px;
        padding: 20px;
        background-color: #f2f2f2;
        border-radius: 10px;
    }

    button {
        background-color: green;
        padding: 10px;
        color: white;
        width: 300px;
        border: none;

    }

    .buttonDiv {
        display: flex;
        justify-content: center;
    }

    label {
        font-weight: bold;
    }

    a {
        text-decoration: none;
        color: black;
    }

    input {
        width: 90%;
        padding: 5px;
    }

    .edit {
        padding: 6px 8px;
        background-color: rgb(192, 204, 83);
        border-radius: 5px;
    }

    .delete {
        padding: 6px 8px;
        background-color: rgb(170, 66, 66);
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="card">
        <form action="./process/insert.php" method="post">

            <label for="name">PRODUCT NAME:</label> <br>
            <input type="text" name="name" required> <br><br>

            <label for="barcode">BARCODE:</label> <br>
            <input type="text" name="barcode" required> <br><br>

            <label for="quantity">QUANTITY:</label> <br>
            <input type="number" name="quantity" required> <br><br>

            <label for="price">PRICE:</label> <br>
            <input type="number" name="price" required> <br><br>
            <div class="buttonDiv">
                <button type="submit">SUBMIT</button>
            </div>
        </form>

    </div>
</div>

<br>
<?php
require "connection.php";
$selectProduct = "SELECT id, name, barcode, quantity, price, (quantity * price) AS total FROM products";
$stmt = $pdo->query($selectProduct);

$stmt = $pdo->query($selectProduct);
?>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>BARCODE</th>
            <th>QUANTITY</th>
            <th>PRICE</th>
            <th>TOTAL</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <tr>
                <td><?= $i += 1 ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['barcode'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['total'] ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?= $row['id'] ?>">EDIT</a>
                    <span>|</span>
                    <a class="delete" href="process/delete.php?id=<?= $row['id'] ?>">DELETE</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>