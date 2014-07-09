'use strict';

var baseURL='http://localhost/learn/admin/';
// Declare app level module which depends on filters, and services
var adminApp=angular.module('admin',['ui.bootstrap']);


adminApp.config(function($interpolateProvider)
{
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});



adminApp.service('HTTP', function ($http,$window)
{

    var csrfKey         =$("#csrf").attr('name');
    var csrfValue       =$("#csrf").val();



    this.getRequest = function(url)
    {
        var promise = $http({
            method : 'GET',
            url : baseURL+url
        }).success(function(data, status, headers, config) {

            return data;

        }).error(function(data, status, headers, config){
            console.dir(data+'status'+status);

        });


        return promise;
    };

    this.postRequest = function(url,data)
    {
        var csrf = $.param([{name:csrfKey, value:csrfValue}]);
        var promise = $http({
            method : 'POST',
            url : baseURL+url,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data:data+'&'+csrf
        }).success(function(data, status, headers, config) {

            return data;

        }).error(function(data, status, headers, config){

            console.dir(data+'status'+status);

        });

        return promise;
    };
});
