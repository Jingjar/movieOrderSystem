   <?php
   if(!empty($_SESSION['login'])){
    ?>
  
   <div class="order">
       <table style="margin:50px auto">
           <tr>
               <td>電影名稱:</td>
               <td><select name="" id="m" onchange="getdate()"></select></td>
           </tr>
           <tr>
               <td>日期:</td>
               <td><select name="" id="d" onchange="getsession()"></select></td>
           </tr>
           <tr>
               <td>場次:</td>
               <td><select name="" id="s"></select></td>
           </tr>
       </table>
       <button onclick="getbooking()">確定</button>
   </div>
   <div class="book" style="display: none;"></div>
   <script>
       getmovie(<?= (!empty($_GET['id'])) ? $_GET['id'] : "" ?>);

       function getmovie(id) {
           let movie
           if (id == undefined) {
               movie = 0
           } else {
               movie = id
           }
           $.get("api/getmovie.php", {
               movie
           }, function(re) {
               $('#m').html(re)
               getdate()
           })
       }

       function getdate() {
           let movie = $('#m').val()
           $.get("api/getdate.php", {
               movie
           }, function(re) {
               $('#d').html(re)
               getsession()
           })
       }

       function getsession() {
           let movie = $('#m').val()
           let date = $('#d').val()
           $.get("api/getsession.php", {
               movie,
               date
           }, function(re) {
               $('#s').html(re)

           })
       }

       function getbooking() {
           $('.order,.book').toggle()
           let movie = $('#m').val()
           let date = $('#d').val()
           let session = $('#s').val()

           $.get("api/getbooking.php", {
               movie,
               date,
               session
           }, function(re) {
               $('.book').html(re)

           })
       }
   </script>
     <?php
   }else{
       echo "請先登入";
   }
   ?>