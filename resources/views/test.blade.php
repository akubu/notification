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

<table id="myTable" class="tablesorter">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Due</th>
        <th>Web Site</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Smith</td>
        <td>John</td>
        <td>jsmith@gmail.com</td>
        <td>$50.00</td>
        <td>http://www.jsmith.com</td>
    </tr>
    <tr>
        <td>Bach</td>
        <td>Frank</td>
        <td>fbach@yahoo.com</td>
        <td>$50.00</td>
        <td>http://www.frank.com</td>
    </tr>
    <tr>
        <td>Doe</td>
        <td>Jason</td>
        <td>jdoe@hotmail.com</td>
        <td>$100.00</td>
        <td>http://www.jdoe.com</td>
    </tr>
    <tr>
        <td>Conway</td>
        <td>Tim</td>
        <td>tconway@earthlink.net</td>
        <td>$50.00</td>
        <td>http://www.timconway.com</td>
    </tr>
    </tbody>
</table>


{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.js"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script><!--script src="js/main.js"></script-->
<script src="http://listjs.com/no-cdn/list.pagination.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script>

<script>

    $(document).ready(function() {
        $(document).ready(function() {
            $("#myTable")
                    .tablesorter({widthFixed: true, widgets: ['zebra']})
                    .tablesorterPager({container: $("#pager")});
        });
    });
</script>
</body>

</html>