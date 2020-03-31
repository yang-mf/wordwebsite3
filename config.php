<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101300673569",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAwY9WR11/npgXtP6Bt6AwItn41MNNjX57Eu2AZ4+zlPlbeb9a7KBzXyFDhu/0NCfiwoFd+IEOu75tnm/pyyZvbWLDVkwfIBh5e3h7eSDqh9t4Ue8X8HWRCTqYL33DIKmewDVCdwSsMdee/S8IhbQlMjyyxqpidJsLNQA087Uxa1eoJx3VjZu1FfETYoV3QCl57BR/LVrjGKVcs/y6cM3XGbdSL/6PQIb1qwBhQiQhQAwvPCxd85T23zF/bVSyXm50nXtvIiLqr0sfvHposM/qohP6eePSlzTcJNzsbSiaap85oTEi5RwQylqgCxwMimaoF0m0zZ9FB9Cau8Zh0juAFQIDAQABAoIBAQC4N9mf1mbt5Ec75bZDs9vcb6QZqz+WWTh9jTlWVzhNov3i47J/3z2u3pPMS3gaY5O4FzP+naYOHXFrB4x14sDOVN8gtRYyj9ifIM4zPJa6crETGgGow9wj8naBTKp33bfPq2D0safJUDRrN2ZfClMUexyTY/qMjDugV/ANuver9nlKv/LHBhtx8Vnf4aHg6VqdyqZ/1LSeGlrYXsNdHrhwqxK1XYAFtiDtMZVuQYAHG/6o3IhBdzvY26o0gVB/aTEfcyB8ZLal447MJdthOaQpFOwTlJ2oiEOFXcaT/r24K8tB7xUXtFH+HQEW+v8GiWEysZTsjxbGt4BKMmje1w7JAoGBAPgBXRYC5e14oerEVF2/cRqJD6eSQbqziiLfXDXHq5kewOD4+EW8vmJggaL/igyWAG4KHgdgBq3IWuZIm5Hx2pa5ybO+Jh18JrwVHiKbGUHPiq1sMxrvFpTVH4Ka17meZ+CkmZEPC8IiPRYHUxe0Fxfsn+bIeEK1GI0/mjhyXn9jAoGBAMfMqy2XALrmNMCkth7BCY6dNEDrZ+A9DYe38JPIA5Ony6+81ubX0m5jXWn3nOtyVZuhM/x4nhCuAC2o9v+i3saZYZm0ZL38ovQ9hmK0Hi4Tt0nqbobcQmEpZpEw0MbUkPiLqmmLn27IfngL3KHb3cb/3FirjldMfuipqVI5KQgnAoGAdfMoE2zjb7Kcx2wCd+ex4h3nnRnZOvNisj0qvMUu3o8ayqR+Z6Rho6YkYaJJRL0ejTcwmu9XndUZLka//oRZIrBPtrWrqQA/59nfUDQVqhAL83jvQVMOmVBXQSVljflBjDyccLoILJdeGBj5st9K0G0Qi5EyaP96IstqDIiQWuMCgYB/B/396ngoXJ1FrnOscgdliUXj0MgmpiqoE6b+DrlXc+PpRCNOegHs9Xg7G5fFitgrLv8ikn3NFRQ/86G3PxJtKrAHTc6PjMT+jO+YafSWTyrF8Ct9yyTZKb1wqpzTDetuWz5qBL/Fa+wc303UCzqif6LVLZ4+mwBFZTmmcXlJGQKBgQCsXmiPHp59UkNy974CS69Ppxwg/0Z2xfCywSankRjiXD6qdLZJ51F/gC70Gxc1XUEoNG3/ovFMIExF9I2P+6bYZqrvWRu1xtj9ludQrU9oGjyoSxS/7B0dF9BlMMNHjVzqMWKMe4DZa8qTMGVIPV/JV2iMJcWc/8YOje9RG/jliw==",
		
		//异步通知地址
		'notify_url' => "http://www.4399.com",
		
		//同步跳转
		'return_url' => "http://www.baidu.com",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
);