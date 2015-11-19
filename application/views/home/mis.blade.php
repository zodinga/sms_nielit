@layout('home')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div>
    <div class="module-body">
        <form class="form-horizontal" action="/mis/yearly_report" method="POST">
            <div class="control-group">
                <label class="control-label">Yearly Students Report</label>
            </div>
            <div class="control-group">
                <label class="control-label">Select Year</label>
                <select class="span2" name="year">
                        <option selected="selected" value="">---All Years---</option>
                        <?php 
                        for($i=2002;$i<=date("Y");$i++)
                        {
                        ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php 
                        }
                        ?>
                </select>
            </div>
            <div class="control-group">
                <label class="control-label">Select Course</label>
                <select class="span2" name="courseID">
                        <option selected="selected" value="">---All Courses---</option>
                        <?php 
                        $courses = Courses::all();
                        ?>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course}}</option>
                        @endforeach
                </select>
            </div>
            <input type="hidden" value= name="id">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-5">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection