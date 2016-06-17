function groupeController($scope, $location, $timeout, userService, $location, $http, $rootScope) {
  $('body').css({'background':'url("../assets/parallax1.jpg") cover'})
  $rootScope.connect = true;
  $scope.groupe = {};
  $scope.membre = {};
  var tabActive = [' '];
  $scope.users = {};
  $scope.itineraire= {};
  $scope.proposition= {};
  $scope.groupe.itineraire = [];
  $scope.groupe.proposition = [];

  function load (){
    userService.get().then(function(res){
      $scope.membreBack = res.data;
      console.log($scope.membreBack.membres);
    });
    userService.getAll().then(function(res){
      $scope.groupeBack = res.data;
      console.log('jdskjdfjkdfkj')
      console.log($scope.groupeBack);
      console.log($scope.groupeBack.groupe[0].nom);
    });
  }
  load()
  //================== INIT PARALLAX ============
    angular.element($('.parallax')).parallax();

  // ================= INIT COLLAPSE ============
  $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false
    });
  });
  $scope.addEmail = function () {
    userService.create({email: $scope.membre.email, nom: $scope.membre.name});
    load();  
    $scope.groupe.users.push($scope.membre);
    console.log($scope.groupe);
    sessionStorage.setItem('groupe',JSON.stringify($scope.groupe));
    $scope.membre = {};
  }
  $scope.addItineraire = function () {
    $scope.groupe.itineraire.push($scope.itineraire);
    console.log($scope.groupe);
    sessionStorage.setItem('groupe',JSON.stringify($scope.groupe));
    $scope.itineraire = {};
  }
  $scope.addProposition = function () {
    $scope.groupe.proposition.push($scope.proposition);
    console.log($scope.groupe);
    sessionStorage.setItem('groupe',JSON.stringify($scope.groupe));
    $scope.proposition = {};
  }
  $scope.ok = function (){
    if ($scope.groupe.proposition.length != 0 && $scope.groupe.itineraire.length != 0){
      return true;
    }
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
