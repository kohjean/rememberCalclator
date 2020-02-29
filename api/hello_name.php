<?php 
session_start();
require_once("../config.php");
if( !empty($_SESSION["login"]) ) {
    $sql = "SELECT u_name FROM users WHERE u_id=" . $_SESSION["u_id"];
    $res = $pdo->query($sql);
    $row = $res->fetch( PDO::FETCH_ASSOC );
    echo $row["u_name"];  
} else {
    echo "No Name";
}
exit();