<?php

        use Illuminate\Support\Facades\Auth;
        use App\Models\Notification;
        use App\Models\User;
//        echo file_get_contents(Auth::user()->avatar);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>OFS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link href="css/simple-sidebar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css">
</head>

<body>
<div id="wrapper" class="toggled"> 
  
  <!-- Sidebar -->
  <div id="sidebar-wrapper" >
    <?php
    $email=Auth::user()->email;
    if(User::where('email','=',$email)->pluck('avatar')->first()!=''){ ?>
    <div class="profile"><?php echo "<img src='data:image/png;base64," . base64_encode(file_get_contents(Auth::user()->avatar)) . "'>"; ?>
 <?php }
      else {?>
      <div class="profile"><img src='images/dp.png'>
<?php } ?>
        <span><?php echo Auth::user()->email?></span></div>
    <ul class="sidebar-nav">
      <li> <a href="#">OFS</a> </li>
      <li> <a href="#">Document Management System</a> </li>
      <li> <a href="#">Tracking System</a> </li>
    </ul>
  </div>
  <!-- sidebar-wrapper --> 
  
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="ofs_dashboard">
      <div class="top_bar">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2 paddingLeftZero leftPart"> <a href="javascript:void(0)" class="menu_icon" id="menu-toggle"><i class="fa fa-bars"></i><i class="fa fa-angle-right customRight" id="toggleArrowRight"></i></a>
              <div class="ofs_heading" > <a href="javascript:void(0)"><span>OFS</span></a> </div>
            </div>
            <!-- col-2-->
            <div class="col-md-10 text-right paddingRightZero">
              <div class="right_links"> <a href="javascript:void(0)" class="btn activeTopBar "> DASHBOARD<span class="triangle-down"></span></a>
                <div class="dropdown"> <a href="javascript:void(0)" class="btn dropdown-toggle" data-toggle="dropdown" > <span>MANAGE</span></a>
                  <ul class="dropdown-menu manageDropdownMenu">
                    <li><a href="javascript:void(0)">Item1</a></li>
                    <li><a href="javascript:void(0)">Item2</a></li>
                    <li><a href="javascript:void(0)">Item3</a></li>
                  </ul>
                </div>
                <a class="btn" href="javascript:void(0)"> <span>REPORTS</span></a>
                <div  class="dropdown"> <span id="counter" class="counter"><?php echo Notification::where('uid_target','=',$username)->where('status','=','un_read')->count() ?></span> <a class="notifications dropdown-toggle"  data-toggle="dropdown">Notifications</a>

                  <ul class="dropdown-menu customDropdownMenu list">
                    {{--<ul class="list"></ul>--}}
                    {{--<ul class="pagination"></ul>--}}

                    <li><a href="javascript:void(0)">#17 Hard Copy Requests</a></li>
                    <li><a href="javascript:void(0)">Delivery Challan</a></li>
                    <li><a href="javascript:void(0)">Purchase Order</a></li>
                    <li><a href="javascript:void(0)" style="background-color: #efeeee;">View All</a></li>
                  </ul>
                </div>
                <a class="welcome">Welcome <?php echo Auth::user()->name; ?></a> </div>
              <!--right links--> 
            </div>
            <!-- col-10--> 
          </div>
        </div>
      </div>
      <!-- TopBar-->
      <div class="pageTitle">
        <h1 class="title title_icon">DASHBOARD</h1>
      </div>
      <!-- page title-->
      <div class="dateRanger">
        <h2 class="dateRangerTitle">Please select a Date Range</h2>
        <div class="dateGroup">
          <div class="oneGroup"> <span>From:</span>
            <div class="input-group">
              <input type="text" name="fromdate" id="fromdate">
              <label class="calendar_icon" for="fromdate"><img src="images/calendar_icon.png" alt="calendar"></label>
            </div>
          </div>
          <div class="oneGroup"> <span>To:</span>
            <div class="input-group">
              <input type="text" name="todate" id="todate">
              <label class="calendar_icon" for="todate"><img src="images/calendar_icon.png" alt="calendar"></label>
            </div>
          </div>
        </div>
        <!--dateGroup--> 
        
      </div>
      <!-- date Ranger-->
      <div class="greyPanel">
        <div class=" row panelHeader">
          <div class="numericPart col-md-1 paddingRightZero"><span>47</span></div>
          <div class="textPart col-md-11 paddingLeftZero paddingRightZero">
            <h2>Requests</h2>
          </div>
        </div>
        <!--panel Header-->
        
        <div class="panelContent">
          <div class="row">
            <div class="col-md-3 paddingRight10">
              <div class="whiteCard softCopy">
                <h4>Soft Copy Requests<span class="bluePart"><a href="#">87</a></span> </h4>
              </div>
            </div>
            <div class="col-md-3 paddingLeft10 paddingRight10">
              <div class="whiteCard softCopy">
                <h4>Hard Copy Requests<span class="bluePart"><a href="#">81</a></span> </h4>
              </div>
            </div>
          </div>
        </div>
        <!--panel Content--> 
      </div>
      <!-- grey Panel-->
      <div class="greyPanel marginTop30">
        <div class=" row panelHeader">
          <div class="numericPart col-md-1 paddingRightZero"><span>83</span></div>
          <div class="textPart col-md-11 paddingLeftZero paddingRightZero">
            <h2>Collections</h2>
          </div>
        </div>
        <!--panel Header-->
        <div class="panelContent">
          <div class="row">
            <div class="col-md-3 paddingRight10">
              <div class="whiteCard document">
                <h4>C Form Collected<span class="bluePart"><a href="#">87</a></span> </h4>
                <span class="grey">Pending C Form Collection </span><span class="redPartSmall"><a href="#">81</a></span> </div>
            </div>
            <div class="col-md-3 paddingLeft10 paddingRight10">
              <div class="whiteCard document">
                <h4>C4 Form Collected<span class="bluePart"><a href="#">21</a></span> </h4>
                <span class="grey">Pending C4 Form Collection</span> <span class="redPartSmall"><a href="#">45</a></span> </div>
            </div>
            <div class="col-md-3 paddingLeft10 paddingRight10">
              <div class="whiteCard rupee">
                <h4>VIs Collected<span class="bluePart"><a href="#">37</a></span> </h4>
                <span class="grey">Pending VIs Collection</span> <span class="redPartSmall"><a href="#">35</a></span> </div>
            </div>
            <div class="col-md-3 paddingLeft10">
              <div class="whiteCard thumbs">
                <h4>Acknowledge Collected<span class="bluePart"><a href="#">15</a></span> </h4>
                <span class="grey">Acknowledge Collection </span><span class="redPartSmall"><a href="#">13</a></span></div>
            </div>
          </div>
        </div>
      </div>
      <!--panel Content--> 
      
      <!-- grey Panel-->
      <div class="challanChecklist">
        <div class="challanHeading">
          <h2>Delivery Challan:</h2>
        </div>
        <div class="groupChecklist">
          <div class="thing"> <span class="bluePart"><a href="#">321</a></span><span class="greyPart">Created</span> </div>
          <div class="thing"> <span class="bluePart"><a href="#">32</a></span><span class="greyPart">Delivered</span> </div>
          <div class="thing"> <span class="bluePart"><a href="#">65</a></span><span class="greyPart">Shipped</span> </div>
        </div>
      </div>
    </div>
    <!-- ofs dashboard--> 
  </div>
  <!-- /#page-content-wrapper --> 
</div>
<!--wrapper-->

<footer class="dashboard_footer">
  <div class="poweredby text-center">Powered by: <a href="http://www.power2sme.com" target="_blank">Power2SME</a></div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script><!--script src="js/main.js"></script-->
<script src="http://listjs.com/no-cdn/list.pagination.js"></script>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/main.js"></script> 
<script src="js/jquery.datetimepicker.js"></script>

{{--<script src="//js.pusher.com/3.2/pusher.min.js"></script>--}}

{{--<script>--}}
  {{--var pusher = new Pusher('582b4b7ee0d26b51099d');--}}
  {{--var channel = pusher.subscribe('my-channel');--}}
  {{--channel.bind('my-event', function(data) {--}}
    {{--alert('An event was triggered with message: ' + data.message);--}}
  {{--});--}}

{{--</script>--}}


<script type="text/javascript">

		$(document).ready(function(){
		 	$('#fromdate').datetimepicker({
		  		format:'Y/m/d',
		  		onShow:function( ct ){
		   			this.setOptions({
		   	 			maxDate:$('#todate').val()?$('#todate').val():false
		   			})
		  		},
		  		timepicker:false
		 	});
		 	$('#todate').datetimepicker({
		  		format:'Y/m/d',
		  		onShow:function( ct ){
		   			this.setOptions({
		    			minDate:$('#fromdate').val()?$('#fromdate').val():false
		   			})
		  		},
		  		timepicker:false
		 	});
		});
				
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
		$("#wrapper").toggleClass("shifter");
		
    });
    
	</script>

<script>
  //My backend scripts

  $("#fromdate").change(function() {
    if($('#todate').val()!='')
    console.log($(this).val());
  });


  $('#document').ready(function () {
    $.get("/getNotification", function (data, status) {
      var json=JSON.parse(data);
//      json.forEach(function(value){
//        userLists.add({
//          notification:value.message,
//          type: value.type,
//          time: value.created_at
//        });
//
//      })

    });
  });

  var options = {
    valueNames: [ 'notification', 'type','time' ],
    item: '<li> <span class="notification"></span><span  class="type"></span> <span class="time"></span></li><br/>',
    sort:'asc',
    page:3,
    plugins: [ ListPagination({}) ]
  };

//  var userLists = new List('users', options);

  var socket = io.connect('http://localhost:8899');

  var username="<?php echo $username ?>";
  socket.on(username,function(response){
//    userLists.clear();
    console.log(response);
    alert(response.text[response.count-1].message);
    var i;
//    for(i=0;i<response.count;i++) {
//      userLists.add({
//        'notification': response.text[i].message,
//        'type': response.text[i].type,
//        'time': response.text[i].created_at
//      });
//    }

    $('#counter').html(response.count);
//    $('#not').css("background-color",'#333');
  });

</script>


</body>
</html>