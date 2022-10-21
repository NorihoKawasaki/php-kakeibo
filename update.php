<?php 
//1. DB接続
include_once("./dbconnect.php");

//2．画面で入力された値を取得する(スーパーグローバル変数を使用)
$date = $_POST['date'];
$title = $_POST['title'];
$amount = $_POST['amount'];
$type = $_POST['type'];
$id = $_POST["id"]; //idをeditForm.phpで隠しフォームで送る必要あり

// var_dump($_POST);

//3.SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//3-1. SQL作成(id取得)
$sql = "UPDATE records SET title = :title, type = :type, amount = :amount, date = :date, updated_at = now() WHERE id = :id";
//3-2. 作成したSQLを実行できるように準備
$stmt = $pdo -> prepare($sql);
//3-3. 値の設定
$stmt -> bindParam(":title", $title, PDO::PARAM_STR); //★titleを文字列型(STR)として設定する
$stmt -> bindParam(":type", $type, PDO::PARAM_INT);   //★typeは数字なのでINT型！ 
$stmt -> bindParam(":amount", $amount, PDO::PARAM_INT); 
$stmt -> bindParam(":date", $date, PDO::PARAM_STR);   //★dateは日付で数字だがSTR！！
$stmt -> bindParam(":id", $id, PDO::PARAM_INT);       //★idは数字なのでINT型！
//3-4. SQLを実行
$stmt -> execute();

//4.index.phpに画面せん移する(headerのLocation)
header("Location: ./index.php");
exit;



?>