'use strict';

var baseURL='http://localhost/learn/channel/';
// Declare app level module which depends on filters, and services
var channelApp=angular.module('channel',['ui.bootstrap']);


channelApp.config(function($interpolateProvider)
{
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});



channelApp.service('HTTP', function ($http,$window)
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