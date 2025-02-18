<?php
$host = 'localhost';
$db = 'crud';
$user = 'root';
$password = '';


$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

$pdo = new PDO($dsn, $user, $password);
