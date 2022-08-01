<?php
include_once "../base.php";
$type=$_POST['type'];
$id=$_POST['id'];

$news=$News->find($id);
switch($type){
    case '讚':

    $news['good']++;

    break;
    case '收回讚':
    $news['good']--;
    break;
}

$News->save($news);

?>