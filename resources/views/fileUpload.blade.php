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
        <div style="overflow-x:auto ; height: 400px;">
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/kw4tT7SCmaY" frameborder="0" allowfullscreen></iframe>

        </div>
    </div>
</div>
</body>
</html>