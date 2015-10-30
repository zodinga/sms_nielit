@layout('admin')
@section('content')
        

  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Status Update</h3>
		<form class="form-horizontal" action="/status_update/update" method="POST" enctype="multipart/form-data">
			<div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          	</div>
        </form>
    
  </div>
  
@endsection