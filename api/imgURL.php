<?php 
$barcode = $_GET['barcode'];
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
            //$barcode = 4549131970258;
            $stmt = $pdo->prepare('SELECT extension FROM product_contents WHERE barnum = :barnum');
            $stmt->bindValue(':barnum', $barcode);
            //実行
            $res = $stmt->execute();

            // データを取得
            if( $res ) {
                $data = $stmt->fetch();
                // var_dump($data);
                // echo('<div>');
                // var_dump($data[0]);
                //echo $data[0];
                //表示処理
                if($data[0] != null){
                    // $filename = $data[0];
                    $extension = $data[0];
                    $filename = $barcode.'.'.$extension;
                    // $extension = 'PNG';
                    //echo($filename);
                    $name = '../../img/'.$filename.'';
                    $fp = fopen($name, 'rb');
            
                    // send the right headers
                    header("Content-Type: image/".$extension."");
                    header("Content-Length: " . filesize($name));
            
                    // dump the picture and stop the script
                    fpassthru($fp);
                    exit;
                }else{
                    echo('aaa');
                }
            }

        } catch (PDOException $e) {
            // 接続できなかったらエラー表示
            echo 'error: ' . $e->getMessage();
        }
            ?>
<?php
// 拡張子取得
function getExt($filename)
{
	return pathinfo($filename, PATHINFO_EXTENSION);
}
?>