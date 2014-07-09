channelApp.controller('traineerController',function($scope,$http,HTTP,$rootScope,$window)
{
	$scope.traineer=[];
	$scope.start;
	$scope.item_per_page=4;

	$scope.list=function()
	{
		$scope.$watch('currentPage',function(){
			var datas=$.param({'currentPage':$scope.currentPage,'perPage':$scope.item_per_page});
			HTTP.postRequest('user/view',datas).then(function(response){
				$scope.traineer=response.data;
				$scope.dataLength=response.length;
			});
		});
	};
	$scope.paginate=function(a){
		$scope.currentPage	=	1;
		$scope.setPage		=	function(pageNo){
				$scope.currentPage=pageNo;
		};
		$scope.maxsize=10;
		$scope.bigTotalItems=100;
		$scope.bigCurrentPage=1;
	};
})