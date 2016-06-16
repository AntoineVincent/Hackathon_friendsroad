function groupeController($scope, $location, $timeout, userService, $location, $rootScope) {
  $('body').css({'background':'url("../assets/parallax1.jpg") cover'})
  $rootScope.connect = true;
  $scope.groupe = 'Nom du Groupe';
  //================== INIT PARALLAX ============
    angular.element($('.parallax')).parallax();

  // ================= INIT COLLAPSE ============
  $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false
    });
  });
}
