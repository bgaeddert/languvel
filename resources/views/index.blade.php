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
            <div class="well">
                This changes between angular partials.<br>
                Using the ui-router.
            </div>
            <div ui-view></div>
            <!-- We'll also add some navigation: -->
            <a ui-sref="state1">State 1</a>
            <a ui-sref="state2">State 2</a>
        </div>

        <div ng-controller="userController">

            <div class="col-md-4">
                <div class="well">
                    This calls a GET API route using the laravel router.<br>
                    And returns the first users name.
                </div>

                <!-------------------------------------------------------
                    Using @ before the brackets tells blade to ignore
                    it but angular to still see it.
                -------------------------------------------------------->
                <h3>@{{users}}</h3>

                <button ng-click="onGetUsers()">GET USERS</button>
            </div>
            <div class="col-md-4">

                <div class="well">
                    This calls a POST API route using the laravel router.<br>
                    And returns the first users name.
                </div>

                <h3>@{{testUsers}}</h3>

                <button ng-click="onPostTest()">POST TEST</button>
            </div>

        </div>
    </div>
    <hr>
    <div class="row" ng-controller="tabController">
        <div class="col-md-12">
            <div class="well">
                The tabs are controlled by the ui-router. Using the controller function to change a $rootScope object.
            </div>
        </div>
        <div class="col-md-12">
            <ul class="nav nav-tabs">
                <li class="@{{tabs.sectionA}}"><a data-toggle="tab" href="sectionA">Section A</a></li>
                <li class="@{{tabs.sectionB}}"><a data-toggle="tab" href="sectionB">Section B</a></li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="@{{tabs.sectionC}}"><a data-toggle="tab" href="sectionC">sectionC</a></li>
                        <li class="@{{tabs.sectionD}}"><a data-toggle="tab" href="sectionD">sectionD</a></li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div id="sectionA" class="tab-pane fade in @{{tabs.sectionA}}">
                    <h3>Section A</h3>
                    @include('blades.tab1')
                </div>
                <div id="sectionB" class="tab-pane fade in @{{tabs.sectionB}}">
                    <h3>Section B</h3>
                    @include('blades.tab2')
                </div>
                <div id="sectionC" class="tab-pane fade in @{{tabs.sectionC}}">
                    <h3>Dropdown 1</h3>

                    <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam
                        dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat
                        ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non
                        porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
                </div>
                <div id="sectionD" class="tab-pane fade in @{{tabs.sectionD}}">
                    <h3>Dropdown 2</h3>

                    <p>Donec vel placerat quam, ut euismod risus. Sed a mi suscipit, elementum sem a, hendrerit velit.
                        Donec at erat magna. Sed dignissim orci nec eleifend egestas. Donec eget mi consequat massa
                        vestibulum laoreet. Mauris et ultrices nulla, malesuada volutpat ante. Fusce ut orci lorem.
                        Donec molestie libero in tempus imperdiet. Cum sociis natoque penatibus et magnis.</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

<!-- Application Dependencies -->
<script type="text/javascript" src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular/angular.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular-resource/angular-resource.js"></script>
<script type="text/javascript" src="/assets/bower_components/moment/moment.js"></script>
<script type="text/javascript" src="/assets/bower_components/angular-ui-router/release/angular-ui-router.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>


<!-- Application Scripts -->
<script type="text/javascript" src="/app.js"></script>
<script type="text/javascript" src="/components/controllers/userController.js"></script>
<script type="text/javascript" src="/components/controllers/tabController.js"></script>
<script type="text/javascript" src="/components/services/userFactory.js"></script>
<script type="text/javascript" src="/components/services/tabFactory.js"></script>
</html>