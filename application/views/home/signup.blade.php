@layout('home')

@section('content')
<section class="module">
        <div class="module-head">
          <b>User Signup</b>
        </div><!--/.module-head-->
        <div class="module-body">
   
        <form class="form-horizontal" action="save" method="POST">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-5">
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" Autofocus required>
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

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-success">Save</button>
              <button type="reset" class="btn btn-primary">Reset</button>
            </div>
          </div>
        </form>

</div>


@endsection