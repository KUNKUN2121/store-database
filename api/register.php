<?php
require_once "database.php";

if($error==0){



    try{
        $stmt = $pdo->prepare('INSERT INTO product_contents (itemname, barnum, extension, quantity, category, price, created_at, updated_at) VALUES(:itemname, :barnum, :extension, :quantity, :category, :price, NOW(), NOW() )');

        // 値をセット
        $stmt->bindValue(':itemname', $content);
        $stmt->bindValue(':barnum', $barcode);
        $stmt->bindValue(':extension', $extension);
        $stmt->bindValue(':quantity', $quantity);
        $stmt->bindValue(':category', $category);
        $stmt->bindValue(':price', $price);
        // $stmt->bindValue(':created_at', '22');
    
        // SQL実行
        $stmt->execute();
        echo('データベース追加しました。');
        //echo $barcode;
        //echo $content;
    } catch (PDOException $e) {
        // 接続できなかったらエラー表示
        echo 'error: ' . $e->getMessage();
        }

        //ここまで
        
        // $sql  = "INSERT INTO bbs (content, updated_at) VALUES (:content, NOW());";
        // $stmt = $pdo->prepare($sql);
        // //インジェクション対策
        // $stmt -> bindValue(":content", $content, PDO::PARAM_STR);
        // $stmt -> execute();

        //ファイル名から拡張子を取得する関数
    }
}
}