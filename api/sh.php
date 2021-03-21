<?php
include_once "../base.php";
$mo=$Movie->find($_GET['id']);
$mo['sh']=!$mo['sh'];
$Movie->save($mo);
