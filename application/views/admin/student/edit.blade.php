@layout('admin')
@section('content')
<section class="module">
    <div class="module-head">
        <b>Student Edit</b>
    </div>
    <div class="module-body">
        <form class="form-horizontal" action="/students/update" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label  for="photo" >Photo</label>
                <div>
                    <?php 
                        echo "couurse id=".Session::get('course_id');
                        $pic="/uploads/".$detail->photo;
                        if($detail->photo=="")
                            $pic="/img/user.jpg";
                    ?>    
                    <img src="<?php echo $pic;?>" height="100" width="100" alt="student-photo" class="img-rounded" id="output" class="img-rounded" style="border:1px solid black">
                    <input type="file" name="photo" id="photo" onchange="loadFile(event)">
                    
                    <input type="hidden" name="sid" value="<?php echo $detail->id;?>">
                </div>
            </div>

            <div class="form-group">
                <label  for="name" >Name</label>
                <div>
                    <input type="text" name="name" value="<?php echo $detail->name; ?>" class="form-control" id="name" placeholder="Enter Students Name" Autofocus required>
                </div>
            </div>

            <div class="form-group">
                <label  for="aadhaar" >Aadhaar No</label>
                <div>
                    <input type="text" name="aadhaar" value="<?php echo $detail->aadhaar; ?>" class="form-control" id="aadhaar" placeholder="Enter Aadhaar No">
                </div>
            </div>

            <div class="form-group">
                <label  for="eid" >Eid</label>
                <div>
                    <input type="text" name="eid" value="<?php echo $detail->eid; ?>" class="form-control" id="eid" placeholder="Enter Eid">
                </div>
            </div>

            <div class="form-group">
                <label  for="phone" >Phone No</label>
                <div>
                    <input type="text" name="phone" value="<?php echo $detail->phone; ?>" class="form-control" id="phone" placeholder="Enter Phone No">
                </div>
            </div>

            <div class="form-group">
                <label  for="email" >Email</label>
                <div>
                    <input type="email" name="email" value="<?php echo $detail->email; ?>" class="form-control" id="email" placeholder="Enter Email">
                </div>
            </div>

            <div class="form-group">
                <label  for="inst_no" >Institute No</label>
                <div>
                    <input type="text" name="inst_no" value="<?php echo $detail->inst_no; ?>" class="form-control" id="inst_no" placeholder="Enter Institute No">
                </div>
            </div>

            <div class="form-group">
                <label  for="univ_reg_no" >Univ Reg No</label>
                <div>
                    <input type="text" name="univ_reg_no" value="<?php echo $detail->univ_reg_no; ?>" class="form-control" id="univ_reg_no" placeholder="Enter University No">
                </div>
            </div>

            <div class="form-group">
                <label  for="exam_roll_no" >Exam Roll No</label>
                <div>
                    <input type="text" name="exam_roll_no" value="<?php echo $detail->exam_roll_no; ?>" class="form-control" id="exam_roll_no" placeholder="Enter Exam Roll No">
                </div>
            </div>

            <div class="form-group">
                <label  for="doj" >YoJ</label>
                <div>
                    <input type="text" name="doj" value="<?php echo $detail->doj; ?>" class="form-control" id="doj" placeholder="Enter Year of Joining">
                </div>
            </div>  

            <div class="form-group">
                <label  for="course" >Course</label>
                <div>
                    <select class="form-control input-sm" name="course">
                        <option selected="selected" value="{{$course_detail->id}}">{{$course_detail->course}}</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label  for="batch" >Batch</label>
                <div>
                    <input type="text" name="batch" value="<?php echo $detail->batch; ?>" class="form-control" id="batch" placeholder="Enter Batch No">
                </div>
            </div>

            <div class="form-group">
                <label  for="fathers_me" >Fathers Name</label>
                <div>
                    <input type="text" name="fathers_me" value="<?php echo $detail->fathers_me; ?>" class="form-control" id="fathers_me" placeholder="Enter Fathers Name">
                </div>
            </div>

            <div class="form-group">
                <label  for="mothers_me" >Mothers Name</label>
                <div>
                    <input type="text" name="mothers_me" value="<?php echo $detail->mothers_me; ?>" class="form-control" id="mothers_me" placeholder="Enter Mothers Name">
                </div>
            </div>

            <div class="form-group">
                <label  for="parents_phone" >Parents Phone</label>
                <div>
                    <input type="text" name="parents_phone" value="<?php echo $detail->parents_phone; ?>" class="form-control" id="parents_phone" placeholder="Enter Parents Phone">
                </div>
            </div>

            <div class="form-group">
                <label  for="guardian_me" >Guardian Name</label>
                <div>
                    <input type="text" name="guardian_me" value="<?php echo $detail->guardian_me; ?>" class="form-control" id="guardian_me" placeholder="Enter Guardian Name">
                </div>
            </div>

            <div class="form-group">
                <label  for="guardian_phone" >Guardian Phone</label>
                <div>
                    <input type="text" name="guardian_phone" value="<?php echo $detail->guardian_phone; ?>" class="form-control" id="guardian_phone" placeholder="Enter Guardian Phone">
                </div>
            </div>

            <div class="form-group">
                <label  for="dob" >DoB</label>
                <div>
                    <input type="date" name="dob" value="<?php echo $detail->dob; ?>" class="form-control" id="dob" placeholder="Enter DoB">
                </div>
            </div> 

            <div class="form-group">
                <label  for="sex" >Sex</label>
                <div>
                    <input type="text" name="sex" value="<?php echo $detail->sex; ?>" class="form-control" id="sex" placeholder="Enter Sex">
                </div>
            </div>

            <div class="form-group">
                <label  for="catogory" >Category</label>
                <div>
                    <select class="form-control input-sm" name="category">
                        <option selected="selected" value="{{$cate->id}}">{{$cate->category}}</option>
                        @foreach ($categories as $category) 
                        <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label  for="community" >Community</label>
                <div>
                    <select class="form-control input-sm" name="community">
                        <option selected="selected" value="{{$comm->id}}">{{$comm->community}}</option>
                        @foreach ($communities as $community) {
                        <option value="{{$community->id}}">{{$community->community}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label  for="per_street" >Permanent Street</label>
                <div>
                    <input type="text" name="per_street" value="<?php echo $detail->per_street; ?>" class="form-control" id="per_street" placeholder="Enter Permanent Street">
                </div>
            </div>

            <div class="form-group">
                <label  for="per_city" >Permanent City</label>
                <div>
                    <input type="text" name="per_city" value="<?php echo $detail->per_city; ?>" class="form-control" id="per_city" placeholder="Enter Permanent City">
                </div>
            </div>

            <div class="form-group">
                <label  for="per_district" >Permanent District</label>
                <div>
                    <input type="text" name="per_district" value="<?php echo $detail->per_district; ?>" class="form-control" id="per_district" placeholder="Enter Permanent District">
                </div>
            </div>

            <div class="form-group">
                <label  for="per_city" >Permanent City</label>
                <div>
                    <input type="text" name="per_city" value="<?php echo $detail->per_city; ?>" class="form-control" id="per_city" placeholder="Enter Permanent City">
                </div>
            </div>

            <div class="form-group">
                <label  for="per_state" >Permanent State</label>
                <div>
                    <input type="text" name="per_state" value="<?php echo $detail->per_state; ?>" class="form-control" id="per_state" placeholder="Enter Permanent State">
                </div>
            </div>

            <div class="form-group">
                <label  for="per_pin" >Permanent Pin</label>
                <div>
                    <input type="text" name="per_pin" value="<?php echo $detail->per_pin; ?>" class="form-control" id="per_pin" placeholder="Enter Permanent Pin">
                </div>
            </div>

            <div class="form-group">
                <label  for="pre_street" >Present Street</label>
                <div>
                    <input type="text" name="pre_street" value="<?php echo $detail->pre_street; ?>" class="form-control" id="pre_street" placeholder="Enter Present Street">
                </div>
            </div>

            <div class="form-group">
                <label  for="pre_city" >Present City</label>
                <div>
                    <input type="text" name="pre_city" value="<?php echo $detail->pre_city; ?>" class="form-control" id="pre_city" placeholder="Enter Present City">
                </div>
            </div>

            <div class="form-group">
                <label  for="pre_district" >Present District</label>
                <div>
                    <input type="text" name="pre_district" value="<?php echo $detail->pre_district; ?>" class="form-control" id="pre_district" placeholder="Enter Present District">
                </div>
            </div>

            <div class="form-group">
                <label  for="pre_city" >Present City</label>
                <div>
                    <input type="text" name="pre_city" value="<?php echo $detail->pre_city; ?>" class="form-control" id="pre_city" placeholder="Enter Present City">
                </div>
            </div>

            <div class="form-group">
                <label  for="pre_state" >Present State</label>
                <div>
                    <input type="text" name="pre_state" value="<?php echo $detail->pre_state; ?>" class="form-control" id="pre_state" placeholder="Enter Present State">
                </div>
            </div>

            <div class="form-group">
                <label  for="pre_pin" >Present Pin</label>
                <div>
                    <input type="text" name="pre_pin" value="<?php echo $detail->pre_pin; ?>" class="form-control" id="pre_pin" placeholder="Enter Present Pin">
                </div>
            </div> 

            <div class="form-group">
                <label  for="status" >Status</label>
                <div>
                    <select class="form-control input-sm" name="status">
                        <option selected="selected" value="{{$sta->id}}">{{$sta->status}}</option>
                        @foreach ($statuses as $status) {
                        <option value="{{$status->id}}">{{$status->status}}</option>
                        @endforeach

                    </select>
                </div>
            </div> 

            <input type="hidden" name="id" value="<?php echo $detail->id; ?>" class="form-control" id="id">
            <div class="form-group">
                <div class="col-sm-o">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </form>
   </div> 
@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>