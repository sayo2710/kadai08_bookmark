<?php
//2. DB接続します
require_once('funcs.php'); //使用する関数が記述されたファイル名を指定
$pdo = db_conn();

$id = $_GET['id'];

//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_bm_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}