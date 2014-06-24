/*
*  Course Category Controller
* */
app.controller("CourseCategoryCtrl",function($scope,$http,$window)
{
    $scope.categories='';
    $scope.leafs='';

        $scope.list=function(action)
        {
            $http.post('http://localhost/unic/admin/course/listCategory', { action: action })
                .success(function(response,data)
                {
                    $scope.categories=response;
                    alert(response);
            });
        };

    $scope.addCategory=function(parentID)
    {
        var param;
        var action='addCategory';
        if(parentID) param=parentID;
        else param=0;

        $http.post('http://localhost/unic/admin/course/Category', { action: 'add' , name:$scope.categoryName,pid:parentID})
            .success(function(response,data)
            {
                $window.alert(response);
            })
            ;
    };

    $scope.getLeafs=function()
    {
        $http.post('http://localhost/unic/admin/course/Category', { action: 'leaf'})
            .success(function(response,data)
            {
                $scope.leafs=response;
            })
        ;
    };
});

/*
 *  Course Controller
 * */
app.controller("CourseCtrl",function($scope,$http,$window,FormService)
{
    $scope.courseList='';
    $scope.form={};
    $scope.courseID=''

    $scope.create=function(url)
    {
        FormService.send(url,$scope.form).then(function(response){
            $scope.courseID=response.data;

        });
    };

    $scope.list=function()
    {
        $http.post('http://localhost/unic/admin/course/list')
            .success(function(response,data)
            {
               $scope.courseList=response;
            });
    }
    $scope.addCourseDescription=function(url)
    {
        var response=FormService.send(url,$scope.form);
        alert(response);
    }
});

/*
 *  Video Controller
 * */
app.controller("VideoCtrl",function($scope,$http,$window)
{
   $scope.videos='';

    $scope.list=function()
    {
        $http.post('http://localhost/unic/admin/video/list',
            {name:$scope.name,price:$scope.price,cat:$scope.cat,code:$scope.code})
            .success(function(response,data)
            {
                $window.alert(response);
            });
    };
});
