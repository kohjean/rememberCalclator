<?php
    session_start();
    header("Content-Type: application/json; charset=UTF-8");
    require_once("../config.php") ;
    if( empty($_GET["c_name"]) || empty($_SESSION["login"]) ) {
        header("Location: index.php");
    } 
    
    $sql = "SELECT c_name,value,date FROM users,records,columnNames WHERE records.u_id=users.u_id AND records.c_id=columnNames.c_id AND c_name=:c_name AND users.u_id=" . $_SESSION["u_id"] . " ORDER BY date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue( ":c_name", $_GET["c_name"], PDO::PARAM_STR );
    $stmt->execute();
    
    $datalist = [];
    while( $row = $stmt->fetch( PDO::FETCH_ASSOC) ) {
        $datalist[] = [
            'c_name' => $row['c_name'],
            'value'  => $row['value'],
            'date'   => date("y/m/d", strtotime( $row['date'] ))
        ];
    }  
   
    echo json_encode( $datalist );
    exit();
