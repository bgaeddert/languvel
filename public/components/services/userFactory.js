angular.module('languvel').factory('userFactory', function($http){
    return {
        getUsers: function(requestData){
            var url = '/api/users';
            var response = $http({
                method: "get",
                url: url,
                //data: requestData
            });
            return response;
        },
        postTest: function(requestData){
            var url = '/api/users';
            var response = $http({
                method: "get",
                url: url,
                //data: requestData
            });
            return response;
        }
    }
});