<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>网站设置</title>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">
</head>
<body>
<div class="iframecontent">
    <div class="pos clearfix">
        <button class="btn btn-success">网站设置</button>
    </div>
    <div class="list">
        <div class="itabcontent" id="itabcontent">
            <form action="{{route('webset/update')}}" method="post">
                {{csrf_field()}}
                <!--站点配置开始-->
                <div class="itabcontentlist zdpz">
                    <dl class="clearfix">
                        <dt>网站标题：</dt>
                        <dd>
                            <input name="name" type="text" value="{{$webset->name}}" placeholder="我的网站"/>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>网站版权信息：</dt>
                        <dd>
                            <textarea name="copyright" class="textarea-default" placeholder="Copyright © 2017 孙龙 版权所有">{{$webset->copyright}}</textarea>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>网站备案号：</dt>
                        <dd>
                            <input name="case_number" value="{{$webset->case_number}}" type="text" placeholder="皖ICP备16000979号"/>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>联系地址：</dt>
                        <dd>
                            <input name="address" value="{{$webset->address}}" type="text" placeholder="安徽省安庆市"/>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt>联系电话：</dt>
                        <dd>
                            <input name="phone" value="{{$webset->phone}}" type="text" placeholder="15705547511"/>
                        </dd>
                    </dl>
                    <dl class="clearfix">
                        <dt class="surebtn">保存按钮：</dt>
                        <dd>
                            <input type="submit" class="btn btn-info"/>
                        </dd>
                    </dl>
                </div>
                <!--站点配置结束-->
            </form>
        </div>
    </div>
</div>

</body>
</html>