@layout('admin')
@section('content')
<?php
    $student_no = studentformats::where('id','>',0)->count();
    $st =  studentformats::where('category','=',1)->count();
    $sc =  studentformats::where('category','=',2)->count();
    $obc =  studentformats::where('category','=',3)->count();
    $gen =  studentformats::where('category','=',4)->count();
    $student_sex_male =  studentformats::where('sex','=','M')->count();
    $student_sex_female =  studentformats::where('sex','=','F')->count();
    $student_sex_unknown = ($student_no - ($student_sex_female + $student_sex_male));
    $student_long = 0;
    $student_short = 0;
    $courses_long = courses::where('type_id','=',1)->get();
    foreach ($courses_long as $long) {
    $student_long = $student_long + studentformats::where('course','=',$long->id)->count();
    }
    $courses_short = courses::where('type_id','=',2)->get();
    foreach ($courses_short as $short) {
    $student_short = $student_short + studentformats::where('course','=',$short->id)->count();
    }
    if($student_short == 0)
    {
      $student_short = 1;
    }
  ?> 
      
@endsection
@section('content1')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Dashboard : <?php echo Auth::user()->username;?></h3>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="chart">
                <div class="pie-thychart" data-set='[["Male", <?php echo $student_sex_male; ?>], ["Female",<?php echo $student_sex_male; ?>]]' data-colors="#6699FF,#CC99FF"></div>
              </div>
              <h4>Sex</h4>
              <span class="text-muted">% of Male & Female</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="chart">
                <div class="pie-thychart" data-set='[["ST", <?php echo $st; ?>], ["SC",<?php echo $sc; ?>],["OBC",<?php echo $obc; ?>],["GEN",<?php echo $gen; ?>]]' data-colors="#6699FF,#CC99FF,#FF9966,#47B224"></div>
              </div>
              <h4>Categories</h4>
              <span class="text-muted">ST/SC/GEN/OBC</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="chart">
                <div class="pie-thychart" data-set='[["LognTerm", <?php echo $student_long; ?>], ["ShortTerm",<?php echo $student_short; ?>]]' data-colors="#6699FF,#CC99FF"></div>
              </div>
              <h4>Courses</h4>
              <span class="text-muted">Short and Long Term Courses</span>
            </div>
          </div>

          <h2 class="sub-header">YEARLY STUDENT RECORD</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th><button type="button" class="btn btn-primary" data-toggle="popover" title="MCA" data-content="Master of Computer Applications : 3yrs Affiliated by MZU">MCA</button></th>
                  <th>BCA</th>
                  <th>DETE</th>
                  <th>DCSE</th>
                  <th>MAT-O</th>
                  <th>O-Level</th>
                  <th>A-Level</th>
                  <th>CCC</th>
                  <th>Short Term</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2013-2014</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>2014-2015</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                  <td>1000</td>
                </tr>
               </tbody>
            </table>
          </div>
        </div>
  
@endsection
