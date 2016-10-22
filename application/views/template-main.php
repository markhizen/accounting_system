<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Accounting System</title>

	<!--Import Google Icon Font-->
	<link href="<?php echo site_url(); ?>/static/css/mat.css" rel="stylesheet">
	<link href="<?php echo site_url(); ?>/static/css/jquery.dataTables.css" rel="stylesheet">
	<link href="<?php echo site_url(); ?>/static/css/jquery.datetimepicker.css" rel="stylesheet">
	
	<!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>">

    <!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	

</head>
<body>

	<nav class="navbar navbar-default">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Accounting System</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounting Code <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Add New</a></li>
	            <li><a href="#">All Accounting Codes</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounting Entry<span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Add New</a></li>
	            <li><a href="#">All Accounting Entries</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Balance Sheet</a></li>
	            <li><a href="#">Income Statement</a></li>
	            <li><a href="#">Trial Balance</a></li>
	            <li><a href="#">Posting</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	<div class="container">
		<?php $this->load->view($page); ?>	
	</div>

	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="<?php echo site_url(); ?>/static/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/static/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/static/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/static/js/jquery.dataTables.fnReloadAjax.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/static/js/jquery.datetimepicker.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>/static/js/common.js"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
</body>
</html>