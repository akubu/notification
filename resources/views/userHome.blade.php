<?php
        use App\Models\Notification;
?>

<html>
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }


    li a:hover {
        background-color:black;
    }
</style>
<body id="body">
<div>
<ul >
    <li><a>{{$username}}'s Home Page</a></li>
    <li><a href="/logout">Logout</a></li>
    <li><a id="n">Notification count:<?php echo Notification::where('uid_source','=',$username)->count() ?></a></li>
    <li><a >upload</a></li>
</ul>
</div>
    <ul id="messages">

<?php
//foreach(Notification::all() as $n)
//{
//    if($n->username==$username){
//        echo '<br>'.'<li>'.$n->text.'</li>' . '<br>';
//    }
//}
//    ?>

</ul>


    <input type="text" name="text" id="text" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input type="submit" value="send" id="submit">


<!--div id="upload">
<form method="post" action="upload" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" name="submit" value="submit">upload the document</input>
</form>
</div-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
{{--<script src="js/main.js"></script>--}}

<script>

    var socket = io.connect('http://localhost:8899');
    var username="<?php echo $username ?>";
    socket.on(username,function(message){
        console.log();
        $('#n').html('Notification count:'+message.count);
    });

    $('#submit').click(function () {

        var text = $('#text').val();
        var token = $('#token').val();

        //$('#graphview').html('<center><img src="./img/loading.gif" height="20%" width="20%"> <br> Loading ... </center>');

        $.get("/sendMessage?text=" + text, function (data, status) {
            //
});

        return true;
    });
//    $("#submit").click(function(){
//        t
//        io.publish('m',)
//    });
    //var socket = io.connect('http://localhost:8899');

</script>
</body>
