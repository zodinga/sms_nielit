@layout('home')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div>
    <div class="module-body">
    <button id='button_excel' type='button' class='btn btn-success' ><i class=\"icon-external-link\"></i> Export Excel</button>
        <div class="control-group">
            <form class="form-horizontal" action="/students/filter" method="POST">
                <label class="control-label"><h4>Filter</h4></label>
                <p>
                    <input type="text" name="name" id="basicinput" placeholder="Name" class="span3">
                    <select class="span2" name="year">
                        <option selected="selected" value="">---All Years---</option>
                        <?php 
                        for($i=2002;$i<=date("Y");$i++)
                        {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php 
                        }
                        ?>
                    </select>
                    <select class="span2" name="courseID">
                        <option selected="selected" value="">---All Courses---</option>
                        <?php 
                        $courses = Courses::all();
                        ?>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course}}</option>
                        @endforeach
                    </select>
                    <select class="span2" name="category">
                        <option selected="selected" value="">---All Category---</option>
                        <option value="1">ST</option>
                        <option value="2">SC</option>
                        <option value="3">OBC</option>
                        <option value="4">General</option>
                    </select>
                    <select class="span2" name="status">
                        <option selected="selected" value="">---All Status---</option>
                        <option value="1">On-going</option>
                        <option value="2">Completed</option>
                        <option value="3">Drop-out</option>
                        <option value="4">Discontinued</option>
                    </select>
                    <select class="span2" name="sex">
                        <option selected="selected" value="">---Male & Female---</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <select class="span2" name="community">
                        <option selected="selected" value="">---All Communities---</option>
                        <option value="1">Christian</option>
                        <option value="2">Hindu</option>
                        <option value="3">Mushlim</option>
                        <option value="4">Others</option>
                        <option value="5">Buddhist</option>
                    </select>
                    <button type="submit" class="btn btn-success"><i class=" icon-level-down"></i> Filter</button>
                </p>
            </form>
        </div>

        <table class="table table-hover">
            <thead>
                <tr class="warning">
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Category</th>
                    <th>Community</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Status_Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $s)
                
                <tr>
                    <td>{{$s->id}}</td>
                    <td><?php 
                            $pic="/uploads/".$s->photo;
                            if($s->photo=="")
                              $pic="/img/user.jpg";
                          ?>
                          <img src="<?php echo $pic;?>" height="30" width="30" alt="student-photo" class="img-rounded">
                    </td>
                    <td>{{$s->name}}</td>
                    <td>
                        <?php
                        $course = Courses::find($s->course);
                        if($course)
                            echo $course->course;
                        ?>
                    </td>
                    <td>{{$s->doj}}</td>
                    <td>
                    <?php
                        $cat = Categories::find($s->category);
                        if($cat)
                            echo $cat->category;
                        ?>
                    </td>
                     <td>
                    <?php
                        $com = Communities::find($s->community);
                        if($com)
                            echo $com->community;
                        ?>
                    </td>
                    <td>{{$s->phone}}</td>
                    <td>
                        <?php
                        $status=Statuses::find($s->status);
                        if($status) 
                            {
                            echo $status->status;  
                            }
                        ?>
                    </td>
                    <td>{{$s->status_update_date}}</td>
                    <td>
                        <a href="/students/detail/<?php echo $s->id; ?>" role="button" class="icon-list-ol" data-toggle="modal" title="Display Details"> Details</a>
                        &nbsp;
                        <?php
                        $edit=Settings::find(1);
                        if($edit->editstudent=="Y")
                        {
                        ?>
                            <a href="/students/edit/<?php echo $s->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal" title="Edit Student"> Edit</a>
                        <?php
                        } 
                        ?>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <?php 
            if(isset($links))
                echo $links; 
        ?>
     <!-- Table for exporting Data to excel file -->

   <table class="table table-hover" id="exportFile">
        <tr>
            <td colspan="33">{{$heading}}</td>
        </tr>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Aadhaar</td>
            <td>Eid</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Inst No</td>
            <td>Univ Reg No</td>
            <td>Exam Roll No</td>
            <td>Year</td>
            <td>Course</td>
            <td>Semester</td>
            <td>Batch</td>
            <td>Fathers Name</td>
            <td>Mothers Name</td>
            <td>Parents Phone</td>
            <td>Guardians Name</td>
            <td>Guardians Phone</td>
            <td>DOB</td>
            <td>Sex</td>
            <td>Category</td>
            <td>Community</td>
            <td>Permanaent Street</td>
            <td>Permanaent City</td>
            <td>Permanaent District</td>
            <td>Permanaent State</td>
            <td>Permanaent Pin</td>
            <td>Present City</td>
            <td>Present Street</td>
            <td>Present District</td>
            <td>Present State</td>
            <td>Present Pin</td>
            <td>Status</td>
            <td>Status Update Date</td>
        </tr>
        <?php foreach($students as $s){ ?>
        <tr>
            <td><?php echo $s->id;?></td>
            <td><?php echo $s->name;?></td>
            <td><?php echo $s->aadhaar;?></td>
            <td><?php echo $s->eid;?></td>
            <td><?php echo $s->phone;?></td>
            <td><?php echo $s->email;?></td>
            <td><?php echo $s->inst_no;?></td>
            <td><?php echo $s->univ_reg_no;?></td>
            <td><?php echo $s->exam_roll_no;?></td>
            <td><?php echo $s->doj;?></td>
            <td><?php 
                  $course=Courses::find($s->course);
                  if($course)
                  echo $course->course;?>
            </td>
            <td><?php 
            $course=Courses::find($s->course);
                if($course!=NULL)
                {
                  if($s->doj)
                  {
                    $doj="1-July-".$s->doj;
                    $sd=date_create_from_format("j-M-Y",$doj);
                    $now = new DateTime("now");
                    $interval = date_diff($sd, $now);
                    $months_spent=$interval->m + ($interval->y * 12) . ' months';
                    if($months_spent<$course->duration)
                    {
                      if($months_spent<=12)
                        echo "I Sem";
                      else if($months_spent<=24)
                        echo "II Sem";
                      else
                        echo "III Sem";
                    }
                    else
                      if($s->status==1)
                      echo "Status update needed";
                  }
                }
            ?>
            </td>
            <td><?php echo $s->batch;?></td>
            <td><?php echo $s->fathers_me;?></td>
            <td><?php echo $s->mothers_me;?></td>
            <td><?php echo $s->parents_phone;?></td>
            <td><?php echo $s->guardian_me;?></td>
            <td><?php echo $s->guardian_phone;?></td>
            <td><?php echo $s->dob;?></td>
            <td><?php echo $s->sex;?></td>
            <td>
                <?php
                 $category=Categories::find($s->category);
                 if($category) {
                echo $category->category;  
                }
                
                ?>
            </td>
            <td>
                <?php
                 $community=Communities::find($s->community);
                 if($community) {
                echo $community->community;  
                }
                
                ?>
            </td>
            <td><?php echo $s->per_street;?></td>
            <td><?php echo $s->per_city;?></td>
            <td><?php echo $s->per_district;?></td>
            <td><?php echo $s->per_state;?></td>
            <td><?php echo $s->per_pin;?></td>
            <td><?php echo $s->pre_street;?></td>
            <td><?php echo $s->pre_city;?></td>
            <td><?php echo $s->pre_district;?></td>
            <td><?php echo $s->pre_state;?></td>
            <td><?php echo $s->pre_pin;?></td>
            <td>
                <?php
                 $status=Statuses::find($s->status);
                 if($status) {
                echo $status->status;  
                }
                
                ?>
            </td>
            <td><?php echo $s->status_update_date;?></td>
        </tr>       
        <?php } ?>
    </table>
    </div>
</section>
@endsection