@layout('admin')
@section('content')

<?php
	$detail = students::find($s->id);
	$course_detail = courses::find($s->course);
	$cate = categories::find($s->category);
	$comm=communities::find($s->community);
	$stat=statuses::find($s->status);
?>

<table class="table table-striped table-bordered table-condensed">
  <tr>
  <td><b>ID</b></td><td>{{$detail->id}}</td>
  </tr>
   <tr>
  <td><b>PHOTO</b></td>
  <td><?php
      $photo = "/img/icon-user-default.jpg";
      if($detail->photo != NULL)
      {
        $photo = $detail->photo;
      }
      ?>
      <img src="/uploads/<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-rounded">
  </td>
  </tr>
  <tr>
  <td><b>NAME</b></td><td>{{$detail->name}}</td>
  </tr>
  <tr>
  <td><b>AADHAAR</b></td><td>{{$detail->aadhaar}}</td>
  </tr>
  <tr>
  <td><b>EID</b></td><td>{{$detail->eid}}</td>
  </tr>
  <tr>
  <td><b>PHONE</b></td><td>{{$detail->phone}}</td>
  </tr>
  <tr>
  <td><b>EMAIL</b></td><td>{{$detail->email}}</td>
  </tr>
  <tr>
  <td><b>INST NO</b></td><td>{{$detail->inst_no}}</td>
  </tr>
  <tr>
  <td><b>UNIV NO</b></td><td>{{$detail->univ_reg_no}}</td>
  </tr>
  <tr>
  <td><b>EXAM ROLL</b></td><td>{{$detail->exam_roll_no}}</td>
  </tr>
  <tr>
  <td><b>YOJ</b></td><td>{{$detail->doj}}</td>
  </tr>
  <tr>
  <td><b>COURSE</b></td>
  <td>
  <?php 
    if ($course_detail) {
      ?>
    {{$course_detail->course}}
    <?php
    }
    ?>
    </td>
  </tr>
  <tr>
  <td><b>BATCH</b></td><td>{{$detail->batch}}</td>
  </tr>
  <tr>
  <td><b>FATHERS NAME</b></td><td>{{$detail->fathers_me}}</td>
  </tr>
  <tr>
  <td><b>MOTHERS NAME</b></td><td>{{$detail->mothers_me}}</td>
  </tr>
  <tr>
  <td><b>PARENTS PHONE</b></td><td>{{$detail->parents_phone}}</td>
  </tr>
  <tr>
  <td><b>GUARDIAN</b></td><td>{{$detail->guardian_me}}</td>
  </tr>
  <tr>
  <td><b>GUARDIAN PHONE</b></td><td>{{$detail->guardian_phone}}</td>
  </tr>
  <tr>
  <td><b>DOB</b></td><td>{{$detail->dob}}</td>
  </tr>
  <tr>
  <td><b>SEX</b></td><td>{{$detail->sex}}</td>
  </tr>
  <tr>
  <td><b>CATEGORY</b></td>
  <td>
  <?php 
    if ($cate) {
      ?>
      {{$cate->category}}
      <?php
    }
    ?>
  </td>
  </tr>
  <tr>
  <td><b>COMMUNITY</b></td>
  <td>
  <?php 
    if ($comm) {
      ?>
    {{$comm->community}}
      <?php
    }
    ?>
  </td>
  </tr>
  <tr>
  <td><b>PERMANET STREET</b></td><td>{{$detail->per_street}}</td>
  </tr>
  <tr>
  <td><b>PERMANENT CITY</b></td><td>{{$detail->per_city}}</td>
  </tr>
  <tr>
  <td><b>PERMANENT DISTRICT</b></td><td>{{$detail->per_district}}</td>
  </tr>
  <tr>
  <td><b>PERMANENT STATE</b></td><td>{{$detail->per_state}}</td>
  </tr>
  <tr>
  <td><b>PERMANENT PIN</b>/td><td>{{$detail->per_pin}}</td>
  </tr>
  <tr>
  <td><b>PRESENT STREET</b></td><td>{{$detail->pre_street}}</td>
  </tr>
  <tr>
  <td><b>PRESENT CITY</b></td><td>{{$detail->pre_city}}</td>
  </tr>
  <tr>
  <td><b>PRESENT DISTRICT</b></td><td>{{$detail->pre_district}}</td>
  </tr>
  <tr>
  <td><b>PRESENT STATE</b></td><td>{{$detail->pre_state}}</td>
  </tr>
  <tr>
  <td><b>PRESENT PIN</b></td><td>{{$detail->pre_pin}}</td>
  </tr>
  <tr>
  <td><b>STATUS</b></td>
  <td>
  <?php 
    if ($stat) {
      ?>
    {{$stat->status}}
      <?php
    }
    ?>
  </td>
  </tr>
  <tr>
  <td><b>STATUS UPDATE DATE</b></td><td>{{$detail->status_update_date}}</td>
  </tr>
  <tr>
  <td><b>CREATED AT</b></td><td>{{$detail->created_at}}</td>
  </tr>
  <tr>
  <td><b>UPDATED AT</b></td><td>{{$detail->updated_at}}</td>
  </tr>
</table>




<!-- <ol class="list-group">
	<li class="list-group-item">
      <?php
      $photo = "/img/icon-user-default.jpg";
      if($detail->photo != NULL)
      {
        $photo = $detail->photo;
      }
      ?>
      Photo: <img src="/uploads/<?php echo $photo;?>" height="100" width="100" alt="student-photo" class="img-rounded">
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
    
    
</ol> -->
@endsection