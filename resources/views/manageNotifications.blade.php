<?php
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\User;
        ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>OFS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
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
        </div>
    </div>
    <!-- sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="ofs_dashboard managePage">
            <div class="top_bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2 paddingLeftZero leftPart"> <a href="javascript:void(0)" class="menu_icon" id="menu-toggle"><i class="fa fa-bars"></i><i class="fa fa-angle-right customRight" id="toggleArrowRight"></i></a>
                            <div class="ofs_heading" > <a href="javascript:void(0)"><span>OFS</span></a> </div>
                        </div>
                        <!-- col-2-->
                        <div class="col-md-10 text-right paddingRightZero">
                            <div class="right_links">
                                <div class="dropdownManage"> <a href="javascript:void(0)" class="btn  "> DASHBOARD</a></div>

                                <div class="dropdownManage"> <a href="javascript:void(0)" class="btn dropdown-toggle activeTopBar" data-toggle="dropdown" > <span>MANAGE</span><span class="triangle-down"></span></a>
                                    <ul class="dropdown-menu manageDropdownMenu">
                                        <li><a href="javascript:void(0)">Item1</a></li>
                                        <li><a href="javascript:void(0)">Item2</a></li>
                                        <li><a href="javascript:void(0)">Item3</a></li>
                                    </ul>
                                </div>
                                <div class="dropdownManage"><a class="btn" href="javascript:void(0)"> <span>REPORTS</span></a></div>
                                <div class="dropdown"> <span class="counter"><?php echo Notification::where('uid_target','=',$email)->where('status','=','un_read')->count() ?></span> <a class="notifications dropdown-toggle"  data-toggle="dropdown">Notifications</a>
                                    <ul class="dropdown-menu customDropdownMenu">
                                        <li><a href="javascript:void(0)">#17 Hard Copy Requests</a></li>
                                        <li><a href="javascript:void(0)">Delivery Challan</a></li>
                                        <li><a href="javascript:void(0)">Purchase Order</a></li>
                                        <li><a href="javascript:void(0)" style="background-color: #efeeee;">View All</a></li>
                                    </ul>
                                </div>
                                <a class="welcome">Welcome</a> </div>
                            <!--right links-->
                        </div>
                        <!-- col-10-->
                    </div>
                </div>
            </div>
            <!-- TopBar-->
            <div class="pageTitle">
                <h1 class="title title_icon_manage">MANAGE</h1>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Notification <span class="sorter"><img src="images/sorter.png" alt="sorter"></span></th>
                        <th>Time <span class="sorter"><img src="images/sorter.png" alt="sorter"></span></th>
                        <th>Type <span class="sorter"><img src="images/sorter.png" alt="sorter"></span></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- table-responsive-->
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!--wrapper-->
<footer class="dashboard_footer">
    <div class="poweredby text-center">Powered by: <a href="http://www.power2sme.com" target="_blank">Power2SME</a></div>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script src="js/tableSorter.js"></script>
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

        //Myscript



        var table=$('.table tbody');
        $.get('/getAllNotification',function (data,status) {

            var json=JSON.parse(data);
            console.log(json);
            json.forEach(function (value) {
               table.append("<tr><td>"+value.message+"</td><td>"+value.created_at+"</td><td>"+value.type);
            });
            $(".table").tablesorter();
        })


    });


    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $("#wrapper").toggleClass("shifter");

    });





</script>
</body>
</html>