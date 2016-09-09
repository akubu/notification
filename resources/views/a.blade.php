<?php

?>
<body>
<div id="div">

</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
<script>
    var socket = io.connect('http://localhost:8899');
    var username="<?php echo $username ?>";
    console.log(username);
    socket.on(username,function(message){
        console.log(message);
        $('#div').append('<span>'+message.message+ '</span>');
    });
</script>
