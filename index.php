<?php
/**
 * Created by PhpStorm.
 * User: Jaden Lemmon
 * Date: 2/11/16
 * Time: 10:29 AM
 */
?>
<!DOCTYPE html>
<html ng-app="noteApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Note Taking</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body ng-controller="controller" class="ng-cloak" ng-class="{'green': !loggedIn}" ng-show="loaded" ng-cloak>
    <div id="overlay" ng-show="shareNoteModel"></div>
        <div id="logIn" ng-show="!loggedIn">
            <div id="loginFormContain">
                <div class="logo">
                    <i class="fa fa-pencil-square"></i>
                </div>
                <div id="register" ng-show="createAccount" class="ng-cloak">
                    <form name="registerForm" ng-submit="registerAccount(register.username,register.password1,register.password2,register.email1,register.email2,registerForm.$valid)" novalidate>
                        <div class="form-group">
                            <div class="available">
                                <i class="fa fa-check-circle-o" ng-show="usernameAvailable && register.username.length > 0"></i>
                                <i class="fa fa-times-circle" ng-show="!usernameAvailable && register.username.length > 0"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" name="username"
                                   ng-model="register.username" ng-required="true" ng-change="checkUsername(register.username)">
                        </div>
                        <div class="form-group">
                            <div class="available">
                                <i class="fa fa-check-circle-o" data-ng-show="!registerForm.email2.$error.match && !registerForm.email2.$pristine"></i>
                                <i class="fa fa-times-circle" ng-show="register.email2.$error" data-ng-show="registerForm.email2.$error.match"></i>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name="email1" ng-model="register.email1" ng-required="true">
                        </div>
                        <div class="form-group">
                            <div class="available">
                                <i class="fa fa-check-circle-o" data-ng-show="!registerForm.email2.$error.match && !registerForm.email2.$pristine"></i>
                                <i class="fa fa-times-circle" ng-show="register.email2.$error" data-ng-show="registerForm.email2.$error.match"></i>
                            </div>
                            <input type="email" class="form-control" placeholder="Confirm Email" name="email2"
                                   ng-model="register.email2" ng-required="true" data-match="register.email1">
                        </div>
                        <div class="form-group">
                            <div class="available">
                                <i class="fa fa-check-circle-o" data-ng-show="!registerForm.password2.$error.match && !registerForm.password2.$pristine"></i>
                                <i class="fa fa-times-circle" ng-show="register.password2.$error" data-ng-show="registerForm.password2.$error.match"></i>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name="password1"
                                   ng-model="register.password1" ng-required="true" ng-minlength="6">
                        </div>
                        <div class="form-group">
                            <div class="available">
                                <i class="fa fa-check-circle-o" data-ng-show="!registerForm.password2.$error.match && !registerForm.password2.$pristine"></i>
                                <i class="fa fa-times-circle" ng-show="register.password2.$error" data-ng-show="registerForm.password2.$error.match"></i>
                            </div>
                            <input type="password" class="form-control" placeholder="Confirm Password"
                                   name="password2" ng-model="register.password2" ng-required="true"
                                   ng-minlength="6" data-match="register.password1">
                        </div>
                        <button type="submit" class="btn btn-primary" ng-class="{'disabled': registerForm.$invalid}">Register</button>
                    </form>
                    <p ng-click="createAccount = false">Log In</p>
                </div>
                <div ng-show="!createAccount">
                    <div class="alert alert-danger" ng-if="loginError">Your username or password is incorrect</div>
                    <form name="loginForm" ng-submit="logIn(username,password,loginForm.$valid)" novalidate>
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Username" class="form-control" ng-model="username" ng-required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control" ng-model="password" ng-required="true">
                        </div>
                        <button class="btn btn-primary" type="submit" ng-class="{'disabled': loginForm.$invalid}">Log In</button>
                    </form>
                    <p ng-click="createAccount = true">Sign Up</p>
                </div>
            </div>
        </div>
        <div ng-if="loggedIn">
            <div class="modal" tabindex="-1" role="dialog" id="shareNote" ng-show="shareNoteModel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" ng-click="closeModal()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Share Note</h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-offset-3 col-md-6 col-xs-8 col-xs-offset-2">
                                <form name="shareNoteForm" ng-submit="shareNote(shareUsername,shareNoteForm.$valid)" novalidate>
                                    <div class="form-group">
                                        <div class="available">
                                            <i class="fa fa-check-circle-o" ng-show="!usernameAvailable && shareUsername.length > 0"></i>
                                            <i class="fa fa-times-circle" ng-show="usernameAvailable && shareUsername.length > 0"></i>
                                        </div>
                                        <input class="form-control" type="text" name="shareUsername" ng-model="shareUsername"
                                               placeholder="User to share with" ng-change="checkUsername(shareUsername)" ng-required="true">
                                    </div>
                                    <button type="submit" class="btn btn-primary" ng-class="{'disabled': shareNoteForm.$invalid || usernameAvailable}">Share</button>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="">
                        <a class="navbar-brand pull-left" href="#"><i class="fa fa-pencil-square"></i></a>
                        <div id="activeUser" class="pull-left">{{activeUser}}</div>
                        <div class="pull-right"><button class="btn btn-primary" ng-click="logOut()">Logout</button></div>
                    </div>

<!--                    <div>-->
<!--                        <ul class="nav navbar-nav">-->
<!--                            <li class="pull-right"><button class="btn btn-primary" ng-click="logOut()">Logout</button></li>-->
<!--                        </ul>-->
<!--                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <div id="notesSidebar" class="trans">
                <h3 ng-class="{'active': mobileActive == 'newNote' && windowSize < 961}" ng-click="noteActive.active = false;mobileActive = 'newNote'"><i class="fa fa-plus-circle"></i> <span>New Note</span></h3>
                <h3 ng-class="{'active': activeItem == 'myNotes'}" ng-click="getUserNotes();mobileActive='notes'"><i class="fa fa-book"></i> <span>My Notes</span></h3>
                <h3 ng-class="{'active': activeItem == 'sharedNotes'}" ng-click="getUserSharedNotes();mobileActive='notes'"><i class="fa
                fa-share-alt-square"></i>
                    <span>Shared Notes</span></h3>
                <h3 ng-class="{'active': activeItem == 'trash'}" ng-click="getUserTrashedNotes()"><i class="fa fa-trash"></i> <span>Trash</span></h3>
            </div>
            <div id="contain" class="trans">
                <div class="col-md-6" ng-show="windowSize > 961 || mobileActive == 'notes'">
                    <div class="row">
                        <div id="notesSection">
                            <div class="note" ng-repeat="note in userNotes" ng-click="activateNote(note.id,note.title,note.content,note.dateAdded,note.lastUpdated)">
                                <div class="pull-left clearfix" ng-show="note.username">
                                    Shared From {{note.username}}
                                </div>
                                <div class="clearfix"></div>
                                <div class="pull-left cleafix">
                                    Last Updated: {{note.lastUpdated * 1000 | date:"MM/dd/yyyy 'at' h:mma"}}
                                </div>
                                <div class="options pull-right" ng-show="!note.username && activeItem !== 'trash'">
                                    <i class="fa fa-trash" ng-click="deleteNote(note.id,$event)"></i>
                                    <i class="fa fa-share-square" ng-click="showModal($event,note.id)"></i>
                                </div>
                                <div class="pull-right" ng-show="activeItem == 'trash'">
                                    <button class="btn btn-default" ng-click="restoreNote(note.id,$event)">Restore</button>
                                </div>
                                <h2 class="title">{{note.title}}</h2>
                                <div class="content">{{note.content | limitTo:300}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" ng-show="windowSize > 961 || mobileActive == 'newNote'">
                    <div class="row">
                        <div id="rightSide">
                            <div class="col-xs-12">
                                <div ng-if="noteActive.active && !noteActive.edit">
                                    <div class="pull-left">
                                        <p>Dated Added: {{noteActive.dateAdded * 1000 | date:"MM/dd/yyyy 'at' h:mma"}}</p>
                                        <p>Last Updated: {{noteActive.lastUpdated * 1000 | date:"MM/dd/yyyy 'at' h:mma"}}</p>
                                    </div>
                                    <div class="options pull-right">
                                        <i class="fa fa-pencil-square-o" ng-click="noteActive.edit = true"></i>
                                    </div>
                                    <div class="row col-xs-12">
                                        <h1>{{noteActive.title}}</h1>
                                        <pre>{{noteActive.content}}</pre>
                                    </div>
                                </div>
                                <div ng-show="!noteActive.active">
                                    <h1 class="pull-left">Add a Note</h1>
                                    <div id="newNoteSection">
                                        <form ng-submit="addNewNote(newNote.title,newNote.content,newNoteForm.$valid)" name="newNoteForm" novalidate>
                                            <input type="text" placeholder="Title" name="title" class="form-control" ng-model="newNote.title" ng-required="true">
                                            <textarea rows="20" name="content" class="form-control" ng-model="newNote.content" ng-required="true"></textarea>
                                            <button class="btn btn-primary" type="submit" ng-class="{'disabled': newNoteForm.$invalid}">Add</button>
                                        </form>
                                    </div>
                                </div>
                                <div ng-show="noteActive.active && noteActive.edit">
                                    <h1>Edit Note</h1>
                                    <div id="noteEditSection">
                                        <form ng-submit="updateNote(noteActive.id,noteActive.content,noteActive.title,editNoteForm.$valid)" name="editNoteForm" novalidate>
                                            <input type="text" placeholder="Title" name="title" class="form-control" ng-model="noteActive.title">
                                            <textarea rows="20" name="content" class="form-control" ng-model="noteActive.content"></textarea>
                                            <button class="btn btn-primary" type="submit" ng-class="{'disabled': editNoteForm.$invalid}">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-cookies.js"></script>
        <script src="js/angular-validation-match.min.js"></script>
        <script src="js/controller.js"></script>
    </body>
</html>