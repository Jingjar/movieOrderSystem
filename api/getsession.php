<?php
include_once "../base.php";
$movie=$Movie->find($_GET['movie'])['name'];
$date=$_GET['date'];
$now=date("G");
if($now<=13){
    $start=1;
}else{
    $start=ceil(($now-13)/2)+1;
}
if($date>date("Y-m-d")){
    $start=1;
}
for ($i=$start; $i <=5 ; $i++) { 
    # code...
    $sum=$Ord->q(" select sum(`qt`) from ord where `movie`='$movie' && `date`='$date' && `session`='{$sess[$i]}'")[0][0];
    echo "<option value=$i>{$sess[$i]} 剩餘座位:".(20-$sum)."</option>";
}