<form action="api/savemovie.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>電影名稱:</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>電影分級:</td>
            <td>
                <select name="level" id="">
                    <option value="1">普遍級</option>
                    <option value="2">保護級</option>
                    <option value="3">輔導級</option>
                    <option value="4">限制級</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>電影長度:</td>
            <td><input type="text"name='length'></td>
        </tr>
        <tr>
            <td>電影海報:</td>
            <td><input type="file" name="poster" id=""></td>
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
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>月
                <select name="d" id="">
                <?php
                    for ($i=1; $i <31 ; $i++) { 
                        # code...
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>日
            </td>
        </tr>
    </table>
    <button>確定新增</button>
</form>