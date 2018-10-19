<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"G:\xampp\htdocs\car\public/../app/index\view\zerocar\index.html";i:1539946870;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>tab</title>
    <style type="text/css">
        * {padding:0; margin:0;}
        button {
            background-color: #ccc;
            width:80px;
            height: 30px;
        }
        .btn-active {
            background-color: yellow;
            font-weight:bold;
            font-size: 14px;
        }
        div{
            width:200px;
            height: 200px;
            font-size: 64px;
            background-color: #0c0;
            display: none;
            color:#fff;
        }
        .div-active {
            display: block;
        }
    </style>
</head>
<body>
<button class="btn-active">按钮1</button>
<button>按钮2</button>
<button>按钮3</button>
<button>按钮4</button>
<div class="div-active" id ="tb_01">1</div>
<div id ="tb_02">2</div>
<div id ="tb_03">3</div>
<div id ="tb_04">4</div>
<script type="text/javascript">
    //1.先获取元素
    var buttonList = document.getElementsByTagName("button");
    alert(buttonList);
    var divList = document.getElementsByTagName("div");
    //2.添加事件
    for(var i = 0; i < buttonList.length; i++) {
        (function(i){ //匿名函数自执行
            buttonList[i].onclick = function() {
                for(var j = 0; j < buttonList.length;j++) {
                    buttonList[j].className = "";
                    divList[j].className = "";
                }
                this.className = "btn-active";
                divList[i].className = "div-active";
            }
        })(i)
    }
</script>
</body>
</html>