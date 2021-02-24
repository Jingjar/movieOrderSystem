<?php
include_once '../base.php';
$db=new DB($_GET['t']);
$x=$db->find($_GET['x']);
$y=$db->find($_GET['y']);
$tmp=$x['rank'];
$x['rank']=$y['rank'];
$y['rank']=$tmp;
$db->save($x);
$db->save($y);
