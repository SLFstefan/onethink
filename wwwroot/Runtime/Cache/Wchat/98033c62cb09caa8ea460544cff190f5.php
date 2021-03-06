<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="./public/Wchat/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/Wchat/css/style.css" rel="stylesheet">

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
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="<?php echo U('Index/my');?>" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid" id="content_list">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="row noticeList">
            <a href="notice-detail.html">
                <div class="col-xs-2">
                    <img class="noticeImg" src="<?php echo ($list["path"]); ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><a href="<?php echo U('Notice/detail',array('id'=>$list['id']));?>" class="navbar-link"><?php echo ($list["title"]); ?></a></p>
                    <p class="intro"><?php echo ($list["description"]); ?></p>
                    <p class="info">浏览: <?php echo ($list["view"]); ?> <span class="pull-right"><?php echo (date('Y-m-d G:i:s',$list["create_time"])); ?></span> </p>
                </div>
            </a>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-info ajax-page">获取更多~~~</button>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="./public/Wchat/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="./public/Wchat/bootstrap/js/bootstrap.min.js"></script>
<script type="application/javascript">
    var p = 1;
    var url = '/wchat.php?s=/Notice/index';
    var inner_url = '/wchat.php?s=/Notice/detail';
    //将时间戳转换为本地时间
    function getLocalTime(time) {
        return new Date(parseInt(time) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ');
    }
    $(function(){
        $('.ajax-page').click(function () {
            if($(this).hasClass('ajax-page')){
                p = p+1;
                $.get(url+'/p/'+p,function(response){
                    if(response.length){
                        html = '';
                        $(response).each(function(i,v){
                            html += '<div class="row noticeList">\
                                            <a href="'+inner_url+'/id/'+v.id+'">\
                                                <div class="col-xs-2">\
                                                    <img class="img-rounded img-responsive" src="'+v.path+'" />\
                                                </div>\
                                                <div class="col-xs-10">\
                                                    <p class="title">'+v.title+'</p>\
                                                    <p class="intro">'+v.description+'</p>\
                                                    <p class="info">浏览: '+v.view+' <span class="pull-right">'+getLocalTime(v.create_time)+'</span> </p>\
                                                </div>\
                                            </a>\
                                        </div>';
                        });
                        $('#content_list').append(html);
                    } else {
                        $('.ajax-page').html("没有更多数据了！！").removeClass('ajax-page')
                    }
                })
            }
        });

    });
</script>

</body>
</html>