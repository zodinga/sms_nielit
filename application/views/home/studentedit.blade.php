@layout('home')
@section('content')
<?php
    $detail = students::find($student->id);
    $course_detail = courses::find($student->course);
    $cate = categories::find($student->category);
    $comm=communities::find($student->community);
    $sta=statuses::find($student->status);
?>
<section class="module">
    <div class="module-head">
        <b>Update Student Information</b>
    </div><!--/.module-head-->
    <div class="module-body">
    <div class="tab">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab-1">
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Basic Input</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" placeholder="Type something here..." class="span8">
                                        <span class="help-inline">Helpful text here.</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        <div class="stats-overview row-fluid">
        <p> 
            <form class="form-horizontal" action="/students/update" method="POST" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="control">
                        <?php 
                            echo $student->photo;
                            $pic="/uploads/".$student->photo;
                            if($student->photo=="")
                                $pic="/img/user.jpg";
                        ?>
                        <img src="<?php echo $pic;?>" height="100" width="100" alt="student-photo" class="img-rounded">
                        <h1>Photo Upload</h1>
                        <label>Select image to upload:</label>
                        <input type="file" name="photo" id="photo">
                        <input type="hidden" name="sid" value="<?php echo $detail->id;?>">
                    </div>
                </div>

                <div class="control-group">
                    <label for="basicinput" class="control-label">Name</label>
                    <div class="control">
                        <input type="text" name="name" value="<?php echo $detail->name; ?>" class="form-control" id="name" placeholder="Enter Students Name" Autofocus required>
                    </div>
                </div>

                <div class="control-group">
                    <label for="aadhaar" class="control-label">Aadhaar No</label>
                    <div class="control">
                        <input type="text" name="aadhaar" value="<?php echo $detail->aadhaar; ?>" class="form-control" id="aadhaar" placeholder="Enter Aadhaar No">
                    </div>
                </div>

                <div class="control-group">
                    <label for="eid" class="control-label">Eid</label>
                    <div class="control">
                        <input type="text" name="eid" value="<?php echo $detail->eid; ?>" class="form-control" id="eid" placeholder="Enter Eid">
                    </div>
                </div>

                <div class="control-group">
                    <label for="phone" class="control-label">Phone No</label>
                    <div class="control">
                        <input type="text" name="phone" value="<?php echo $detail->phone; ?>" class="form-control" id="phone" placeholder="Enter Phone No">
                    </div>
                </div>

                <div class="control-group">
                    <label for="email" class="control-label">Email</label>
                    <div class="control">
                        <input type="email" name="email" value="<?php echo $detail->email; ?>" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                </div>

                <div class="control-group">
                    <label for="inst_no" class="control-label">Institute No</label>
                    <div class="control">
                        <input type="text" name="inst_no" value="<?php echo $detail->inst_no; ?>" class="form-control" id="inst_no" placeholder="Enter Institute No">
                    </div>
                </div>

                <div class="control-group">
                    <label for="univ_reg_no" class="control-label">Univ Reg No</label>
                    <div class="control">
                        <input type="text" name="univ_reg_no" value="<?php echo $detail->univ_reg_no; ?>" class="form-control" id="univ_reg_no" placeholder="Enter University No">
                    </div>
                </div>

                <div class="control-group">
                    <label for="exam_roll_no" class="control-label">Exam Roll No</label>
                    <div class="control">
                        <input type="text" name="exam_roll_no" value="<?php echo $detail->exam_roll_no; ?>" class="form-control" id="exam_roll_no" placeholder="Enter Exam Roll No">
                    </div>
                </div>

                <div class="control-group">
                    <label for="doj" class="control-label">YoJ</label>
                    <div class="control">
                        <input type="text" name="doj" value="<?php echo $detail->doj; ?>" class="form-control" id="doj" placeholder="Enter Year of Joining">
                    </div>
                </div>  

                <div class="control-group">
                    <label for="course" class="control-label">Course</label>
                    <div class="control">
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

                <div class="control-group">
                    <label for="batch" class="control-label">Batch</label>
                    <div class="control">
                        <input type="text" name="batch" value="<?php echo $detail->batch; ?>" class="form-control" id="batch" placeholder="Enter Batch No">
                    </div>
                </div>

                <div class="control-group">
                    <label for="fathers_me" class="control-label">Fathers Name</label>
                    <div class="control">
                        <input type="text" name="fathers_me" value="<?php echo $detail->fathers_me; ?>" class="form-control" id="fathers_me" placeholder="Enter Fathers Name">
                    </div>
                </div>

                <div class="control-group">
                    <label for="mothers_me" class="control-label">Mothers Name</label>
                    <div class="control">
                        <input type="text" name="mothers_me" value="<?php echo $detail->mothers_me; ?>" class="form-control" id="mothers_me" placeholder="Enter Mothers Name">
                    </div>
                </div>

                <div class="control-group">
                    <label for="parents_phone" class="control-label">Parents Phone</label>
                    <div class="control">
                        <input type="text" name="parents_phone" value="<?php echo $detail->parents_phone; ?>" class="form-control" id="parents_phone" placeholder="Enter Parents Phone">
                    </div>
                </div>

                <div class="control-group">
                    <label for="guardian_me" class="control-label">Guardian Name</label>
                    <div class="control">
                        <input type="text" name="guardian_me" value="<?php echo $detail->guardian_me; ?>" class="form-control" id="guardian_me" placeholder="Enter Guardian Name">
                    </div>
                </div>

                <div class="control-group">
                    <label for="guardian_phone" class="control-label">Guardian Phone</label>
                    <div class="control">
                        <input type="text" name="guardian_phone" value="<?php echo $detail->guardian_phone; ?>" class="form-control" id="guardian_phone" placeholder="Enter Guardian Phone">
                    </div>
                </div>

                <div class="control-group">
                    <label for="dob" class="control-label">DoB</label>
                    <div class="control">
                        <input type="date" name="dob" value="<?php echo $detail->dob; ?>" class="form-control" id="dob" placeholder="Enter DoB">
                    </div>
                </div> 

                <div class="control-group">
                    <label for="sex" class="control-label">Sex</label>
                    <div class="control">
                        <input type="text" name="sex" value="<?php echo $detail->sex; ?>" class="form-control" id="sex" placeholder="Enter Sex">
                    </div>
                </div>

                <div class="control-group">
                    <label for="catogory" class="control-label">Category</label>
                    <div class="control">
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

                <div class="control-group">
                    <label for="community" class="control-label">Community</label>
                    <div class="control">
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

                <div class="control-group">
                    <label for="per_street" class="control-label">Permanent Street</label>
                    <div class="control">
                        <input type="text" name="per_street" value="<?php echo $detail->per_street; ?>" class="form-control" id="per_street" placeholder="Enter Permanent Street">
                    </div>
                </div>

                <div class="control-group">
                    <label for="per_city" class="control-label">Permanent City</label>
                    <div class="control">
                        <input type="text" name="per_city" value="<?php echo $detail->per_city; ?>" class="form-control" id="per_city" placeholder="Enter Permanent City">
                    </div>
                </div>

                <div class="control-group">
                    <label for="per_district" class="control-label">Permanent District</label>
                    <div class="control">
                        <input type="text" name="per_district" value="<?php echo $detail->per_district; ?>" class="form-control" id="per_district" placeholder="Enter Permanent District">
                    </div>
                </div>

                <div class="control-group">
                    <label for="per_city" class="control-label">Permanent City</label>
                    <div class="control">
                        <input type="text" name="per_city" value="<?php echo $detail->per_city; ?>" class="form-control" id="per_city" placeholder="Enter Permanent City">
                    </div>
                </div>

                <div class="control-group">
                    <label for="per_state" class="control-label">Permanent State</label>
                    <div class="control">
                        <input type="text" name="per_state" value="<?php echo $detail->per_state; ?>" class="form-control" id="per_state" placeholder="Enter Permanent State">
                    </div>
                </div>

                <div class="control-group">
                    <label for="per_pin" class="control-label">Permanent Pin</label>
                    <div class="control">
                        <input type="text" name="per_pin" value="<?php echo $detail->per_pin; ?>" class="form-control" id="per_pin" placeholder="Enter Permanent Pin">
                    </div>
                </div>

                <div class="control-group">
                    <label for="pre_street" class="control-label">Present Street</label>
                    <div class="control">
                        <input type="text" name="pre_street" value="<?php echo $detail->pre_street; ?>" class="form-control" id="pre_street" placeholder="Enter Present Street">
                    </div>
                </div>

                <div class="control-group">
                    <label for="pre_city" class="control-label">Present City</label>
                    <div class="control">
                        <input type="text" name="pre_city" value="<?php echo $detail->pre_city; ?>" class="form-control" id="pre_city" placeholder="Enter Present City">
                    </div>
                </div>

                <div class="control-group">
                    <label for="pre_district" class="control-label">Present District</label>
                    <div class="control">
                        <input type="text" name="pre_district" value="<?php echo $detail->pre_district; ?>" class="form-control" id="pre_district" placeholder="Enter Present District">
                    </div>
                </div>

                <div class="control-group">
                    <label for="pre_city" class="control-label">Present City</label>
                    <div class="control">
                        <input type="text" name="pre_city" value="<?php echo $detail->pre_city; ?>" class="form-control" id="pre_city" placeholder="Enter Present City">
                    </div>
                </div>

                <div class="control-group">
                    <label for="pre_state" class="control-label">Present State</label>
                    <div class="control">
                        <input type="text" name="pre_state" value="<?php echo $detail->pre_state; ?>" class="form-control" id="pre_state" placeholder="Enter Present State">
                    </div>
                </div>

                <div class="control-group">
                    <label for="pre_pin" class="control-label">Present Pin</label>
                    <div class="control">
                        <input type="text" name="pre_pin" value="<?php echo $detail->pre_pin; ?>" class="form-control" id="pre_pin" placeholder="Enter Present Pin">
                    </div>
                </div> 

                <div class="control-group">
                    <label for="status" class="control-label">Status</label>
                    <div class="control">
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

                <div class="control-group">
                    <div class="col-sm-offset-2 control">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </div>
                </div>
            </form>
            </p>
        </div>
    </div>
</section>
@endsection