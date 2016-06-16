function connectController($scope, $rootScope, $location, connectService){
	$('body').css({'background':'url("./assets/bg-accueil.jpg") cover'});
	$rootScope.connect = false;
	$scope.connect = function (){
		console.log('kkklklkl');
	}
	// $scope.connect = function(){
	// 	connectService.connect($scope.user).then(function(res){
	// 		$rootScope.token = res.data.token;
  //     $rootScope.user = res.data.user;
	// 		$location.path('/');
	// 	}).catch(function(){
	// 		$rootScope.loginMessage.title = "Connexion error";
	// 		$rootScope.loginMessage.message = "Error login or password";
	// 	});
	// }
}
