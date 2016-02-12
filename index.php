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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Note Taking</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body ng-controller="controller" class="ng-cloak">
        <div id="logIn" ng-if="!loggedIn">
            <div id="loginFormContain">
                <div class="logo">
                    <i class="fa fa-pencil-square"></i>
                </div>
                <div id="register" ng-show="createAccount">
                    <form name="registerForm" ng-submit="register(register.username,register.password1,register.password2,register.email1,register.email2,registerForm.$valid)" novalidate>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" ng-model="register.username" ng-required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email1" ng-model="register.email1" ng-required="true">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Confirm Email" name="email2" ng-model="register.email2" ng-required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password1" ng-model="register.password1" ng-required="true">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password2" ng-model="register.password2" ng-required="true">
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
            <nav class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><i class="fa fa-pencil-square"></i></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="pull-right"><button class="btn btn-primary" ng-click="logOut()">Logout</button></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <div id="notesSidebar">
                <h3 ng-click="noteActive.active = false"><i class="fa fa-plus-circle"></i> New Note</h3>
                <h3 ng-class="{'active': activeItem == 'myNotes'}" ng-click="getUserNotes()"><i class="fa fa-book"></i> My Notes</h3>
                <h3 ng-class="{'active': activeItem == 'sharedNotes'}"><i class="fa fa-share-alt-square"></i> Shared Notes</h3>
                <h3 ng-class="{'active': activeItem == 'trash'}" ng-click="getUserTrashedNotes()"><i class="fa fa-trash"></i> Trash</h3>
            </div>
            <div id="contain">
                <div class="col-md-6">
                    <div class="row">
                        <div id="notesSection">
                            <div class="note" ng-repeat="note in userNotes" ng-click="activateNote(note.id,note.title,note.content)">
                                <div class="options pull-right">
                                    <i class="fa fa-trash" ng-click="deleteNote(note.id,$event)"></i>
                                    <i class="fa fa-share-square"></i>
                                </div>
                                <h2 class="title">{{note.title}}</h2>
                                <div class="content">{{note.content | limitTo:300}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div id="rightSide">
                            <div class="col-xs-12">
                                <div ng-if="noteActive.active && !noteActive.edit">
                                    <div class="options pull-right">
                                        <i class="fa fa-pencil-square-o" ng-click="noteActive.edit = true"></i>
                                    </div>
                                    <h1>{{noteActive.title}}</h1>
                                    <p>{{noteActive.content}}</p>
                                </div>
                                <div ng-if="!noteActive.active">
                                    <h1 class="pull-left">Add a Note</h1>
                                    <div id="newNoteSection">
                                        <form ng-submit="addNewNote(newNote.title,newNote.content,newNoteForm.$valid)" name="newNoteForm" novalidate>
                                            <input type="text" placeholder="Title" name="title" class="form-control" ng-model="newNote.title">
                                            <textarea rows="20" name="content" class="form-control" ng-model="newNote.content"></textarea>
                                            <button class="btn btn-primary" type="submit" ng-class="{'disabled': newNoteForm.$invalid}">Add</button>
                                        </form>
                                    </div>
                                </div>
                                <div ng-if="noteActive.active && noteActive.edit">
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
        <script src="js/controller.js"></script>
    </body>
</html>