angular.module('languvel').controller('userController', function($scope, $window, $http, $sce, $filter, $compile, $timeout, userFactory ){

    $scope.users = "Username";
    $scope.testUsers = "Username";

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