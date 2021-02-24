<?php
include_once "../base.php";
$movie = $Movie->find($_GET['movie'])['name'];
$date = $_GET['date'];
$session = $sess[$_GET['session']];
$ord = $Ord->all(['movie' => $movie, 'date' => $date, 'session' => $session]);
$seats = [];
foreach ($ord as $o) {
    $seats = array_merge($seats, unserialize($o['seats']));
}
?>
<style>
    .aa {
        width: 540px;

        margin: 0 auto;
    }

    .bb {
        width: 540px;
        height: 370px;
        margin: 0 auto;
        padding-top: 20px;
        background: url("icon/03D04.png") no-repeat;
    }

    .sb {
        width: 315px;
        height: 340px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 63px;
        height: 85px;
        text-align: center;
        position: relative;
    }

    .empty {
        background: url("icon/03D02.png") center no-repeat;
    }

    .booked {
        background: url("icon/03D03.png") center no-repeat;
    }

    .chk {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }
</style>
<div class="bb">
    <div class="sb">
        <?php
        for ($i = 0; $i < 20; $i++) {
            # code...
            if (in_array($i, $seats)) {
                echo "<div class='seat booked'>";
            } else {
                echo "<div class='seat empty'>";
            }
            echo floor(($i / 5) + 1) . "排" . (($i % 5) + 1) . "號";
            if (!in_array($i, $seats)) {
                echo "<input type='checkbox' value='$i' class='chk'>";
            }
            echo "</div>";
        }
        ?>
    </div>
</div>
<div class="aa">
    <div>您選擇的電影是:<?= $movie ?></div>
    <div>您選擇的時刻是:<?= $date ?> <?= $session ?></div>
    <div>您已經勾選<span id='ticket'></span>張票，最多可選四張</div>
    <div>
        <button>上一步</button>
        <button onclick="finish()">訂購</button>
    </div>
</div>
<script>
    let seats = new Array()
    $('.chk').on('click', function() {
        let s = $(this).val()
        if ($(this).prop("checked")) {
            seats.push(s)
            if (seats.length > 4) {
                seats.splice(seats.indexOf(s), 1)
                $(this).prop("checked", false)
            }
            $('#ticket').html(seats.length)
            console.log(seats);
        } else {
            seats.splice(seats.indexOf(s), 1)

            $('#ticket').html(seats.length)
            console.log(seats);
        }
    })

    function finish() {
        let movie = $('#m').val()
        let date = $('#d').val()
        let session = $('#s').val()
        $.get("api/finish.php",{movie,date,session,seats},function(re){
            location.href="index.php?do=result&no="+re
        })
    }
</script>