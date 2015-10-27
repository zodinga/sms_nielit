@layout('admin')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div>
    <div class="module-body">
        <form class="form-horizontal" action="/students/current_filter" method="POST">
            <div class="control-group">
                <label class="control-label">Select Course</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" name="optionsCourse" id="optionsRadios1" value="4" checked="checked">
                        MCA
                    </label> 
                    <label class="radio inline">
                        <input type="radio" name="optionsCourse" id="optionsRadios2" value="3">
                        BCA
                    </label> 
                    <label class="radio inline">
                        <input type="radio" name="optionsCourse" id="optionsRadios2" value="5">
                        DCSE
                    </label> 
                    <label class="radio inline">
                        <input type="radio" name="optionsCourse" id="optionsRadios2" value="6">
                        DETE
                    </label> 
                    <label class="radio inline">
                        <input type="radio" name="optionsCourse" id="optionsRadios2" value="1">
                        O Level
                    </label> 
                    <label class="radio inline">
                        <input type="radio" name="optionsCourse" id="optionsRadios2" value="2">
                        A Level
                    </label> 
                </div>
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