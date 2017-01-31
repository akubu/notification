<?php
//dd($var);
?>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anniversary</title>
    {{--<script src="/js/angularMaterial.js"></script>--}}
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
    <script src="/js/jquery.growl.js" type="text/javascript"></script>
    <link href="/css/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link href="/css/angularMaterial.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
    <div class="content">
        <div>
        <button style="
  height: 36px;
  width: 36px;
  border-radius: 50%;
  border: 1px solid red;
  text-align: center;
  font-size: large;
  background-color: red" id="button">+</button>
            <div id="divForm" style="display: none">
        <form id="form"  action="{{ URL::to('videoUpload') }}" method="post" enctype="multipart/form-data">
            <label>Select video to upload:</label>
            <input type="file" name="fileToUpload" id="file">
            <input type="submit" value="Upload" name="submit">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
        </form>
                <div id="gif" style="text-align: center; display: none"><img src="/images/ajax-loader.gif" /></div>
            </div>
        </div>
        <div style="overflow-x:auto ; height: 400px; display: flex">
            <?php foreach ($var as $videoId) { ?>
            <iframe style="padding: 10px" width="560" height="315" src="https://www.youtube.com/embed/{{$videoId}}" frameborder="0" allowfullscreen></iframe>
            <?php } ?>

        </div>
        <div ng-controller="AppCtrl" class="md-padding dialogdemoBasicUsage" id="popupContainer" ng-cloak="" ng-app="MyApp">
            <div class="dialog-demo-content" layout="row" layout-wrap="" layout-margin="" layout-align="center">
                <md-button class="md-primary md-raised" ng-click="showAdvanced($event)">
                    Add Testimonial
                </md-button>
            </div>
        </div>
        <div style="overflow-x:auto ; height: 150px;">
        <iframe style="padding: 10px" width="100%" height="125" src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
        <iframe style="padding: 10px" width="100%" height="125" src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
        <iframe style="padding: 10px" width="100%" height="125" src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
        <iframe style="padding: 10px" width="100%" height="125" src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
        </div>
    </div>
</div>

<!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
    //angular material
    angular.module('MyApp',['ngMaterial','ngAnimate','ngAria', 'ngMessages'])

        .controller('AppCtrl', function($scope, $mdDialog) {
            $scope.status = '  ';
            $scope.customFullscreen = true;
            $scope.showAdvanced = function(ev) {
                $mdDialog.show({
                    controller: DialogController,
                    templateUrl: 'testimonialTemplate',
                    parent: angular.element(document.body),
                    targetEvent: ev,
                    clickOutsideToClose:true,
                    fullscreen: $scope.customFullscreen // Only for -xs, -sm breakpoints.
                })
                    .then(function(answer) {
                        $scope.status = 'You said the information was "' + answer + '".';
                    }, function() {
                        $scope.status = 'You cancelled the dialog.';
                    });
            };


            $scope.showPrerenderedDialog = function(ev) {
                $mdDialog.show({
                    contentElement: '#myDialog',
                    parent: angular.element(document.body),
                    targetEvent: ev,
                    clickOutsideToClose: true
                });
            };

            function DialogController($scope, $mdDialog,$http) {
                $scope.hide = function() {
                    $mdDialog.hide();
                };

                $scope.cancel = function() {
                    $mdDialog.cancel();
                };

                $scope.answer = function(answer) {
                    if(answer=="submit"){
                        data={name:$scope.name,text:$scope.text};
                        console.log($scope.title);
                        $http({
                            url:'saveTestimonials',
                            method:'POST',
                            data:data,
                            headers: {'Content-Type': 'application/json'}
                        })
                            .then(function(response){
                                $.growl.notice({message: response.data.message});
                            })
                    }


                    $mdDialog.hide(answer);
                };
            }
        });

</script>
<script>
    $(function() {
        $('form').ajaxForm({
            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {
                $('#gif').show();
                console.log(percentComplete);
            },
            complete: function(xhr) {
                $('#gif').hide();
                response=JSON.parse(xhr.responseText);
                if(response.status==0){
                    $.growl.error({message:response.message});
                }
                else {
                    $.growl.notice({message: response.message});
                }
            }
        });
    });

    $('#button').click(function(){
       $('#divForm').show();
    });

</script>

<script>
    //responsive
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-52746336-1');ga('send','pageview');
    var isCompleted = {};
    function sampleCompleted(sampleName){
        if (ga && !isCompleted.hasOwnProperty(sampleName)) {
            ga('send', 'event', 'WebCentralSample', sampleName, 'completed');
            isCompleted[sampleName] = true;
        }
    }
</script>
</body>
</html>