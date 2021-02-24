<style>
body{
    display: flex;
    justify-content: center;
    align-items: center;
}
.main{
    width: 800px;
    height: 720px;
    background-color: wheat;
    padding: 100px 100px;
    text-align: center;
}
</style>
<?php
include_once "base.php";
?>
<script src="js/jquery-1.9.1.min.js"></script>
<body>
    <div class="main">
    <h2 style="margin:0 auto">電影訂票系統</h2>
    <div style="padding:0 50px"><button onclick="javascript:location.href='admin.php'">後台</button>
    <button onclick="javascript:location.href='index.php'">首頁</button></div>

    <?php
            $do = isset($_GET['do']) ? $_GET['do'] : 'main';
            $file = "front/" . $do . ".php";

            if (file_exists($file)) {

                include $file;
            } else {
                include "front/main.php";
            }
            ?>
    </div>
</body>