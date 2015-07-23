@layout('home')
@section('content')
<?php
$edit=Settings::find(1);
if($edit->editstudent=="Y")
{
?>

    <h1>File Upload</h1>
    <form role="form" action="/images/upload" method="post"  enctype="multipart/form-data">
        <label>Input Students ID:</label>
        <input type="text" name="id" value="" required autofocus>
        <label>Select image to upload:</label>
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Upload" name="submit">
            
    </form>
<?php
}
else
    echo "<marquee><h1>Student's Editing is not Enabled!! Contact Admin</h1></marquee>";

?>

@endsection
