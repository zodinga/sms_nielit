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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      @yield('content')
    </nav>
    <div class="container-fluid">
      @yield('content1')
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
