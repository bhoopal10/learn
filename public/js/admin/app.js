var app=angular.module('unic',[]);
var baseURL='http://localhost/unic/admin';
app.config(function($interpolateProvider)
{
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

app.service('FormService', function ($http,$window)
{


    this.send = function(url,data) {
        var promise = $http({
            method : 'POST',
            url : baseURL+url,
            data:data
        }).success(function(data, status, headers, config) {

                return data;
            });

        return promise;
    };

 });

