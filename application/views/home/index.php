	<div class="container" >
	
  <!-- Nested node template -->
  	<script type="text/ng-template" id="nodes_renderer.html">
        <div ui-tree-handle class="tree-node tree-node-content">
          <div class="tree-node-content set_first">
            <span ng-if="node.sno" class="color_set"><b>{{node.sno}}.</b></span>
            <input ng-model="node.title" type="text" required class="color_set">
             <input ng-model="node.assignment_type" ng-init='node.assignment_type=1' type="hidden">
          </div>
        </div>

        <select ng-model="node.type" class="check_box set_select" id="{{node.id}}" ng-change="selectType(this)" >
        	<option value="">Select Type</option>
            <option ng-repeat="det in detail"  value="{{det.type_id}}">{{det.type}}</option>
        </select>
        <ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
          <li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer_sub.html'">
          </li>
        </ol>
  	</script>
  <!-- Nested node template -->
  	<script type="text/ng-template" id="nodes_renderer_sub.html">
        <div ui-tree-handle class="tree-node tree-node-content set_second" >
          <div class="tree-node-content">
            <input ng-model="node.title" type="text" ng-if="node.type == 2 || node.type == 3" required class="color_set">
            <textarea ng-model="node.title" ng-if="node.type == 1" required class="color_set"></textarea>
            <a class="pull-right btn btn-primary btn-xs set_right" data-nodrag ng-click="newSubItem(this)" ng-if="node.type != 1"><span class="glyphicon glyphicon-plus"></span></a>
            <input ng-model="node.assignment_type" ng-init='node.assignment_type=2' type="hidden">

          </div>

        </div>
        <ol ui-tree-nodes="" ng-model="node.nodes" ng-class="{hidden: collapsed}">
          <li ng-repeat="node in node.nodes" ui-tree-node ng-include="'nodes_renderer.html'">
          </li>
        </ol>
  	</script>
  	<div class="row">
  		<div class="alert alert-success small_margin" ng-if='AlertMessage'>
  				<strong>Success!</strong> {{Message}}
		</div>
		<div class="alert alert-danger small_margin" ng-if='AlertEMessage'>
	  		<strong>Danger!</strong> {{Error}}
		</div>
  		 <form method="post" data-bvalidator-validate data-bvalidator-option-validate-till-invalid="true" ng-submit="submitAssignmentform()">
        <div class="col-sm-6 main_div">
          <h3 class="title_head"><b>ADD NEW CALL</b></h3>
          <div ui-tree="" id="treedata-root" data-clone-enabled="true" data-nodrop-enabled="true" class="scroll_div">
            <ol ui-tree-nodes="" ng-model="treedata">
              <li ng-repeat="node in treedata" ui-tree-node="" ng-include="'nodes_renderer.html'"></li>
            </ol>
          </div>
          <div class="small_div"></div>
          <button class="btn btn-primary butn_new" type="submit" >Save</button>
           <span ng-click="reloadRoute()" class="color_set"><b>Cancel</b></span>
          <span class="pull-right btn btn-default btn-xl small_margin color_set" data-nodrag ng-click="newItem()" ><span class="glyphicon glyphicon-plus"><b>Add NEW QUESTION</b></span></span>
        </div>
        </form>
  	</div>
</div>
