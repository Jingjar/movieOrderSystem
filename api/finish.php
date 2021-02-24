<?php
include_once "../base.php";
$data['movie']=$Movie->find($_GET['movie'])['name'];
$data['date']=$_GET['date'];
$data['session']=$sess[$_GET['session']];
$data['seats']=serialize($_GET['seats']);
$data['qt']=sizeof($_GET['seats']);
$n=$Ord->q(" select max(`id`) from ord")[0][0]+1;
$data['no']=date("Y-m-d").$n;
$Ord->save($data);
echo $data['no'];