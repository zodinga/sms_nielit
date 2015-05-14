@layout('home')
@section('content')
<h3 class="hero-unit" align="center">
    Mercy Pet Care <br /> Sales Management System
    <hr />
    <img src="/img/pet-care.jpg" height="100"/></center>
</h3>
<hr />
<?php
if($loginerror==1)
	echo "<div class=\"alert alert-error\">Login Error : Username or Password Incorrect... Try again  </div>";
?>
<form class="form-horizontal" method="POST" action="/login">
    <legend>User Login</legend>
        <div class="control-group">
            <label class="control-label" for="inputusername">Username</label>
            <div class="controls">
                <input type="text" id="username" name="username" placeholder="Enter Username">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
                <input type="password" id="inputPassword" name="password" placeholder="Password">
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
</form>
@endsection