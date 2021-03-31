<?php
require 'function/function.php';
sstart();

// １．データの受け取り
$num  = $_SESSION["num"]+1;
$file = $_SESSION["file"];

include('vendor/autoload.php');
  
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
  
$reader = new XlsxReader();
$spreadsheet = $reader->load("data/".$file); // ファイル名を指定
$sheet = $spreadsheet->getSheetByName('Sheet1'); // 読み込むシートを指定
  
$data = $sheet->rangeToArray('A2:B'.$num); // 配列で取得したい範囲を指定
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>出席登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="select.php">データ一覧</a>
    <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>出席登録</legend>
    <?php for ($a = 0 ; $a < $num-1 ; $a ++):?>
        <div class=<?='"b'.$a.'"'?>>
        <label><?=$data[$a][0]." ".$data[$a][1]?><br>
        <input type="hidden" name=<?='"studentId'.$a.'"'?> value=<?=$data[$a][0]?>>
        <input type="hidden" name=<?='"name'.$a.'"'?> value=<?=$data[$a][1]?>>
        <input class =<?='"a'.$a.'"'?> type="radio" name=<?='"record'.$a.'"'?> value="出席">出席
        <input class =<?='"a'.$a.'"'?> type="radio" name=<?='"record'.$a.'"'?> value="遅刻">遅刻
        <input class =<?='"a'.$a.'"'?> type="radio" name=<?='"record'.$a.'"'?> value="欠席">欠席
        <input class =<?='"a'.$a.'"'?> type="radio" name=<?='"alart'.$a.'"'?> value="*">連絡なし
        </label>
        </div>
      <?php endfor;?>
      <!-- 送信ボタン -->
      <input class =<?='"a'.$a.'"'?> type="hidden" name="num" value=<?=$num?>>
     <input type="submit" value="送信">
   </fieldset>
  </div>
</form>
<!-- Main[End] -->
  <!-- jQueryを読み込む！必ず先に！ -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
<?php for ($a = 0 ; $a < count($data) ; $a++):?>
$(<?='".a'.$a.'"'?>).on("click", function() {
  $(<?='".b'.$a.'"'?>).fadeOut(500);
});

$(window).on("keydown",function(e) {
  if(e.keyCode==82){
    $(<?='".b'.$a.'"'?>).show();   
  };
});
<?php endfor;?>
</script>

</body>
</html>
