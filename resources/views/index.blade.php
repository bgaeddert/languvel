<!-- resources/views/index.php -->

<!doctype html>
<html ng-app="languvel">
<head>
    <title>Languvel</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/app.css">
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span
                                class="glyphicon glyphicon-user"></span> {{ $user->name }} <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <!-------------------------------------------------------
                            Setting the target to self allows the following
                            link to bypass the ui-router and call the laravel
                            router directly to redirect to the log out page
                        -------------------------------------------------------->
                        <li><a href="/auth/logout" target="_self">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div id="first-row" class="row">
        <div class="col-md-4">
            <div class="well">
                This changes between angular partials using the ui-router.<br>
                The user data seen here is from an angular model.
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
                    And returns the logged in users name.
                </div>

                <!-------------------------------------------------------
                    Using @ before the brackets tells blade to ignore
                    it but angular to still see it.
                -------------------------------------------------------->
                <div class="row">
                    <div class="col-md-12">
                        <h3>@{{users}}</h3>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" ng-click="onGetUsers({{ $user->id }})">GET USERS</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="well">
                    This calls a POST API route using the laravel router.<br>
                    Posts what you type to a laravel controller that returns it
                    to Angular to display.
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h3>@{{postResponse}}</h3>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary" ng-click="onPostTest(textInput)">POST TEST</button>
                    </div>

                    <div class="col-md-8">
                        <input class="form-control" ng-model="textInput" placeholder="Type then click."/>
                    </div>
                </div>

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

                <!------------------------------------------------------------------------
                    All the tab classes nested under dropdown to make dropdown tab active
                -------------------------------------------------------------------------->
                <li class="dropdown @{{tabs.dropdown1}} @{{tabs.dropdown2}}">
                    <a data-toggle="dropdown" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="@{{tabs.dropdown1}}"><a data-toggle="tab" href="dropdown1">Dropdown 1</a></li>
                        <li class="@{{tabs.dropdown2}}"><a data-toggle="tab" href="dropdown2">Dropdown 2</a></li>
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

                    <div ng-bind-html="tab2"></div>
                </div>
                <div id="sectionC" class="tab-pane fade in @{{tabs.dropdown1}}">
                    <h3>Dropdown 1</h3>

                    <p>WInteger convallis, nulla in sollicitudin placerat, ligula enim auctor lectus, in mollis diam
                        dolor at lorem. Sed bibendum nibh sit amet dictum feugiat. Vivamus arcu sem, cursus a feugiat
                        ut, iaculis at erat. Donec vehicula at ligula vitae venenatis. Sed nunc nulla, vehicula non
                        porttitor in, pharetra et dolor. Fusce nec velit velit. Pellentesque consectetur eros.</p>
                </div>
                <div id="sectionD" class="tab-pane fade in @{{tabs.dropdown2}}">
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

<script>
    angular.element(document).ready(function(){
        var appElement = document.querySelector('[ng-app=languvel]');
        var appScope = angular.element(appElement).scope();
        appScope.user = {!!$user!!};
        equalize_heights('#first-row .well');
    });

    function equalize_heights(elem){
        // Get an array of all element heights
        var elementHeights = $(elem).map(function(){
            return $(this).height();
        }).get();

        // Math.max takes a variable number of arguments
        // `apply` is equivalent to passing each height as an argument
        var maxHeight = Math.max.apply(null, elementHeights);

        // Set each height to the max height
        $(elem).height(maxHeight);
        return $(elem);
    }
</script>
</html>