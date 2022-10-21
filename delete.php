<?php 
//< DB接続 >
include_once("./dbconnect.php");

//< 選択されたidの取得 >
$id = $_GET['id'];
// var_dump($id);

//< 編集するデータを取得 >
//1. SQL文作成(id取得) AUTO-INCREMENTが設定されているのでidを取得することによって編集が可能になる
$sql = "DELETE FROM records WHERE id = :id";
//2. SQL実行の準備
$stmt = $pdo -> prepare($sql);
$stmt -> bindParam(":id", $id, PDO::PARAM_INT); //★値の設定、idは数字だからINT！
//3. SQLの実行
$stmt -> execute();

//< index.phpに画面せん移する(headerのLocation) >
header("Location: ./index.php");
exit;

?>