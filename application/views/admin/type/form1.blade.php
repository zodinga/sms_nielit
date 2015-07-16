@layout('admin')
@section('content1')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Type Entry Form</h3>
    <p>
        
        {{ Form::open('save','POST') }}
                 {{Form::label('email', 'E-Mail Address', ['class' => 'col-sm-2 control-label'])}}
                  <div class="col-sm-5">
                    {{Form::text('type', $value = null, ['class' => 'form-control', 'placeholder' => 'Enter type']) }}
                    
                  </div>
        {{ Form::close() }}
</p>
</div>
@endsection