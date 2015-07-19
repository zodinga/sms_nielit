@layout('admin')
@section('content1')
<style>
li {
    display: inline-block;
    vertical-align: middle;
    list-style-position: inside;
    list-style-type: disc;
    margin-right: 1em;
    text-align: left;
    white-space: nowrap;
}
h3, p { display:inline }
</style>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">All Students</h3> 
    <button type="button" class="btn btn-primary" onclick="location.href='/students/add'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
    <?php 

    $students=DB::table('students')->paginate(8);
    echo $students->links(); 
    //echo $students->previous().' '.$students->next();
    //$students=Students::get();
    ?>
    <p>

    <table class="table table-hover">
    <thead>
	<tr class="warning">
		<td>Id</td>
		<td>Name</td>
		<td>Course</td>
		<td>Batch</td>
		<td>Phone</td>
        <td>Status</td>
		<td>Photo</td>
		<td>Action</td>
	</tr>
    </thead>
    <tbody>

    <?php
    	foreach($students->results as $s){
    		?>
    		
    			<tr>
    			<td><?php echo $s->id;?></td>
    			<td><?php echo $s->name;?></td>
    			<td><?php 
                $course=Courses::find($s->course);
                if($course)
                echo $course->course;?></td>
                <td><?php echo $s->batch;?></td>
                <td><?php echo $s->phone;?></td>
                <td>
                <?php 
                $status=Statuses::find($s->status);
                if($status)
                    if($status->status=="FIN"){
                        ?>
                        <button type="button" class="btn btn-success"><?php echo $status->status; ?></button>
                    <?php
                    } 
                    else if($status->status=="ON"){
                        ?>
                        <button type="button" class="btn btn-primary"><?php echo $status->status; ?></button>
                    <?php
                    }
                    else{
                        ?>
                        <button type="button" class="btn btn-danger"><?php echo $status->status; ?></button>
                    <?php 
                    } 
                ?>
                </td>
    			<td><?php echo $s->photo;?></td>
    			<td>

                <!-- Modal Details-->
              <div class="modal fade" id="myModal<?php echo $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Student Detail</h4>
                    </div>
                    <div class="modal-body">
                      <?php
                      $detail = students::find($s->id);
                      $course_detail = courses::find($s->course);
                      $cate = categories::find($s->category);
                      $comm=communities::find($s->community);
                      $stat=statuses::find($s->status);
                      ?>
                      <ul class="list-group">
                      <li class="list-group-item">
                          <?php
                          $photo = "/img/icon-user-default.jpg";
                          if($detail->photo != NULL)
                          {
                            $photo = $detail->photo;
                          }
                          ?>
                          Photo: <img src="<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-circle">
                        </li>
                        <li class="list-group-item">Name: <?php echo $detail->name;?></li>
                        <li class="list-group-item">Aadhaar-no: <?php echo $detail->aadhaar;?></li>
                        <li class="list-group-item">EID: <?php echo $detail->eid;?></li>
                        <li class="list-group-item">Phone: <?php echo $detail->phone;?></li>
                        <li class="list-group-item">email: <?php echo $detail->email;?></li>
                        <li class="list-group-item">Institution-no: <?php echo $detail->inst_no;?></li>
                        <li class="list-group-item">University Reg-no: <?php echo $detail->univ_reg_no;?></li>
                        <li class="list-group-item">Exam Roll No: <?php echo $detail->exam_roll_no;?></li>
                        <li class="list-group-item">Date of Joining: <?php echo $detail->doj;?></li>
                        <?php 
                        if ($course_detail) {
                          ?>
                        <li class="list-group-item">Course: <?php echo $course_detail->course;?></li>
                        <?php
                        }
                        else
                        {
                          ?>
                        <li class="list-group-item">Course: </li>
                          <?php
                        }
                        ?>
                        <li class="list-group-item">Batch: <?php echo $detail->batch;?></li>
                        <li class="list-group-item">Father's Name: <?php echo $detail->fathers_me;?></li>
                        <li class="list-group-item">Mother's Name: <?php echo $detail->mothers_me;?></li>
                        <li class="list-group-item">Parent Contact: <?php echo $detail->parents_phone;?></li>
                        <li class="list-group-item">Guardian Name: <?php echo $detail->guardian_me;?></li>
                        <li class="list-group-item">Guardian Phone: <?php echo $detail->guardian_phone;?></li>
                        <li class="list-group-item">Date of Birth: <?php echo $detail->dob;?></li>
                        <li class="list-group-item">Sex: <?php echo $detail->sex;?></li>
                        <?php 
                        if ($cate) {
                          ?>
                          <li class="list-group-item">Category: <?php echo $cate->category;?></li>
                          <?php
                        }
                        else
                        {
                          ?>
                        <li class="list-group-item">Category: </li>
                          <?php
                        }
                        ?>
                        <?php 
                        if ($comm) {
                          ?>
                        <li class="list-group-item">Community: <?php echo $comm->community;?></li>
                        <?php
                        }
                        else
                        {
                          ?>
                        <li class="list-group-item">Community: </li>
                          <?php
                        }
                        ?>
                        <li class="list-group-item">Present Street: <?php echo $detail->pre_street;?></li>
                        <li class="list-group-item">Present City: <?php echo $detail->pre_city;?></li>
                        <li class="list-group-item">Present District: <?php echo $detail->pre_dist;?></li>
                        <li class="list-group-item">Present State: <?php echo $detail->pre_state;?></li>
                        <li class="list-group-item">PIN: <?php echo $detail->pre_pin;?></li>
                        <?php 
                        if ($comm) {
                          ?>
                        <li class="list-group-item">Status: <?php echo $stat->status;?></li>
                        <?php
                        }
                        else
                        {
                          ?>
                        <li class="list-group-item">Status: </li>
                          <?php
                        }
                        ?>
                        
                        
                      </ul>
                      <?php
                      ?>
                    </div
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;Close</button>
                    </div>
                  </div>
                </div>
                <!-- End Modal Details-->

                <!-- Modal Edit-->
              <div class="modal fade" id="myModalEdit<?php echo $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Edit Details</h4>
                    </div>
                    <div class="modal-body">
                      <?php
                      $detail = students::find($s->id);
                      $course_detail = courses::find($s->course);
                      $cate = categories::find($s->category);
                      $comm=communities::find($s->community);
                      $sta=statuses::find($s->status);
                      ?>
                       <form class="form-horizontal" action="/students/update" method="POST">
                                  <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="name" value="{{$detail->name}}" class="form-control" id="name" placeholder="Enter Students Name" required>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="aadhaar" class="col-sm-2 control-label">Aadhaar No</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="aadhaar" value="{{$detail->aadhaar}}" class="form-control" id="aadhaar" placeholder="Enter Aadhaar No">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="eid" class="col-sm-2 control-label">Eid</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="eid" value="{{$detail->eid}}" class="form-control" id="eid" placeholder="Enter Eid">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="phone" class="col-sm-2 control-label">Phone No</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="phone" value="{{$detail->phone}}" class="form-control" id="phone" placeholder="Enter Phone No">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                      <input type="email" name="email" value="{{$detail->email}}" class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="inst_no" class="col-sm-2 control-label">Institute No</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="inst_no" value="{{$detail->inst_no}}" class="form-control" id="inst_no" placeholder="Enter Institute No">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="univ_reg_no" class="col-sm-2 control-label">Univ Reg No</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="univ_reg_no" value="{{$detail->univ_reg_no}}" class="form-control" id="univ_reg_no" placeholder="Enter University No">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="exam_roll_no" class="col-sm-2 control-label">Exam Roll No</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="exam_roll_no" value="{{$detail->exam_roll_no}}" class="form-control" id="exam_roll_no" placeholder="Enter Exam Roll No">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="doj" class="col-sm-2 control-label">YoJ</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="doj" value="{{$detail->doj}}" class="form-control" id="doj" placeholder="Enter Year of Joining">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="course" class="col-sm-2 control-label">Course</label>
                                    <div class="col-sm-5">
                                    <?php
                                      if($course_detail)
                                        $c_detail=$course_detail->course;
                                      else
                                        $c_detail="----Select-----";
                                    ?>
                                      <select class="form-control input-sm" name="course_id">
                                        <option selected="selected" value="">{{$c_detail}} </option>
                                        <?php
                                        $course = Courses::all();
                                        foreach ($course as $c) {
                                         ?> 
                                         <option value="<?php echo $c->id; ?>"><?php echo $c->course; ?></option>
                                        <?php  
                                        }
                                        ?>
                                        
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="batch" class="col-sm-2 control-label">Batch</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="batch" value="{{$detail->batch}}" class="form-control" id="batch" placeholder="Enter Batch No">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="fathers_me" class="col-sm-2 control-label">Fathers Name</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="fathers_me" value="{{$detail->fathers_me}}" class="form-control" id="fathers_me" placeholder="Enter Fathers Name">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="mothers_me" class="col-sm-2 control-label">Mothers Name</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="mothers_me" value="{{$detail->mothers_me}}" class="form-control" id="mothers_me" placeholder="Enter Mothers Name">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="parents_phone" class="col-sm-2 control-label">Parents Phone</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="parents_phone" value="{{$detail->parents_phone}}" class="form-control" id="parents_phone" placeholder="Enter Parents Phone">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="guardian_me" class="col-sm-2 control-label">Guardian Name</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="guardian_me" value="{{$detail->guardian_me}}" class="form-control" id="guardian_me" placeholder="Enter Guardian Name">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="guardian_phone" class="col-sm-2 control-label">Guardian Phone</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="guardian_phone" value="{{$detail->guardian_phone}}" class="form-control" id="guardian_phone" placeholder="Enter Guardian Phone">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="dob" class="col-sm-2 control-label">DoB</label>
                                    <div class="col-sm-5">
                                      <input type="date" name="dob" value="{{$detail->dob}}" class="form-control" id="dob" placeholder="Enter DoB">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="sex" class="col-sm-2 control-label">Sex</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="sex" value="{{$detail->sex}}" class="form-control" id="sex" placeholder="Enter Sex">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="catogory" class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-5">
                                    <?php
                                      if($cate)
                                        $c_gory=$cate->category;
                                      else
                                        $c_gory="----Select-----";
                                    ?>
                                      <select class="form-control input-sm" name="category">
                                        <option selected="selected" value="">{{$c_gory}}</option>
                                        <?php
                                        $category = Categories::all();
                                        foreach ($category as $c) {
                                         ?> 
                                         <option value="<?php echo $c->id; ?>"><?php echo $c->category; ?></option>
                                        <?php  
                                        }
                                        ?>
                                        
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="community" class="col-sm-2 control-label">Community</label>
                                    <div class="col-sm-5">
                                    <?php
                                      if($comm)
                                        $c_ty=$comm->community;
                                      else
                                        $c_ty="----Select-----";
                                    ?>
                                      <select class="form-control input-sm" name="community">
                                        <option selected="selected" value="">{{$c_ty}}</option>
                                        <?php
                                        $community = Communities::all();
                                        foreach ($community as $c) {
                                         ?> 
                                         <option value="<?php echo $c->id; ?>"><?php echo $c->community; ?></option>
                                        <?php  
                                        }
                                        ?>
                                        
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="per_street" class="col-sm-2 control-label">Permanent Street</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="per_street" value="{{$detail->per_street}}" class="form-control" id="per_street" placeholder="Enter Permanent Street">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="per_city" class="col-sm-2 control-label">Permanent City</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="per_city" value="{{$detail->per_city}}" class="form-control" id="per_city" placeholder="Enter Permanent City">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="per_district" class="col-sm-2 control-label">Permanent District</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="per_district" value="{{$detail->per_district}}" class="form-control" id="per_district" placeholder="Enter Permanent District">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="per_city" class="col-sm-2 control-label">Permanent City</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="per_city" value="{{$detail->per_city}}" class="form-control" id="per_city" placeholder="Enter Permanent City">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="per_state" class="col-sm-2 control-label">Permanent State</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="per_state" value="{{$detail->per_state}}" class="form-control" id="per_state" placeholder="Enter Permanent State">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="per_pin" class="col-sm-2 control-label">Permanent Pin</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="per_pin" value="{{$detail->per_pin}}" class="form-control" id="per_pin" placeholder="Enter Permanent Pin">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="pre_street" class="col-sm-2 control-label">Present Street</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="pre_street" value="{{$detail->pre_street}}" class="form-control" id="pre_street" placeholder="Enter Present Street">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="pre_city" class="col-sm-2 control-label">Present City</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="pre_city" value="{{$detail->pre_city}}" class="form-control" id="pre_city" placeholder="Enter Present City">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="pre_district" class="col-sm-2 control-label">Present District</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="pre_district" value="{{$detail->pre_district}}" class="form-control" id="pre_district" placeholder="Enter Present District">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="pre_city" class="col-sm-2 control-label">Present City</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="pre_city" value="{{$detail->pre_city}}" class="form-control" id="pre_city" placeholder="Enter Present City">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="pre_state" class="col-sm-2 control-label">Present State</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="pre_state" value="{{$detail->pre_state}}" class="form-control" id="pre_state" placeholder="Enter Present State">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="pre_pin" class="col-sm-2 control-label">Present Pin</label>
                                    <div class="col-sm-5">
                                      <input type="text" name="pre_pin" value="{{$detail->pre_pin}}" class="form-control" id="pre_pin" placeholder="Enter Present Pin">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="status" class="col-sm-2 control-label">Status</label>
                                    <div class="col-sm-5">
                                    <?php
                                      if($sta)
                                        $c_tus=$sta->status;
                                      else
                                        $c_tus="----Select-----";
                                    ?>
                                      <select class="form-control input-sm" name="status">
                                        <option selected="selected" value="">{{$c_tus}}</option>
                                        <?php
                                        $status = Statuses::all();
                                        foreach ($status as $s) {
                                         ?> 
                                         <option value="<?php echo $s->id; ?>"><?php echo $s->status; ?></option>
                                        <?php  
                                        }
                                        ?>
                                        
                                      </select>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="photo" class="col-sm-2 control-label">Photo</label>
                                    <div class="col-sm-5">
                                        <?php
                                            $photo = "/img/icon-user-default.jpg";
                                            if($detail->photo != NULL)
                                            {
                                              $photo = $detail->photo;
                                            }
                                          ?>
                                      Photo: <img src="<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-rounded">
                                      <input type="text" name="photo" value="{{$detail->photo}}" class="form-control" id="photo" placeholder="Photo">
                                    </div>
                                  </div>

                                  <input type="hidden" value=<?php echo $detail->id; ?> name="id"></input>

                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-5">
                                      <button type="submit" class="btn btn-success">Save</button>
                                      <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                  </div>
                          </form>

                      <?php
                      ?>
                    </div
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;Close</button>
                    </div>
                  </div>
                </div>
                <!-- End Modal Edit-->
                   <!--  <button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-list" aria-hidden="true"></span></button>
    				<button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
    				<button type="" onclick="location.href='#'" ><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
    			</td> -->
                <a href="#myModal<?php echo $s->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Details
              </a>
              <a href="#myModalEdit<?php echo $s->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Edit
              </a>
              <a href="#myModalEdit<?php echo $s->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                Delete
              </a>
    			</td>    		
    		<?php

    	}
echo "dddd", $s->id;
    ?>
    </tbody>
    </table>

    </p>
 </div>

 

  
@endsection