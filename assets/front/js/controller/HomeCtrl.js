angular
.module('assignmentProject')
.controller('HomeCtrl',['$scope', '$rootScope', '$http','commonService','$state','$stateParams','$window','$timeout', function($scope, $rootScope,$http,commonService,$state,$stateParams,$window,$timeout)
   {
        $rootScope.showGlobalLoader = false;
        $rootScope.pageTitle = $stateParams.pageTitle;
        $rootScope.headerClass = $state.current.name;
        $scope.state_name = $rootScope.headerClass; 
      	$scope.newSubItem = function (scope) {
	        var nodeData = scope.$modelValue;
	        nodeData.nodes.push({
	          id: nodeData.id * 10 + nodeData.nodes.length,
	          title: '',
	          type: '',
	          assignment_type:'',
	          nodes: []
	        });
      	};
       	$scope.selectType = function (scope) {
	        if(scope.node.type == 1)
	        {
	            $scope.includeItem(scope);
	        }
	        if(scope.node.type == 2)
	        {
	            $scope.includeItem(scope);
	        }
	        if(scope.node.type == 3){
	           for (var i = 1; i <= 5; i ++) {
	                $scope.includeItem(scope);
	            }
	        }
      	};
      	$scope.includeItem = function (scope) {
      		var nodeData = scope.$modelValue;
           	nodeData.nodes.push({
              id: nodeData.id * 10 + nodeData.nodes.length,
              title: '',
              type: nodeData.type,
              assignment_type:'',
              nodes: []
            });
      	};
	    $scope.treedata = [];
      	$scope.newItem = function () {
      		$scope.allType();
	        $scope.treedata.push({
	          id: 1 + $scope.treedata.length,
	          title:'',
	          sno:1+$scope.treedata.length,
	          assignment_type :'',
	          nodes: []
	        });
      	};
      	$scope.allType = function () {
      	 	var url = site_url + 'webservices/getType';
	    	commonService.apiGet(url).then(function(response) {
	        	$scope.detail = response.Data.detail; 
		    }, function error(err) {
	            $scope.Message = err.Message;
	            $scope.Error = err.Error;
		    });
		};
		$scope.submitAssignmentform = function() {
            var form_url = site_url + 'webservices/assignmentForm';
            $scope.Message = '';
            $scope.Error = {};
            $scope.AlertMessage = false;
            $scope.AlertEMessage = false;
            commonService.apiPost(form_url,$scope.treedata).then(function(response) {
                $scope.Message		= response.Message;
                $scope.AlertMessage = true;
                $scope.Error = '';
                $scope.treedata = []; 
                $timeout(function () {
        			$scope.AlertMessage = false;
    			}, 6000);
            }, function error(err) {
                $scope.Message = '';
                $scope.Error = err.Error;
                $scope.AlertEMessage = true;
                $timeout(function () {
        			$scope.AlertEMessage = false;
    			}, 6000);
            });
        }
        $scope.reloadRoute = function() {
        	window.location.reload();
    	}  
   }
]);