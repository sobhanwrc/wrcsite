var appWrc = angular.module('appWrc',['appRoutes', 'oitozero.ngSweetAlert','ngSanitize', '720kb.socialshare', 'vcRecaptcha']);

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
	$scope.myFile = {};
	$scope.master_portfolio = {};
	$scope.active_class = 0;
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

	$scope.doAppliedJob = function(valid){
		if(valid){
			$scope.isDisabled = true;
			$http({
			  method  : 'POST',
			  url     : 'api/applied-job',
			  processData: false,
			  transformRequest: function (data) {
			      var formData = new FormData();
			      formData.append("myFile", $scope.myFile); 
			      formData.append("myName", $scope.myName);  
			      formData.append("myEmail", $scope.myEmail);
			      formData.append("myPhone", $scope.myPhone);
			      formData.append("myAppliedfor", $routeParams.id);
			      return formData;  
			  },  
			  data : $scope,
			  headers: {
			         'Content-Type': undefined
			  }
		   }).then(function (response) {
		   		if(response.data.code == 500){
		   			SweetAlert.swal({   
						title: "Error",   
						text: "Attachment should be pdf or doc file and file size should be less then 1MB.",   
						type: "warning",     
						confirmButtonColor: "#DD6B55",   
						confirmButtonText: "OK"
					},  function(){ 
					$scope.isDisabled = false; 
					// window.location.reload();
					
					});
		   		}

		   		if(response.data.code == 100){
		   			SweetAlert.swal({   
					title: "Thank You",   
					text: "Applied successfully!",   
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

	$scope.attachDoc = function(element) {
		 $scope.$apply(function($scope) {
	       $scope.myFile = element.files[0];
	       
	      });
	};

	$scope.filterPortFolio = function(value) {
		var tempArr = [];
		if($scope.master_portfolio.length > 0) {
			$scope.tempObj = angular.copy($scope.master_portfolio);
			$scope.portfolio_details = angular.copy($scope.tempObj);
		}
		if(value != 0) {
			$scope.master_portfolio = angular.copy($scope.portfolio_details);
			for(var i=0;i<$scope.portfolio_details.length;i++) {
					if(value == $scope.portfolio_details[i].portfolio_type) {
						tempArr.push(
							{
								id:$scope.portfolio_details[i].id,
								portfolio_name: $scope.portfolio_details[i].portfolio_name,
								portfolio_url: $scope.portfolio_details[i].portfolio_url,
								portfolio_image: $scope.portfolio_details[i].portfolio_image,
								portfolio_type: $scope.portfolio_details[i].portfolio_type
							});
					}
				}
			
			$scope.portfolio_details = angular.copy(tempArr);
		}
		$scope.active_class = value;
		
		
	};
	

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
      }
    }
  }
).directive('setHeight', function() {
	return {
		restrict: 'A',
		link: function (scope, element, attrs) {
			element.css('height','auto');
		}
	}
});