angular.module('languvel').factory('tabFactory', function($rootScope){
    return {
        changeTab: function(tab){
            $rootScope.tabs = {};
            $rootScope.tabs[tab] = 'active';
        }
    }
});