<?php
//$setting=Settings::where('id','=',1)->first();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>NIELIT, Aizawl : Student Database Management System</title>
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/dashboard.css" rel="stylesheet">
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <script src="/dist/js/jquery.mini.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/docs.min.js"></script>
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

    <link rel="stylesheet" href="/dist/css/cssCharts.css">
    <script src="/dist/js/jquery.chart.js"></script>

    <style>
          /* page specific styles*/
      h1{text-align:center;font-family:sans-serif;font-size:28px;color:#333;padding:40px 0 0 0;}
      h2{text-align:center;font-family:sans-serif;font-size:18px;color:#333;padding:40px 0 0 0;}
      hr{width:60%;height:1px;background:none;border:none;border-bottom:1px dashed rgba(0,0,0,0.1);outline:none;margin:40px auto 60px auto;}
          .desc p{text-align:center;font-size:16px;color:rgba(0,0,0,0.6);padding:20px 0 0 0;font-family:sans-serif;}
          .desc a{color:blue;}
          .wrap{margin:0 auto;width:640px;padding-bottom:100px;}
          #line{width:400px;}
          /* page specific styles*/
    </style>
  </head>
  <body>
  <?php
  $course = courses::all();
  ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin">NIELIT, Aizawl: SDMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;&nbsp;Home</a></li>
            <li><a href="/setting"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>&nbsp;&nbsp;Setting</a></li>
            <li><a href="/logout"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo Auth::user()->username;?> | Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right" method="POST" action="/adminsearch">
            <input type="text" required class="form-control" name="searchtxt" placeholder="Student Search...">
            <!--
            <select class="form-control">
                <option selected="selected" value="">All Academic Session</option>
                <option value="">2015-2016</option>
                <option value="">2001-2002</option>>
                <option value="">2002-2003</option>>
                <option value="">2003-2004</option>>
                <option value="">2004-2005</option>>
                <option value="">2005-2006</option>>
                <option value="">2006-2007</option>>
                <option value="">2007-2008</option>>
                <option value="">2008-2009</option>>
                <option value="">2009-2010</option>>
                <option value="">2010-2011</option>>
                <option value="">2011-2012</option>>
                <option value="">2012-2013</option>>
                <option value="">2013-2014</option>>
                <option value="">2014-2015</option>>
            </select>
            -->
            <select class="form-control" name="course">
                <option selected="selected" value="all">All Course</option>
                <?php
                foreach ($course as $c) {
                ?>
                  <option value="<?php echo $c->id;?>"><?php echo $c->course;?></option>
                <?php
                }
                ?>
            </select>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
          </form>
        </div>
      </div>
      @yield('content')
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Course</a></li>
            <li><a href="#">Type</a></li>
            <li><a href="#">Student</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
      @yield('content1')
      </div>
    </div>
    <script>
      $(function() {
        $('.bar-chart').cssCharts({type:"bar"});
        $('.donut-chart').cssCharts({type:"donut"}).trigger('show-donut-chart');
        $('.line-chart').cssCharts({type:"line"});
        $('.pie-thychart').cssCharts({type:"pie"});
        });
    </script>
  </body>
</html>
