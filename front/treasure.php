<?php
$log=$Log->all(['user'=>$_SESSION['login']]);
foreach($log as $l){
    $movie=$Movie->find($l['movie']);
    ?>
    <div> <img src="img/<?=$movie['poster']?>" alt="" srcset="" width="100px"></div>
    <button onclick="tdel('<?=$_SESSION['login']?>','<?=$movie['id']?>')">取消珍藏</button>
    <?php
}
?>
<script>
function tdel(user,movie){
    $.post('api/tdel.php',{user,movie},function(){
        location.reload()
    })
}
</script>
