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
        <span>栏目列表</span>
    </div>

    <div class="operate">
        {{--添加栏目--}}
            <div class="pull-left">
                <input type="button" name="" value="添加栏目" class="btn  btn-success"
                       onclick="document.getElementById('box').style.display='block'">
            </div>

        {{--添加子栏目--}}
        <div class="form-group box" id="box">
            <label for="exampleInputEmail1">添加栏目</label>
            <form action="{{route('class/store')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入栏目名称">
                <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="请输入栏目slug">
                <input type="button" name="" value="关闭" onclick="document.getElementById('box').style.display='none'"
                       class="btn btn-info">
                <input type="hidden" name="parent_id" value=0 class="parents" />
                <input type="submit" name="" value="确认添加" class="btn  btn-success">
            </form>
        </div>
        {{--修改栏目--}}
        <div class="form-group box" id="box2">
            <label for="exampleInputEmail1">修改栏目</label>
            <form action="{{route('class/update')}}" method="post">
                {{csrf_field()}}
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="请输入栏目名称">
                <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="请输入栏目slug">
                <input type="button" name="" value="关闭" onclick="document.getElementById('box2').style.display='none'"
                       class="btn btn-info">
                {{--<label class="parents" for="exampleInputEmail1"></label>--}}
                <input type="hidden" name="parent_id" value=0 class="parents" />
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
                        <th>名称</th>
                        <th>排序</th>
                        <th width="200px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $item=>$class)
                        <tr>
                            <td class=""><input type="checkbox" name=""></td>
                            <td><a href="#">{{$classes[$item]['title']}}</a></td>
                            <td><span>{{$classes[$item]['sort']}}</span></td>
                            <td>
                                <input type="hidden" class="id" value="{{$classes[$item]['id']}}"/>
                                <a href="javascript:;" class="add"
                                   onclick="document.getElementById('box').style.display='block'">添加子栏目</a>
                                <a href="javascript:;"
                                   onclick="document.getElementById('box2').style.display='block'">修改</a>
                                <a href="{{url('class/delete/'.$classes[$item]["id"])}}">删除</a>
                            </td>
                        </tr>
                        @if(isset($class['child']))
                            @foreach($class['child'] as $child)
                                <tr>
                                    <input type="hidden" class="id" value="{{$child['id']}}"/>
                                    <td class=""><input type="checkbox" name=""></td>
                                    <td><a href="#">&nbsp;&nbsp;&nbsp;>>&nbsp;{{ $child['title'] }}</a></td>
                                    <td><span>{{$child['sort']}}</span></td>
                                    <td>
                                        <a href="javascript:;" class="add"
                                           onclick="document.getElementById('box').style.display='block'">添加子栏目</a>
                                        <a href="javascript:;"
                                           onclick="document.getElementById('box2').style.display='block'">修改</a>
                                        <a href="{{url('class/delete/'.$child['id'])}}">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

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
    var add_index = 0;
    $('table tbody tr').click(function(){
        add_index = $(this).index();
        var id = $('.id').eq(add_index).attr("value");
        $('.parents').val(id);
    })
</script>
</body>
</html>