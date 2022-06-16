<?php
    // json受け取り
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    //データ代入
    $barcode = $data['barcode']; 
    $quantity = $data['quantity'];
    


    //データベース接続
?>