<?php
include_once "../base.php";

// 取得資料 如果有此資料的話 內容就不會是空的
$user=$User->find(['email'=>$_GET['email']]);

// 檢查如果不是空值 就回傳密碼 如果是空值 回傳查無此資料
// if(!empty($user)){
//   echo "您的密碼為:".$user['pw'];
// }else{
//   echo "查無此資料" ;
// }

// 將上方判斷式簡化
echo (!empty($user))?"您的密碼為:".$user['pw']:"查無此資料";

?>