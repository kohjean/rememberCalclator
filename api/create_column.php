<?php
    session_start();
    require_once("../config.php");
    $sql = "INSERT INTO columnNames(u_id,c_name) VALUES(:u_id,:c_name)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":u_id", $_SESSION["u_id"], PDO::PARAM_INT);
    $stmt->bindValue(":c_name", $_GET["c_name"], PDO::PARAM_STR);
    $stmt->execute();
    echo $_GET["c_name"];
