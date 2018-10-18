<?php
//把订单状态由未付款 变为已付款 插入支付时间
$redis=new Redis();
$redis->connect('localhost',6379);
//获取订单id
$order_id=$redis->get('o2o28pay');
$static=0;//0代表已经支付
$buy_time=time();//支付时间
$pdo=new PDO("mysql:host=localhost;dbname=dy",'root','');
$pdo->exec("set names utf8");
//sql语句
$sql="update morder set static='{$static}',buy_time='{$buy_time}' where id='{$order_id}'";
// echo $sql;
//执行修改sql语句
$list=$pdo->prepare($sql);
//执行
$list->execute();
 ?>
<h1>支付成功</h1>