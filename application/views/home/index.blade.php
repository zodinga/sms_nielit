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
    $courses_long = courses::where('type_id','=',1)->get();
    foreach ($courses_long as $long) {
    $student_long = $student_long + students::where('course','=',$long->id)->count();
    }
    $courses_short = courses::where('type_id','=',2)->get();
    foreach ($courses_short as $short) {
    $student_short = $student_short + students::where('course','=',$short->id)->count();
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
          <b>Students Tribe Statictics : Total No.of entered in DB - <?php echo $student_no; ?></b>
        </div><!--/.module-head-->
        <div class="module-body">
          <div class="stats-overview row-fluid">
            <div class="span3">
              <section class="stats">
                <p class="muted">Schedule Tribe</p>
                <h3 class="text-red"><?php echo $st." / ".$per_st."%"; ?> <i class="icon-bar-chart"></i></h3>
              </section><!--/.module-->
            </div>
            <div class="span3">
              <section class="stats">
                <p class="muted">Schedule Caste</p>
                <h3 class="text-green"><?php echo $sc." / ".$per_sc."%"; ?></h3>
              </section><!--/.module-->
            </div>
            <div class="span3">
              <section class="stats">
                <p class="muted">Other Backward Class</p>
                <h3 class="text-blue"><?php echo $obc." / ".$per_obc."%"; ?></h3>
              </section><!--/.module-->
            </div>
            <div class="span3">
              <section class="stats">
                <p class="muted">General</p>
                <h3 class="text-orange"><?php echo $gen." / ".$per_gen."%"; ?></h3>
              </section><!--/.module-->
            </div>
          </div>
        </div><!--/.module-body-->
      </section><!--/.module-->




@endsection
