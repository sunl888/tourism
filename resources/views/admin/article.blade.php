<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>文章管理</title>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">
</head>
<body>
<div class="iframecontent">
    <div class="pos">
        <i class="icoh"></i>
        <span>文章列表</span>
    </div>
    <div class="operate">
        <div class="pull-left">
            <a name="" class="btn  btn-success" href="{{route('add_article')}}">添加文章</a>
        </div>
        <!-- operate标题结束 -->
        <div class="list">
            <div class="tablewrap">
                <table class="table" width="100%" id="datalist">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="all"></th>
                        <th>标题</th>
                        <th>排序</th>
                        <th>审核操作</th>
                        <th>审核状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td class=""><input type="checkbox" name=""></td>
                        <td><a href="javascript:;">{{$article->title}}</a></td>
                        <td><span>{{$article->sort}}</span></td>
                        <td><a href="{{url('article/audit/'.$article->slug.'/1')}}">同意</a> <a href="{{url('article/audit/'.$article->slug.'/-1')}}">拒绝</a></td>
                        <td><span>@if($article->status ==1) 通过@elseif($article->status ==-1) 拒绝 @else 待审核 @endif</span></td>
                        <td>
                            <a href="introduce.html">修改</a>
                            <a href="{{url('article/delete/'.$article->slug)}}">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--<div class="page"></div>--}}
        </div>
    </div>
</div>

<script type="text/javascript">
    //alert($)
    //复选框全部选中
    $(function () {
        $("#all").click(function () {
            if ($(this).prop('checked')) {
                $('#datalist :checkbox').prop('checked', true)
            } else {
                $('#datalist :checkbox').prop('checked', false)
            }
        })
    })
</script>
</body>
</html>