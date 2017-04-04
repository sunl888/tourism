<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>main</title>

    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 illu">
                <dl>
                    <dt>我的个人信息</dt>
                    <dd>
                        <ul>
                            <li>您好，{{Auth::user()->username}}</li>
                            <li>上次登录时间：{{Auth::user()->last_login_time}}</li>
                            <li>上次登录IP：{{Auth::user()->last_login_ip}} </li>
                        </ul>
                    </dd>
                </dl> 

        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 illu">
                <dl>
                    <dt>信息统计</dt>
                    <dd>
                        <ul>
                            <li>文章总数：{{count($articles)}}</li>
                            <li>文章浏览量：{{$views}}</li>
                        </ul>
                    </dd>
                </dl>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 illu">
                <dl>
                    <dt>系统信息</dt>
                    <dd>
                        <ul>
                            <li>程序版本：V1.0 [2017.4.4]</li>
                            <li>操作系统：{{PHP_OS}}</li>
                            <li>服务器软件：{{$_SERVER['SERVER_SOFTWARE']}}</li>
                        </ul>
                    </dd>
                </dl>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 illu">
                <dl>
                    <dt>网站信息</dt>
                    <dd>
                        <ul>
                            <li>版权所有：{{$webinfo['copyright']}}</li>
                            <li>备案信息：{{$webinfo['case_number']}}</li>
                            <li>联系地址：{{$webinfo['address']}}</li>
                            <li>联系电话：{{$webinfo['phone']}}</li>
                        </ul>
                    </dd>
                </dl>
        </div>
      </div>
      <!-- 第一行结束 -->
    </div>
  </body>
</html>