<?php
$ord = $Ord->all(['user' => $_SESSION['login']]);
foreach ($ord as $o) {
?>
    <p>訂單編號為:<?= $o['no'] ?></p>
    <p>電影名稱:<?= $o['movie'] ?></p>
    <p>日期:<?= $o['date'] ?></p>
    <p>場次時間:<?= $o['session'] ?></p>
    <p>座位:<br>
        <?php
        $n = [];
        $n = array_merge($n, unserialize($o['seats']));
        foreach ($n as $v) {
            echo floor(($v / 5) + 1) . "排" . (($v % 5) + 1) . "號<br>";
        }
        echo "共" . sizeof($n) . "張票";
        ?>
    </p>
   <hr>
<?php
}
?>
 <p><button onclick="javascript:location.href='index.php'">確定</button></p>