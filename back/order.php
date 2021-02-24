<h2 style="text-align: center;">訂單管理</h2>
<span>快速刪除</span>
<input type="radio" name="type" value="date">依日期
<input type="text" id='d'>
<input type="radio" name="type" value="movie">依電影
<select name="" id="m">
    <?php
    $movie = $Ord->all(" group by `movie`");
    foreach ($movie as $mo) {
        echo "<option value='{$mo['movie']}'>{$mo['movie']}</option>";
    }
    ?>
</select>
<button onclick="qdel()">刪除</button>
<hr>
<table width="750px">
    <tr>
        <td width="10%">訂單編號</td>
        <td width="10%">電影名稱</td>
        <td width="10%">日期</td>
        <td width="10%">場次時間</td>
        <td width="10%">訂購數量</td>
        <td width="10%">訂購位置</td>
        <td width="10%">操作</td>
    </tr>
    <?php
    $ord = $Ord->all();
    foreach ($ord as $o) {
    ?>
        <tr>
            <td><?= $o['no'] ?></td>
            <td><?= $o['movie'] ?></td>
            <td><?= $o['date'] ?></td>
            <td><?= $o['session'] ?></td>
            <td><?= $o['qt'] ?></td>
            <td>
                <?php
                $n = [];
                $n = array_merge($n, unserialize($o['seats']));
                foreach ($n as $v) {
                    echo floor(($v / 5) + 1) . "排" . (($v % 5) + 1) . "號<br>";
                }
                ?>
            </td>
            <td><button onclick="del('ord','<?= $o['id'] ?>')">刪除</button></td>
        </tr>

    <?php
    }
    ?>
</table>
<script>
    function qdel() {
        let type = $('input[name=type]:checked').val();
        let tar
        if (type == 'date') {
            tar = $('#d').val()
        } else {

            tar = $('#m').val()
        }
        console.log(tar);
        console.log(type);
        $.post("api/qdel.php", {
            type,
            tar
        }, function() {
            // location.reload()
        })
    }

    function del(t, id) {
        $.get("api/del.php", {
            t,
            id
        }, function() {
            location.reload()

        })
    }
</script>