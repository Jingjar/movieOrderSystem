<?php
include_once "../base.php";
$today = date("Y-m-d");
$startdat = date("Y-m-d", strtotime("-2 days"));
$movie = $Movie->all(['sh' => 1], " && `ondate`>='$startdat' && `ondate`<='$today'");

foreach($movie as $mo){
    $selected=($mo['id']==$_GET['movie'])?'selected':'';
    echo "<option value='".$mo['id']."' $selected>{$mo['name']}</option>";
}
