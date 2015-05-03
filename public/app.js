/* scripts/app.js */

(function(){

    'use strict';

    var languvel = angular.module('languvel', [
        'ngResource',
        'ui.bootstrap',
        'ui.router'
    ]);

    languvel.config(['$httpProvider', function($httpProvider){
        $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    }]);

    languvel.config(function($stateProvider, $urlRouterProvider, $locationProvider){

        //
        // For any unmatched url, redirect to /state1
        $urlRouterProvider.otherwise(function($injector, $location){
            return "state1";
        });

        //
        // Now set up the states
        $stateProvider
            .state('state1', {
                url: "/state1",
                templateUrl: "/shared/state1/state1.html"
            })
            .state('state2', {
                url: "/state2",
                templateUrl: "/shared/state2/state2.html"
            })
            .state('sectionA', {
                url: "/sectionA",
                controller: function(tabFactory){
                    tabFactory.changeTab('sectionA');
                }
            })
            .state('sectionB', {
                url: "/sectionB",
                controller: function($rootScope, tabFactory){
                    tabFactory.getTab2($rootScope.user.id);
                    tabFactory.changeTab('sectionB');
                }
            })
            .state('dropdown1', {
                url: "/dropdown1",
                controller: function(tabFactory){
                    tabFactory.changeTab('dropdown1');
                }
            })
            .state('dropdown2', {
                url: "/dropdown2",
                controller: function(tabFactory){
                    tabFactory.changeTab('dropdown2');
                }
            })
        ;

        $locationProvider
            .html5Mode({
                enabled: true,
                requireBase: false
            })
    });

})();