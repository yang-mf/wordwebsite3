<?php
$config = array (
    //应用ID,您的APPID。
    'app_id' => "2016101300673569",

    //商户私钥
    'merchant_private_key' => "MIIEowIBAAKCAQEAv8im+Z1tiZDigPw1caE2FdZZ5N6JJQesJLYYOKe2yn6BVdKCiZCCc3YqgiXtae685mqIcXexhSiU7AOGWj0KAdOYPWHavRpAi9oNJ9nWwlPfNdy+Mw2M/2m09kuwtC1uFKuMVltUi0Y/+w3Q/hnMIM9uRWrLYWru15bQaiZzPhAMyM3P+D4Ka8JYDXsA7r2M+Glcd7R0jyGAy/1kXmE1iZBf8AgOgQNkDlF8OF8Wnh/3iB00HBw82fb8j5fNG2Sl5m4tXpJF6MhrPNOxSF1blCKwyL/ioo2UDsylr9O40UGdKRYYq3cHbiz/TdXv9yglg9meQyK4rjHJl5cV8qh8yQIDAQABAoIBAF00/Im2DCVeh+aeLK8z5WBJk9jampanmu8gnLb0M69IOj1mmNCYrf3FgTVNj4v7Xk0xm2xh+qG3rmDh+arjnXhzyLqUU0Wye4o8iEZE5c3+Cy5XQQz42fzL+An3kUKQDb73/LV/n6AsnS27ckX8bavIhFQyafPHj5qxjkr4suuG8/7goYgUHQcmG8Wi5f4gNYdOuyjiB3cn9QqAsh/J2x6qWrvmc/ctknWErc6sRRfNTSWU57j/n1+RN/O7wqJ/yf0UX+2vhfp4l6EjYUyWSSCSWIhZNtt2arINQs4RY4784bndwwf/9Iw+5rVaedX3h4pva4tFkR9kRPBn5IalAy0CgYEA3k48QJ9x9kvbQMsPIWuYRBmz7LhgAMR8Pn4GwX2OsKdnBeHpkWD8JBNFI4VxxOVCwZph4rlRdssDEl5YlA73EJDz6t4a/R2JC0xGE7M5w0DOBMfU8Ta/RqyE67ry3gauJmHYHEnKyKsmndBRVaVDrL9kmSJYjtOuOaxMHogzTKMCgYEA3Nog53SX7EPSI09CgeiDE31AvMXrR6HqoOCRcrS+ybY1hnfJHce1cqwF7hRlcL76N9etNbSuwJE8FCPb4qb10FJU/4qjQHN9iQ+wqcqr76c81xABiuoWceb2W04h43HQsgQhNnQu4YzZXRNh3x/tzJLsOzTTe9Xr4JPIX/yIm6MCgYEA0U+Ed6wo1ygxNl56zpLJ+UTiHf6zlcVq3kQ3BDO+CCJ2ZBmDm3hfr2/dZ0acCjF6m2NKyviF9X3MVJ00daNpiNWSdA/QBYarpFGaoa3cszTvRZ0JqFxN2LNTK8kIJ3jOvCDgJDJulmZfo7OjASrr/1jt1Sl7jG9O2cqamRzQgFUCgYBiby5fOw5Dle7hIgCImjNhyl/CQ4ycPsSus6jgMUMf8IBm0JjpFwv+ckGqXZjg6Z3oqc5fs4p39cOLTnhAyx2gnjGYPBiLL25yWnXpF5YOmMF7MX0ehzs9xS1kgKyGDUJxNXoAJUSH7xkqbOsgYcDBf3Ke6OqhtTUOwY97iLjydQKBgGJd3V3X0ucT7j/IYqBunwZOri0W2dQ2RVZy2dtcXT3ChvqkGYauQeTC7S73fl21RwzB34sojYp/VftVJQiD6uKVxeR6ZluNZvKIeCDF5Q5wnzfgJVO1fGVekBIh753ceFlZ5jdyYxYxMZPGJZTzGH6urodNqBjhulc2pAGtrdm5",

    //异步通知地址
    'notify_url' => "http://wordwebsite.11905.com/pay/notify_url",

    //同步跳转
    'return_url' => "http://wordwebsite.11905.com/pay/return_url",

    //编码格式
    'charset' => "UTF-8",

    //签名方式
    'sign_type'=>"RSA2",

    //支付宝网关
    'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

    //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
    'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAgMQnLZrOjOI4Xulnh2uyJxT9L1MtLv0+iZ5m3ZMpUi3W8NXf+BaoLctukBgGURjEGSPLjbJgTpOogxWbquoq3m0ydPj0bAteH9x7apUkkBUYAvEEkw1WrXIAia94dupSTsA+gytULOeKya3sIr6gXlpj0U8Sehruv3ZfTrLaYbnK9WWvDGmKsoTkNjVhLrulC2sHWmYQy2S3daCdTvvaNJP+PwnSD+7b9YO1GHRt+qbWrgP0H1GBxRisRG/cOuEsQu/2MH3ax1gYXhYE0sHR7o/AJyoXMC1pKCi1/xkYFTwmHEKamOcLZdvJe4Ict0cgHT/pbcrj+EPX56RhjdEkTwIDAQAB",
);