
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
				<a href="/admin/index" class="profile">
					<img src="../../img/user.jpg" class="avatar pull-left" width="30" style="margin-right: 15px; border-radius: 4px">
					Welcome : <?php echo Auth::user()->username; ?>
				</a>
				<ul class="nav nav-list">

				<form class="navbar-form navbar-right" method="POST" action="/students/adminsearch">
		            <input type="text" class="input-small" required name="searchtxt" placeholder="Student Search...">
		              <select class="input-small" name="course">
		                  <option selected="selected" value="all">All Course</option>
		                  <?php
		                  $course=Courses::all();
		                  foreach ($course as $c) {
		                  ?>
		                    <option value="<?php echo $c->id;?>"><?php echo $c->course;?></option>
		                  <?php
		                  }
		                  ?>
		              </select>
		            <button class="btn btn-mini btn-primary" type="submit"><i class="icon-search"></i></button>
<!-- 		          <button class="btn btn-warning" type="button"><i class="icon-eye-open"></i></button>
 -->		         </form>

					<li class="nav-header">Extra</li>
					<li>
						<a href="/users/logout"><i class="icon-signout"></i>Logout</a>
					</li>
					<li>Student</li>
					<li>
						<a href="/students"><i class="icon-file"></i>List All Students</a>
					</li>
					<li>
						<a href="/students/current"><i class="icon-file"></i>Current Students</a>
					</li>
					<li>
						<a href="/students/add"><i class="icon-file"></i>Add New Student</a>
					</li>

					<li>
						<a href="/status_update"><i class="icon-file"></i>Status Update</a>
					</li>
					
					<li>
						<a href="/students/advancedsearch"><i class="icon-user-md"></i>Advanced Search</a>
					</li>

					<li>Course</li>
					<li>
						<a href="/courses/index"><i class="icon-file"></i>Courses</a>
					</li>
					
					<!-- <li>
						<a href="/courses/add"><i class="icon-file"></i>New Course</a>
					</li> -->

					<!-- <li>Type</li>
					<li>
						<a href="/types/index"><i class="icon-file"></i>Types</a>
					</li>
					<li>
						<a href="/types/add"><i class="icon-file"></i>New Type</a>
					</li> -->

					<!-- <li>Category</li>
					<li>
						<a href="#"><i class="icon-file"></i>Catogories</a>
					</li>
					<li>
						<a href="#"><i class="icon-file"></i>New Category</a>
					</li> -->
					<li class="nav-header">Settings</li>
					<li>
						<a href="/settings/index"><i class="icon-wrench"></i>Settings</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="navbar navbar-static-tops">
				<div class="navbar-inner">		
					<a href="javascript:void(0);" class="btn pull-left toggle-sidebar hidden-desktop"><i class="icon-reorder"></i></a>
					<a class="brand" href="/admin/index"> <i class="icon-edit"></i> NIELIT, Aizawl : Student Database Management System</a>
				</div>
			</div><!--/.navbar -->	
			
			<div class="content-body">
				<div class="row-fluid">
					<?php if($error_code == 2){?>
					<div class="alert alert-success">
					  <a href="#" class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
					  <strong>Signin Success!</strong> You successfully signin in the system as Administrator.
					</div>
					<?php } ?>
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

<!--js link for export-->
<script src="/templates/libero/js/bootstrap.mini.js"></script>
<script src="/templates/libero/js/jquery.min.js"></script>
<script src="/templates/libero/js/export/tableExport.js"></script>
<script src="/templates/libero/js/export/jquery.base64.js"></script>
<script src="/templates/libero/js/export/html2canvas.js"></script>
<script src="/templates/libero/js/export/jspdf/libs/base64.js"></script>
<script src="/templates/libero/js/export/jspdf/libs/sprintf.js"></script>
<script src="/templates/libero/js/export/jspdf/jspdf.js"></script>
<!-- End export-->
<script type="text/javascript">
	$(document).ready(function(){
			$('#exportFile').hide();
	});

	$("#button_excel").click(function(){
		$("#exportFile").show();
		$('#exportFile').tableExport({
			type:'excel',escape:'false'
		});
		$('#exportFile').hide();
	});
</script>
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