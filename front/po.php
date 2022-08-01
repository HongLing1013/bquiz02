<style>
  .type{
    cursor: pointer;
    color: blue;
    margin: 1rem 0;
    max-width:max-content;
  }
  .type:hover{
    border-bottom:1px solid blue;
    /* text-decoration: underline; */
  }
</style>

<div>目前位置：首頁 > 分類網誌 > <span id="header"></span></div>
<div style="display: flex;">
  <fieldset>
    <legend>分類網誌</legend>
    <div>健康新知</div>
    <div>菸害防制</div>
    <div>癌症防治</div>
    <div>慢性病防治</div>
  </fieldset>
  <fieldset>
    <legend>文章列表</legend>
    <div></div>
  </fieldset>
</div>

<script>
  $(".type").on("click",function(){
    let type=$(this).text()
    $("#header").text(type)
  })
</script>