<?php
include_once "../base.php";
if(!empty($_FILES['poster']['tmp_name'])){
    $_POST['poster']=$_FILES['poster']['name'];
    move_uploaded_file($_FILES['poster']['tmp_name'],"../img/".$_FILES['poster']['name']);
}

    $_POST['sh']=1;
    $_POST['rank']=$Movie->q(" select max(`rank`) from movie")[0][0]+1;


$_POST['ondate']=$_POST['y']."-".$_POST['m']."-".$_POST['d'];
$Movie->save($_POST);

to("../admin.php?do=movie");