<fieldset>
  <legend>忘記密碼</legend>
  <div>請輸入信箱以查詢密碼</div>
  <div><input type="text" name="email" id="email"></div>
  <div id="result"></div>
  <div><button onclick="findPw()">尋找</button></div>
</fieldset>


<!-- 按下尋找密碼的按鈕之後 就會找findPw的function啟動AJAX的程序
      找到id為email的值 放在下面的JQ裡面當參數 傳給api/find_pw的程式
      回傳一個result的結果 放在#result裡面 -->
<script>
  function findPw(){
    $.get("./api/find_pw.php",{email:$("#email").val()},(result)=>{
      $("#result").html(result);
    })
  }
</script>

