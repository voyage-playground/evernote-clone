'use strict';

var app = angular.module('noteApp', ['ngCookies']);

app.controller('controller', function($scope,$http,$cookies) {

    $scope.loggedIn = $cookies.get('loggedIn') != '' ? true : false;
    $scope.createAccount = false;
    $scope.loginError = false;
    $scope.userNotes = {};
    $scope.newNote = {};
    $scope.noteActive = {
        active: false
    };

    $scope.activeItem = 'myNotes';

    $scope.register = {};

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
                    $cookies.put('loggedIn', username);
                    $scope.loggedIn = true;
                    $scope.getUserNotes();
                }
                else {
                    $scope.loginError = true;
                }
            });
        }
    };

    $scope.register = function(username,password1,password2,email1,email2,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/ajax.php",
                data: {
                    username: username,
                    password1: password1,
                    password2: password2,
                    email1: email1,
                    email2: email2,
                    type: 'createAccount'
                }
            }).then(function (data) {
                console.log(data);
                if (data.data == 'success') {
                    $scope.register = {};
                    $scope.createAccount = false;
                }
                else {

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
            $cookies.put('loggedIn', '');
        });
    };

    $scope.getUserNotes = function() {
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                type: 'getUserNotes'
            }
        }).then(function (data) {
            console.log(data.data);
            $scope.userNotes = data.data;
            $scope.activeItem = 'myNotes';
        });
    };

    $scope.getUserTrashedNotes = function() {
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                type: 'getUserTrashedNotes'
            }
        }).then(function (data) {
            console.log(data.data);
            $scope.userNotes = data.data;
            $scope.activeItem = 'trash';
        });
    };

    $scope.addNewNote = function(title,content,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/ajax.php",
                data: {
                    title: title,
                    content: content,
                    type: 'addNewNote'
                }
            }).then(function (data) {
                console.log(data);
                if (data.data == 'success') {
                    $scope.getUserNotes();
                    $scope.newNote = {};
                }
            });
        }
    };

    $scope.deleteNote = function(id,e) {
        e.stopPropagation();
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                id: id,
                type: 'deleteNote'
            }
        }).then(function (data) {
            if (data.data == 'success') {
                $scope.getUserNotes();
            }
        });
    };

    $scope.updateNote = function(id,content,title,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/ajax.php",
                data: {
                    id: id,
                    content: content,
                    title: title,
                    type: 'updateNote'
                }
            }).then(function (data) {
                if (data.data == 'success') {
                    $scope.getUserNotes();
                    $scope.noteActive = {
                        id: id,
                        active: true,
                        title: title,
                        content: content,
                        edit: false
                    }
                }
            });
        }
    };

    $scope.activateNote = function(id,title,content) {
        $scope.noteActive = {
            id: id,
            active: true,
            title: title,
            content: content
        }
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
            $scope.getUserNotes();
        }
    });

});
