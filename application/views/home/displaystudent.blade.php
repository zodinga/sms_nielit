@layout('home')
@section('searchForm')
<form class="navbar-form navbar-right" method="POST" action="/students/search">
    <input type="text" class="input-small" required name="searchtxt" placeholder="Student Search...">
    <select class="input-small" name="course">
        <option selected="selected" value="all">All Course</option>
        <?php
        $course=Courses::all();
        foreach ($course as $c) {
        ?>
        <option value="<?php echo $c->id;?>"><?php echo $c->course;?></option>
        <?php
        }
        ?>
    </select>
    <button class="btn btn-mini btn-primary" type="submit"><i class="icon-search"></i></button>
</form>
@endsection
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div><!--/.module-head-->
    <div class="module-body">
        <table class="table table-hover">
            <thead>
                <tr class="warning">
                    <td>Id</td>
                    <td>Photo</td>
                    <td>Name</td>
                    <td>Course</td>
                    <td>Batch</td>
                    <td>Phone</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td><?php 
                            $pic="/uploads/".$s->photo;
                            if($s->photo=="")
                              $pic="/img/user.jpg";
                          ?>
                          <img src="<?php echo $pic;?>" height="30" width="30" alt="student-photo" class="img-rounded">
                    </td>
                    <td>{{$s->name}}</td>
                    <td>
                        <?php
                        $course = Courses::find($s->course);
                        if($course)
                            echo $course->course;
                        ?>
                    </td>
                    <td>{{$s->batch}}</td>
                    <td>{{$s->phone}}</td>
                    <td>
                        <?php
                        $status=Statuses::find($s->status);
                        if($status) 
                            {
                            echo $status->status;  
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

                        <a href="/students/detail/<?php echo $s->id; ?>" role="button" class="icon-list-ol" data-toggle="modal" title="Display Details"> Details</a>
                        &nbsp;
                        <?php
                        $edit=Settings::find(1);
                        if($edit->editstudent=="Y")
                        {
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
        <?php echo $links; ?>
    </div>
</section>
@endsection