var eventsControllers = angular.module('eventsControllers', []);

eventsControllers.controller('EventsController', ['$scope', '$http', function($scope, $http){

    $http.get('assets/data/events.json').success(function(data){
        $scope.events = data;
        $scope.direction = '';
        $scope.attr = 'name';

        //initialising model values
        //$scope.query = "Jobith";
        
        console.log('data added');
        console.info(data);
    });


}]);

var teamsControllers = angular.module('teamsControllers', []);

teamsControllers.controller('TeamsController', ['$scope', '$http', function($scope, $http){

    $http.get('assets/data/teams.json').success(function(data){
        $scope.teams = data;
        
        console.log('teams data added');
        console.info(data);
    });


}]);

var rulesControllers = angular.module('rulesControllers', []);

rulesControllers.controller('RulesController', ['$scope', '$http', function($scope, $http){

    $http.get('assets/data/rules.json').success(function(data){
        $scope.rules = data;
        
        console.log('rules data added');
        console.info(data);
    });


}]);

//eventsControllers.controller('DetailsController', ['$scope', '$http', '$routeParams', function($scope, $http, $routeParams){
//
//    $http.get('data/events.json').success(function(data){
//        
//        $scope.events = data;
//        $scope.whichEvent = $routeParams.id;
//        
//        if($routeParams.id > 0){
//            $scope.prevEvent = Number($routeParams.id) - 1;
//        }
//        else{
//            $scope.prevEvent = $scope.events.length - 1;
//        }memberID
//        
//        if($routeParams.id < $scope.events.length - 1){
//            $scope.nextEvent = Number($routeParams.id) + 1;
//        }
//        else{
//            $scope.nextEvent = 0;
//        }
//
//    });
//
//
//}]);