<html lang="en" ng-app="assignmentProject">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="<?php echo base_url()?>" >
<!-- <title ng-bind="::$state.current.data.pageTitle"></title> -->
 <title>Assignment</title>
<!-- CSS -->
<link rel="icon" href="<?php echo base_url()?>assets/img/favicon.png" type="image/x-icon" />
<!-- Bootstrap -->
 <link href="<?php echo FRONTEND_THEME_URL ?>css/bootstrap.css" rel="stylesheet">
 <link href="<?php echo FRONTEND_THEME_URL ?>css/font-awesome.min.css" rel="stylesheet">
 <link href="<?php echo FRONTEND_THEME_URL ?>css/style.css" rel="stylesheet">
 <link href="<?php echo FRONTEND_THEME_URL ?>css/animate.css" rel="stylesheet">
 <link href="<?php echo FRONTEND_THEME_URL ?>css/ie.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo FRONTEND_THEME_URL ?>css/ng-tags-input.min.css" />
<?php $this->load->view('include/js_var'); ?>
<!-- js -->
<!--[if lte IE 8]>-->
<script src="<?php echo FRONTEND_THEME_URL ?>js/vendor/jquery.js"></script>
<script src="<?php echo FRONTEND_THEME_URL ?>js/vendor/angular.min.js"></script>
<script src="<?php echo FRONTEND_THEME_URL ?>js/vendor/angular-route.js"></script>
</head>

<body ng-cloak >
<div ng-if="showGlobalLoader" class="site-loader">
</div>
