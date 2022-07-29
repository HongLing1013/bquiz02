<fieldset>
  <legend>帳號管理</legend>
  <table>
    <tr>
      <td class="clo">帳號</td>
      <td class="clo">密碼</td>
      <td class="clo">刪除</td>
    </tr>

    <!-- 使用AJAX載入 -->
    <tbody id="users">

    </tbody>
  </table>
  <div class="ct">
    <button onclick="del()">確定刪除</button>
    <button onclick="$('table input').prop('checked',false)">清空選取</button>
  </div>
</fieldset>

<script>
  // 取得後台使用者清單列表 放到html裡面
  $.get("./api/users.php",(users)=>{
    $("#users").html(users);
  });

  // 刪除的function
  function del(){
    // 宣告一個ids為要刪除的內容 內容是一個陣列的物件
    let ids=new Array();

    // 
    $("table input[type='checkbox']:checked").each((idx,box)=>{
      // 取得$box的value塞到ids裡面
      ids.push($(box).val());
    });
      // 把del這個欄位 和 ids這個陣列 傳到後台
      $.post("./api/del_user.php",{del:ids},(res)=>{
        console.log(res);
        $.get("./api/users.php",(users)=>{
          console.log(users);
    $("#users").html(users);

      })
    });
  }
</script>