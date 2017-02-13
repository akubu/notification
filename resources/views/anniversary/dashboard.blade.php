<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/images/upload.png">
    <link rel="manifest" href="/manifest.json">
    <title>Anniversary</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
    <script src="js/anniversary/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-route.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous"></script>
    <script src="/js/jquery.growl.js" type="text/javascript"></script>
    <link href="/css/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link href="/css/angularMaterial.css" rel="stylesheet" type="text/css" />
    <script src="http://malsup.github.com/jquery.form.js"></script>
    {{--<script src="/offline/js/offline.js"></script>--}}
    {{--<script src="/offline/js/snake.js"></script>--}}
    {{--<link rel="stylesheet" type="text/css" href="/offline/themes/offline-language-english.css"></link>--}}
</head>
<body ng-app="MyApp">
<div ng-controller="AppCtrl" ng-cloak>
    <md-content class="md-padding">
        <md-nav-bar
                md-selected-nav-item="currentNavItem"
                nav-bar-aria-label="navigation links">
            <md-nav-item md-nav-href="#videos" name="videos">
                Videos
            </md-nav-item>
            <md-nav-item md-nav-href="#testimonials" name="testimonials">
                Testimonials
            </md-nav-item>
        </md-nav-bar>


        <div  ng-view></div>

        <div id="gif" style="text-align: center; display: none"><img src="/images/ajax-loader.gif" /></div>
        <div ng-controller="SpeedDialController as demo" >
            <md-fab-speed-dial md-open="false" md-direction="up"
                               ng-class="demo.selectedMode "  style="position: fixed" class="md-fab-bottom-right">
                <md-fab-trigger>
                    <md-button aria-label="menu" class="md-fab md-warn">
                        <md-icon md-svg-src="/images/menu.svg"></md-icon>
                        {{--<md-tooltip md-direction="left">Menu</md-tooltip>--}}
                    </md-button>
                </md-fab-trigger>

                <md-fab-actions>
                    <md-button aria-label="Video" class="md-fab md-raised md-mini" ng-click="demo.upload($event)">
                        <md-icon md-svg-src="/images/video.svg" aria-label="Video"></md-icon>
                        {{--<md-tooltip md-autohide="true" md-direction="left">Upload Video</md-tooltip>--}}
                    </md-button>
                    <md-button aria-label="Testimonial" class="md-fab md-raised md-mini" ng-click="demo.showAdvanced($event)">
                        <md-icon md-svg-src="/images/testimonial.svg" aria-label="Testimonial"></md-icon>
                        {{--<md-tooltip md-autohide="true" md-direction="left">Add Testimonial</md-tooltip>--}}
                    </md-button>
                </md-fab-actions>
            </md-fab-speed-dial>
        </div>
    </md-content>
</div>

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