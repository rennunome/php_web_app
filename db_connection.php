<?php

// DB名
define("DB_NAME", "php_db");
// ユーザー名
define("USER_NAME", "root");
// パスワード
define("PASSWORD", "hcut84112");

try {
    // PDO = PHP Data Object（データーを扱うオブジェクト）
    $db = new PDO(
        'mysql:host=127.0.0.1;dbname=' . DB_NAME . ';charset=utf8',
        USER_NAME,
        PASSWORD
        );
    // 例外処理 = $eで表示する
} catch (PDOException $e) {
    echo 'DB接続エラー:'.$e->getMessage();
}

?>