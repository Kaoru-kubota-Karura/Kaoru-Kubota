<?php
ini_set('display_errors', 1); # PHPエラー表示をON
ini_set('display_startup_errors', 1); # PHP起動時のエラー表示をON
error_reporting(E_ALL); # PHPエラーすべてを表示('^')

// $dsn = 'mysql:host=localhost;dbname = contest2023';# 接続するデータベースの指定
// $user = 'root'; # ユーザー名
// $password = 'root'; # パスワード
// $dbh = new PDO($dsn, $user, $password); # データベースに接続

// $sql = "use contest2023; INSERT INTO items (country, lack_goods, amount) VALUES ('a', 'b', 1)"; // SQL文
// $stmt = $dbh->prepare($sql); // 実行するSQL文をセットする
// $result = $stmt->execute(); // SQL文を実行
// $user_data = $stmt->fetchAll(); // 実行結果からデータを取り出す

// var_dump($user_data);
// 完成時隠す

$dbh = null; // 接続をきる
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>国際食糧交流サイト</title>
        <!-- ↑要変更↑ -->
    <style>
        .register{
    /* border: 0; */
    /* line-height: 2.5; */
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    /* text-shadow: 1px 1px 1px #000; */
    /* border-radius: 10px; */
    background-color: rgba(0, 0, 250, 1);
    /* background-image: linear-gradient(to top left, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2) 30%, rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, 0.6), inset -2px -2px 3px rgba(0, 0, 0, 0.6); */
    }
    body {
        background-color: #F4F3F2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 70vh;
    }
    h1{
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 40px;
    }
    h2{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #country {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 25px;
        width:500px;
        border-radius: 3px;
        font-size: 2em;
        padding: 0em 1em 0em 1em;
    }
    #lack_goods {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 25px;
        width:500px;
        border-radius: 3px;
        font-size: 2em;
        padding: 0em 1em 0em 1em;
    }
    input{
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 25px;
        width:492.5px;
        height: 38px;
    }
    select:invalid { color: #bbb; }
    select option { color: black; }
    select option:first-child { color: #bbb; }

    .register {
    /* border: 0; */
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 3px;
    background-color: rgba(0, 0, 255, 1);
    /* box-shadow:
        inset 2px 2px 3px rgba(255, 255, 255, 0.6),
        inset -2px -2px 3px rgba(0, 0, 0, 0.6); */
    }
    table, th, td {
    border:1px solid #333;
    }
    td, th {
    padding: 10px 20px;
    }
    table {
    margin: 5px auto;
    }
    </style>
</head>
<body>
    <form action="contest2023-main.php" method="POST">
    <p></P>
    <br>
    <p></P>
    <br>
    <p></P>
    <br>
    <p></P>
    <br>
    <h1>国際食糧交流サイト</h1>
    <div class="select">
        <select name="country" id="country" class="country" required>
            <option value="">--Click to select your country--</option>
            <option value="Japan">Japan</option>
            <option value="America">America</option>
            <option value="British">British</option>
            <option value="France">France</option>
            <option value="Italy">Italy</option>
            <option value="Ukraine">Ukraine</option>
            <option value="Taiwan">Taiwan</option>
        </select>
        <br>
        <select name="lack_goods" id="lack_goods" class="lack_goods" required>
            <option value="">--Click to select the item--</option>
            <option value="wheat">wheat</option>
            <option value="rice">rice</option>
            <option value="corn">corn</option>
            <option value="potato">potato</option>
            <option value="asparagus">asparagus</option>
            <option value="broccoli">broccoli</option>
            <option value="cauliflower">cauliflower</option>
            <option value="cabbage">cabbage</option>
            <option value="cucumber">cucumber</option>
            <option value="sweet_potato">sweet potato</option>
            <option value="zucchini">zucchini</option>
            <option value="celery">celery</option>
            <option value="green_peas">green peas</option>
            <option value="radish">radish</option>
            <option value="onion">onion</option>
            <option value="chili_pepper">chili pepper</option>
            <option value="tomato">tomato</option>
            <option value="eggplant">eggplant</option>
            <option value="garlic">garlic</option>
            <option value="carrot">carrot</option>
            <option value="green_onion">green onion</option>
            <option value="parsley">parsley</option>
            <option value="paprika">paprika</option>
            <option value="peanuts">peanuts</option>
            <option value="lettuce">lettuce</option>
        </select>
    </div>
    <br>
    <input type="number" name="amount" placeholder="type the amount of food (tons)" required>
    <p> </p>
    <br>
    <!-- <button class="register"
    type="button">
    register
    </button>  -->
    <input type="submit" class="register" value="SEND" style="font-size: 20px, margin: auto, display: flex, display: grid" required>
    <p> </p>
    <br>

    <h2>↓↓Information already filled in↓↓</h2>

    <?php

        $dsn = 'mysql:host=localhost;dbname=contest2023';# 接続するデータベースの指定
        $user = 'root'; # ユーザー名
        $password = 'root'; # パスワード

        $dbh = new PDO($dsn, $user, $password);

        $sql ="SELECT * FROM items;"; // SQL文
        $stmt = $dbh->prepare($sql); // 実行するSQL文をセットする
        $result = $stmt->execute(); // SQL文を実行
        $data = $stmt->fetchAll(); // 実行結果からデータを取り出す
        
        echo "<table>\n"; 
        echo "\t<tr><th>country</th><th>lack_goods</th><th>amount</th></tr>\n"; 
        foreach ($data as $row) { echo "\t<tr>\n"; 
        echo "\t\t<td>{$row['country']}</td>\n"; 
        echo "\t\t<td>{$row['lack_goods']}</td>\n"; 
        echo "\t\t<td>{$row['amount']}</td>\n"; 
        echo "\t</tr>\n"; } 
        echo "</table>\n";        

    ?>
    
</body>
</html>

<!-- 
	種類の選択、国家/組織、登録
	↑を一覧で見れるようにする
	他からアクセスできるようにする
	再読み込みしても登録した内容が消えない
	手動で登録内容が消せる
 -->