<?php
include_once "../base.php";

/* 儲存註冊資料 - 方法一
 * 攏長的語法
 */
// $User->save(['acc'=>$_POST['acc'],'pw'=>$_POST['pw'],'email'=>$_POST['email']]);

/* 儲存註冊資料 - 方法二
 * 把pw2拿掉後直接把傳過來的東西全存資料庫
 */
unset($_POST['pw2']);
$User->save($_POST);
?>