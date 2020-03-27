<p> 请输入手机号和密码或使用验证码登录</p>

<form action="index/login" method="post">
    手机号：<input type="text" name="tel"><br>
    验证码：<input type="password" name="code"><input type="button" value="点击获取验证码" id="btn"><br>
    密  码：<input type="password" name ="pwd"><br>
    <input type="submit" value="登录">

</form>
<a href="/login/wechat">微信扫码登录</a>
<a href="/login/user">账号密码登录</a>

<script src="/jquery.js"></script>

<script>
    $('#btn').on('click',function(){
        var tel = $('input[name="tel"]').val();
        if(tel == ''){
            alert('手机号不能为空');
        }

        $.ajax({
            url:"code",
            type:'post',
            data:{tel:tel},
            dataType:'json',
            success:function(res){
                console.log((res));
                // if(res.Message == ok){
                //     alert('发送成功');
                // }
            }
        });
    });
</script>
