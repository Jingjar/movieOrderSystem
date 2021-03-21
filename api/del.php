<?php
include_once "../base.php";
$db=new DB($_GET['t']);
$db->del($_GET['id']);