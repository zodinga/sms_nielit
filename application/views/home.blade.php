<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>NIELIT, Aizawl : Student Database Management System</title>
    	<!-- BOOTSTRAPS -->
      <link type="text/css" href="/templates/libero/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    	<link type="text/css" href="/templates/libero/bootstrap/css/bootstrap.css" rel="stylesheet">
    	<!-- THEMES -->
    	<link type="text/css" href="/templates/libero/css/theme.css" rel="stylesheet">
    	<!--ICONS-->
    	<link type="text/css" href="/templates/libero/icons/font-awesome/css/font-awesome.css" rel="stylesheet">
    	<!--FONTS-->
    	<link type='text/css'href='/templates/libero/fonts/google-fonts.css' rel='stylesheet'>
    	<link type="text/css" href='/templates/libero/fonts/font-face.css' rel='stylesheet'>
    	<!--JAVASCRIPTS-->
    </head>
<body>
	<div class="frame">
		<div class="sidebar">
			<div class="wrapper">
				<a href="/home" class="profile">
					<img src="../../img/user.jpg" class="avatar pull-left" width="30" style="margin-right: 15px; border-radius: 4px">
					Welcome Guest
				</a>
				<ul class="nav nav-list">
					<form class="navbar-form navbar-right" method="POST" action="/students/search">
                        <input type="text" class="input-small" required name="searchtxt" placeholder="Student Search...">
                        <select class="input-small" name="course">
                            <option selected="selected" value="all">Courses</option>
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
                    </form>
					<li class="nav-header">Extra</li>
					<li><a href="/signin"  data-toggle="modal"><i class="icon-signin"></i>Sign In</a></li>
					<li><a href="#signupModal" data-toggle="modal"><i class="icon-key"></i>Signup</a></li>
					<li class="nav-header">Menu</li>
					<li><a href="/students"><i class="icon-file"></i>Display/Search Students</a></li>
					<li><a href="/courses"><i class="icon-file"></i>Existing Courses</a></li>
					<li><a href="/images"><i class="icon-user-md"></i>Image Upload</a></li>
					<li><a href="/home/about"><i class="icon-group"></i>About Developer Team</a></li>
					<li><a href="/test"><i class="icon-calendar"></i>Test</a></li>
                </ul>
			</div>
		</div>
		<div class="content">
			<div class="navbar navbar-static-tops">
				<div class="navbar-inner">		
				    <a class="brand" href="/home"> <i class="icon-edit"></i> NIELIT, Aizawl : Student Database Management System</a>
				</div>
			</div><!--/.navbar -->	
			<div class="content-head">
    			<?php if($error_code == 1) {?>
    				<div class="alert alert-error">
    				    <a href="#" class="close" data-dismiss="alert"><i class="icon-remove"></i></a>
    				    <strong>Login Error!</strong> Please Re-type your usename and password.
    				</div>
    			<?php } ?>
            </div>
			<div class="content-body">
                @yield('content')
			</div>
		</div>
	</div><!--/.content-->
    <div id="signinModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">NIELIT SDMS - Sign In</h3>
       </div>
       <form class="form-horizontal" method="POST" action="/users/signin">
            <div class="modal-body">
                <div class="control-group">
                    <label class="control-label" for="basicinput">Username :</label>
                    <div class="controls">
                       <input class="input-xlarge" type="text" placeholder="Usename..." name="username" Autofocus required>
                    </div>
                    <label class="control-label" for="basicinput">Password: </label>
                    <div class="controls">
                       <input class="input-xlarge" type="password" placeholder="Password..." name="password"  required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Sign In</button>
                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
        </form>
    </div>

    <!--Signup Modal -->
    <div id="signupModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">NIELIT SDMS - Sign Up</h3>
        </div>
        <form class="form-horizontal" method="POST" action="users/save">
            <div class="modal-body">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-5">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-5">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="repassword" class="col-sm-2 control-label">Retype Password</label>
                    <div class="col-sm-5">
                        <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Reenter password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Signup</button>
                <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
       </form>
    </div>
    </body>
</html>
    <!-- WYSIHTML5 TEXT EDITOR -->
    <script src="/templates/libero/js/wysihtml5/advanced.js"></script>
    <script src="/templates/libero/js/wysihtml5/wysihtml5-0.3.0.min.js"></script>
    <!-- AUTOSIZE TEXTAREA -->
    <script src='/templates/libero/js/autosize/jquery.autosize-min.js'></script>
    <!-- BOOTSTRAP DATEPICKER -->
    <script src="/templates/libero/js/bootstrap-datepicker.js"></script>
   
    <!-- FULLCALENDAR -->
    <script src="/templates/libero/js/fullcalendar/fullcalendar.custom.js"></script>
    <!-- MIXITUP -->
    <script src="/templates/libero/js/mixitup/jquery.mixitup.min.js"></script>
    <!-- THEME -->
    <script src="/templates/libero/js/theme.js"></script>
    <!-- SCRIPTS: FLOT GRAPH BASIC -->

    <script src="/templates/libero/js/jquery-1.9.1.min.js"></script>
    <script src="/templates/libero/js/jquery-ui-1.10.1.custom.min.js"></script>
    <script src="/templates/libero/bootstrap/js/bootstrap.min.js"></script>



