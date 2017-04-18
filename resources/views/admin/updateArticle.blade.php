<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>修改文章</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">

</head>

<body>
<div class="iframecontent">
    <div class="pos">
        <i class="icoh"></i>
        <span>修改文章</span><span class="line">|</span><span>修改文章&nbsp;></span>
    </div>

    <div class="container intro">
        <form action="{{route('article/update')}}" method="post" accept-charset="utf-8">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-12 text">

                    <div class="form-group">
                        <label for="exampleInputEmail1">文章标题</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                               value="{{$article->title}}" placeholder="请输入文章标题">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">排序</label>
                        <input type="text" name="sort" value={{$article->sort}} class="form-control" id="exampleInputEmail1"
                               placeholder="请输入本文章的序号">
                    </div>

                    <div class="form-group column">
                        <label for="exampleInputEmail1">选择二级栏目</label>
                        <select name="class_id"  class="form-control">
                            @foreach($classes as $class)
                                @if(isset($class['child']))
                                    @foreach($class['child'] as $child)
                                        @if ($child['title'] == $article['class']['child']['title'])
                                            <option selected="selected" value="{{$child['id']}}">{{$child['title']}}</option>
                                        @else
                                            <option value="{{$child['id']}}">{{$child['title']}}</option>
                                        @endif

                                    @endforeach
                                @endif
                            @endforeach

                        </select>
                        {{--<label for="exampleInputEmail1">栏目下的</label>
                        <select class="form-control">
                          <option>黄山风景</option>
                          <option>黄山风景</option>
                          <option>黄山风景</option>
                          <option>黄山风景</option>
                          <option>黄山风景</option>
                        </select>--}}
                    </div>
                </div>
            </div>
            <section name="content" id="editor">
                <div id='edit' style="margin-top: 30px;">

                    <input type="hidden" name="article_id" value="{{$article->id}}">
                @include('vendor.ueditor.assets')
                <!-- 编辑器容器 -->
                    {{--todo 这里的文章标签有问题--}}
                    <script id="container" name="content" type="text/plain">{{$content[0]['content']}}</script>

                </div>
            </section>
            <div class="form-group">
                <input type="submit" class="btn btn-info submit" id="exampleInputEmail1" value="提交">
            </div>
        </form>
    </div>
</div>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function () {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
    /*ue.setContent("{1{$content[0]['content']}}");*/
</script>
</body>
</html>
