<form action="./api/news.php" method="post">
<table class="tab cent ct">
    <tr>
        <th width="10%">編號</th>
        <th width="70%">標題</th>
        <th width="10%">顯示</th>
        <th width="10%">刪除</th>
    </tr>
    <?php
    $rows=$News->all();
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

<div class="ct"><input type="submit" value="確定修改"></div>
</form>
