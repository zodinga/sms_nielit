@layout('home')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div><!--/.module-head-->
    <div class="module-body">
        <div class="control-group">
            <form class="form-horizontal" action="/students/filter" method="POST">
                <label class="control-label"> Filter</label>
                <p class="controls controls-row">
                    <select class="span2" name="courseID">
                        <option selected="selected" value="0">---All Courses---</option>
                        <?php 
                        $courses = Courses::all();
                        ?>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course}}</option>
                        @endforeach
                    </select>
                    <select class="span2" name="category">
                        <option selected="selected" value="0">---All Category---</option>
                        <option value="1">ST</option>
                        <option value="2">SC</option>
                        <option value="3">OBC</option>
                        <option value="4">General</option>
                    </select>
                    <select class="span2" name="status">
                        <option selected="selected" value="0">---All Status---</option>
                        <option value="1">On-going</option>
                        <option value="2">Completed</option>
                        <option value="3">Drop-out</option>
                        <option value="4">Discontinued</option>
                    </select><select class="span2" name="sex">
                        <option selected="selected" value="%">---Male & Female---</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                    <button type="submit" class="btn btn-success"><i class=" icon-level-down"></i> Filter</button>
                </p>
            </form>
        </div>
    </div>

        <table class="table table-hover">
            <thead>
                <tr class="warning">
                    <td>Id</td>
                    <td>Photo</td>
                    <td>Name</td>
                    <td>Course</td>
                    <td>Year</td>
                    <td>Category</td>
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
                    <td>{{$s->doj}}</td>
                    <td>
                    <?php
                        $cat = Categories::find($s->category);
                        if($cat)
                            echo $cat->category;
                        ?>
                    </td>
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