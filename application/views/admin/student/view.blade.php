<!-- @layout('admin')
@section('content1')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Students Search Result</h3> <button type="button" class="btn btn-primary" onclick="location.href='/students/add'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;&nbsp;Add New</button>
<p>
<table class="table table-hover">
    <thead>
    <tr class="warning">
        <td>Id</td>
        <td>Name</td>
        <td>Course</td>
        <td>Batch</td>
        <td>Phone</td>
        <td>Status</td>
        <td>Photo</td>
        <td>Updated at</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
     <?php
        $student = Students::all();
        //var_dump($student);exit();
        foreach($student as $s){
            echo $s->name;
            ?>
             
                
            
            <?php
        }

    ?>
    </tbody>
    </table>

</p>
</div>
@endsection -->