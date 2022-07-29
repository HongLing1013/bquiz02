<!-- 此頁面用來show出所有使用者 -->
<?php
include_once "../base.php";

// 取得資料
$users=$User->all();
// 印出來
foreach($users as $user){
  // 不符合admin才印出來
  if($user['acc']!=='admin'){
    echo "<tr>";
    echo "<td>{$user['acc']}</td>";
    // 取得$user[pw]的長度 然後用*去覆蓋
    echo "<td>" . str_repeat("*",strlen($user['pw'])) . "</td>";
    echo "<td>";
    echo "<input type='checkbox' name='del[]' value='{$user['id']}'>";
    echo "</td>";
    echo "</tr>";
  }
}

?>