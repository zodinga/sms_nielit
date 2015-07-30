@layout('home')
@section('content')

<marquee>This page is under construction</marquee>



    <h1>File Upload</h1>
    <form role="form" action="/test/upload" method="post"  enctype="multipart/form-data">
        <!-- <label>Input Students ID:</label>
        <input type="text" name="id" value="" required autofocus> -->
        <label>Select image to upload:</label>
        <input type="file" name="paper" id="paper">
        <input type="submit" value="Upload" name="submit">
            
    </form>


@endsection

