@layout('home')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div>
    <!--/.module-head-->
    <div class="module-body">
    <?php 
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
                <td>Cat</td>
                <td>Status</td>
                <td>Status Update Date</td>
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
                    if($yr==$s->doj)
                        echo "I Sem";
                    else if($yr==$s->doj+1)
                        echo "III Sem";
                    else
                        echo "V Sem";
                  ?>
                </td>
                <td><?php echo $s->phone;?></td>
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
                        $status=Statuses::find($s->status);
                        if($status) {
                            echo $status->status;  
                        }
                    ?>
                </td>
                <td>
                    <?php echo $s->status_update_date;?>
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
                if($yr==$s->doj)
                        echo "I Sem";
                    else if($yr==$s->doj+1)
                        echo "III Sem";
                    else
                        echo "V Sem";
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