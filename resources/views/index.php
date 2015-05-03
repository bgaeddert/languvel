<!-- resources/views/index.php -->

<!doctype html>
<html ng-app="languvel">
<head>
    <title>Languvel</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <!--<link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.css">-->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body ng-cloak>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Languvel</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-------------------------------------------------------
                    Setting the target to self allows the following
                    link to bypass the ui-router and call the laravel
                    router directly to redirect to the log out page
                -------------------------------------------------------->
                <li><a href="/auth/logout" target="_self">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div ui-view></div>
            <!-- We'll also add some navigation: -->
            <a ui-sref="state1">State 1</a>
            <a ui-sref="state2">State 2</a>
        </div>

        <div ng-controller="userController">

            <div class="col-md-4">
                <h3>{{users}}</h3>

                <button ng-click="onGetUsers()">GET USERS</button>
            </div>
            <div class="col-md-4">
                <h3>{{testUsers}}</h3>

                <button ng-click="onPostTest()">POST TEST</button>
            </div>

        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Profile</a></li>
                <li role="presentation"><a href="#">Messages</a></li>
            </ul>
        </div>
    </div>
</div>

</body>

<!-- Application Dependencies -->
<script type="text/javascript" src="/assets/bower_components/angular/angular.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular-resource/angular-resource.js"></script>
<script type="text/javascript" src="/assets/bower_components/moment/moment.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular-ui-router/release/angular-ui-router.js"></script>

<!-- Application Scripts -->
<script type="text/javascript" src="/app.js"></script>
<script type="text/javascript" src="/components/controllers/userController.js"></script>
<script type="text/javascript" src="/components/services/userFactory.js"></script>
</html>