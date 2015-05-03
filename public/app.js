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
                controller: function(tabFactory){
                    tabFactory.changeTab('sectionB');
                }
            })
            .state('sectionC', {
                url: "/sectionC",
                controller: function(tabFactory){
                    tabFactory.changeTab('sectionC');
                }
            })
            .state('sectionD', {
                url: "/sectionD",
                controller: function(tabFactory){
                    tabFactory.changeTab('sectionD');
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