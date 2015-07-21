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
    $courses_long = courses::where('type_id','=',1)->get();
    foreach ($courses_long as $long) {
    $student_long = $student_long + students::where('course','=',$long->id)->count();
    }
    $courses_short = courses::where('type_id','=',2)->get();
    foreach ($courses_short as $short) {
    $student_short = $student_short + students::where('course','=',$short->id)->count();
    }
    if($student_short == 0)
    {
      $student_short = 1;
    }
    $per_male = round(($student_sex_male*100)/$student_no,2);
    $per_female = round(($student_sex_female*100)/$student_no,2);
    $per_unknown = round((($student_no - ($student_sex_female + $student_sex_male))*100)/$student_no,2);
    $per_longterm = round((($student_long*100)/$student_no),2);
    $per_shortterm = round((($student_short*100)/$student_no),2);
    $per_st = round((($st*100)/$student_no),2);
    $per_sc = round((($sc*100)/$student_no),2);
    $per_obc = round((($obc*100)/$student_no),2);
    $per_gen = round((($gen*100)/$student_no),2);
  ?> 
      
<section class="module">
        <div class="module-head">
          <b>Dashboard</b>
        </div><!--/.module-head-->

      <p>
    <button class="btn btn-primary" type="button">
      Total No.of Student <span class="badge"><?php echo $student_no; ?></span>
    </button>
    <button class="btn btn-primary" type="button">
      Male <span class="badge"><?php echo $student_sex_male; ?></span>
    </button>
    <button class="btn btn-primary" type="button">
      Female <span class="badge"><?php echo $student_sex_female; ?></span>
    </button>
    <button class="btn btn-primary" type="button">
      Unknown <span class="badge"><?php echo $student_no - ($student_sex_female + $student_sex_male); ?></span>
    </button>
    </p>
    <div class="progress">
      <div class="progress-bar progress-bar-success" style="width: <?php echo $per_male;?>%">
        Male:<?php echo $per_male;?>%
      </div>
      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $per_female;?>%">
        Female:<?php echo $per_female;?>%
      </div>
      <div class="progress-bar progress-bar-danger" style="width: <?php echo $per_unknown;?>%">
        Unknown:<?php echo $per_unknown;?>%
      </div>
    </div>

    <p>
    <button class="btn btn-danger" type="button">
      Long Term Student <span class="badge"><?php echo $student_long; ?></span>
    </button>
    <button class="btn btn-danger" type="button">
      Short Term Student <span class="badge"><?php echo $student_short; ?></span>
    </button>
    </p>
    <div class="progress">
      <div class="progress-bar progress-bar-success" style="width: <?php echo $per_longterm;?>%">
        Longterm:<?php echo $per_longterm;?>%
      </div>
      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $per_shortterm;?>%">
        Short Term:<?php echo $per_shortterm;?>%
      </div>
    </div>

    <p>
    <button class="btn btn-info" type="button">
      Schedule Tribe <span class="badge"><?php echo $st; ?></span>
    </button>
    <button class="btn btn-info" type="button">
      Shedule Cast <span class="badge"><?php echo $sc; ?></span>
    </button>
    <button class="btn btn-info" type="button">
      OBC <span class="badge"><?php echo $obc; ?></span>
    </button>
    <button class="btn btn-info" type="button">
      General <span class="badge"><?php echo $gen; ?></span>
    </button>
    </p>
    <div class="progress">
      <div class="progress-bar progress-bar-success" style="width: <?php echo $per_st;?>%">
        ST:<?php echo $per_st;?>%
      </div>
      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $per_sc;?>%">
        SC:<?php echo $per_sc;?>%
      </div>
      <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?php echo $per_obc;?>%">
        OBC:<?php echo $per_obc;?>%
      </div>
      <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo $per_gen;?>%">
        General:<?php echo $per_gen;?>%
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
  </section>
@endsection
