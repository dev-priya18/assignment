

  angular.module('demoApp', ['ui.tree'])
    .controller('ConnectedTreesCtrl', ['$scope', function ($scope) {
    

      $scope.remove = function (scope) {
        scope.remove();
      };
      $scope.type = 1;
      $scope.toggle = function (scope) {
        scope.toggle();
      };

      $scope.newSubItem = function (scope) {
      
        var nodeData = scope.$modelValue;
        nodeData.nodes.push({
          id: nodeData.id * 10 + nodeData.nodes.length,
          title: nodeData.title + '.' + (nodeData.nodes.length + 1),
          type: nodeData.type,
          nodes: []
        });
      };
       $scope.test = function (scope) {
      
        if(scope.node.type == 1 || scope.node.type ==2)
        {
          var nodeData = scope.$modelValue;
          nodeData.nodes.push({
            id: nodeData.id * 10 + nodeData.nodes.length,
            title: nodeData.title + '.' + (nodeData.nodes.length + 1),
            type: nodeData.type,
            nodes: []
          });

        }
        if(scope.node.type == 3){
           for (var i = 1; i <= 5; i ++) {
               
                 var nodeData = scope.$modelValue;
                nodeData.nodes.push({
                  id: nodeData.id * 10 + nodeData.nodes.length,
                  title: nodeData.title + '.' + (nodeData.nodes.length + 1),
                  type: nodeData.type,
                  nodes: []
                });

            }
        }
      };
      
      $scope.tree1 = [{
        'id': 1,
        'title': 'tree1 - item1',
        'type':'',
        'nodes': []
      }, {
        'id': 2,
        'title': 'tree1 - item2',
        'type':'',
        'nodes': []
      }];
      
    }]);
