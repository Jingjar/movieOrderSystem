<div style="width:95% ; height:720px;display:flex;flex-wrap:wrap;margin:0 auto">
    <?php
    $today = date("Y-m-d");
    $startdat = date("Y-m-d", strtotime("-2 days"));
    $total = $Movie->count(['sh' => 1], " && `ondate`>='$startdat' && `ondate`<='$today'");
    $div = 4;
    $pages = ceil($total / $div);
    $now = (!empty($_GET['p'])) ? $_GET['p'] : 1;
    $start = ($now - 1) * $div;
    $movie = $Movie->all(['sh' => 1], " && `ondate`>='$startdat' && `ondate`<='$today' order by rank limit $start,$div");
    foreach ($movie as $mo) {
    ?>
        <div style="width: 48%;display:flex;flex-wrap:wrap;">
            <div style="margin-bottom: -100px;">
                <img src="img/<?= $mo['poster'] ?>" alt="" srcset="" width="150px">
            </div>
            <div style="margin-bottom: -100px;">
                <div style="font-size:24px;"><?= $mo['name'] ?></div>
                <div style="font-size:24px">分級: <img src="icon/03C0<?= $mo['level'] ?>.png" alt="" srcset="" wudth="20px"><?= $lv[$mo['level']] ?></div>
                <div style="font-size:24px">上映日期:<?= $mo['ondate'] ?></div>
            </div>
            <div>
                <?php
                if (!empty($_SESSION['login'])) {
                    ?>
                    <button onclick="javascript:location.href='?do=order&id=<?= $mo['id'] ?>'">訂票</button>
                    <?php
                    $log = $Log->find(['user' => $_SESSION['login'], 'movie' => $mo['id']]);
                    if (empty($log)) {
                ?>
                        <button onclick="log('<?= $mo['id'] ?>','1','<?= $_SESSION['login'] ?>')" id='log<?= $mo['id'] ?>'>珍藏</button>
                    <?php
                    } else {
                    ?>
                        <button onclick="log('<?= $mo['id'] ?>','2','<?= $_SESSION['login'] ?>')" id='log<?= $mo['id'] ?>'>取消珍藏</button>
                <?php
                    }
                }


                ?>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div style="text-align: center;">
    <?php
    if (($now - 1) > 0) {
        echo "<a href='index.php?p=" . ($now - 1) . "'><</a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
        $size = ($now == $i) ? '24px' : '18px';
        echo "<a href='index.php?p=$i' style='font-size:$size'>$i</a>";
        # code...
    }
    if (($now + 1) <= $pages) {
        echo "<a href='index.php?p=" . ($now + 1) . "'>></a>";
    }
    ?>
</div>
<script>
    function log(movie, type, user) {
        $.post("api/log.php", {
            movie,
            type,
            user
        }, function() {
            if (type == "1") {
                $("#log" + movie).text("取消珍藏").attr("onclick", "log('" + movie + "','2','" + user + "')")
            } else {
                $("#log" + movie).text("珍藏").attr("onclick", "log('" + movie + "','1','" + user + "')")
            }
        })
    }
</script>