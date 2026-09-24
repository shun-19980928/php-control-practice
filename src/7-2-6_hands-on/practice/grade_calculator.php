<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>成績判定システム</title>
</head>
<body>
<h1>成績判定システム</h1>

<h2>[個別成績]</h2>

<?php
//　生徒の成績
$students = [
    ["name" => "田中太郎", "score" => 85],
    ["name" => "佐藤花子", "score" => 92],
    ["name" => "鈴木一郎", "score" => 78],
    ["name" => "高橋美咲", "score" => 65],
    ["name" => "伊藤健太", "score" => 58],
];

function getGrade($score) {
    if ($score >= 90) {
        return "評価A（優秀）";
    } elseif ($score >= 80) {
        return "評価B（良好）";
    } elseif ($score >= 70) {
        return "評価C（普通）";
    } elseif ($score >= 60) {
        return "評価D（要努力）";
    } else {
        return "評価F（不合格）";
    }
}

"<h2>[個別成績]</h2>";

$passed_count = 0;
$failed_count = 0;
$total_score = 0;

foreach ($students as $student) {
    $result = getGrade($student["score"]);
    echo $student["name"] . ": " . $student["score"] . "点 - " . $result . "<br>";

    // 集計処理
    $total_score += $student["score"];
    if ($student["score"] >= 60) {
        $passed_count++;
    } else {
        $failed_count++;
    }
}

// 平均点の計算
$average = $total_score / count($students);

echo "<h2>【統計情報】</h2>";
echo "合格者数: " . $passed_count . "名<br>";
echo "不合格者数: " . $failed_count . "名<br>";
echo "平均点: " . $average . "点<br>";
?>

