<div class="modal fade" id="myModal<?php echo $s->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Student Detail</h4>
    </div>
    <div class="modal-body">
      <?php
      $detail = students::find($s->id);
      $course_detail = courses::find($s->course);
      $cate = categories::find($s->category);
      $comm=communities::find($s->community);
      $stat=statuses::find($s->status);
      ?>
      <ul class="list-group">
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
        else
        {
          ?>
        <li class="list-group-item">Course: </li>
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
        <li class="list-group-item">Community: <?php echo $comm->community;?></li>
        <?php
        }
        else
        {
          ?>
        <li class="list-group-item">Community: </li>
          <?php
        }
        ?>
        <li class="list-group-item">Present Street: <?php echo $detail->pre_street;?></li>
        <li class="list-group-item">Present City: <?php echo $detail->pre_city;?></li>
        <li class="list-group-item">Present District: <?php echo $detail->pre_dist;?></li>
        <li class="list-group-item">Present State: <?php echo $detail->pre_state;?></li>
        <li class="list-group-item">PIN: <?php echo $detail->pre_pin;?></li>
        <?php 
        if ($comm) {
          ?>
        <li class="list-group-item">Status: <?php echo $stat->status;?></li>
        <?php
        }
        else
        {
          ?>
        <li class="list-group-item">Status: </li>
          <?php
        }
        ?>
        
        
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