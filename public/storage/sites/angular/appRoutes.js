var appRoutes = angular.module('appRoutes',['ngRoute']);

appRoutes.config(function($routeProvider,$locationProvider){
	$locationProvider.html5Mode(true);
	$routeProvider.when('/',{
		templateUrl: 'templates/home.html'
	}).when('/contact',{
		templateUrl: 'templates/contact.html',
		
	}).when('/career',{
		templateUrl: 'templates/career.html'
	}).when('/portfolio',{
		templateUrl: 'templates/portfolio.html'
	}).when('/about-us',{
		templateUrl: 'templates/about-us.html'
	}).when('/view-job-details/:id',{
		templateUrl: 'templates/job_description.html'
	}).when('/service',{
		templateUrl: 'templates/service.html'
	}).when('/software_developement',{
		templateUrl: 'templates/software_development_service.html'
	}).when('/mobile_application_service',{
		templateUrl: 'templates/mobile_application_service.html'
	}).when('/web_service',{
		templateUrl: 'templates/web_application_service.html'
	}).when('/saas_service',{
		templateUrl: 'templates/saas_service.html'
	}).when('/testimonial_details',{
		templateUrl: 'templates/testimonials.html'
	});
});