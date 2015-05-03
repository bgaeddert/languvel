angular.module('languvel').controller('userController', function($scope, $window, $http, $sce, $filter, $compile, $timeout, userFactory ){

    $scope.users = "Click to see...";
    $scope.testUsers = "Click to see...";

    $scope.onGetUsers = function(user_id){
        requestData = {};
        requestData.id = user_id;
        userFactory.getUsers(requestData).success(function(dataResponse){
            $scope.users = dataResponse.name;
        });
    };

    $scope.onPostTest = function(user_id){
        requestData = {};
        requestData.id = user_id;
        userFactory.postTest(requestData).success(function(dataResponse){
            $scope.testUsers = dataResponse.name;
        });
    }

});