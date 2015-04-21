<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
	<base href="<?php echo base_url();?>"/>
	<meta charset="utf-8">
	<title>人才培育白皮書績效管理系統</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="教育部,人才培育白皮書，績效管理">
	<meta name="author" content="教育部綜規司">

	<!-- The styles -->
	<link href="./content/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
      * {
        font-family: "微軟正黑體", "Microsoft JhengHei", "新細明體", "PMingLiU", sans-serif;
      }
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="./content/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="./content/css/charisma-app.css" rel="stylesheet">
	<link href="./content/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href="./content/css/fullcalendar.css" rel='stylesheet'>
	<link href="./content/css/fullcalendar.print.css" rel='stylesheet'  media='print'>
	<link href="./content/css/chosen.css" rel='stylesheet'>
	<link href="./content/css/uniform.default.css" rel='stylesheet'>
	<link href="./content/css/colorbox.css" rel='stylesheet'>
	<link href="./content/css/jquery.cleditor.css" rel='stylesheet'>
	<link href="./content/css/jquery.noty.css" rel='stylesheet'>
	<link href="./content/css/noty_theme_default.css" rel='stylesheet'>
	<link href="./content/css/elfinder.min.css" rel='stylesheet'>
	<link href="./content/css/elfinder.theme.css" rel='stylesheet'>
	<link href="./content/css/jquery.iphone.toggle.css" rel='stylesheet'>
	<link href="./content/css/opa-icons.css" rel='stylesheet'>
	<link href="./content/css/uploadify.css" rel='stylesheet'>
	<!-- jQuery -->
	<script src="./content/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="./content/js/jquery-ui-1.8.21.custom.min.js"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="./content/img/favicon.ico">
		
</head>

<body>
	<?php 
		if(!isset($no_visible_elements) || !$no_visible_elements)	{ 
			$account = $this->session->userdata('account');
			$name = $this->session->userdata('name');
	?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo base_url();?>"> 
					<img alt="Logo" src="./content/img/logo20.png" /> 
					<span>人才培育白皮書績效管理系統</span>
				</a>			
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> <?php echo $name."($account)";?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="">個人資訊</a></li>
						<li class="divider"></li>
						<li><a href="./login/logout">登出</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">資訊公告</li>
						<li><a href="./ui00"><i class="icon-home"></i><span class="hidden-tablet">  資訊總覽</span></a></li>
						<li><a href="./ui01"><i class="icon-bullhorn"></i><span class="hidden-tablet">  訊息公告</span></a></li>
						<li class="nav-header hidden-tablet">年度計劃及成效填報</li>	
						<li><a href="./ui02"><i class="icon-edit"></i><span class="hidden-tablet">  方案資訊設定</span></a></li>
						<li><a href="./ui03"><i class="icon-edit"></i><span class="hidden-tablet">  年度計劃設定</span></a></li>
						<li><a href="./ui04"><i class="icon-edit"></i><span class="hidden-tablet">  每季成效填報</span></a></li>
						<li class="nav-header hidden-tablet">審核功能</li>
						<li><a href="./ui05"><i class="icon-check"></i><span class="hidden-tablet">  綜規司審核</span></a></li>
						<li><a href="./ui06"><i class="icon-check"></i><span class="hidden-tablet">  填報情形稽催</span></a></li>
						<li class="nav-header hidden-tablet">報表功能</li>						
						<li><a href="./ui07"><i class="icon-print"></i><span class="hidden-tablet">  KPI總表</span></a></li>
						<li><a href="./ui08"><i class="icon-print"></i><span class="hidden-tablet">  量化KPI總體分析</span></a></li>
						<li><a href="./ui09"><i class="icon-print"></i><span class="hidden-tablet">  個別KPI分析</span></a></li>
						<li><a href="./ui10"><i class="icon-print"></i><span class="hidden-tablet">  方案執行情形</span></a></li>
						<li><a href="./ui11"><i class="icon-print"></i><span class="hidden-tablet">  量化KPI達標分析</span></a></li>
						<li class="nav-header hidden-tablet">權限管理</li>	
						<li><a href="./account"><i class="icon-th-list"></i><span class="hidden-tablet">  帳號清單</span></a></li>
						<li><a href="./ui12"><i class="icon-wrench"></i><span class="hidden-tablet">  功能項目設定</span></a></li>
						<li><a href="./unit"><i class="icon-wrench"></i><span class="hidden-tablet">  單位資訊設定</span></a></li>
						<li><a href="./jobtitle"><i class="icon-wrench"></i><span class="hidden-tablet">  職稱設定</span></a></li>
						<li><a href="./ui13"><i class="icon-wrench"></i><span class="hidden-tablet">  權限群組設定</span></a></li>
						<li class="nav-header hidden-tablet">系統設定</li>	
						<li><a href="./dateRange/planSetDateRangeSet"><i class="icon-wrench"></i><span class="hidden-tablet">  年度計劃開放設定</span></a></li>
						<li><a href="./dateRange/planReportDateRangeSet"><i class="icon-wrench"></i><span class="hidden-tablet">  成效填報開放設定</span></a></li>
						<li class="nav-header hidden-tablet">問題回報及Q&A</li>
						<li><a href="./ui16"><i class="icon-comment"></i><span class="hidden-tablet">  問題回報</span></a></li>
						<li><a href="./ui17"><i class="icon-tags"></i><span class="hidden-tablet">  操作問題Q&A</span></a></li>
						<li class="nav-header hidden-tablet">資料下載區</li>
						<li><a href="./ui18"><i class="icon-download-alt"></i><span class="hidden-tablet">  使用手冊</span></a></li>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>			
			<div id="content" class="span10">
			<!-- content starts -->
			<img src="./content/img/banner.jpg" class="cnr_round">
			<?php } ?>
