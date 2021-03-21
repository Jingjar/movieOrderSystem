
    <input type="text" id="acc"><br>
    <input type="text" id="pw"><br>
    <button id='btn'>登入</button>


<script>
$('#btn').on('click',function(){
    let acc=$('#acc').val()
    let pw=$('#pw').val()
    $.post('api/login.php',{acc,pw},function(re){
        if(re==1){
            alert('等入成功')
            location.href='index.php'
        }else{
            alert('等入失敗')

        }
    })

})
</script>