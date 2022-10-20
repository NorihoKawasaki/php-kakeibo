<?php 

//2.db.connect.phpを読み込む→DBに接続
include_once("./dbconnect.php");   //★dbconnectがcreateでも使えるようになる



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


//3.SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//3-1
$sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUES(:title, :type, :amount, :date, now(), now())"; 
       //★→created_at, updated_atはそのファイルが作成された日付, now()はその日を表す。

//3-2. 作成したSQLを実行できるように準備
//★dbconnect.phpのDB($pdo)を使えるようにする
$stmt = $pdo -> prepare($sql);

//3-3. 値の設定（何を保存するのかを設定)★bind:結び付ける・パラメーター：外部から投入されたデータ
$stmt -> bindParam(":title", $title, PDO::PARAM_STR); //★titleを文字列型(STR)として設定する
$stmt -> bindParam(":type", $type, PDO::PARAM_INT);   //★typeは数字なのでINT型！ 
$stmt -> bindParam(":amount", $amount, PDO::PARAM_INT); 
$stmt -> bindParam(":date", $date, PDO::PARAM_STR);   //★dateは日付で数字だがSTR！！

//3-4. SQLを実行
$stmt -> execute();


//4.index.phpに画面せん移する(headerのLocation)
header("Location: ./index.php");
exit;

// echo $date;
// echo $title;
// echo $amount;
// echo $type;


?>