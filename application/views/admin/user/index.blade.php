@layout('admin')
@section('content')
<section class="module">
    <div class="module-head">
        <b>{{$heading}}</b>
    </div>

    <div class="module-body">
   
    <table class="table table-hover">
        <thead>
            <tr class="warning">
                <td>Id</td>
                <td>Username</td>
                <td>Type</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($users as $u){
            ?>
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->username}}</td>
                <td>{{$u->type}}</td>
                <td>
                    <a href="/users/edit/<?php echo $u->id; ?>"  role="button" class="icon-edit-sign" data-toggle="modal" title="Edit User"> Edit</a>
                    <!-- Delete Modal -->
                    <?php 
                    $settings=Settings::find(1);
                    if($settings->delete_student=="Y")
                    {
                        echo "
                        <a href='#Delete_modal<?php echo $u->id; ?>'  role='button' class='icon-trash' data-toggle='modal' title='Delete User'> Delete</a>
                        <div class='modal fade' id='Delete_modal<?php echo $u->id; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        Course Delete Confirmation
                                    </div>
                                    <form class='form-horizontal' method='POST' action='/users/delete/{{$u->id}}'>
                                        <div class='modal-body'>
                                            Are you sure to Delete... Mr {{$u->name}}?
                                        </div>
                                        <div class='modal-footer'>
                                            <button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
                                            <button class='btn btn-primary'>Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>"; 
                    }
                    ?>
                    <!-- End Delete Modal -->
                    
                </td>
            </tr>       
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php 
        if(isset($links))
            echo $links; 
    ?>
@endsection