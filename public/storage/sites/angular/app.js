var appWrc = angular.module('appWrc',['appRoutes', 'oitozero.ngSweetAlert','ngSanitize']);

appWrc.directive('myNavbar',function(){
	return {
		restrict: 'E',
		templateUrl: 'templates/navbar.html',
		scope: true
	};
});


appWrc.controller('MainController',function($scope,$http,SweetAlert,$routeParams,$sce){
	$scope.banner_details = {};
	$scope.testimonial_details = {};
	$scope.portfolio_details = {};
	$scope.technical_skills = '';
	$scope.soft_skills = '';
	$scope.desired_candidate_profile = '';
	
	$scope.doContact = function(valid) {
		if(valid) {
			$scope.isDisabled = true;

			$http.post('/api/contact-us-submit', {
			data:$scope.contact
		}).then(function(response){
			if(response.data.code == '100'){
				SweetAlert.swal({   
					title: "Thank You",   
					text: "Submit successfully!",   
					type: "success",     
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "OK"
				},  function(){ 
					$scope.isDisabled = false; 
					window.location.reload();
					
				});
			}
		}).catch(function(reason){
			
		});
		}
	};

	$scope.company_details = function() {
		$http.get('/api/wrc-website-details').then(function(response){

			$scope.contact_details = response.data.contact_details;

		}).catch(function(reason){

		});
	};

	$scope.loadHomeSection = function() {
		$http.get('/api/load-home-content').then(function(response){
			$scope.banner_details = response.data.banner_details;
			$scope.testimonial_details = response.data.testimonial_details;
			$scope.portfolio_details = response.data.portfolio_details;

			/*setTimeout(function(){
             	new WOW().init();
        	});*/
		}).catch(function(reason){

		});
	};

	$scope.job_details = function() {
		$http.get('/api/job-vacency-details').then(function(responce){

			$scope.job_details = responce.data.job_details;
			// console.log($scope.job_details);

		}).catch(function(reson){

		});
	};

	$scope.job_description = function () {
		$http.get('api/view-job-details', {params: {job_id:$routeParams.id}}).then(function(response){
			$scope.details = response.data.details;
			$scope.technical_skills = $sce.trustAsHtml($scope.details.technical_skills);
			$scope.soft_skills = $sce.trustAsHtml($scope.details.soft_skills);
			$scope.desired_candidate_profile = $sce.trustAsHtml($scope.details.desired_candidate_profile);
		}).catch(function(reason){

		});
	}

	

}).directive('slider',function() {
    var linker = function(scope, element, attr) {
        scope.$watch('banner_details', function () {
             $("#slider1").responsiveSlides({
            //maxwidth: 800,
            speed: 800,
            nav: true
        });
        });
    };
    return {
        restrict: "A",
        link: linker
    }
}).directive('testimonial',function(){
	var linker = function(scope, element, attr) {
        scope.$watch('testimonial_details', function () {
             $("#testimonial-slider").owlCarousel({
            items: 1,
            itemsDesktop: [1000, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1],
            pagination: true,
            //navigation:true,
            //navigationText:["<",">"],
            slideSpeed: 1000,
            singleItem: true,
            autoPlay: true
        });

        });
    };
    return {
        restrict: "A",
        link: linker
    }
}).directive('setCustom', function () {
    return {
      restrict: 'A',
      link: function (scope, element, attrs) {
        
        element.attr('data-category',attrs.setCustom);
        new WOW().init();
        scope.$watch('portfolio_details', function () {
           $('#filtr_container').filterizr();
        });
      }
    }
  }
).directive('setHeight', function() {
	return {
		restrict: 'A',
		link: function (scope, element, attrs) {
			element.css('height','698.969px');
		}
	}
});