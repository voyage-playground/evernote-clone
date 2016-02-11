'use strict';

var app = angular.module('noteApp', []);

app.controller('controller', function($scope,$http) {

    $scope.loggedIn = false;
    $scope.loginError = false;

    $scope.logIn = function(username,password,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/ajax.php",
                data: {
                    username: username,
                    password: password,
                    type: 'login'
                }
            }).then(function (data) {
                console.log(data);
                if (data.data == 'success') {
                    $scope.loggedIn = true;
                }
                else {
                    $scope.loginError = true;
                }
            });
        }
    };

    $scope.logOut = function() {
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                type: 'logout'
            }
        }).then(function (data) {
            $scope.loggedIn = false;
        });
    };

    //on load
    $http({
        method: "POST",
        url: "/ajax/ajax.php",
        data: {
            type: 'checkUserStatus'
        }
    }).then(function (data) {
        console.log(data);
        if (data.data == 'yes') {
            $scope.loggedIn = true;
        }
    });

});
