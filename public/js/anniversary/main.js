(function() {
    'use strict';

    angular.module('MyApp', ['ngMaterial','ngAnimate','ngAria', 'ngMessages','ngFileUpload','ngRoute'])
        .controller('AppCtrl', AppCtrl)
        .controller('YoutubeController',YoutubeController)
        .controller('TestimonialController', function($scope,$http) {
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
        .controller('SpeedDialController', function($scope,$mdDialog) {
            this.topDirections = ['left', 'up'];
            this.bottomDirections = ['down', 'right'];

            this.isOpen = false;

            this.availableModes = ['md-fling', 'md-scale'];
            this.selectedMode = 'md-scale';

            this.availableDirections = ['up', 'down', 'left', 'right'];
            this.selectedDirection = 'up';
            this.upload=function (ev) {
                console.log("asd");
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
                   // alert('asd');
                    $('#gif').show();
                    console.log(file);
                    var fd=new FormData();
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

            //Add testimonials
            this.status = '  ';
            this.customFullscreen = true;
            this.showAdvanced = function(ev) {
                $mdDialog.show({
                    controller: DialogController,
                    templateUrl: 'testimonialTemplate',
                    parent: angular.element(document.body),
                    targetEvent: ev,
                    clickOutsideToClose:true,
                    fullscreen: this.customFullscreen // Only for -xs, -sm breakpoints.
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
                        var fd=new FormData();
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
                            var data={name:$scope.name,text:$scope.text};
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
        })
        .config(function($mdThemingProvider) {
            $mdThemingProvider.theme('dark-grey').backgroundPalette('grey').dark();
            $mdThemingProvider.theme('dark-orange').backgroundPalette('orange').dark();
            $mdThemingProvider.theme('dark-purple').backgroundPalette('deep-purple').dark();
            $mdThemingProvider.theme('dark-blue').backgroundPalette('blue').dark();
        })

        .config(function ($routeProvider) {
        $routeProvider.when('/',{
            templateUrl:'videos',
            controller:'YoutubeController'
        }).when('/videos',{
            templateUrl:'videos',
            controller:'YoutubeController'
        }).when('/testimonials',{
            templateUrl:'testimonials',
            controller:'TestimonialController'
        })
    });
    function AppCtrl($scope) {
        $scope.currentNavItem = 'videos';
    }
    function YoutubeController($scope,$mdDialog) {
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
    }

})();