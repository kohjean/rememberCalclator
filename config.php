<?php
// 環境に合わせて変更してください--------------------------
//----------------------------------------------------
$user = "root";
$pass = "root";
$host = "localhost";
$dbname = "calc";
//-----------------------------------------------------
$dsn = "mysql:host={$host}; dbname={$dbname}; charset=utf8";
$pdo = new PDO($dsn, $user, $pass);
?>