@layout('admin')
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
//echo "RESULT name=",$result->name;
    if($result)
    {
      ?>
      <table class="table table-hover">
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
        foreach ($result as $s) {
        ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $s->name; ?></td>
            <td><?php echo $s->inst_no; ?></td>
            <td><?php echo $s->phone; ?></td>
            <td>
              <?php
              //echo $s->course;
                $course_name = courses::find($s->course); 
                echo $course_name->course; 
              ?>
            </td>
            <td><?php echo $s->doj; ?></td>
            <td>
              <?php 
                if($s->status == 1)
                {
                  echo "On-going"; 
                }
                else if($s->status == 2)
                {
                  echo "Completed";
                }
                else if($s->status == 3)
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
            <!--Details Modal Start -->
                <?php include("./application/views/admin/student/details-modal.php"); ?>
            <!--Details Modal End -->

            <!--Edit Modal Start -->
                <?php include("./application/views/admin/student/edit-modal.php"); ?>
            <!--Edit Modal End -->

              <a href="#myModal<?php echo $s->id; ?>"  role="button" class="glyphicon glyphicon-eye-open" data-toggle="modal" title="Display Details"></a>
              &nbsp;
              <a href="#myModalEdit<?php echo $s->id; ?>"  role="button" class="glyphicon glyphicon-edit" data-toggle="modal" title="Edit Student"></a>
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
