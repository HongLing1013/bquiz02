<form action="./api/news.php" method="post">
<table class="tab cent ct">
  <tr>
    <th width="10%">編號</th>
    <th width="70%">標題</th>
    <th width="10%">顯示</th>
    <th width="10%">刪除</th>
  </tr>

  <?php
  /* 做分頁 */
  // 1. 取得全部的內容並算一下有幾筆
  $all=$News->math('count','id');
  // 2. 幾筆一頁
  $div=3;
  // 3. 算總共有幾頁
  $pages=ceil($all/$div);
  // 4. 知道目前在哪一頁
  $now=$_GET['p']??1;
  // 5. 資料從哪邊開始抓
  $start=($now-1)*$div;
  // 6. 撈出一頁的數量
  $rows=$News->all(" limit $start ,$div");

  foreach($rows as $key => $row){
  ?>
  
  <tr>
    <td><?=$key+1;?></td>
    <td><?=$row['title'];?></td>
    <!-- 取得顯示與否的資料並顯示在畫面上 -->
    <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
    <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>" ></td>
  </tr>
    
  <?php
    }
  ?>

</table>

<!-- 顯示頁數 開始 -->
<div class="ct">
    <?php
      // 如果-1之後大於0的話 就代表有上一頁
      if(($now-1>0)){
        // 那就顯示上一頁的符號
        $p=$now-1;
        echo "<a href='?do=news&p=$p'> < </a>";
      }

      // 分頁數字印出
      for($i=1;$i<=$pages;$i++){
        // 當前頁數的字體放大
        $fontsize=($now==$i)?'24px':'16px';
        // 把上方頁數放大字體的參數放到font-size裡面
        echo " <a href='?do=news&p=$i' style='font-size:$fontsize'> ";
        echo $i;
        echo " </a> ";
      }


      // 如果-1之後大於0的話 就代表有上一頁
      if(($now+1)<=$pages){
        // 那就顯示上一頁的符號
        $p=$now+1;
        echo "<a href='?do=news&p=$p'> > </a>";
      }
    ?>
</div>
<!-- 顯示頁數 結束 -->

<div class="ct"><input type="submit" value="確定修改"></div>
</form>
