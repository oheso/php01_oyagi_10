<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>

<body>
    <h1>集計結果</h1>
    <div id="chart">
        <canvas id="myChart"></canvas>
    </div>
    <?php
        // data.txtの行数を取得
        $file = fopen('./data/data.txt','r');
        for($c=0; fgets($file); $c++);
        fclose($file);

        // "男"数を取得
        $file = fopen('./data/data.txt','r');
        $countM=0;
        while ($str = fgets($file)){
        $man = "男";
        $count = substr_count($str, $man);
        $countM = $count + $countM;
        // echo $countM;
        }
        fclose($file);

        // "女"数を取得
        $file = fopen('./data/data.txt','r');
        $countW=0;
        while ($str = fgets($file)){
        $woman = "女";
        $count = substr_count($str, $woman);
        $countW = $count + $countW;
        // echo $countW;
        }
        fclose($file);

        // "不明"数を取得
        $file = fopen('./data/data.txt','r');
        $countN=0;
        while ($str = fgets($file)){
        $neutral = "不明";
        $count = substr_count($str, $neutral);
        $countN = $count + $countN;
        // echo $countN;
        }
        fclose($file);

        // 性別数の最大値を取得
        $arrayA = array($countM, $countW, $countN);
        // echo max($arrayA);
    ?>
    <h2>回答結果一覧</h2>
    <table border="1">
        <tr>
            <th>日付</th>
            <th>お名前</th>
            <th>性別</th>
        </tr>
        <?php
        // 一覧表にデータを挿入
        $file = fopen('./data/data.txt','r');
        // ファイル内容を1行ずつ読み込んで出力
        while ($str = fgets($file)) {
            $array = explode("," , $str);
            echo '<tr>';
            echo '<td>'.$array[0].'</td>';
            echo '<td>'.$array[1].'</td>';
            echo '<td>'.$array[2].'</td>';
            echo '</tr>';
        }
        fclose($file);
        ?>
    </table>
    <br>
    <a href="index.php">戻る</a>

    <script>
        let ctx = document.getElementById("myChart");
        let myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['男', '女', '不明'],
                datasets: [{
                    label: '人数',
                    data: [<?php echo $countM; ?>,
                            <?php echo $countW; ?>,
                            <?php echo $countN; ?>],
                    backgroundColor: "rgba(219,39,91,0.5)"
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMax: <?php echo max($arrayA); ?>,
                            suggestedMin: 0,
                            stepSize: 2,
                            callback: function(value, index, values){
                                return  value +  '人'
                            }
                        }
                    }]
                },
            }
        });
    </script>
  <style>
    #chart {
      width: 400px;
    }
  </style>

</body>

</html>
