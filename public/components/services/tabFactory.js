angular.module('languvel').factory('tabFactory', function($rootScope,$http,$sce){
    return {
        changeTab: function(tab){
            $rootScope.tabs = {};
            $rootScope.tabs[tab] = 'active';
        },
        getTab2: function(id){
            var url = '/api/user/' + id;
            var response = $http({
                method: "get",
                url: url
            });
            response.success(function(response){
                $rootScope.tab2 = $sce.trustAsHtml(response);
            });
        }
    }
});