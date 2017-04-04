<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加文章</title>
      <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/rightmain.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/editor/css/font-awesome.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/editor/css/font-awesome.min.css')}}">
</head>

<body>
 <div class="iframecontent">
        <div class="pos">
         <i class="icoh"></i>
          <span>添加文章</span><span class="line">|</span><span>添加文章&nbsp;></span>
        </div>

        <div class="container intro">
          <form action="" method="get" accept-charset="utf-8">
            <div class="row">
              <div class="col-sm-12 text">
                <div class="form-group">
                  <label for="exampleInputEmail1">排序</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入本文章的序号">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">文章标题</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入文章标题">
                </div>
                <div class="form-group column">
                  <label for="exampleInputEmail1">此文章为</label>
                  <select class="form-control">
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                  </select>
                  <label for="exampleInputEmail1">栏目下的</label>
                  <select class="form-control">
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                    <option>黄山风景</option>
                  </select>
                </div>
              </div>
            </div>
            <section id="editor">
              <div id='edit' style="margin-top: 30px;">
                  <img class="fr-fir" src="{{asset('admin/editor/img/old_clock.jpg')}}" alt="Old Clock" width="300"/>

                  <h1>Click and edit</h1>

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis diam in odio iaculis blandit. Nunc eu mauris sit amet purus viverra gravida ut a dui. Vivamus nec rutrum augue, pharetra faucibus purus. Maecenas non orci sagittis, vehicula lorem et, dignissim nunc. Suspendisse suscipit, diam non varius facilisis, enim libero tincidunt magna, sit amet iaculis eros libero sit amet eros. Vestibulum a rhoncus felis. Nam lacus nulla, consequat ac lacus sit amet, accumsan pellentesque risus. Aenean viverra mi at urna mattis fermentum. Curabitur porta metus in tortor elementum, in semper nulla ullamcorper. Vestibulum mattis tempor tortor quis gravida. In rhoncus risus nibh. Nullam condimentum dapibus massa vel fringilla. Sed hendrerit sed est quis facilisis. Ut sit amet nibh sem. Pellentesque imperdiet mollis libero.</p>

                  <p><a href="http://google.com" title="Aenean sed hendrerit">Aenean sed hendrerit</a> velit. Nullam eu mi dolor. Maecenas et erat risus. Nulla ac auctor diam, non aliquet ante. Fusce ullamcorper, ipsum id tempor lacinia, sem tellus malesuada libero, quis ornare sem massa in orci. Sed dictum dictum tristique. Proin eros turpis, ultricies eu sapien eget, ornare rutrum ipsum. Pellentesque eros nisl, ornare nec ipsum sed, aliquet sollicitudin erat. Nulla tincidunt porta vehicula.</p>

                  <p>Nullam laoreet imperdiet orci ac euismod. Curabitur vel lectus nisi. Phasellus accumsan aliquet augue, eu rutrum tellus iaculis in. Nunc viverra ultrices mollis. Curabitur malesuada nunc massa, ut imperdiet arcu lobortis sed. Cras ac arcu mauris. Maecenas id lectus nisl. Donec consectetur scelerisque quam at ultricies. Nam quis magna iaculis, condimentum metus ut, elementum metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus id tempus nisi.</p>
              </div>
          </section>
          <div class="form-group">
              <input type="button" class="btn btn-info submit" id="exampleInputEmail1" value="提交" >
          </div>
        </form>
      </div>
    </div>
  

  <script src="{{asset('admin/editor/js/froala_editor.min.js')}}"></script>
  <!--[if lt IE 9]>
    <script src="{{asset('admin/editor/js/froala_editor_ie8.min.js')}}"></script>
  <![endif]-->
 <script src="{{asset('admin/editor/js/plugins/tables.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/lists.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/colors.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/media_manager.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/font_family.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/font_size.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/block_styles.min.js')}}"></script>
 <script src="{{asset('admin/editor/js/plugins/video.min.js')}}"></script>

  <script>
      $(function(){
          $('#edit').editable({inlineMode: false, alwaysBlank: true})
      });
  </script>
</body>
</html>
