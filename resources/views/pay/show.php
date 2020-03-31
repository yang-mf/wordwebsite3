<p> 请输入您想要购买的月票数量  </p>

<form action="/pay/pay" method="post" onsubmit="check()">
    月票数：<input type="text" name="yuepiao" ><br>
    <input type="submit" value="购买" id="btn">

</form>
<script src="/jquery.js"></script>
<script>
    function check()
    {
        $('#btn').on('click',function(){
            var yuepiao = $('input[name="yuepiao"]').val();
            if(yuepiao == ''){
                alert('月票数量不能为空');
                return false;
            }else{
                return   true;
            }
        });
    }
</script>
