<?php 
/*処理の流れ
  1.画面で入力された値を取得する
  2.PHPからMySQLへ接続
  3.SQL文を作成して、画面で入力された値をrecordsテーブルに追加
  4.index.phpに画面せん移する
*/
// var_dump($_POST);

//1．画面で入力された値を取得する(スーパーグローバル変数を使用)
$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];

// echo $date;
// echo $title;
// echo $amount;
// echo $type;



?>