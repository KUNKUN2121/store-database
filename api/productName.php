<?php 
$barcode = $_GET['barcode'];
$img = 'https://store-project.f5.si/img/';
    try {
        $dsn = 'mysql:dbname=store;host=localhost;charset=utf8mb4';
        $username ='store';
        $password = 'vGciFPmVGTdd86R682U75MfNdzAQMg';
    
        $pdo = new PDO($dsn, $username, $password, $driver_options);
        // 入力した値をデータベースへ登録
        } catch (PDOException $e) {
        echo 'DB接続エラー！: ' . $e->getMessage();
        }

    //名前
        try{
            //$barcode = 4549131970258;
            $stmt = $pdo->prepare('SELECT itemname FROM product_contents WHERE barnum = :barnum');
            $stmt->bindValue(':barnum', $barcode);
            //実行
            $res = $stmt->execute();

            // データを取得
            if( $res ) {
                $data = $stmt->fetch();
                //表示処理
                if($data[0] != null){
                    $itemname  = $data[0];
                }else{
                    echo('aaa');
                }
            }
        } catch (PDOException $e) {
            // 接続できなかったらエラー表示
            echo 'error: ' . $e->getMessage();
        }
    //ああ
        try{
            $stmt = $pdo->prepare('SELECT extension FROM product_contents WHERE barnum = :barnum');
            $stmt->bindValue(':barnum', $barcode);
            //実行
            $res = $stmt->execute();

            // データを取得
            if( $res ) {
                $data = $stmt->fetch();
                //表示処理
                if($data[0] != null){
                    $extension = $data[0];
                    $imgURL = $img.$barcode.'.'.$extension;
                    
                }else{
                    echo('aaa');
                }
            }
        } catch (PDOException $e) {
            // 接続できなかったらエラー表示
            echo 'error: ' . $e->getMessage();
        }

$person = [
  'itemname' => $itemname,
  'barcode' => $barcode,
  'category' => 'taro@example.com',
  'price' => 18,
  'imgURL' => $imgURL,
];

// echo "<pre>";
echo json_encode($person, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
// echo "</pre>";
?>