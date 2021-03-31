<?php
//必ずsession_startは最初に記述
function sstart(){
session_start();

//現在のセッションIDを取得
$old_sessionid = session_id();

//新しいセッションIDを発行（前のSESSION IDは無効）
session_regenerate_id(true);

//新しいセッションIDを取得
$new_sessionid = session_id();
}
?>