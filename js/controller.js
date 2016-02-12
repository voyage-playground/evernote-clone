'use strict';

var app = angular.module('noteApp', ['ngCookies','validation.match']);

app.controller('controller', function($scope,$http,$cookies,$window) {

    //Handle resize for layout changes
    var w = angular.element($window);
    w.bind('resize', function () {
        $scope.windowSize = window.innerWidth;
        $scope.$apply();
    });

    $scope.loggedIn = $cookies.get('loggedIn') ? true : false;
    $scope.activeUser = $cookies.get('loggedIn');
    $scope.createAccount = false;
    $scope.loginError = false;
    $scope.userNotes = {};
    $scope.newNote = {};
    $scope.noteActive = {
        active: false
    };

    $scope.windowSize = window.innerWidth;

    $scope.mobileActive = 'notes';

    $scope.loaded = true;

    $scope.shareNoteModel = false;
    $scope.shareNoteID = false;

    $scope.usernameAvailable = false;

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
                    $scope.activeUser = username;
                    $scope.getUserNotes();
                    $scope.loggedIn = true;
                    $scope.noteActive = {
                        active: false
                    };
                }
                else {
                    $scope.loginError = true;
                }
            });
        }
    };

    $scope.registerAccount = function(username,password1,password2,email1,email2,valid) {
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
                    $scope.createAccount = false;
                    $scope.register = {};
                    $scope.registerForm.$setPristine();
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
            $cookies.remove("loggedIn");
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

    $scope.getUserSharedNotes = function() {
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                type: 'getUserSharedNotes'
            }
        }).then(function (data) {
            console.log(data.data);
            $scope.userNotes = data.data;
            $scope.activeItem = 'sharedNotes';
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

    $scope.shareNote = function(username,valid) {
        if(valid && !$scope.usernameAvailable) {
            $http({
                method: "POST",
                url: "/ajax/ajax.php",
                data: {
                    username: username,
                    noteID: $scope.shareNoteID,
                    type: 'shareNote'
                }
            }).then(function (data) {
                console.log(data);
                $scope.closeModal();
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
                data = data.data[0];
                //console.log(data);
               //console.log(data.data.lastUpdated);
                $scope.noteActive = {
                    id: data.id,
                    active: true,
                    title: data.title,
                    content: data.content,
                    lastUpdated: data.lastUpdated,
                    dateAdded: data.dateAdded,
                    edit: false
                };
                $scope.getUserNotes();
                console.log($scope.noteActive);
            });
        }
    };

    $scope.restoreNote = function(id,e) {
        e.stopPropagation();
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                id: id,
                type: 'restoreNote'
            }
        }).then(function (data) {

            $scope.getUserNotes();
            console.log($scope.noteActive);
        });
    };

    $scope.activateNote = function(id,title,content,dateAdded,lastUpdated) {
        $scope.noteActive = {
            id: id,
            active: true,
            title: title,
            content: content,
            dateAdded: dateAdded,
            lastUpdated: lastUpdated
        }
    };

    $scope.checkUsername = function(username) {
        $http({
            method: "POST",
            url: "/ajax/ajax.php",
            data: {
                username: username,
                type: 'checkUsername'
            }
        }).then(function (data) {
            console.log(data.data == 'yes');
            $scope.usernameAvailable = data.data == 'yes';
        });
    };

    $scope.showModal = function(e,noteID) {
        e.stopPropagation();
        $scope.shareNoteModel = true;
        $scope.shareNoteID = noteID;
    };

    $scope.closeModal = function() {
        $scope.shareNoteModel = false;
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

}).filter('dateToISO', function() {
    return function(input) {
        return new Date(input).toISOString();
    };
});

//    .directive('sameAs', function() {
//    return {
//        require: 'ngModel',
//        link: function(scope, elem, attrs, ngModel) {
//            ngModel.$parsers.unshift(validate);
//
//            // Force-trigger the parsing pipeline.
//            scope.$watch(attrs.sameAs, function() {
//                ngModel.$setViewValue(ngModel.$viewValue);
//            });
//
//            function validate(value) {
//                var isValid = scope.$eval(attrs.sameAs) == value;
//
//                ngModel.$setValidity('same-as', isValid);
//
//                return isValid ? value : undefined;
//            }
//        }
//    };
//});

