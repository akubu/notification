<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            div#submitForm input {
                background: url("/login.png") no-repeat scroll 0 0 transparent;
                color: #000000;
                cursor: pointer;
                font-weight: bold;
                height: 20px;
                padding-bottom: 2px;
                width: 75px;
            }
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div id="submitForm">

                <h1>Please signin using google to continue</h1>
                <strong><a  id="google" href="social/redirect/google" style=" color: black ;font-size: larger" type="submit">Google</a></strong>
                {{--<div class="title">Laravel 5</div>--}}
            </div>
        </div>




    </body>
</html>
