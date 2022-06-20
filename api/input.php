<?php
    // json受け取り
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    //データ代入
    $barcode = $data['barcode']; 
    $quantity = $data['quantity'];


    //// debug /////
        // echo($barcode.'<div>');
        // echo($quantity.'<div>');
    //// debug ////
    
    //データベース接続
    try {
        $dsn = 'mysql:dbname=store;host=localhost;charset=utf8mb4';
        $username ='store';
        $password = 'vGciFPmVGTdd86R682U75MfNdzAQMg';
    
        $pdo = new PDO($dsn, $username, $password, $driver_options);
        // 入力した値をデータベースへ登録
        } catch (PDOException $e) {
        echo 'DB接続エラー！: ' . $e->getMessage();
    }

    try{
        $stmt = $pdo->prepare('UPDATE product_contents SET quantity = quantity + :quantity WHERE barnum = :barnum');
        $stmt->bindValue(':barnum', $barcode);
        $stmt->bindValue(':quantity', $quantity);
        //実行
        $res = $stmt->execute();
        $count=$stmt->rowCount();

        // データを取得
        if( $res == true) {
            // 何個変えた？
            if($count >= 1){
                echo('変更したよ');
            }else{
                echo('変更なし');
            }
            // var_dump($res);
            // $data = $stmt->fetch();
            //     if($data[0] != null){
            //         //関数代入
            //         $now_quantity  = $data[0];
            //         $return = 0; // 完了通知
            //         echo ($now_quantity);
            //     }else{
            //         //登録されてない
            //         $itemname = 'error';
            //         $return = 1; // 処理終了
            //     }
        }else{
            echo('resあるけど countない');
        }

    } catch (PDOException $e) {
        echo('データベースエラー<div>');
        // 接続できなかったらエラー表示
        echo 'error: ' . $e->getMessage();
    }
?>