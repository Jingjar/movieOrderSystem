<?php
include_once "../base.php";
$movie=$_POST['movie'];
$type=$_POST['type'];
$user=$_POST['user'];
if($type==1){
    $Log->save(['user'=>$user,'movie'=>$movie]);
}else{
    $Log->del(['user'=>$user,'movie'=>$movie]);

}
?>