@layout('home')

@section('content')

 <?php

    $student_no = students::where('id','>',0)->count();
    $st =  students::where('category','=',1)->count();
    $sc =  students::where('category','=',2)->count();
    $obc =  students::where('category','=',3)->count();
    $gen =  students::where('category','=',4)->count();

    $student_sex_male =  students::where('sex','=','M')->count();
    $student_sex_female =  students::where('sex','=','F')->count();
    $student_sex_unknown = ($student_no - ($student_sex_female + $student_sex_male));
    $student_long = 0;
    $student_short = 0;
    $courses_long = courses::where('id','=',1)->get();
    foreach ($courses_long as $long) {
    $student_long = $student_long + students::where('course','=',$long->id)->count();
    }
    $courses_short = courses::where('id','=',2)->get();
    foreach ($courses_short as $short) {
    $student_short = $student_short + students::where('course','=',$short->id)->count();
    }
    if($student_short == 0)
    {
      $student_short = 1;
    }

  ?> 

     
@endsection
@section('content1')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Student Search Result</h3>
    <p>
    
    <?php
    if($result)
    {
      ?>
      <table class="table table-condensed">
        <thead>
          <caption>Search Keywords: Name=<?php echo $stxt; ?>, Course=<?php echo $scourse; ?></caption>
          <tr>
            <td><strong>#</strong></td>
            <td><strong>Name</strong></td>
            <td><strong>Inst-No</strong></td>
            <td><strong>Contact</strong></td>
            <td><strong>Course</strong></td>
            <td><strong>Year of Joining</strong></td>
            <td><strong>Status</strong></td>
            <td><strong>Action</strong></td>
          </tr>     
        </thead>
        <tbody>

        <?php
        $i=1;

        foreach ($result as $r) {
        ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $r->name; ?></td>
            <td><?php echo $r->inst_no; ?></td>
            <td><?php echo $r->phone; ?></td>
            <td>
              <?php
                $course_name = courses::find($r->course); 
                echo $course_name->course; 
              ?>
            </td>
            <td><?php echo $r->doj; ?></td>
            <td>
              <?php 
                if($r->status == 1)
                {
                  echo "On-going"; 
                }
                else if($r->status == 2)
                {
                  echo "Completed";
                }
                else if($r->status == 3)
                {
                  echo "Drop-Out";
                }
                else
                {
                  echo "No-info";
                }    
              ?>
            </td>
            <td>
              <!-- Modal -->
              <div class="modal fade" id="myModal<?php echo $r->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Student Detail</h4>
                    </div>
                    <div class="modal-body">

                      <?php

                      $detail = students::find($r->id);
                      $course_detail = courses::find($r->course);
                      $cate = categories::find($r->category);
                      $comm=communities::find($r->community);
                      ?>
                      <ul class="list-group">
                        <li class="list-group-item">
                          <?php

                          $photo = "/img/icon-user-default.jpg";
                          if($detail->status != NULL)
                          {
                            $photo = $detail->photo;
                          }
                          ?>
                          Photo: <img src="<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-rounded">
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
                        ?>
                        <?php 
                        if ($comm) {
                          ?>
                        <li class="list-group-item">Community: <?php echo $comm->community;?></li>
                        <?php
                        }
                        ?>
                        <li class="list-group-item">Present Street: <?php echo $detail->pre_street;?></li>
                        <li class="list-group-item">Present City: <?php echo $detail->pre_city;?></li>
                        <li class="list-group-item">Present District: <?php echo $detail->pre_dist;?></li>
                        <li class="list-group-item">Present State: <?php echo $detail->pre_state;?></li>
                        <li class="list-group-item">PIN: <?php echo $detail->pre_pin;?></li>
                        <li class="list-group-item">Status: <?php echo $detail->status;?></li>
                      </ul>
                      <?php

                      ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp;&nbsp;Print</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>&nbsp;&nbsp;Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <a href="#myModal<?php echo $r->id; ?>"  role="button" class="btn btn-success" data-toggle="modal">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Details
              </a>
            </td>
          </tr>
        <?php

        $i++;
        }
        ?>  
        </tbody>
      </table>
      <?php   
    }
    else
    {
      ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> Record not found in the database.
      </div>
      <?php

    }
   
    ?>
    </p>
    
  </div>
 
@endsection
