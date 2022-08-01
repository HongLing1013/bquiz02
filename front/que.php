<fieldset>
  <legend>目前位置：首頁 > 問卷調查</legend>
  <table style="width:95%;">
    <tr>
      <th class="ct">編號</th>
      <th class="ct" width="60%">問卷題目</th>
      <th class="ct">投票總數</th>
      <th class="ct">結果</th>
      <th class="ct">狀態</th>
    </tr>

    <?php
    // parent為0的是題目
    $subjects=$Que->all(['subject_id'=>0]);
    foreach($subjects as $key => $subject){
    ?>

    <tr>
      <td class="ct"><?=$key+1;?></td>
      <td><?=$subject['text'];?></td>
      <td class="ct"><?=$subject['count'];?></td>
      <td class="ct">
        <a href="?do=result&id=<?=$subject['id'];?>">結果</a>
      </td>
      <td class="ct">
        <!-- 登入判斷 -->
        <?php
          if(!isset($_SESSION['user'])){
            echo "<a href='登入頁面'>請先登入</a>";
          }else{
            echo "<a href='?do=vote&id={$subject['id']}'>參與投票</a>";
          }
        ?>
      </td>
    </tr>

    <?php
    }
    ?>
  </table>
</fieldset>