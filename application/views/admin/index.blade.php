@layout('admin')
@sectio('menubar')

@endsection
@section('content')
<?php
if($confirm==1)
{
    ?>
    <div class="alert alert-success"><center>Confirmation: One User ID created..</center></div>
    <?php
}
 
?>
<hr />

<center>
<h4>Welcome to Sales Mangement System 0.1</h4>
<img src="/img/pet-care.jpg" class="img-polaroid" height="450" width="450"></center>
@endsection