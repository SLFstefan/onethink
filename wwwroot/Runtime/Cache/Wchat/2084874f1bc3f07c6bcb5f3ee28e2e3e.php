<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <!-- Bootstrap -->
    <link href="/Public/Wchat/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/Wchat/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>


    <title>微信物业管理系统</title>

</head>
<body>
<div class="main">
    <!-- 头部 -->
    <div class="container-fluid">
        <div id="top-alert" class="fixed alert alert-error bg-danger" style="display: none;margin-top: 10%;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
    </div>


    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/Index/index.html" class="navbar-link">首</a></p>
            </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Service/listIndex.html" class="navbar-link">服务</a></p>
        </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Find/all.html" class="navbar-link">发现</a></p>
        </div><div class="col-xs-3">
            <p class="navbar-text"><a href="/Center/index.html" class="navbar-link">我的</a></p>
        </div>	</div>
    </nav>
    <!--导航结束-->

    <!-- /头部 -->

    <!-- 主体 -->

    <div class="container">
        <div class="blank"></div>
        <div class="row">
            <div class="col-xs-3">
                <img src="./Public/Wchat/image/5.png"  width="60" height="60"/>
            </div>
            <div class="col-xs-9">
                <?php echo ($list["nickname"]); ?><br/>
                燥起来                                    <br/> 积分:
                <span class="text-danger">369</span>
                <span class="text-danger pull-right"><a class="ajax-get" href="/Center/sign.html">签到</a></span>
            </div>
        </div>
        <div class="blank"></div>
        <div class="row text-center myLabel">
            <div class="col-xs-4 label-danger"><a href="#"><span class="iconfont">&#xe60b;</span>我的资料</a></div>
            <div class="col-xs-4 label-success"><a href="/Repair/index.html"><span class="iconfont">&#xe609;</span>我的报修</a></div>
            <div class="col-xs-4 label-primary"><a href="/Center/activity.html"><span class="iconfont">&#xe606;</span>报名的活动</a></div>
        </div>
        <div class="blank"></div>
        <div>
            <ul class="list-group fuwuList">
                <li class="list-group-item"><a href="/Center/myNotice.html" class="text-info"><span class="iconfont">&#xe60a;</span>我的缴费账单</a>
                </li><li class="list-group-item"><a href="/Center/myNotice.html" class="text-danger"><span class="iconfont">&#xe60a;</span>我的物业通知</a>
            </li><li class="list-group-item"><a href="/Center/myNotice.html" class="text-info"><span class="iconfont">&#xe60a;</span>我的水电气使用</a>
            </li><li class="list-group-item"><a href="<?php echo U('User/logout');?>" class="text-danger"><span class="iconfont">&#xe60a;</span>退出登录</a>
            </li>            </ul>
        </div>
    </div>



    <!-- /主体 -->

    <!-- 底部 -->

    <!-- 底部
    ================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/Wchat/js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/Wchat/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        (function(){
            var ThinkPHP = window.Think = {
                "ROOT"   : "", //当前网站地址
                "APP"    : "", //当前项目地址
                "PUBLIC" : "/Public", //项目公共目录地址
                "DEEP"   : "/", //PATHINFO分割符
                "MODEL"  : ["2", "", "html"],
                "VAR"    : ["m", "c", "a"]
            }
        })();
    </script>

    <script type="text/javascript" src="/Public/Wchat/js/my.js"></script>
    <!-- 用于加载js代码 -->
    <!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

    </div>

    <!-- /底部 -->
</div>
</body>
</html>