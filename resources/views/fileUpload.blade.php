
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
    <script src="/js/jquery.growl.js" type="text/javascript"></script>
    <link href="/css/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link href="/css/angularMaterial.css" rel="stylesheet" type="text/css" />
    <style>
        .fabSpeedDialdemoBasicUsage .text-capitalize {
            text-transform: capitalize; }

        .fabSpeedDialdemoBasicUsage .md-fab:hover, .fabSpeedDialdemoBasicUsage .md-fab.md-focused {
            background-color: #000 !important; }

        .fabSpeedDialdemoBasicUsage p.note {
            font-size: 1.2rem; }

        .fabSpeedDialdemoBasicUsage .lock-size {
            min-width: 300px;
            min-height: 300px;
            width: 300px;
            height: 300px;
            margin-left: auto;
            margin-right: auto; }
    </style>
</head>
<body ng-app="MyApp">
<div class="container" >
    <div class="content">
        <section layout="row" flex>
            <md-content>
                <div layout="column">
                    <div ng-controller="YoutubeController">
                        <md-button class="md-fab md-primary" aria-label="Eat cake" ng-click="upload($event)">
                            <md-icon md-svg-src="/images/upload.svg"></md-icon>
                        </md-button>
                    <div id="gif" style="text-align: center; display: none"><img src="/images/ajax-loader.gif" /></div>
                    </div>
                    <div style="overflow-x:auto ; height: 400px; display: flex">
                        <?php foreach ($var as $videoId) { ?>
                        <iframe style="padding: 10px ; padding-bottom: 5px" width="560" height="315" src="https://www.youtube.com/embed/{{$videoId}}" frameborder="0" allowfullscreen></iframe>
                        <?php } ?>
                    </div>
                    <div ng-controller="AppCtrl" class="md-padding dialogdemoBasicUsage" id="popupContainer" ng-cloak="" >
                        <div class="dialog-demo-content" layout="row" layout-wrap="" layout-margin="" layout-align="center">
                            <md-button  class="md-primary md-raised" ng-click="showAdvanced($event)">
                                Add Testimonial
                            </md-button>
                        </div>
                    </div>
                    <div style="overflow-x:auto ; height: 150px; display:flex">
                        <iframe style="padding: 10px"   src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
                        <iframe style="padding: 10px"   src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
                        <iframe style="padding: 10px"  src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
                        <iframe style="padding: 10px"  src="https://www.smule.com/recording/kishore-kumar-yeh-jeevan-hai-iss-jeevan-ka-yahi-hai/583977796_950044573/frame" frameborder="0"></iframe>
                    </div>

                    <div ng-controller="cardController" ng-cloak="" class="carddemoBasicUsage" >
                        <div style="overflow-x:auto ; height:500px; display: flex">
                            <md-card style="min-width: 350px" ng-repeat="test in testimonials" md-theme="dark-blue" md-theme-watch="">
                                <img style="width:100% ; height: 50%;" ng-src="@{{test['image']}}" class="md-card-image" alt="Washed Out">
                                <md-card-title>
                                    <md-card-title-text>
                                        <span class="md-headline">@{{test['name']}}</span>
                                        <span style="max-width: 400px" class="md-subhead">@{{test['text']}}</span>
                                    </md-card-title-text>
                                </md-card-title>
                                <md-card-actions layout="row" layout-align="end center">
                                    <md-button>Action 1</md-button>
                                    <md-button>Action 2</md-button>
                                </md-card-actions>
                            </md-card>
                        </div>
                    </div>
                </div>

            </md-content>
        </section>
    </div>
    <div ng-controller="SpeedDialController as demo" >
        <md-fab-speed-dial md-open="demo.isOpen" md-direction="up"
                           ng-class="demo.selectedMode "  style="position: fixed" class="md-fab-bottom-right">
            <md-fab-trigger>
                <md-button aria-label="menu" class="md-fab md-warn">
                    <md-icon md-svg-src="/images/menu.svg"></md-icon>
                </md-button>
            </md-fab-trigger>

            <md-fab-actions>
                <md-button aria-label="Twitter" class="md-fab md-raised md-mini">
                    <md-icon md-svg-src="img/icons/twitter.svg" aria-label="Twitter"></md-icon>
                </md-button>
                <md-button aria-label="Facebook" class="md-fab md-raised md-mini">
                    <md-icon md-svg-src="img/icons/facebook.svg" aria-label="Facebook"></md-icon>
                </md-button>
                <md-button aria-label="Google Hangout" class="md-fab md-raised md-mini">
                    <md-icon md-svg-src="img/icons/hangout.svg" aria-label="Google Hangout"></md-icon>
                </md-button>
            </md-fab-actions>
        </md-fab-speed-dial>
    </div>
</div>
<!-- Angular Material Library -->
<script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
    //angular material
    angular.module('MyApp',['ngMaterial','ngAnimate','ngAria', 'ngMessages','ngFileUpload'])
        .controller('SpeedDialController', function() {
            this.topDirections = ['left', 'up'];
            this.bottomDirections = ['down', 'right'];

            this.isOpen = false;

            this.availableModes = ['md-fling', 'md-scale'];
            this.selectedMode = 'md-fling';

            this.availableDirections = ['up', 'down', 'left', 'right'];
            this.selectedDirection = 'up';
        })
        .controller('cardController', function($scope,$http) {
            $scope.imagePath = '/images/facebook.png';
            $scope.testimonials=[];
            $http({
                url:'getTestimonials',
                method:'GET'
            })
                .then(function(response){
                    console.log(response);
                    response.data.forEach(function(record){
                        $scope.testimonials.push(record);
                    });
                    console.log($scope.testimonials);
                })

        })
        .config(function($mdThemingProvider) {
            $mdThemingProvider.theme('dark-grey').backgroundPalette('grey').dark();
            $mdThemingProvider.theme('dark-orange').backgroundPalette('orange').dark();
            $mdThemingProvider.theme('dark-purple').backgroundPalette('deep-purple').dark();
            $mdThemingProvider.theme('dark-blue').backgroundPalette('blue').dark();
        })
        .controller('YoutubeController',function ($scope,$mdDialog,$timeout,$mdSidenav,$log) {


            $scope.upload=function (ev) {
                $mdDialog.show({
                    controller: YoutubeDialogController,
                    templateUrl: 'uploadTemplate',
                    parent: angular.element(document.body),
                    targetEvent: ev,
                    clickOutsideToClose:true,
                    fullscreen:false // Only for -xs, -sm breakpoints.
                })

            };

            function YoutubeDialogController($scope,$mdDialog,$http){
                $scope.hide = function() {
                    $mdDialog.hide();
                };

                $scope.cancel = function() {
                    $mdDialog.cancel();
                };

                $scope.upload=function(file){

                    $('#gif').show();
                    console.log(file);
                    fd=new FormData();
                    fd.append('video',file);
                    console.log(fd.get('video'));
                    $http({
                        url:'videoUpload',
                        method:'POST',
                        data:fd,
                        headers: {'Content-Type': undefined}
                    })
                        .then(function(response){
                            console.log(response);
                            $('#gif').hide();
                            $.growl.notice({message: response.data.message});
                        });
                    $mdDialog.hide();
                    $(window).scrollTop();
                }
            }
        })
        .controller('LeftCtrl', function ($scope, $timeout, $mdSidenav, $log) {
            $scope.close = function () {
                // Component lookup should always be available since we are not using `ng-if`
                $mdSidenav('left').close()
                    .then(function () {
                        $log.debug("close LEFT is done");
                    });

            };
        })
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

            function DialogController($scope, $mdDialog,$http) {
                $scope.hide = function() {
                    $mdDialog.hide();
                };

                $scope.cancel = function() {
                    $mdDialog.hide();
                };
                $scope.upload=function(file){
                    if($scope.name==undefined || $scope.text==undefined)
                    {
                        $.growl.error({message:'Please fill all details then choose image to upload'});
                    }
                    else{

                        $('#gif').show();
                        console.log(file);
                        fd=new FormData();
                        fd.append('photo',file);
                        fd.append('name',$scope.name);
                        fd.append('text',$scope.text);
                        console.log(fd.get('photo'));
                        console.log(fd.get('name'));
                        console.log(fd.get('text'));
                        $http({
                            url:'saveTestimonialsWithPhoto',
                            method:'POST',
                            data:fd,
                            headers: {'Content-Type': undefined}
                        })
                            .then(function(response){
                                console.log(response);
                                $('#gif').hide();
                                $.growl.notice({message: response.data.message});
                            });
                        $mdDialog.hide();
                        $(window).scrollTop();
                    }

                };
                $scope.answer = function(answer) {
                    if(answer=="submit"){
                        console.log($scope.name);
                        if($scope.name==undefined || $scope.text==undefined)
                        {
                            $.growl.error({message:'Please fill all details'});
                        }
                        else{
                            $mdDialog.hide();
                            $(window).scrollTop();
                            $('#gif').show();
                            data={name:$scope.name,text:$scope.text};
                            console.log($scope.title);
                            $http({
                                url:'saveTestimonials',
                                method:'POST',
                                data:data,
                                headers: {'Content-Type': 'application/json'}
                            })
                                .then(function(response){
                                    $('#gif').hide();
                                    $.growl.notice({message: response.data.message});
                                })
                        }

                    }



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