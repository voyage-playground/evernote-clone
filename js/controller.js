'use strict';

var app = angular.module('noteApp', ['ngCookies','validation.match']);

app.controller('controller', function($scope,$http,$cookies,$window) {

    //Angular loaded
    $scope.loaded = true;

    //Handle resize for layout changes
    var w = angular.element($window);
    w.bind('resize', function () {
        $scope.windowSize = window.innerWidth;
        $scope.isMobile = window.innerWidth < 961;
        $scope.$apply();
    });

    //Current window size
    $scope.windowSize = window.innerWidth;

    //Are we on mobile sizing?
    $scope.isMobile = window.innerWidth < 961;

    //Is user logged in?
    $scope.loggedIn = $cookies.get('loggedIn') ? true : false;

    //Logged in username
    $scope.activeUser = $cookies.get('loggedIn');
    $scope.createAccount = false;
    $scope.loginError = false;

    //User middle note section
    $scope.userNotes = {};
    $scope.newNote = {};
    //Active note viewing
    $scope.noteActive = {
        active: false
    };

    //Mobile active page
    $scope.mobileActive = 'notes';

    //Share note model
    $scope.shareNoteModel = false;

    //Id of note to share
    $scope.shareNoteID = false;

    //Username is available
    $scope.usernameAvailable = false;

    //Active item on side
    $scope.activeItem = 'myNotes';

    $scope.register = {};

    /**
     * Log's in a user
     * @param username
     * @param password
     * @param valid
     */
    $scope.logIn = function(username,password,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/login",
                data: {
                    username: username,
                    password: password
                }
            }).then(function (data) {
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

    /**
     * Register Account
     * @param username
     * @param password1
     * @param password2
     * @param email1
     * @param email2
     * @param valid
     */
    $scope.registerAccount = function(username,password1,password2,email1,email2,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/createAccount",
                data: {
                    username: username,
                    password1: password1,
                    password2: password2,
                    email1: email1,
                    email2: email2
                }
            }).then(function (data) {
                if (data.data == 'success') {
                    $scope.createAccount = false;
                    $scope.register = {};
                    $scope.registerForm.$setPristine();
                }
            });
        }
    };

    /**
     * Log's out a user
     */
    $scope.logOut = function() {
        $http.post("/ajax/logout").then(function () {
            $scope.loggedIn = false;
            $cookies.remove("loggedIn");
        });
    };

    /**
     * Get's user notes for middle section
     */
    $scope.getUserNotes = function() {
        $http.post("/ajax/getUserNotes").then(function (data) {
            $scope.userNotes = data.data;
            $scope.activeItem = 'myNotes';
            $scope.mobileActive = 'notes';
        });
    };

    /**
     * Get's user trashed notes
     */
    $scope.getUserTrashedNotes = function() {
        $http.post("/ajax/getUserTrashedNotes").then(function (data) {
            $scope.userNotes = data.data;
            $scope.activeItem = 'trash';
            $scope.mobileActive = 'notes';
        });
    };

    /**
     * Get's user shared notes
     */
    $scope.getUserSharedNotes = function() {
        $http.post("/ajax/getUserSharedNotes").then(function (data) {
            $scope.userNotes = data.data;
            $scope.activeItem = 'sharedNotes';
            $scope.mobileActive = 'notes';
        });
    };

    /**
     * Add a new note
     *
     * @param title
     * @param content
     * @param valid
     */
    $scope.addNewNote = function(title,content,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/addNewNote",
                data: {
                    title: title,
                    content: content
                }
            }).then(function (data) {
                if (data.data == 'success') {
                    $scope.getUserNotes();
                    $scope.newNote = {};
                }
            });
        }
    };

    /**
     * Share a note with another user
     *
     * @param username
     * @param valid
     */
    $scope.shareNote = function(username,valid) {
        if(valid && !$scope.usernameAvailable) {
            $http({
                method: "POST",
                url: "/ajax/shareNote",
                data: {
                    username: username,
                    noteID: $scope.shareNoteID
                }
            }).then(function () {
                $scope.closeModal();
            });
        }
    };

    /**
     * Delete a note
     *
     * @param id
     * @param e
     */
    $scope.deleteNote = function(id,e) {
        e.stopPropagation();
        $http({
            method: "POST",
            url: "/ajax/deleteNote",
            data: {
                id: id
            }
        }).then(function (data) {
            if (data.data == 'success') {
                $scope.getUserNotes();
            }
        });
    };

    /**
     * Update a note
     *
     * @param id
     * @param content
     * @param title
     * @param valid
     */
    $scope.updateNote = function(id,content,title,valid) {
        if (valid) {
            $http({
                method: "POST",
                url: "/ajax/updateNote",
                data: {
                    id: id,
                    content: content,
                    title: title
                }
            }).then(function (data) {
                data = data.data[0];
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
            });
        }
    };

    /**
     * Restore a note after being deleted
     *
     * @param id
     * @param e
     */
    $scope.restoreNote = function(id,e) {
        e.stopPropagation();
        $http({
            method: "POST",
            url: "/ajax/restoreNote",
            data: {
                id: id
            }
        }).then(function () {
            $scope.getUserNotes();
        });
    };

    /**
     * Activate a note on the side to read
     *
     * @param id
     * @param title
     * @param content
     * @param dateAdded
     * @param lastUpdated
     */
    $scope.activateNote = function(id,title,content,dateAdded,lastUpdated) {
        $scope.noteActive = {
            id: id,
            active: true,
            title: title,
            content: content,
            dateAdded: dateAdded,
            lastUpdated: lastUpdated
        };
        $scope.mobileActive = 'newNote';
    };

    /**
     * Check if a username is available
     *
     * @param username
     */
    $scope.checkUsername = function(username) {
        $http({
            method: "POST",
            url: "/ajax/checkUsername",
            data: {
                username: username
            }
        }).then(function (data) {
            $scope.usernameAvailable = data.data == 'yes';
        });
    };

    /**
     * Show the share modal
     * @param e
     * @param noteID
     */
    $scope.showModal = function(e,noteID) {
        e.stopPropagation();
        $scope.shareNoteModel = true;
        $scope.shareNoteID = noteID;
    };

    /**
     * Close the share modal
     */
    $scope.closeModal = function() {
        $scope.shareNoteModel = false;
    };

    /**
     * Show new note section
     */
    $scope.showNewNote = function() {
        $scope.noteActive.active = false;
        $scope.mobileActive = 'newNote';
    };

    //on app load
    $http.post("/ajax/checkUserStatus").then(function (data) {
        if (data.data == 'yes') {
            $scope.loggedIn = true;
            $scope.getUserNotes();
        }
    });

});

