<fieldset>
  <legend>會員登入</legend>
  <table>
    <tr>
      <td class="clo">帳號</td>
      <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
      <td class="clo">密碼</td>
      <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
      <td>
        <button onclick="login()">登入</button>
        <button onclick="$('#acc,#pw').val('')">清除</button>
      </td>
      <td class="r">
        <a href="?do=forgot">忘記密碼</a>
        <a href="?do=reg">尚未註冊</a>
      </td>
    </tr>
  </table>
</fieldset>

<script>
  function login(){
    // 取得帳號密碼的value
    let acc=$('#acc').val();
    let pw=$('#pw').val();
    // 把帳號傳出去chk_acc.php裡面檢查這個帳號是否在資料庫 再回傳
    $.post("./api/chk_acc.php",{acc},(res)=>{
      // 如果傳回來的是數字1 代表有這個帳號
      if(parseInt(res)===1){
        $.post("./api/chk_pw.php",{acc,pw},(res)=>{
          // 如果傳回來的是數字1 代表有這個密碼
          if(parseInt(res)===1){
            // 如果是管理者帳號的話 導向後台
            if(acc==='admin'){
              location.href='back.php';
            }else{
              location.href='index.php';
            }
          }else{
            alert("密碼錯誤");
          }
        })
      }else{
        alert("查無帳號");
      }
    });
  }
</script>