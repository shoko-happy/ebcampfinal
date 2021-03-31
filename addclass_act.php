<?php
require 'function/function.php';
sstart();
$lid  = $_POST["lid"];
$lpw  = $_POST["lpw"];
$num  = $_POST["num"];
$file = $_FILES["file"]["name"];

//1. 接続します
try {
  $pdo = new PDO('mysql:dbname=rollBook;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//２．データ登録SQL作成
$sql = "SELECT * FROM c_table WHERE lid=:lid AND lpw=:lpw";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$stmt->bindValue(':lpw', $lpw);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

///３．データ登録SQL作成 //ここにカラム名を入力する
$stmt = $pdo->prepare("INSERT INTO c_table(id, lid, lpw, num, file)
VALUES(NULL, :lid, :lpw, :num, :file)");
$stmt->bindValue(':lid',  $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',  $lpw,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':num',  $num,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':file', $file, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//４．データ登録処理後
if ($status==false) {
//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
$error = $stmt->errorInfo();
exit("QueryError:".$error[2]);
} else {
//５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
header("Location: selectclass.php");
exit;
}

