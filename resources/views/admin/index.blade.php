<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="/admin/css/index.css">
	<title>后台管理系统</title>
</head>
<body>

	<div class="head">
		<div class="headlogo pull-left">
			<h1><a href="javascript:;">菜单管理</a></h1>
		</div> 
		<ul class="headnav pull-left">
			<li class="menu_0 current_menu">
				<a href="javascript:;">菜单管理</a>
			</li>
		</ul>
		<ul class="headlink pull-right">
			<li class="link_0"><a href="javascript:;">您好，admin</a></li>
			<li class="link_2"><a href="javascript:;">首页</a></li>
			<li class="link_4"><a href="javascript:;">退出</a></li>
		</ul>
	</div>
	<!-- 头部页面结束 -->
	<div class="leftmenu">
		<div class="leftmenu_0">
			<dl>
				<dt>栏目管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;" _link="column.html">栏目管理</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>内容管理</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;" _link="article.html">文章管理</a></li>
						<li><a href="javascript:;" _link="link.html">友情链接</a></li>
					</ul>
				</dd>
			</dl>
			<dl>
				<dt>系统设置</dt>
				<dd>
					<ul class="clearfix">
						<li><a href="javascript:;" _link="webset.html">网站设置</a></li>
					</ul>
				</dd>
			</dl>
		</div>
			<dl>
				<dt>我的账户</dt>
				<dd>
					<ul>
						<li><a href="javascript:;" _link="mine.html">修改我的信息</a></li>
					</ul>
				</dd>
			</dl>
			
		</div>
	</div>
	<!-- 左边导航结束 -->
	<div class="rightmain" id="rightmain">
		<div class="rightcontent">
			<iframe src="main.html" id="main" name="main" frameborder="0" scrolling="yes"></iframe>
		</div>
	</div>

	 <script src="/admin/js/jquery-3.1.1.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="./bootstrap/js/bootstrap.min.js"></script>
	  <script src="./public/js/banner.js"></script>
	  <script type="text/javascript">
		$(".headnav li").click(function(){
			var index = $(this).index();
			//alert(index);
			$(this).addClass("current_menu").siblings().removeClass('current_menu');
			//头部导航和左边导航对应
			$(".leftmenu").find(".leftmenu_0").eq(index).removeClass("hidden").siblings().addClass('hidden');

		});
		$(".leftmenu dl dt").click(function(){
			 if(false == $(this).siblings("dd").is(":visible")){//如果不可见点击后变蓝色
			 	$(this).addClass('active');
			}else{
				$(this).removeClass('active');//可见点击后变红色
			}
			$(this).siblings('dd').slideToggle('fast').siblings('dt');//.end()

		});
		//点击隐藏菜单
		var i=1;
		
		//替换文字并显示隐藏左侧导航
		function replace(){
			var i=j=1;
			var x=$(".link_1");
			var y=$(".ton");
			y.click(function(){
				i++;
				if(i%2==0){
					//alert(i)
					y.text("显示菜单");
					$('#rightmain').addClass('rightmain1').removeClass('rightmain');
				}else{
					y.text("隐藏菜单");
					$('#rightmain').addClass('rightmain').removeClass('rightmain1');
				}
				
			})
			x.click(function(){
			j++;
			//alert(j);
			j%2==0 ? $(".leftmenu").css('display','none') : $(".leftmenu").css('display','block');
		})
	}
		replace();

		//左侧导航切换出右侧页面ifream
		$(".leftmenu dl dd ul li a").click(function(){
			var _link = $(this).attr('_link');
			//alert(_link)
		$("#main").attr('src',_link);
		$(this).addClass('current-menuleft').parent().siblings().children().removeClass('current-menuleft');
		$(this).parents('dl').siblings().find('dd ul li a').removeClass('current-menuleft');

		});

	</script>
</body>
</html>