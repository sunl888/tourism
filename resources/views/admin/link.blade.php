<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>栏目管理</title>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">
</head>
<body>
<div class="iframecontent">
    <div class="pos">
        <i class="icoh"></i>
        <span>友情链接</span>
    </div>
    <div class="operate">
        <div class="pull-left">
            <input type="button" name="" value="添加友情链接" class="btn  btn-success"
                   onclick="document.getElementById('box').style.display='block'">
        </div>
        <div class="form-group box" id="box">
            <label for="exampleInputEmail1">添加友情链接</label>
            <form action="{{route('link/store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入友情链接名称">
                <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="请输入url">
                <input type="button" name="" value="关闭" onclick="document.getElementById('box').style.display='none'"
                       class="btn btn-info">
                <input type="hidden" name="id" value=0 class="link_id" />
                <input type="submit" name="" value="确认添加" class="btn  btn-success">
            </form>
        </div>
        <div class="form-group box" id="box2">
            <label for="exampleInputEmail1">修改友情链接</label>
            <form action="{{route('link/update')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入友情链接名称">
                <input type="text" name="url" class="form-control" id="exampleInputEmail1" placeholder="请输入url">
                <input type="button" name="" value="关闭" onclick="document.getElementById('box2').style.display='none'"
                       class="btn btn-info">
                <input type="hidden" name="id" value=0 class="link_id" />
                <input type="submit" name="" value="确认修改" class="btn  btn-danger">
            </form>
        </div>
        <!-- operate标题结束 -->
        <div class="list">
            <div class="tablewrap">
                <table class="table" width="100%" id="datalist">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="" id="all"></th>
                        <th>标题</th>
                        <th>url</th>
                        <th width="150px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($links as $link)
                    <tr>
                        <input type="hidden" class="id" value="{{$link->id}}"/>
                        <td class=""><input type="checkbox" name=""></td>
                        <td><a target="_blank" href="{{$link->url}}">{{$link->title}}</a></td>
                        <td><a target="_blank" href="{{$link->url}}">{{$link->url}}</a></td>
                        <td>
                            <a class="add" href="javascript:;"
                               onclick="document.getElementById('box2').style.display='block'">修改</a>
                            <a href="{{url('link/delete/'.$link->id)}}">删除</a>
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
</body>
<script type="text/javascript">
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
    var add_index = 0;
    $('table tbody tr').click(function(){
        add_index = $(this).index();
        var id = $('.id').eq(add_index).attr("value");
        $('.link_id').val(id);
    })
</script>
</html>