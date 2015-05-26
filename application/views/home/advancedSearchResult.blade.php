@layout('home')
@section('content')
        
@endsection
@section('content1')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Advanced Search</h3>
	<h4>Unique Record Search<span class="glyphicon glyphicon-menu-hamburger"></span></h4>
	<form class="form-inline">
	  <div class="form-group">
	    <input type="text" class="form-control" id="txtname" placeholder="Student name..." name="txtname" autocomplete="off">
	  </div>
	  <div class="form-group">
	    <input type="text" class="form-control" id="txtaadhaar" placeholder="Aadhaar no" name="txtaadhaar" autocomplete="off">
	  </div>
	  <div class="form-group">
	    <input type="text" class="form-control" id="txtcontact" placeholder="Contact no" name="txtcontact" autocomplete="off">
	  </div>
	  <div class="form-group">
	    <input type="text" class="form-control" id="txtinstno" placeholder="Institution no" name="txtinstno" autocomplete="off">
	  </div>
	  <div class="form-group">
	    <input type="text" class="form-control" id="txtemail" placeholder="email address" name="txtemailno" autocomplete="off">
	  </div>
	  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
	</form>
	<h4>Mutiple Record Search<span class="glyphicon glyphicon-menu-hamburger"></span></h4>
	<form class="form-inline">
		<div class="form-group">
	    	<input type="text" class="form-control" id="txtname" placeholder="Student name..." name="txtname" autocomplete="off">
	  	</div>	
		<div class="form-group">
			<select class="form-control" required name="course">
				<option selected="selected" value="allcourse">All Course</option>>
			</select>
		</div>
		<div class="form-group">
			<select class="form-control" required name="session">
				<option selected="selected" value="allsession">All Session</option>>
			</select>
		</div>
		<div class="form-group">
			<select class="form-control" required name="status">
				<option selected="selected" value="">Status</option>>
			</select>
		</div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
	</form>
  </div>
  
@endsection
