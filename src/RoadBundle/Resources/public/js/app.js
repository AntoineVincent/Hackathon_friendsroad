function config($routeProvider, $httpProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'http://localhost/Hackathon_friendsroad/web/bundles/road/views/connect.html',
            controller: 'connectController'
        })
        .when('/signup', {
            templateUrl: 'http://localhost/Hackathon_friendsroad/web/bundles/road/views/signup.html',
            controller: 'signupController'
        })
        .when('/groupe', {
            templateUrl: 'http://localhost/Hackathon_friendsroad/web/bundles/road/views/groupe.html',
            controller: 'groupeController'
        })
        .otherwise({
            redirectTo: '/'
        });

    // $httpProvider.interceptors.push(function ($q, $location, $rootScope) {
    //    return {
    //        'request': function (config) {
    //            config.headers = config.headers || {};
    //            if ($rootScope.token) {
    //                config.headers.authorization = $rootScope.token;
    //            }
    //            return config;
    //        },
    //        'responseError': function (response) {
    //            if (response.status === 401 || response.status === 403) {
    //                $location.path('/');
    //            }
    //            return $q.reject(response);
    //        }
    //    };
    // });
}

function checkIsConnected($q, $http, $rootScope, $location) {
    // var deferred = $q.defer();
    //
    // $http.get('/api/loggedin').success(function () {
    //     // Authenticated
    //     deferred.resolve();
    // }).error(function () {
    //     // Not Authenticated
    //     deferred.reject();
    //     $location.url('/login');
    // });
    //
    // return deferred.promise;
};


function run($rootScope, $location, connectService) {
    $rootScope.loginMessage = {};
    $rootScope.loginMessage.title = '';
    $rootScope.loginMessage.message = '';

    // Watch path
    var path = function () {
        return $location.path();
    };
    $rootScope.$watch(path, function (newVal, oldVal) {
        $rootScope.activetab = newVal;
    });

    // Logout
    $rootScope.logout = function () {
        $rootScope.token = null;
        $rootScope.user = null;
        $rootScope.loginMessage.title = '';
        $rootScope.loginMessage.message = '';
        // connectService.disconnect().then(function () {
        //     $location.url('/login');
        // })
    }

}

function checkPassword() {
    return {
        require: 'ngModel',
        link: function (scope, elem, attrs, ctrl) {
            var firstPassword = '#' + attrs.checkPassword;
            elem.add(firstPassword).on('keyup', function () {
                scope.$apply(function () {
                    var v = elem.val() === $(firstPassword).val();
                    ctrl.$setValidity('passwordMatch', v);
                });
            });
        }
    }
}



angular.module('app', ['ngRoute','ngMap'])
    .config(config)
    .directive('checkPassword', checkPassword)
    .service('connectService', connectService)
    .service('userService', userService)
    .controller('connectController', connectController)
    .controller('groupeController', groupeController)
    .controller('signupController', signupController)
    .run(run);
