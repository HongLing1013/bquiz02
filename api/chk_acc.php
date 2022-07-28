<?php
include_once "../base.php";

// 方法三不需要這一行
// $acc=$_POST['acc'];

/* 方法一
 * 去user這張資料表找有沒有符合acc的資料 沒找到會回傳一個空陣列
 * */
// $chk=$User->count(['acc'=>$acc]);
// if(!empty($chk)){
//   echo "1";
// }else{
//   echo "0";
// }

/* 方法二
 * 去這user這張資料表內 如若有找到這個帳號 就不會是0 
 * 所以可以直接知道有帳號
 */
// echo $User->math('count','id',['acc'=>$acc]);

/* 方法三
 * 方法二的簡化
 * */
echo $User->math('count','id',['acc'=>$_POST['acc']]);



?>