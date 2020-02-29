<?php 
    session_start();
    // if( empty($_SESSION["login"]) ) {
    //     header("Location: ../index.php");
    // } 
    require_once("../config.php");
    $sql = "INSERT INTO records(u_id,c_id,value) VALUES(:u_id,:c_id,:value)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":u_id",$_SESSION["u_id"], PDO::PARAM_INT);
    $stmt->bindValue(":c_id", $_GET["c_id"], PDO::PARAM_INT);
    $stmt->bindValue(":value", $_GET["value"], PDO::PARAM_INT);
    $stmt->execute();
    echo "記録しました";
    exit();
