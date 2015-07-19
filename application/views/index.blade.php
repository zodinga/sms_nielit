<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sales Management System</title>
	<meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script src="/bootstrap/js/jquery.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	
</head>
<body>

<div class="container-fluid">
    <!-- Body Section -->
    <div class="row-fluid">
        <div class="span3"></div>
        <div class="span6">
            <div class="well well-small">
                @yield('content')
            </div>
        </div>
        <div class="span3"></div>
    </div>
    <!-- End Body Section -->
    <!-- Footer Section -->
    <div class="row-fluid">
        <div class="span12" align="center">Copyright to NIELIT Aizawl   : Industrail Estate, Zuangtui  2015</div>
    </div>
    <!-- End of Footer-->
</div>
</body>
</html>
