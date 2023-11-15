var shellsApp = angular.module('shellsApp',[
    'ngRoute',
    'eventsControllers',
    'teamsControllers',
    'rulesControllers'
]);

//shellsApp.config(['$routeProvider', function($routeProvider){
//    $routeProvider.
//    
//    when('/Events',{
//        templateUrl: 'partials/events.html',
//        controller: 'EventsController'
//    }).
//    
//    when('/Details/:id',{
//        templateUrl: 'partials/details.html',
//        controller: 'EventsController'
//    }).
//    
//    otherwise({
//        redirectTo : '/home',
//        controller: 'EventsController'
//    });
//}]);