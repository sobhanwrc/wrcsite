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
	});
});