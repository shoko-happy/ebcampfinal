<?php
require 'function/function.php';
sstart();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

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

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["num"]   = $val['num'];
  $_SESSION["file"]       = $val['file'];
  //Login処理OKの場合select.phpへ遷移
  header("Location: operation.php");
}else{
  //Login処理NGの場合login.phpへ遷移
  header("Location: selectclass.php");
}
//処理終了
exit();
?>

