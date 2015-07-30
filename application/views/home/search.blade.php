@layout('home')
@section('content')

<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div><!--/.module-head-->
    <div class="module-body">
        <div class="stats-overview row-fluid">
        <p>
            <table class="table table-hover">
                <thead>
                    <tr class="warning">
                        <td><b>#</b></td>
                        <td><b>Name</b></td>
                        <td><b>Course</b></td>
                        <td><b>Batch</b></td>
                        <td><b>Phone</b></td>
                        <td><b>Status</b></td>
                        <td><b>Photo</b></td>
                        <td><b>Action</b></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $s)
                	<tr>
                        <td><?php echo $s->id;?></td>
                        <td><?php echo $s->name;?></td>
                        <td><?php 
                            $course=Courses::find($s->course);
                            if($course)
                                echo $course->course;
                            ?>
                        </td>
                        <td><?php echo $s->batch;?></td>
                        <td><?php echo $s->phone;?></td>
                        <td><?php
                            $status=Statuses::find($s->status);
                            if($status) 
                                {
                                echo $status->status;  
                                }
                            ?>
                        </td>
                        <td><?php 
                            $pic="/uploads/".$s->photo;
                            if($s->photo=="")
                            $pic="/img/user.jpg";
                            ?>
                            <img src="<?php echo $pic;?>" height="30" width="30" alt="student-photo" class="img-rounded">
                        </td>
                        <td>
                            <!--Details Modal Start -->
                            <?php include("./application/views/admin/student/details-modal.php"); ?>
                            <!--Details Modal End -->
                            <a href="/students/detail/<?php echo $s->id; ?>" role="button" class="icon-list-ol" data-toggle="modal" title="Display Details"> Details</a>
                            &nbsp;
                            <?php 
                            if($editstudent=="Y"){
                            ?>
                            <a href="/students/edit/<?php echo $s->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal" title="Edit Student"> Edit</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </p>
        </div>
    </div>
</section>
@endsection