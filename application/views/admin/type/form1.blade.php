@layout('admin')
@section('content1')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Type Entry Form</h3>
    <p>
        
        {{ Form::open('types/save','POST',array('class'=>'form-horizontal')) }}
        <div class="form-group">
                 {{Form::label('type', 'Type:', ['class' => 'col-sm-2 control-label'])}}
                <div class="col-sm-5">
                    {{Form::text('type', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter type']) }}
        		</div>           
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-5">
                {{Form::submit('Save',array('class'=>'btn btn-success'))}}
            	{{Form::reset('Reset',array('class'=>'btn btn-primary'))}}  
           </div>
        </div>
        {{ Form::close() }}
</p>
</div>
@endsection