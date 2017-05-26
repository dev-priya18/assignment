app = angular.module('assignmentProject', ['ui.router', 'oc.lazyLoad', 'ngSanitize','ui.tree']);
app.config(['$stateProvider', '$locationProvider', '$httpProvider', '$urlRouterProvider', '$ocLazyLoadProvider', function($stateProvider, $locationProvider, $httpProvider, $urlRouterProvider, $ocLazyLoadProvider ) {
    $ocLazyLoadProvider.config({
        debug: true
            // global configs go here
    });
    $urlRouterProvider.otherwise('/');
    $stateProvider.state('Home', {
            url: '/',
            templateUrl: site_url + 'template/home/index',
            data: {
                pageTitle: 'Test',
                routename: 'Home'
            },
            controller: 'HomeCtrl',
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        insertBefore: '#ng_load_plugins_before',
                        files: ['assets/front/js/controller/HomeCtrl.js'],
                        serie: true
                    });
                }]
            }
        })
    $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
    $locationProvider.html5Mode(true);
}]);
app.run(['$rootScope', '$location', '$state', function($rootScope, $location, $state, auth) {
    $rootScope.$state = $state;
    $rootScope.previousLocation = '/';
    $rootScope.currentLocation = '/';
    $rootScope.pageTitle = 'Test';
    $rootScope.showGlobalLoader = false;
    /** Simply switch the Locations and save the new to current */
    $rootScope.$on("$locationChangeStart", function(e, currentLocation, previousLocation) {
        $rootScope.previousLocation = $rootScope.currentLocation;
        $rootScope.currentLocation = $location.path();
        $rootScope.showGlobalLoader = true;
    });
   
}]);
