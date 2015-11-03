@layout('home')

@section('content')
<section class="module">
        <div class="module-head">
          <b>User Edit</b>
        </div><!--/.module-head-->
        <div class="module-body">
   
        <form class="form-horizontal" action="users/update" method="POST">
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-5">
          <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" value="{{$user->username}}" Autofocus >
            </div>
          </div>

          <div class="form-group">
            <label for="oldpassword" class="col-sm-2 control-label">Enter Old Password</label>
            <div class="col-sm-5">
              <input type="password" name="oldpassword" class="form-control" id="oldpassword" placeholder="Enter Old password" >
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">New Password</label>
            <div class="col-sm-5">
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter New password" >
            </div>
          </div>

          <div class="form-group">
            <label for="repassword" class="col-sm-2 control-label">Retype New Password</label>
            <div class="col-sm-5">
              <input type="password" name="repassword" class="form-control" id="repassword" placeholder="Reenter New password" >
            </div>
          </div>

          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">Type</label>
            <div class="col-sm-5">
              <input type="text" name="type" class="form-control" id="type" placeholder="Enter user type" value="{{$user->type}}">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </div>
        </form>

</div>


@endsection