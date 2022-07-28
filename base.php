<?php
date_default_timezone_set('Asia/Taipei');
session_start();

class DB{
  public $table; 
  protected $dsn="mysql:host=localhost;charset=utf8;dbname=db02";
  protected $pdo;
  
//  function 如果沒有預設的話都是public

function __construct($table)
{
  $this->table=$table;
  $this->pdo=new PDO($this->dsn,'root','');
}

/**
 *  1.新增資料 insert() insert into table
 *  2.修改資料 update() update table set
 *              -> save()
 *  3.查詢資料 all(),find() select from table
 *  4.刪除資料 del() delete from table
 *  5.計算 max(),min(),sum(),count(),avg()  -> math()  select max() from table 
 * */


 /* 可能帶的參數有以下幾種 -------
  * ($array) => 特定欄位條件的多筆資料
  * ($array,$sql) => 有欄位條件又有額外條件的多筆資料..... where ..... limit  ....., .. where....order by .....
  * () => 整張資料表的內容
  * ($sql) => 只有額外條件的多筆資料.... limit $start,$div .... , order by ... , group by ....
  */

  public function all(...$arg){/* 不確定參數 所以給她...$arg 這個參數是彈性的
                                  如果參數是確定的 就給他固定的參數 */
    $sql="select * from $this->table ";
    if(isset($arg[0])){/* 如果他第一個參數都不存在 那他就要整張資料表的內容 */
      if(is_array($arg[0])){
        foreach($arg[0] as $key => $value){
          $tmp[]="`$key`='$value'";
        }
        // $sql = $sql . " WHERE " . join(" && " ,$tmp); 可以簡化成下面這樣
        $sql .=" WHERE " . join(" AND " ,$tmp);
      }else{
        // $sql = $sql . $arg[0]; 可以簡化成下面這樣
        $sql .=$arg[0];
      }
    }
    if(isset($arg[1])){
      $sql .=$arg[1];
    }
    echo $sql;
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function find($arg){
    $sql="select * from $this->table WHERE ";
      if(is_array($arg)){
        foreach($arg as $key => $value){
          $tmp[]="`$arg`='$value'";
        }
        $sql .= join(" AND " ,$tmp);
      }else{
        $sql .=" `id` = '$arg' ";
      }
    return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  }

  public function q($sql){
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }

  public function del($arg){
    $sql="DELETE * from $this->table where ";
      if(is_array($arg)){
        foreach($arg as $key => $value){
          $tmp[]="`$arg`='$value'";
        }
        $sql .= join(" AND " ,$tmp);
      }else{
        $sql .=" `id` = '$arg' ";
      }
    return $this->pdo->exec($sql);
  }

  public function save($array){
    if(isset($array['id'])){
      foreach($array as $key => $value){
        if($key!='id'){
          $tmp[]="`$array`='$value'";
        }
      }
      $sql="UPDATE $this->table SET ".join(',',$tmp)." WHERE `id` = '{$array['id']}'";
    }else{
      $sql="INSERT INTO $this->table (`".join("`,`",array_keys($array))."`) values('".join("','",$array)."')";
    }
    return $this->pdo->exec($sql);
  }

  public function math($math,$col,...$arg){
    $sql="select $math($col) from $this->table ";
    if(isset($arg[0])){
      if(is_array($arg[0])){
        foreach($arg[0] as $key => $value){
          $tmp[]="`$key`='$value'";
        }
        $sql .=" WHERE " . join(" AND " ,$tmp);
      }else{
        $sql .=$arg[0];
      }
    }
    if(isset($arg[1])){
      $sql .=$arg[1];
    }
    return $this->pdo->query($sql)->fetchColumn();
  }
  
}

function to($url){
  header("location:".$url);
}

function dd($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

$Total=new DB('total');
print_r($Total->find(1));
?>