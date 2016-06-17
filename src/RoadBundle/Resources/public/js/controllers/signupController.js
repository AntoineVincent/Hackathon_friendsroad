function signupController($scope, $location, $timeout, userService, $location, $rootScope) {
    $scope.nextStep = 1;
    $scope.groupe = {};
    $scope.groupe.users = [];
    $scope.user = {};

    var index = 1;
    $scope.username = "";
    $scope.data = {};

    $scope.valider = function (){
      $scope.groupe.users.push($scope.user);
      $rootScope.groupe = $scope.groupe;
      sessionStorage.setItem('groupe',JSON.stringify($scope.groupe));
      $location.path('/groupe');
    }
    // $scope.signup = function() {
    //     userService.create($scope.user).then(function (res) {
    //         $scope.username = res.data.username;
    //         $timeout(function(){ $location.path('/'); }, 2000);
    //     }).catch(function (res) {
    //         $scope.signupMessage.title = "Signup error";
    //         $scope.signupMessage.message = res.data;
    //     });
    // }
}
