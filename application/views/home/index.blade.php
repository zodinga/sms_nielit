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

    $christian=students::where('community','=',1)->count();
    $hindu=students::where('community','=',2)->count();
    $mushlim=students::where('community','=',3)->count();
    $others=students::where('community','=',4)->count();
    $budhist=students::where('community','=',5)->count();
      $per_christian = round((($christian*100)/$student_no),2);
      $per_hindu = round((($hindu*100)/$student_no),2);
      $per_mushlim = round((($mushlim*100)/$student_no),2);
      $per_others = round((($others*100)/$student_no),2);
      $per_budhist = round((($budhist*100)/$student_no),2);

  ?> 
      
<section class="module">
        <div class="module-head">
          <b>Dashboard</b>
        </div><!--/.module-head-->
<?php if(isset($message))
echo $message; ?>
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
    <button class="btn btn-success" type="button">
      Schedule Tribe <span class="badge"><?php echo $st; ?></span>
    </button>
    <button class="btn btn-success" type="button">
      Shedule Cast <span class="badge"><?php echo $sc; ?></span>
    </button>
    <button class="btn btn-success" type="button">
      OBC <span class="badge"><?php echo $obc; ?></span>
    </button>
    <button class="btn btn-success" type="button">
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

    <p>
    <button class="btn btn-warning" type="button">
      Christian <span class="badge"><?php echo $christian; ?></span>
    </button>
    <button class="btn btn-warning" type="button">
      Hindu <span class="badge"><?php echo $hindu; ?></span>
    </button>
    <button class="btn btn-warning" type="button">
      Mushlim <span class="badge"><?php echo $mushlim; ?></span>
    </button>
    <button class="btn btn-warning" type="button">
      Bhudist <span class="badge"><?php echo $budhist; ?></span>
    </button>
    <button class="btn btn-warning" type="button">
      Others <span class="badge"><?php echo $others; ?></span>
    </button>
    </p>
    <div class="progress">
      <div class="progress-bar progress-bar-success" style="width: <?php echo $per_st;?>%">
        Christian:<?php echo $per_christian;?>%
      </div>
      <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?php echo $per_sc;?>%">
        Hindu:<?php echo $per_hindu;?>%
      </div>
      <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?php echo $per_obc;?>%">
        Mushlim:<?php echo $per_mushlim;?>%
      </div>
      <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo $per_gen;?>%">
        Bhudist:<?php echo $per_budhist;?>%
      </div> 
      <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: <?php echo $per_gen;?>%">
        Others:<?php echo $per_others;?>%
      </div>
    </div>

          <h2 class="sub-header">YEARLY STUDENT RECORD</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Year</th>
                  <th>MCA</th>
                  <th>BCA</th>
                  <th>DETE</th>
                  <th>DCSE</th>
                  <th>O-Level</th>
                  <th>A-Level</th>
                  <th>Total</th>

                </tr>
              </thead>
              <tbody>
               <?php $start_year=2002;
              $cmca=0;$cbca=0;$cdete=0;$cdcse=0;$co=0;$ca=0;$csh=0;
                  for($i=$start_year;$i<date("Y");$i++){
                    $tot_year=0;
              ?>
                <tr>
                <?php echo "<td>".$i."-".($i+1)."</td>"; ?>
                <?php $mca=Students::where('course','=',4)->where('doj','=',$i)->count();  
                      echo "<td><a href=\"/students/display/4-".$i."\">".$mca."</a></td>"; 
                      $cmca=$cmca+$mca;
                      
                      ?>

                <?php $bca=Students::where('course','=',3)->where('doj','=',$i)->count();  
                      echo "<td><a href=\"/students/display/3-".$i."\">".$bca."</td>"; 
                      $cbca=$cbca+$bca;
                      ?>

                <?php $dete=Students::where('course','=',6)->where('doj','=',$i)->count();  
                      echo "<td><a href=\"/students/display/6-".$i."\">".$dete."</td>"; 
                      $cdete=$cdete+$dete;
                      ?>

                <?php $dcse=Students::where('course','=',5)->where('doj','=',$i)->count();  
                      echo "<td><a href=\"/students/display/5-".$i."\">".$dcse."</td>"; 
                      $cdcse=$cdcse+$dcse;
                      ?>

                <?php $o=Students::where('course','=',1)->where('doj','=',$i)->count();  
                      echo "<td><a href=\"/students/display/1-".$i."\">".$o."</td>"; 
                      $co=$co+$o;
                      ?>

                <?php $a=Students::where('course','=',2)->where('doj','=',$i)->count();  
                      echo "<td><a href=\"/students/display/2-".$i."\">".$a."</td>"; 
                      $ca=$ca+$a;
                      ?>

                <?php $tot_year=$mca+$bca+$dete+$dcse+$o+$a;
                      echo "<td><a href=\"/students/display/all-".$i."\">".$tot_year."</td>"; 
                      ?>
                </tr>
                <?php
                }
                ?>
                <tr>
                <td><b>TOTAL</b></td>
                <?php echo "<td><b><a href=\"/students/display_all/4\">".$cmca."</b></td>"; ?>
                <?php echo "<td><b><a href=\"/students/display_all/3\">".$cbca."</b></td>"; ?>
                <?php echo "<td><b><a href=\"/students/display_all/6\">".$cdete."</b></td>"; ?>
                <?php echo "<td><b><a href=\"/students/display_all/5\">".$cdcse."</b></td>"; ?>
                <?php echo "<td><b><a href=\"/students/display_all/1\">".$co."</b></td>"; ?>
                <?php echo "<td><b><a href=\"/students/display_all/2\">".$ca."</b></td>"; ?>
                <?php echo "<td><h3>".($cmca+$cbca+$cdete+$cdcse+$co+$ca)."</h3></td>"; ?>
                </tr>
                
               
                
               </tbody>
            </table>
          </div>
        </div>
  </section>





@endsection
