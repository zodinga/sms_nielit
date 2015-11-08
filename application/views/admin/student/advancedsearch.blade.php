@layout('admin')
@section('content')
<section class="module">
        <div class="module-head">
          <h4><b>Advanced Search</b></h4>
        </div><!--/.module-head-->
        <div class="module-body">
          
			<form class="form-vertical" method="POST" action="/students/filter">
				<div class="control-group">
					<label class="control-label" for="basicinput">Enter Name</label>
					<div class="controls">
						<input type="text" name="name" id="basicinput" placeholder="XX..." class="span8" tabindex="1">
						<span class="help-inline">Enter Student's Name</span>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="basicinput">Year of Joining</label>
					<div class="controls">
						<input type="text" name="year" id="basicinput" placeholder="All..." class="span8" tabindex="2">
						<span class="help-inline">Enter Joining Year</span>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="basicinput">Course</label>
					<div class="controls">
						<select tabindex="1" name="courseID" data-placeholder="Select here.." class="span8" tabindex="3">
							<option selected="selected" value="">All Courses</option>
							 <?php
							  $course=Courses::all();
							  foreach ($course as $c) {
							  ?>
							<option value="<?php echo $c->id;?>"><?php echo $c->course;?></option>
							  <?php
							  }
							  ?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="basicinput">Category</label>
					<div class="controls">
						<select tabindex="1" name="category" data-placeholder="Select here.." class="span8" tabindex="4">
							<option selected="selected" value="">All Categories</option>
							 <?php
							  $category=Categories::all();
							  foreach ($category as $c) {
							  ?>
							<option value="<?php echo $c->id;?>"><?php echo $c->category;?></option>
							  <?php
							  }
							  ?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="basicinput">Community</label>
					<div class="controls">
						<select tabindex="1" name="community" data-placeholder="Select here.." class="span8" tabindex="5">
							<option selected="selected" value="">All Communities</option>
							 <?php
							  $comm=Communities::all();
							  foreach ($comm as $c) {
							  ?>
							<option value="<?php echo $c->id;?>"><?php echo $c->community;?></option>
							  <?php
							  }
							  ?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="basicinput">Status</label>
					<div class="controls">
						<select tabindex="1" name="status" data-placeholder="Select here.." class="span8" tabindex="6">
							<option selected="selected" value="">All Statuses</option>
							 <?php
							  $status=Statuses::all();
							  foreach ($status as $s) {
							  ?>
							<option value="<?php echo $s->id;?>"><?php echo $s->status;?></option>
							  <?php
							  }
							  ?>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Sex</label>
					<div class="controls">
						<label class="radio inline">
							<input type="radio" name="sex" value="" checked="checked" tabindex="7">
							All Sex
						</label>
						<label class="radio inline">
							<input type="radio" name="sex" value="M" tabindex="8">
							Male
						</label>
						<label class="radio inline">
							<input type="radio" name="sex" value="F" tabindex="9">
							Female
						</label>
				</div>

				<input type="hidden" name="export" value="T">

				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-primary" tabindex="10">Search</button>
						<button type="reset" class="btn" tabindex="11">Reset Form</button>
					</div>
				</div>
			</form>

    </div>
</section>
@endsection