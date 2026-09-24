<?php

//学生データを定義
$students = [
    ["name" => "田中太郎", "score" => 85],
    ["name" => "佐藤花子", "score" => 92],
    ["name" => "鈴木一郎", "score" => 78],
    ["name" => "高橋美咲", "score" => 65],
    ["name" => "伊藤健太", "score" => 58],
];

//個別成績を計算
function getGrade($score) {
    if ($score >= 90) {
        return "A";
    } elseif ($score >= 80) {
        return "B";
    } elseif ($score >= 70) {
        return "C";
    } elseif ($score >= 60) {
        return "D";
    } else {
        return "F";
    }
}
//統計情報の初期化
$pass_count = 0;   // 合格者の人数を数える箱（最初は0）
$fail_count = 0;   // 不合格者の人数を数える箱（最初は0）
$total_score = 0;  // 全員の点数を足していくための箱（最初は0）

echo "<h2>成績判定システム</h2>";
echo "<h3>【個別成績】</h3>";

//個別成績の処理
foreach ($students as $student) {
    $name = $student["name"];       // 学生の名前を取り出す
    $score = $student["score"];     // 学生の点数を取り出す
    $grade = getGrade($score);      // 先ほどの関数を使って「A〜F」の評価を決める
    
    //合格不合格の集計
    if ($score >= 60) {
        $pass_count++;  // 60点以上なら合格者の数に「+1」する
    } else {
        $fail_count++;  // 60点未満なら不合格者の数に「+1」する
    }

    //合計点数の集計
    $total_score += $score;  // 全員の点数を足す

    //結果表示
    echo "<p>" . $name . ": 点数: " . $score . "- 評価: " . $grade . "</p>";
    
}
echo "<h3>【統計情報】</h3>";
echo "<p>合格者数: $pass_count</p>";
echo "<p>不合格者数: $fail_count</p>";
echo "<p>平均点: " . ($total_score / count($students)) . "</p>";
?>