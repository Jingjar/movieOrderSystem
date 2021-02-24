<?php
include_once "../base.php";
$t=$_POST['type'];
$a=$_POST['tar'];
$Ord->del([$t=>$a]);