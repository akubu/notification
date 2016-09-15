<?php
        use App\Models\Notification;
?>

<html>
<style>
    .pagination li {
        display:inline-block;
        padding:5px;
    }
    span{
       display: block;
        color: white;
        text-align: left;
        padding: 14px 16px;
        text-decoration: none;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tr:hover{background-color:#f5f5f5}
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
{{--{{$not[0]->message}}--}}
<div>
<ul >
    <li><a>{{$username}}'s Home Page</a></li>
    <li><a href="/logout">Logout</a></li>
    <li id="not"><a id="n">Notification count:<?php echo Notification::where('uid_target','=',$username)->where('status','=','un_read')->count() ?></a></li>
    <li><a >upload</a></li>
</ul>
</div>
    <ul id="messages">

</ul>


    <input type="text" name="text" id="text" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    <input type="submit" value="send" id="submit">

<div id="table_div" hidden>
    <table>
        <tr>
        <th id="sort_not">Notification</th>
        <th id="sort_type">Type</th>
        <th id="sort_time">Time</th>
        </tr>
    </table>
    <div id="users">
        <input class="search" placeholder="Search" />


        <ul class="list"></ul>
        <ul class="pagination"></ul>
    </div>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script><!--script src="js/main.js"></script-->
<script src="http://listjs.com/no-cdn/list.pagination.js"></script>

<script>
    $('#document').ready(function () {
        $.get("/getNotification", function (data, status) {
            var json=JSON.parse(data);
            json.forEach(function(value){
                userLists.add({
                    notification:value.message,
                    type: value.type,
                    time: value.created_at
                });

            })

        });
    });

    var options = {
        valueNames: [ 'notification', 'type','time' ],
        item: '<li> <span class="notification"></span><span  class="type"></span> <span class="time"></span></li><br/>',
        sort:'asc',
        page:3,
        plugins: [ ListPagination({}) ]
    };

    var userLists = new List('users', options);







    var socket = io.connect('http://localhost:8899');
    var username="<?php echo $username ?>";
    socket.on(username,function(response){
        alert(response.text[response.count-1].message);
        var i;
        for(i=0;i<response.count;i++) {
            userLists.add({
                'notification': response.text[i].message,
                'type': response.text[i].type,
                'time': response.text[i].created_at
            });
        }

        $('#n').html('Notification count:'+response.count);
        $('#not').css("background-color",'#333');
    });

    $('#submit').click(function () {

        var text = $('#text').val();
        var token = $('#token').val();
        $('#text').val('');

        //$('#graphview').html('<center><img src="./img/loading.gif" height="20%" width="20%"> <br> Loading ... </center>');

        $.get("/sendMessage?text=" + text, function (data, status) {

});

        return true;
    });

    $('#n').click(function () {

        $.get("/clearNotification", function (data, status) {
            $('#n').html('Notification count: 0');
            $('#not').css("background-color",'grey');

            $('#table_div').show();
        });

        return true;
    });






    $("#sort_not").click(function () {
        if(options.sort=='desc') {
            userLists.sort('notification', {order: "asc"});
            options.sort="asc";
        }
        else {
            userLists.sort('notification', {order: "desc"});
            options.sort = 'desc';
        }
    });
    $("#sort_time").click(function () {
        console.log(options.sort);
        if(options.sort=='desc') {
            userLists.sort('time', {order: "asc"});
            options.sort="asc";
        }
        else {
            userLists.sort('time', {order: "desc"});
            options.sort='desc';
        }
    });
    $("#sort_type").click(function () {
        if(options.sort=='desc') {
            userLists.sort('type', {order: "asc"});
            options.sort="asc";
        }
        else {
            userLists.sort('type', {order: "desc"});
            options.sort = 'desc';
        }
    });

</script>
</body>
