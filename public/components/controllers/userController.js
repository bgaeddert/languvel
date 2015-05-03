angular.module('languvel').controller('userController', function($rootScope,$scope, $window, $http, $sce, $filter, $compile, $timeout, userFactory ){

    $rootScope.users = "Username";
    $rootScope.testUsers = "Username";
    $rootScope.tabs = {};
    $rootScope.tabs.sectionA = 'active';

    $scope.onGetUsers = function(){
        userFactory.getUsers().success(function(dataResponse){
            $scope.users = dataResponse.name;
        });
    };

    $scope.onPostTest = function(){
        userFactory.postTest().success(function(dataResponse){
            $scope.testUsers = dataResponse.name;
        });
    }

});