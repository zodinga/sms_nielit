<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>Signin Template for Bootstrap</title>
    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dist/css/signin.css" rel="stylesheet">
    <script src="/dist/js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
  <center><h3>NIELIT Aizawl <br> Student Database Management System</h3></center>
  <hr>
    <div class="container">
      <form class="form-signin" method="POST" action="/login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <div class="form-group">
          <label class="sr-only" for="username">Username</label>
          <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="UserName"  autofocus >
          </div>
        </div>
        <div class="form-group">
          <label class="sr-only" for="password">Password</label>
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span></div>
              <input type="password" name="password"  class="form-control" placeholder="Password" >
            </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <button class="btn  btn-primary" type="submit">Sign in</button>
            <button class="btn  btn-warning" type="button" onclick="location.href='/home'">Back to Home</button>
          </div>
        </div>
      </form>

    </div> <!-- /container -->
    <hr>
    <p  align="center" >&copy; Copyright - NIELIT Aiawl 2015. Industrial Estate, Zuangtui. Aizawl</p>
    
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>