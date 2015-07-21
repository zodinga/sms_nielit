@layout('admin')
@section('content')

<?php
	$detail = students::find($s->id);
	$course_detail = courses::find($s->course);
	$cate = categories::find($s->category);
	$comm=communities::find($s->community);
	$stat=statuses::find($s->status);
?>
<ol class="list-group">
	<li class="list-group-item">
      <?php
      $photo = "/img/icon-user-default.jpg";
      if($detail->photo != NULL)
      {
        $photo = $detail->photo;
      }
      ?>
      Photo: <img src="<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-circle">
   	</li>
    <li class="list-group-item">Name: <b><?php echo $detail->name;?></b></li>
    <li class="list-group-item">Aadhaar-no: <b><?php echo $detail->aadhaar;?></b></li>
    <li class="list-group-item">EID: <b><?php echo $detail->eid;?></b></li>
    <li class="list-group-item">Phone: <b><?php echo $detail->phone;?></b></li>
    <li class="list-group-item">email: <b><?php echo $detail->email;?></b></li>
    <li class="list-group-item">Institution-no: <b><?php echo $detail->inst_no;?></b></li>
    <li class="list-group-item">University Reg-no: <b><?php echo $detail->univ_reg_no;?></b></li>
    <li class="list-group-item">Exam Roll No: <b><?php echo $detail->exam_roll_no;?></b></li>
    <li class="list-group-item">Date of Joining: <b><?php echo $detail->doj;?></b></li>
    <?php 
    if ($course_detail) {
      ?>
    <li class="list-group-item">Course: <b><?php echo $course_detail->course;?></b></li>
    <?php
    }
    else
    {
      ?>
    <li class="list-group-item">Course: </li>
      <?php
    }
    ?>
    <li class="list-group-item">Batch: <b><?php echo $detail->batch;?></b></li>
    <li class="list-group-item">Father's Name: <b><?php echo $detail->fathers_me;?></b></li>
    <li class="list-group-item">Mother's Name: <b><?php echo $detail->mothers_me;?></b></li>
    <li class="list-group-item">Parent Contact: <b><?php echo $detail->parents_phone;?></b></li>
    <li class="list-group-item">Guardian Name: <b><?php echo $detail->guardian_me;?></b></li>
    <li class="list-group-item">Guardian Phone: <b><?php echo $detail->guardian_phone;?></b></li>
    <li class="list-group-item">Date of Birth: <b><?php echo $detail->dob;?></b></li>
    <li class="list-group-item">Sex: <b><?php echo $detail->sex;?></b></li>
    <?php 
    if ($cate) {
      ?>
      <li class="list-group-item">Category: <b><?php echo $cate->category;?></b></li>
      <?php
    }
    else
    {
      ?>
    <li class="list-group-item">Category: </li>
      <?php
    }
    ?>
    <?php 
    if ($comm) {
      ?>
    <li class="list-group-item">Community: <b><?php echo $comm->community;?></b></li>
    <?php
    }
    else
    {
      ?>
    <li class="list-group-item">Community: </li>
      <?php
    }
    ?>
    <li class="list-group-item">Present Street: <b><?php echo $detail->pre_street;?></b></li>
    <li class="list-group-item">Present City: <b><?php echo $detail->pre_city;?></b></li>
    <li class="list-group-item">Present District: <b><?php echo $detail->pre_dist;?></b></li>
    <li class="list-group-item">Present State: <b><?php echo $detail->pre_state;?></b></li>
    <li class="list-group-item">PIN: <b><?php echo $detail->pre_pin;?></b></li>
    <?php 
    if ($comm) {
      ?>
    <li class="list-group-item">Status: <b><?php echo $stat->status;?></b></li>
    <?php
    }
    else
    {
      ?>
    <li class="list-group-item">Status: </li>
      <?php
    }
    ?>
    
    
</ol>
@endsection