<?php

// １．名簿ファイルを受け取る

$num = $_POST["num"]-1;
if(is_uploaded_file($_FILES['up-file']['tmp_name'])){

    //一字ファイルを保存ファイルにコピーできたか
    if(move_uploaded_file($_FILES['up-file']['tmp_name'],"./".$_FILES['up-file']['name'])){

        //正常
        echo "uploaded";

    }else{

        //コピーに失敗（だいたい、ディレクトリがないか、パーミッションエラー）
        echo "error while saving.";
    }

}else{

    //そもそもファイルが来ていない。
    echo "file not uploaded.";

}

include('vendor/autoload.php');
  
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
  
$reader = new XlsxReader();
$spreadsheet = $reader->load($_FILES['up-file']['name']); // ファイル名を指定
$sheet = $spreadsheet->getSheetByName('Sheet1'); // 読み込むシートを指定
  
$data = $sheet->rangeToArray('A1:B'.$num); // 配列で取得したい範囲を指定
var_dump($data);


var_dump($readfile);
echo $num;
// include('./vendor/autoload.php');
  
// use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;
  
// $reader = new XlsxReader();
// $spreadsheet = $reader->load($readfile); // ファイル名を指定
// $sheet = $spreadsheet->getSheetByName('Sheet1'); // 読み込むシートを指定
  
// $data = $sheet->rangeToArray('A1:B{$num}'); // 配列で取得したい範囲を指定
// var_dump($data);
?>