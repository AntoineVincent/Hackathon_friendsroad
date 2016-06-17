function groupeController($scope, $location, $timeout, userService, $location, $http, $rootScope) {
  $('body').css({'background':'url("../assets/parallax1.jpg") cover'})
  $rootScope.connect = true;
  var tabActive = [' '];
  $scope.users = {};
  $scope.groupe = 'Nom du Groupe';
  //================== INIT PARALLAX ============
    angular.element($('.parallax')).parallax();

  // ================= INIT COLLAPSE ============
  $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false
    });
  });
  $scope.addEmail = function () {
    console.log($scope.users);
    userService.create($scope.users);
  }
  //=============== GEOLOCALISATION ============
  $scope.geoloc = function (elem, id){
    tabActive.push(id);
    if (tabActive[0] === ' '){
      angular.element($('#'+id)).addClass('active');
      tabActive.splice(0,1);
    }
    else{     // ==============  TOGGLE CLASS ACTIVE ITINERAIRE =========
      $('#'+tabActive[0]).removeClass('active');
      $('#'+id).addClass('active');
      tabActive.splice(0,1);
    }
    address = elem;
    $scope.creform += 1;
    $http.get('https://maps.googleapis.com/maps/api/geocode/json?address='+address+'&key=AIzaSyAOq8Pa8bDZCg5wbgRmcqkoP8JibZt5j1M').then(function(res) {
      $scope.position = [res.data.results[0].geometry.location.lat,res.data.results[0].geometry.location.lng];
    })
  }

  // ================ END GEOLOCALISATION ===================
}
