
<!DOCTYPE html>
<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>NIELIT, Aizawl : Student Database Management System</title>
	<!-- BOOTSTRAPS -->
	<link type="text/css" href="/templates/libero/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- THEMES -->
	<link type="text/css" href="/templates/libero/css/theme.css" rel="stylesheet">
	<!--ICONS-->
	<link type="text/css" href="/templates/libero/icons/font-awesome/css/font-awesome.css" rel="stylesheet">
	<!--FONTS-->
	<link type='text/css'href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic,500italic,500,300italic,300' rel='stylesheet'>
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Fugaz+One|Leckerli+One' rel='stylesheet'>
	<!--JAVASCRIPTS-->
	<script src="/templates/libero/js/jquery-1.9.1.min.js"></script>
	<script src="/templates/libero/js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="/templates/libero/bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	

	</style>
</head>
<body>
	<div class="frame">
		<div class="sidebar">
			<div class="wrapper">
				<a href="page-profile.html" class="profile">
					<img src="../img/user.jpg" class="avatar pull-left" width="30" style="margin-right: 15px; border-radius: 4px">
					Welcome
				</a>
				<ul class="nav nav-list">
					<li class="nav-header">Menu</li>
					<li>
						<a href="#"><i class="icon-file"></i>Existing Courses</a>
					</li>
					<li>
						<a href="#"><i class="icon-list-alt"></i>Search Student</a>
					</li>
					<li>
						<a href="#"><i class="icon-user-md"></i>Advanced Search</a>
					</li>
					<li>
						<a href="#"><i class="icon-group"></i>About Developer Team</a>
					</li>
					<li>
						<a href="#"><i class="icon-calendar"></i>Calendar</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="navbar navbar-static-tops">
				<div class="navbar-inner">		
					<a href="javascript:void(0);" class="btn pull-left toggle-sidebar hidden-desktop"><i class="icon-reorder"></i></a>
					<a class="brand" href="index.html"> <i class="icon-edit"></i> NIELIT, Aizawl : Student Database Management System</a>
				</div>
			</div><!--/.navbar -->	
			
			<div class="content-body">
				<div class="row-fluid">
					 @yield('content')
				</div>
			</div>
		</div><!--/.content-->
	</div><!-- /.frame -->


<!-- WYSIHTML5 TEXT EDITOR -->
<script src="/templates/libero/js/wysihtml5/advanced.js"></script>
<script src="/templates/libero/js/wysihtml5/wysihtml5-0.3.0.min.js"></script>
<!-- AUTOSIZE TEXTAREA -->
<script src='/templates/libero/js/autosize/jquery.autosize-min.js'></script>
<!-- BOOTSTRAP DATEPICKER -->
<script src="/templates/libero/js/bootstrap-datepicker.js"></script>
<!-- FLOT CHART -->
<script src="/templates/libero/js/flot/jquery.flot.js"></script>
<script src="/templates/libero/js/flot/jquery.flot.pie.js"></script>
<script src="/templates/libero/js/flot/jquery.flot.resize.js"></script>
<!-- FULLCALENDAR -->
<script src="/templates/libero/js/fullcalendar/fullcalendar.custom.js"></script>
<!-- MIXITUP -->
<script src="/templates/libero/js/mixitup/jquery.mixitup.min.js"></script>
<!-- THEME -->
<script src="/templates/libero/js/theme.js"></script>
<!-- SCRIPTS: FLOT GRAPH BASIC -->
<script type="text/javascript">
$(function () {
	var d1 = [ [0, 1], [1, 14], [2, 5], [3, 4], [4, 5], [5, 1], [6, 14], [7, 5],  [8, 5] ];
	var d2 = [ [0, 5], [1, 2], [2, 10], [3, 1], [4, 9],  [5, 5], [6, 2], [7, 10], [8, 8] ];

	var plot = $.plot($("#placeholder"), 
	[ { data: d1, label: "Data A" }, { data: d2, label: "Data B" } ], {
		lines: { 
			show: true, 
			fill: false, 
			lineWidth: 1,
			lineColor: "#fc0" 
		},
		points: { 
			show: true, 
			lineWidth: 4 
		},
		grid: {
			clickable: true,
			hoverable: true,
			autoHighlight: true,
			mouseActiveRadius: 10,
			aboveData: true,
			backgroundColor: "#fafafa",
			borderWidth: 0,
			borderColor: "#fc0",
			minBorderMargin: 25,
		},
		colors: [ "#090", "#099",  "#609", "#900"],
		shadowSize: 0
	});

	function showTooltip(x, y, contents) {
		$('<div id="gridtip">' + contents + '</div>').css( {
			position: 'absolute',
			display: 'none',
			top: y + 5,
			left: x + 5
		}).appendTo("body").fadeIn(300);
	}

	var previousPoint = null;
	$("#placeholder").bind("plothover", function (event, pos, item) {
		$("#x").text(pos.x.toFixed(2));
		$("#y").text(pos.y.toFixed(2));

		if (item) {
			if (previousPoint != item.dataIndex) {
				previousPoint = item.dataIndex;
				
				$("#gridtip").remove();
				var x = item.datapoint[0].toFixed(0),
					y = item.datapoint[1].toFixed(0);
				
				showTooltip(item.pageX, item.pageY,
							"x : " + x + "&nbsp;&nbsp;&nbsp; y : " + y);
			}
		}
		else {
			$("#gridtip").remove();
			previousPoint = null;            
		}
	});
});
</script>

<!-- SCRIPTS: FLOT GRAPH ADVANCE -->
<script type="text/javascript">
$(function () {
	var d1 = [ [0, 1], [1, 14], [2, 5], [3, 4], [4, 5], [5, 1], [6, 14], [7, 5],  [8, 5] ];
	var d2 = [ [0, 5], [1, 2], [2, 10], [3, 1], [4, 9],  [5, 5], [6, 2], [7, 10], [8, 8] ];

	var plot = $.plot($("#placeholder2"),
		   [ { data: d1, label: "Data Y"}, { data: d2, label: "Data X" } ], {
				lines: { 
					show: true, 
					fill: true, /*SWITCHED*/
					lineWidth: 2 
				},
				points: { 
					show: true, 
					lineWidth: 3
				},
				grid: {
					clickable: true,
					hoverable: true,
					autoHighlight: true,
					mouseActiveRadius: 10,
					aboveData: true,
					backgroundColor: "#fafafa",
					borderWidth: 0,
					minBorderMargin: 25,
				},
				colors: [ "#090", "#099",  "#609", "#900"],
				shadowSize: 0
			 });

	function showTooltip(x, y, contents) {
		$('<div id="gridtip">' + contents + '</div>').css( {
			position: 'absolute',
			display: 'none',
			top: y + 5,
			left: x + 5
		}).appendTo("body").fadeIn(300);
	}

	var previousPoint = null;
	$("#placeholder2").bind("plothover", function (event, pos, item) {
		$("#x").text(pos.x.toFixed(2));
		$("#y").text(pos.y.toFixed(2));

		if (item) {
			if (previousPoint != item.dataIndex) {
				previousPoint = item.dataIndex;
				
				$("#gridtip").remove();
				var x = item.datapoint[0].toFixed(0),
					y = item.datapoint[1].toFixed(0);
				
				showTooltip(item.pageX, item.pageY,
							"x : " + x + "&nbsp;&nbsp;&nbsp; y : " + y);
			}
		}
		else {
			$("#gridtip").remove();
			previousPoint = null;            
		}
	});
});
</script>

<!-- SCRIPTS: CHARTS -->
<script>
	// PREDEFINED DATA
	var data = [
					{ label: "Series1",  data: [[1,10]]},
					{ label: "Series2",  data: [[1,30]]},
					{ label: "Series3",  data: [[1,90]]}
				];

	// // DEFAULT
	// $.plot($("#pie-default"), data, 
	// {
	// 	series: {
	// 		pie: {
	// 			show: true
	// 		}
	// 	}
	// });

	// DEFINE ACTIONS FOR pieHover & pieClick
	function pieHover(event, pos, obj) 
	{
		if (!obj)
					return;
		percent = parseFloat(obj.series.percent).toFixed(2);
		$("#hover").html('<span>'+obj.series.label+' - '+percent+'%</span>');
	}

	function pieClick(event, pos, obj) 
	{
		if (!obj)
					return;
		percent = parseFloat(obj.series.percent).toFixed(2);
		alert(''+obj.series.label+': '+percent+'%');
	}

	// DONUT
	$.plot($("#pie-donut"), data, 
	{
		series: {
			pie: { 
				innerRadius: 10,
				show: true
			}
		}
	});

	// DONUT + INTERACTIVE
	$.plot($("#pie-interactive"), data,
	{
			series: {
				pie: {
					innerRadius: 10,
					show: true
				}
			},
			grid: {
				hoverable: true,
				clickable: true
			}
	});

	$("#pie-interactive").bind("plothover", pieHover);
	$("#pie-interactive").bind("plotclick", pieClick);
</script>
</body>