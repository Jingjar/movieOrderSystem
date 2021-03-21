<?php
include_once "base.php";
?>
<script src="js/jquery-1.9.1.min.js"></script>
<style>
    body {
        width: 1080px;
        margin: 0 auto;
    }

    .mm {
        width: 1080px;
        height: 720px;

        background: #ccc;
    }

    .movie {
        width: 800px;
        margin: auto;
        height: 720px;
        overflow-y: scroll;
    }
</style>

<body>
    <h1>後台</h1>

    <button onclick="javascript:location.href='index.php'">首頁</button>
    <button onclick="javascript:location.href='?do=movie'">電影管理</button>
    <button onclick="javascript:location.href='?do=order'">訂單管理</button>
    <hr>
    <div class="mm">

        <div class='movie'>
            <?php
            $do = isset($_GET['do']) ? $_GET['do'] : 'movie';
            $file = "back/" . $do . ".php";

            if (file_exists($file)) {

                include $file;
            } else {
                include "back/movie.php";
            }
            ?>
        </div>

    </div>

</body>