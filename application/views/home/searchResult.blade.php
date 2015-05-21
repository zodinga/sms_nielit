@layout('home')
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
    <h3 class="page-header">Student Search Result</h3>
    <p>
    <?php
    echo "<br>Search Name is: ".$name;
    echo "<br>Search course is: ".$course;
    ?>
    </p>
    
  </div>
  
@endsection
