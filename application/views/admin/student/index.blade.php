@layout('admin')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div>
    <!--/.module-head-->
    <div class="module-body">
    <?php if(Input::has('export'))
        echo "<button id='button_excel' type='button' class='btn btn-success' ><i class=\"icon-external-link\"></i> Export Excel</button>";
    ?>
    <table class="table table-hover">
        <thead>
            <tr class="warning">
                <td>Id</td>
                <td>Photo</td>
                <td>Name</td>
                <td>Course</td>
                <td>Year</td>
                <td>Semester</td>
                <td>Phone</td>
                <td>Status</td>
                <td>Status Update Date</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($students as $s){
            ?>
            <tr>
                <td><?php echo $s->id;?></td>
                <td>
                  <?php 
                    $pic="/uploads/".$s->photo;
                    if($s->photo=="")
                      $pic="/img/user.jpg";
                    ?>
                    <img src="<?php echo $pic;?>" height="30" width="30" alt="student-photo" class="img-rounded">
                </td>
                <td><?php echo $s->name;?></td>
                <td><?php 
                        $course=Courses::find($s->course);
                        if($course)
                            echo $course->course;
                    ?>
                </td>
                <td><?php echo $s->doj;?></td>
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
                                    echo "<a href='/status_update/update'>Status update needed</a>";
                            }
                        }
                  ?>
                </td>
                <td><?php echo $s->phone;?></td>
                <td>
                    <?php
                        $status=Statuses::find($s->status);
                        if($status) {
                            echo $status->status;  
                        }
                    ?>
                </td>
                <td>
                    <?php echo $s->status_update_date;?>
                </td>
                <td>
                    
                   
                    <a href="/students/detail/<?php echo $s->id; ?>" role="button" class="icon-list-ol" data-toggle="modal" title="Display Details"> Details</a>
                    &nbsp;
                    <a href="/students/edit/<?php echo $s->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal" title="Edit Student"> Edit</a>
                    <!-- Delete Modal -->
                    <?php 
                    $settings=Settings::find(1);
                    if($settings->delete_student=="Y")
                    {
                        echo "
                        <a href='#Delete_modal<?php echo $s->id; ?>'  role='button' class='icon-trash' data-toggle='modal' title='Delete Student'> Delete</a>
                        <div class='modal fade' id='Delete_modal<?php echo $s->id; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        Course Delete Confirmation
                                    </div>
                                    <form class='form-horizontal' method='POST' action='/students/delete/{{$s->id}}'>
                                        <div class='modal-body'>
                                            Are you sure to Delete... Mr {{$s->name}}?
                                        </div>
                                        <div class='modal-footer'>
                                            <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
                                            <button class='btn btn-primary'>Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>"; 
                    }
                    ?>
                    <!-- End Delete Modal -->
                    
                </td>
            </tr>       
            <?php
            }
            ?>
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