<!-- resources/views/index.php -->

<!doctype html>
<html ng-app="languvel">
<head>
    <title>Languvel</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/bower_components/bootstrap/dist/css/bootstrap.css">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body ng-cloak>
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
            <li><a href="/auth/logout">Logout</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-expanded="false">USERNAME<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</nav>

<div ui-view></div>
<!-- We'll also add some navigation: -->
<a ui-sref="state1">State 1</a>
<a ui-sref="state2">State 2</a>

<div ng-controller="userController" >

    <div class="col-md-6">
        <h3>{{users}}</h3>

        <button ng-click="onGetUsers()">GET USERS</button></div>
    <div class="col-md-6">
        <h3>{{testUsers}}</h3>

        <button ng-click="onPostTest()">POST TEST</button>
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