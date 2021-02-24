<button onclick="javascript:location.href='?do=addmovie'">新增電影</button>
<hr>
<?php
$movie = $Movie->all(" order by rank");
foreach ($movie as $k => $mo) {
?>
    <div style="display: flex; height:115px">
        <dvi style="margin: 0 15px;"> <img src="img/<?= $mo['poster'] ?>" alt="" srcset="" width="80px"></dvi>
        <dvi style="margin: 0 15px;">分級: <img src="icon/03C0<?= $mo['level'] ?>.png" alt="" srcset="" width="15px"></dvi>
        <dvi style="margin: 0 15px;">
            <div>
                <table width="500px">
                    <tr>
                        <td width="30%">片名:<?= $mo['name'] ?></td>
                        <td width="30%">片長:<?= $mo['length'] ?></td>
                        <td width="30%">上映日期:<?= $mo['ondate'] ?></td>
                    </tr>
                </table>
            </div>
            <div>
                <button onclick="sh('<?= $mo['sh'] ?>','<?= $mo['id'] ?>')"><?=($mo['sh']==1)?'顯示':'隱藏'?></button>
                <button onclick="javascript:location.href='?do=editmovie&id=<?= $mo['id'] ?>'">編輯</button>
                <button onclick="del('movie','<?= $mo['id'] ?>')">刪除</button>
                <?php
                if ($k > 0) {
                ?>

                    <button onclick="sw('movie','<?= $mo['id'] ?>','<?= $movie[$k-1]['id'] ?>')">向上</button>
                <?php
                }
                ?>
                <?php
                if ($k < sizeof($movie)-1) {
                ?>

                    <button onclick="sw('movie','<?= $mo['id'] ?>','<?= $movie[$k+1]['id'] ?>')">向下</button>
                <?php
                }
                ?>
            </div>
        </dvi>
    </div>
<?php
}
?>
<script>
    function sw(t,x,y){
        $.get("api/sw.php",{t,x,y},function(){
            location.reload()
        })
    }
    function sh(s,id){
        $.get("api/sh.php",{s,id},function(){
            location.reload()
        })
    }
    function del(t,id){
        $.get("api/del.php",{t,id},function(){
            location.reload()
        })
    }

</script>