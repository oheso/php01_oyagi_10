<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    //文字作成
    $time = date('Y-m-d H:i:s');
    $name = $_POST['name'];
    $gender = $_POST['gender'];

    // 回答内容
    function h($ans){
        return htmlspecialchars($ans, ENT_QUOTES);
    }
    
    // ファイルに書き込み
    $file = fopen('./data/data.txt','a');
    fwrite($file, h($time).",");//「\」はオプションと¥マーク
    fwrite($file, h($name).",");//「\」はオプションと¥マーク
    fwrite($file, h($gender)."\n");//「\」はオプションと¥マーク
    fclose($file);
?>
<body>
    <h1>何の意味もないのに<br>ご回答ありがとうございました！</h1>
    <p>＜回答内容＞</p>
    お名前：<?= h($name) ?><br>
    性別：<?= h($gender) ?><br><br>
    <a href="index.php">戻る</a>

</body>
</html>