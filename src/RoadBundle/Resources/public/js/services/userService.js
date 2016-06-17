function userService($http){
	return {
		getAll: function(){
			return $http.get('app_dev.php/dashboard/get/groupe.json');
		},
		create: function(user){
			return $http.post('app_dev.php/membre/create/1.json', user);
		},
		get: function(){
			return $http.get('app_dev.php/membre/get/1.json');
		}
	}
}
