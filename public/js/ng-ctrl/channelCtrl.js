adminApp.controller('channelController', function($scope,$http,HTTP,$rootScope,$window)
    {

        $scope.name="edew";
        $scope.channels=[];
        $scope.start;
        $scope.item_per_page=4;


        $scope.list=function()
        {

            $scope.$watch('currentPage', function()
            {
                var data1 = $.param({'currentPage':$scope.currentPage, 'perPage':$scope.item_per_page});
                HTTP.postRequest('channel/view',data1).then(function(response)
                {
                    
                    $scope.channels=response.data;
                    $scope.dataLength=response.data.length;

                });
            });

        };

        $scope.paginate=function(a)
        {

            $scope.currentPage = 1;

            $scope.setPage = function (pageNo) {
                $scope.currentPage = pageNo;
            };

            $scope.maxSize = 10;
            $scope.bigTotalItems = 175;
            $scope.bigCurrentPage = 1;
        };

        $scope.QuotaLimit=function()
        {

        };
        $scope.pageChanged = function()
        {

        };


    });

//adminApp.controller('PaginationCtrl',function($scope,$http)
//{
//    $scope.totalItems = 60;
//    $scope.currentPage = 4;
//    var range=[];
//
//    $scope.setPage = function (pageNo) {
//        $scope.currentPage = pageNo;
//    };
//
//    $scope.pageChanged = function() {
//        console.log('Page changed to: ' + $scope.currentPage);
//    };
//
//    $scope.maxSize = 5;
//
//    var totalPage=$scope.totalItems/$scope.maxSize;
//
//    for(var i=0;i< totalPage;i++)
//    {
//        range.push(i);
//    }
//    $scope.range = range;
//});