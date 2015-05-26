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
   <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/home">NIELIT Aizawl : Student Database Management System</a>
        </div>
      </div>
    </nav>
    <div class="container">
      <form class="form-signin" method="POST" action="/login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" class="sr-only">User Name</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="UserName"  autofocus autocomplete="off">
        <label for="inputPassword"  class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
       
        <button class="btn  btn-primary " type="submit">Sign in</button>
        <button class="btn  btn-warning " onclick="location.href'/home'">Back to Home</button>
      </form>

    </div> <!-- /container -->

    <footer class="footer">
      <div class="container">
        <p class="text-muted">&copy; Copyright - NIELIT Aiawl 2015. Industrial Estate, Zuangtui. Aizawl                             </p>
      </div>
    </footer>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>