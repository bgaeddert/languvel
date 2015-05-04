angular.module('languvel').controller('userController', function($rootScope, $scope, $window, $http, $sce, $filter, $compile, $timeout, userFactory ){

    $rootScope.user = {id:null};

    $scope.users = "Click to see...";
    $scope.postResponse = "Click to see...";

    $scope.onGetUsers = function(user_id){
        requestData = {};
        requestData.id = user_id;
        userFactory.getUsers(requestData).success(function(dataResponse){
            $scope.users = dataResponse.name;
        });
    };

    $scope.onPostTest = function(textInput){
        requestData = {};
        requestData.textInput = textInput;
        userFactory.postTest(requestData).success(function(dataResponse){
            $scope.postResponse = dataResponse;
        });
    }

});