<?php

//★例外処理(try/catch)…データベースを無事に取得できたらtryを実行、できなかったらcatchを実行
try {

  $pdo = new PDO(
    'mysql:dbname=php-kakeibo;host=localhost;charset=utf8mb4',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
  );

} catch (PDOException $e) {

    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());

}