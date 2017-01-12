<html>
<head>
    <title>Laravel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="container">
    <div class="content">

        <h1>File Upload</h1>
        <form action="{{ URL::to('videoUpload') }}" method="post" enctype="multipart/form-data">
            <label>Select image to upload:</label>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" name="submit">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
        <video width="320" height="240" controls>
            <source src="uploads/sherlock.mp4" type="video/mp4">

            Your browser does not support the video tag.
        </video>
    </div>
</div>
</body>
</html>