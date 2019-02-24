{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>跳转提示</title>
    <script src="__PUBLIC__/style/jquery_002.js"></script>
    <script src="__PUBLIC__/layer/layer.js"></script>
</head>
<body>
    <input type="hidden" name="msg" id="msg" value="<?php echo(strip_tags($msg));?>">
    <input type="hidden" name="msg" id="url" value="<?php echo($url);?>">
    <input type="hidden" name="msg" id="wait" value="<?php echo($wait);?>">
    <script type="text/javascript">
        (function(){
            var msg = $("#msg").val();
            var url = $("#url").val();
            var wait = $("#wait").val();
            layer.msg(msg, {
                icon: 7,
                time: 2000 //2秒关闭（如果不配置，默认是3秒）
              }, function(){
                location.href = url;
              });   

            var interval = setInterval(function(){
                var time = --wait;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
