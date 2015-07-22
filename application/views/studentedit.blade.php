@layout('home')
@section('content')

<?php
        $detail = students::find($s->id);
        $course_detail = courses::find($s->course);
        $cate = categories::find($s->category);
        $comm=communities::find($s->community);
        $sta=statuses::find($s->status);
      ?> 
<form class="form-horizontal" action="/students/studentupdate" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="photo" class="col-sm-2 control-label">Photo</label>
      <div class="col-sm-5">
          <?php
              $photo = "/img/user.jpg";
              if($detail->photo != NULL)
              {
                $photo = $detail->photo;
              }
            ?>
        <img src="<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-rounded">
        <input type="file" name="image" value="<?php echo $detail->photo; ?>" class="form-control" id="image" placeholder="Photo">
      </div>
    </div>

    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-5">
        <input type="text" name="name" value="<?php echo $detail->name; ?>" class="form-control" id="name" placeholder="Enter Students Name" Autofocus required>
      </div>
    </div>

    <div class="form-group">
      <label for="aadhaar" class="col-sm-2 control-label">Aadhaar No</label>
      <div class="col-sm-5">
        <input type="text" name="aadhaar" value="<?php echo $detail->aadhaar; ?>" class="form-control" id="aadhaar" placeholder="Enter Aadhaar No">
      </div>
    </div>

    <div class="form-group">
      <label for="eid" class="col-sm-2 control-label">Eid</label>
      <div class="col-sm-5">
        <input type="text" name="eid" value="<?php echo $detail->eid; ?>" class="form-control" id="eid" placeholder="Enter Eid">
      </div>
    </div>

    <div class="form-group">
      <label for="phone" class="col-sm-2 control-label">Phone No</label>
      <div class="col-sm-5">
        <input type="text" name="phone" value="<?php echo $detail->phone; ?>" class="form-control" id="phone" placeholder="Enter Phone No">
      </div>
    </div>

    <div class="form-group">
      <label for="email" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-5">
        <input type="email" name="email" value="<?php echo $detail->email; ?>" class="form-control" id="email" placeholder="Enter Email">
      </div>
    </div>

    <div class="form-group">
      <label for="inst_no" class="col-sm-2 control-label">Institute No</label>
      <div class="col-sm-5">
        <input type="text" name="inst_no" value="<?php echo $detail->inst_no; ?>" class="form-control" id="inst_no" placeholder="Enter Institute No">
      </div>
    </div>

    <div class="form-group">
      <label for="univ_reg_no" class="col-sm-2 control-label">Univ Reg No</label>
      <div class="col-sm-5">
        <input type="text" name="univ_reg_no" value="<?php echo $detail->univ_reg_no; ?>" class="form-control" id="univ_reg_no" placeholder="Enter University No">
      </div>
    </div>

    <div class="form-group">
      <label for="exam_roll_no" class="col-sm-2 control-label">Exam Roll No</label>
      <div class="col-sm-5">
        <input type="text" name="exam_roll_no" value="<?php echo $detail->exam_roll_no; ?>" class="form-control" id="exam_roll_no" placeholder="Enter Exam Roll No">
      </div>
    </div>

    <div class="form-group">
      <label for="doj" class="col-sm-2 control-label">YoJ</label>
      <div class="col-sm-5">
        <input type="text" name="doj" value="<?php echo $detail->doj; ?>" class="form-control" id="doj" placeholder="Enter Year of Joining">
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
          <option selected="selected" value=""><?php echo $c_detail; ?> </option>
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
        <input type="text" name="batch" value="<?php echo $detail->batch; ?>" class="form-control" id="batch" placeholder="Enter Batch No">
      </div>
    </div>

    <div class="form-group">
      <label for="fathers_me" class="col-sm-2 control-label">Fathers Name</label>
      <div class="col-sm-5">
        <input type="text" name="fathers_me" value="<?php echo $detail->fathers_me; ?>" class="form-control" id="fathers_me" placeholder="Enter Fathers Name">
      </div>
    </div>

    <div class="form-group">
      <label for="mothers_me" class="col-sm-2 control-label">Mothers Name</label>
      <div class="col-sm-5">
        <input type="text" name="mothers_me" value="<?php echo $detail->mothers_me; ?>" class="form-control" id="mothers_me" placeholder="Enter Mothers Name">
      </div>
    </div>

    <div class="form-group">
      <label for="parents_phone" class="col-sm-2 control-label">Parents Phone</label>
      <div class="col-sm-5">
        <input type="text" name="parents_phone" value="<?php echo $detail->parents_phone; ?>" class="form-control" id="parents_phone" placeholder="Enter Parents Phone">
      </div>
    </div>

    <div class="form-group">
      <label for="guardian_me" class="col-sm-2 control-label">Guardian Name</label>
      <div class="col-sm-5">
        <input type="text" name="guardian_me" value="<?php echo $detail->guardian_me; ?>" class="form-control" id="guardian_me" placeholder="Enter Guardian Name">
      </div>
    </div>

    <div class="form-group">
      <label for="guardian_phone" class="col-sm-2 control-label">Guardian Phone</label>
      <div class="col-sm-5">
        <input type="text" name="guardian_phone" value="<?php echo $detail->guardian_phone; ?>" class="form-control" id="guardian_phone" placeholder="Enter Guardian Phone">
      </div>
    </div>

    <div class="form-group">
      <label for="dob" class="col-sm-2 control-label">DoB</label>
      <div class="col-sm-5">
        <input type="date" name="dob" value="<?php echo $detail->dob; ?>" class="form-control" id="dob" placeholder="Enter DoB">
      </div>
    </div> 

    <div class="form-group">
      <label for="sex" class="col-sm-2 control-label">Sex</label>
      <div class="col-sm-5">
        <input type="text" name="sex" value="<?php echo $detail->sex; ?>" class="form-control" id="sex" placeholder="Enter Sex">
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
          <option selected="selected" value=""><?php echo $c_gory; ?></option>
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
          <option selected="selected" value=""><?php echo $c_ty; ?></option>
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
        <input type="text" name="per_street" value="<?php echo $detail->per_street; ?>" class="form-control" id="per_street" placeholder="Enter Permanent Street">
      </div>
    </div>

    <div class="form-group">
      <label for="per_city" class="col-sm-2 control-label">Permanent City</label>
      <div class="col-sm-5">
        <input type="text" name="per_city" value="<?php echo $detail->per_city; ?>" class="form-control" id="per_city" placeholder="Enter Permanent City">
      </div>
    </div>

    <div class="form-group">
      <label for="per_district" class="col-sm-2 control-label">Permanent District</label>
      <div class="col-sm-5">
        <input type="text" name="per_district" value="<?php echo $detail->per_district; ?>" class="form-control" id="per_district" placeholder="Enter Permanent District">
      </div>
    </div>

    <div class="form-group">
      <label for="per_city" class="col-sm-2 control-label">Permanent City</label>
      <div class="col-sm-5">
        <input type="text" name="per_city" value="<?php echo $detail->per_city; ?>" class="form-control" id="per_city" placeholder="Enter Permanent City">
      </div>
    </div>

    <div class="form-group">
      <label for="per_state" class="col-sm-2 control-label">Permanent State</label>
      <div class="col-sm-5">
        <input type="text" name="per_state" value="<?php echo $detail->per_state; ?>" class="form-control" id="per_state" placeholder="Enter Permanent State">
      </div>
    </div>

    <div class="form-group">
      <label for="per_pin" class="col-sm-2 control-label">Permanent Pin</label>
      <div class="col-sm-5">
        <input type="text" name="per_pin" value="<?php echo $detail->per_pin; ?>" class="form-control" id="per_pin" placeholder="Enter Permanent Pin">
      </div>
    </div>

    <div class="form-group">
      <label for="pre_street" class="col-sm-2 control-label">Present Street</label>
      <div class="col-sm-5">
        <input type="text" name="pre_street" value="<?php echo $detail->pre_street; ?>" class="form-control" id="pre_street" placeholder="Enter Present Street">
      </div>
    </div>

    <div class="form-group">
      <label for="pre_city" class="col-sm-2 control-label">Present City</label>
      <div class="col-sm-5">
        <input type="text" name="pre_city" value="<?php echo $detail->pre_city; ?>" class="form-control" id="pre_city" placeholder="Enter Present City">
      </div>
    </div>

    <div class="form-group">
      <label for="pre_district" class="col-sm-2 control-label">Present District</label>
      <div class="col-sm-5">
        <input type="text" name="pre_district" value="<?php echo $detail->pre_district; ?>" class="form-control" id="pre_district" placeholder="Enter Present District">
      </div>
    </div>

    <div class="form-group">
      <label for="pre_city" class="col-sm-2 control-label">Present City</label>
      <div class="col-sm-5">
        <input type="text" name="pre_city" value="<?php echo $detail->pre_city; ?>" class="form-control" id="pre_city" placeholder="Enter Present City">
      </div>
    </div>

    <div class="form-group">
      <label for="pre_state" class="col-sm-2 control-label">Present State</label>
      <div class="col-sm-5">
        <input type="text" name="pre_state" value="<?php echo $detail->pre_state; ?>" class="form-control" id="pre_state" placeholder="Enter Present State">
      </div>
    </div>

    <div class="form-group">
      <label for="pre_pin" class="col-sm-2 control-label">Present Pin</label>
      <div class="col-sm-5">
        <input type="text" name="pre_pin" value="<?php echo $detail->pre_pin; ?>" class="form-control" id="pre_pin" placeholder="Enter Present Pin">
      </div>
    </div> 

    <div class="form-group">
      <label for="status" class="col-sm-2 control-label">Status</label>
      <div class="col-sm-5">
      <?php
        if($sta)
          $s_tus=$sta->status;
        else
          $s_tus="----Select-----";
      ?>
        <select class="form-control input-sm" name="status">
          <option selected="selected" value=""><?php echo $s_tus; ?></option>
          <?php
          $status = statuses::all();
          foreach ($status as $st) {
           ?> 
           <option value="<?php echo $st->id; ?>"><?php echo $st->status; ?></option>
          <?php  
          }
          ?>
          
        </select>
      </div>
    </div> 


    <input type="hidden" name="id" value="<?php echo $detail->id; ?>" class="form-control" id="id">


         

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-5">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
      </div>
    </div>
</form>
@endsection