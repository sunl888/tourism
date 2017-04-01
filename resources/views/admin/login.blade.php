<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        *{
            font-family:"微软雅黑";
        }
        body{
            background-image: url({{asset('admin/picture/bg.jpg')}});
            background-size: cover;
        }
        .login{
            width:1000px;
            height:400px;
            margin:100px auto;
            border:1px;
            background-color: rgba(0, 0, 0, 0.3);
            padding: 1px;
            position:relative;
            overflow:hidden;
            color:#fff;
        }
        .login .loginmain{
            margin-left:20px;
            margin-top:40px;
        }
        .login .loginmain h2{
            margin-left:100px;
            margin-bottom:40px;
        }
        .form-group{
            margin-bottom:25px!important;
        }
        .rightpic{
            width:500px;
            height:330px;
            position:absolute;
            right:30px;
            top:30px;
            opacity: 0.8;
        }
        #container{
            position: relative;
            width:500px;
            height:330px;
        }
        canvas{ position: absolute;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            -ms-backface-visibility: hidden;
        }
        img {
            position: absolute;
            -webkit-transition: opacity .3s;
            transition: opacity .3s;
        }
        .check{
            margin-top:-30px!important;
        }
        .btn{
            margin-top:-10px;
        }
    </style>
    <title>后台管理系统登录</title>
</head>
<body>
<div class="login">
    <div class="loginmain">
        <h2>登录后台管理系统</h2>
        <form action="{{route('login')}}" method="post" class="form-horizontal">
            {{csrf_field()}}
            <!-- 让表单在一行中显示form-horizontal -->
            <div class="form-group">
                <label for="username" class="col-lg-1 control-label">用户名</label>
                <div class="col-lg-4">
                    <input type="text" name="username" id="username" class="form-control" placeholder="admin">
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-lg-1 control-label">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                <div class="col-lg-4">
                    <input type="password" name="password" id="password" class="form-control" placeholder="admin">
                </div>
            </div>

            <div class="form-group"></div>

            <div class="form-group check">
                <div class="col-lg-11 col-lg-offset-1">
		                <span class="checkbox ">
		                    <label><input type="checkbox" name="remember" class="checkbox-inline">记住我</label>
		                </span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-1">
                    <input type="submit" value="登录" class="btn btn-danger btn-lg">
                    <span class="text"></span>
                </div>
            </div>

        </form>
    </div>
    <div class="rightpic">
        <div id="container">
             <img src="{{ asset('admin/picture/1.jpg') }}" alt="" width="500px" height="330px">
        </div>
    </div>
</div>


<script src="{{asset('admin/public/js/delaunay.js')}}"></script>
<script src="{{asset('admin/public/js/TweenMax.js')}}"></script>
<script src="{{asset('admin/js/effect.js')}}"></script>
</body>
</html>