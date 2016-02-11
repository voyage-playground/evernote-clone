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
                <p>Sign Up</p>
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
                            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                            <li><a href="#" ng-click="logOut()">Logout</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <div id="notesSidebar">
                <h2><i class="fa fa-plus-circle"></i> New Note</h2>
                <h2>My Notes</h2>
                    <ul>
                        <li>Note 1</li>
                        <li>Note 2</li>
                        <li>Note 3</li>
                    </ul>
                <h2>Shared Notes</h2>
                <ul>
                    <li>Note 1</li>
                    <li>Note 2</li>
                    <li>Note 3</li>
                </ul>
            </div>
            <div id="contain">
                <div class="col-md-6">
                    <div class="row">
                        <div class="note">
                            <h2 class="title">Sample Note</h2>
                            <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lacus quam, interdum bibendum feugiat eget, ornare vitae tellus. Proin congue sapien pharetra facilisis dictum. Etiam vitae purus pretium, facilisis purus in, vestibulum tellus. Integer tempor congue velit ac pretium. Vivamus vitae quam in leo mollis tempus. Proin condimentum semper luctus. Fusce tincidunt blandit arcu, eget scelerisque tortor commodo et.</div>
                        </div>
                        <div class="note">
                            <h2 class="title">Sample Note2</h2>
                            <div class="content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lacus quam, interdum bibendum feugiat eget, ornare vitae tellus. Proin congue sapien pharetra facilisis dictum. Etiam vitae purus pretium, facilisis purus in, vestibulum tellus. Integer tempor congue velit ac pretium. Vivamus vitae quam in leo mollis tempus. Proin condimentum semper luctus. Fusce tincidunt blandit arcu, eget scelerisque tortor commodo et.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1>Add a Note</h1>
                    <div id="newNoteSection">
                        <form>
                            <input type="text" placeholder="Title" name="title" class="form-control">
                            <textarea rows="20" name="content" class="form-control"></textarea>
                            <button class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
        <script src="js/controller.js"></script>
    </body>
</html>