/*
*  Course Category Controller
* */
Trainer.controller("CourseCategoryCtrl",function($scope,$http,$window)
{
    $scope.categories='';
    $scope.leafs='';

        $scope.list=function(action)
        {
            $http.post('http://localhost/unic.tv/trainer/course/listCategory', { action: action })
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

        $http.post('http://localhost/unic.tv/trainer/course/Category', { action: 'add' , name:$scope.categoryName,pid:parentID})
            .success(function(response,data)
            {
                $window.alert(response);
            })
            ;
    };

    $scope.getLeafs=function()
    {
        $http.post('http://localhost/unic.tv/trainer/course/Category', { action: 'leaf'})
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
Trainer.controller("CourseCtrl",function($scope,$http,$window,FormService,$location)
{
    $scope.courseList='';
    $scope.form={};
    $scope.courseID=''

    $scope.create=function(url)
    {
        FormService.send(url,$scope.form).then(function(response)
        {
            if(response.data.response !='error')
            {

                $window.location=baseURL+response.data.url;
            }
        });
    };

    $scope.list=function()
    {
        $http.post('http://localhost/unic.tv/trainer/course/list')
            .success(function(response,data)
            {
               $scope.courseList=response;
            });
    }
    $scope.addCourseDescription=function(url)
    {
        FormService.send(url,$scope.form).then(function(response)
        {
            if(response.data.response !='error')
            {
                $window.location=baseURL+response.data.url;
            }
        });
    }
});

/*
 *  Video Controller
 * */
Trainer.controller("VideoCtrl",function($scope,$http,$window)
{
   $scope.videos='';

    $scope.list=function()
    {
        $http.post('http://localhost/unic.tv/trainer/video/list',
            {name:$scope.name,price:$scope.price,cat:$scope.cat,code:$scope.code})
            .success(function(response,data)
            {
                $window.alert(response);
            });
    };
});
