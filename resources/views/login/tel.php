<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="index/login" method="post">
    手机号：<input type="text" name="tel"><br>
    验证码：<input type="password" name="code"><input type="button" value="点击获取验证码" id = "btn"><br>
    <input type="submit" value="登录">
</form>
<a href="/login/wechat">微信扫码登录</a>
<a href="/login/user">账号密码登录</a>
</body>

<script>
    $('#btn').on('click',function(){
        var tel = $('input[name="tel"]').val();
        if(tel == ''){
            alert('手机号不能为空');
        }
        $.ajax({
            url:"{{url('read/aliyun_code')}}",
            type:'post',
            data:{tel:tel},
            dataType:'json',
            success:function(res){
                if(res.Message == ok){
                    alert('发送成功');
                }
            }
        });
    });
</script>
</html>