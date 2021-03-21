<?php
$mo=$Movie->find($_GET['id']);
?>
<form action="api/editmovie.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>電影名稱:</td>
            <td><input type="text" name="name"value='<?=$mo['name']?>'></td>
        </tr>
        <tr>
            <td>電影分級:</td>
            <td>
                <select name="level" id="">
                    <option value="1" <?=($mo['level']==1)?'selected':''?>>普遍級</option>
                    <option value="2" <?=($mo['level']==2)?'selected':''?>>保護級</option>
                    <option value="3" <?=($mo['level']==3)?'selected':''?>>輔導級</option>
                    <option value="4" <?=($mo['level']==4)?'selected':''?>>限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>電影長度:</td>
            <td><input type="text"name='length'value='<?=$mo['length']?>'></td>
        </tr>
        <tr>
            <td>電影海報:</td>
            <td><input type="file" name="poster" id="" value='<?=$mo['poster']?>'></td>
        </tr>
        <tr>
            <td>上映時間:</td>
            <td>
                <select name="y" id="">
                    <option value="2021">2021</option>
                </select>年
                <select name="m" id="">
                    <?php
                    for ($i=1; $i <12 ; $i++) { 
                        # code...
                        $s=($mo['m']==$i)?'selected':'';
                        echo "<option value='$i' $s>$i</option>";
                    }
                    ?>
                </select>月
                <select name="d" id="">
                <?php
                    for ($i=1; $i <31 ; $i++) { 
                        # code...
                        $s=($mo['d']==$i)?'selected':'';
                        echo "<option value='$i' $s>$i</option>";
                    }
                    ?>
                </select>日
            </td>
        </tr>
    </table>
    <button>確定編輯</button>
    <input type="hidden" name="id" value="<?=$mo['id']?>">
</form>