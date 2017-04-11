<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>修改我的信息</title>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">
</head>
<body>
<div class="iframecontent">
    <div class="pos">
        <i class="icoh"></i>
        <span>我的账户</span><span class="line">|</span><span>修改密码&nbsp;></span>
    </div>

    <div class="container intro">
        <form action="{{route('mine/reset')}}" method="post" accept-charset="utf-8">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-12 text">
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名</label>
                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户邮箱</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入用户邮箱">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">旧密码</label>
                        <input name="password" type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入旧密码">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">新密码</label>
                        <input name="new_password" type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入新密码">
                    </div>
                    {{--<div class="form-group">
                        <label for="exampleInputEmail1">请输入确认密码</label>
                        <input name="repassword" type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入确认密码">
                    </div>--}}
                </div>
                <div class="form-group">
                    <input type="submit" name="" value="确认修改" class="modify btn btn-success">
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" charset="utf-8" src="{{asset('admin/lib/utf8-php/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('admin/lib/utf8-php/ueditor.all.min.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('admin/lib/utf8-php/lang/zh-cn/zh-cn.js')}}"></script>

<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>
</body>
</html>