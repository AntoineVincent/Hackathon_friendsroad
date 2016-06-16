function signupController($scope, $location, $timeout, userService, $location) {
    $scope.nextStep = 1;
    $scope.utilisateurs = ['mail0'];
    var index = 1;
    $scope.username = "";
    $scope.data = {};
    $scope.suivant = function(){
      $scope.nextStep += 1;
      console.log($scope.nextStep);
    }
    $scope.add = function (){
      $scope.utilisateurs.push('mail'+index);
      index++;
    }
    $scope.valider = function (){
      console.log($scope.data);
      $location.path('/groupe');
    }
    $scope.signup = function() {
        userService.create($scope.user).then(function (res) {
            $scope.username = res.data.username;
            $timeout(function(){ $location.path('/'); }, 2000);
        }).catch(function (res) {
            $scope.signupMessage.title = "Signup error";
            $scope.signupMessage.message = res.data;
        });
    }
}
