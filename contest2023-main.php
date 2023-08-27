<?php
ini_set('display_errors', 1); # PHPエラー表示をON
ini_set('display_startup_errors', 1); # PHP起動時のエラー表示をON
error_reporting(E_ALL); # PHPエラーすべてを表示('^')

$country=$_POST['country'];
$lack_goods=$_POST['lack_goods'];
$amount=$_POST['amount']
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contest2023</title>
</head>
<body>
    
</body>
</html>

<?php

    // $dsn = 'mysql:host=localhost;dbname=contest2023';# 接続するデータベースの指定
    // $user = 'root'; # ユーザー名
    // $password = 'root'; # パスワード
    // $dbh = new PDO($dsn, $user, $password); # データベースに接続

    // $sql = "use contest2023; INSERT INTO items (country, lack_goods, amount) VALUES (".$country.", ".$lack_goods.", ".$amount.")"; // SQL文
    // $stmt = $dbh->prepare($sql); // 実行するSQL文をセットする
    // $result = $stmt->execute(); // SQL文を実行
    // $user_data = $stmt->fetchAll(); // 実行結果からデータを取り出す

    // if($result) {
    //     http_response_code( 307 ) ;
    //     //cho "testredirect";
    //     // sleep('10');
    //     header( "Location: ./contest2023-input.php" ) ;
    //     exit ; 
    // }

    $dsn = 'mysql:host=localhost;dbname=contest2023'; // 接続するデータベースの指定
    $user = 'root'; // ユーザー名
    $password = 'root'; // パスワード
    
    try {
    $dbh = new PDO($dsn, $user, $password); // データベースに接続
    
    // プリペアドステートメントを使用してSQL文を実行
    $sql = "INSERT INTO items (country, lack_goods, amount) VALUES ('$country', '$lack_goods', $amount)";
    $stmt = $dbh->prepare($sql);
    
    
    $result = $stmt->execute();
    
    if ($result) {
    // クエリが成功した場合の処理を記述
    // リダイレクトを行う前に何か処理を実行する場合はここに記述
    
    // リダイレクト
    http_response_code(307);
    header("Location: ./contest2023-input.php");
    exit;
    } else {
    // クエリが失敗した場合の処理を記述
    // 例: エラーメッセージを表示してエラーログに記録するなど
    echo "クエリの実行に失敗しました。";
    }
    } catch (PDOException $e) {
    // データベース接続やクエリ実行に関するエラーが発生した場合の処理
    // 例: エラーメッセージを表示してエラーログに記録するなど
    echo "エラー: " . $e->getMessage();
    }
    ?>

    <!-- Hiding page do not show. NO HTML and CSS -->