<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケートフォーム</title>
</head>
<body>
    <h1>唐突で、何の意味もありませんが<br>あなたの性別を教えてくださぃ！！</h1>
    <div class="menu">
        <form action="write.php" method="post">
            お名前: <input type="text" name="name">
            性別: <select name="gender">
                    <option value="男">男</option>
                    <option value="女">女</option>
                    <option value="不明">不明</option>
            </select>
            <input type="submit" value="送信"><br><br>
            <a href="read.php">全データ表示</a>

        </form>
    </div>
</body>
</html>
