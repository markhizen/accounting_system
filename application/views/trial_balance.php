<html>
    <head>
        <title> Hello World </title>
        <!--Import Google Icon Font-->
	    <link href="../../static/css/mat.css" rel="stylesheet">
      <link href="../../static/css/jquery.dataTables.css" rel="stylesheet">
      <link href="../../static/css/jquery.datetimepicker.css" rel="stylesheet">
	    
	    <!--Import materialize.css-->
	    <link type="text/css" rel="stylesheet" href="../../static/css/materialize.min.css"  media="screen,projection"/>
	    <link type="text/css" rel="stylesheet" href="../../static/css/materialize.css"  media="screen,projection"/>

	    <!--Let browser know website is optimized for mobile-->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">

    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="../../static/js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../../static/js/materialize.min.js"></script>
      <script type="text/javascript" src="../../static/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../../static/js/jquery.dataTables.fnReloadAjax.js"></script>
      <script type="text/javascript" src="../../static/js/jquery.datetimepicker.js"></script>
      <script type="text/javascript" src="../../static/js/common.js"></script>
      
      <nav class="teal darken-2">
		  <div class="container nav-wrapper teal darken-2">
		    <a href="" class="brand-logo"></a>
		    <ul id="nav-mobile" class="right hide-on-med-and-down">
		      <li><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a></li>
		      <li><a href="">Journals</a></li>
		      <li><a href="">Balance Sheet</a></li>
		      <li><a href="">Trial Balance</a></li>
		      <li><a href="">Posting</a></li>
		      <li><a href="">Income Statement</a></li>
		    </ul>
		  </div>
	  </nav>

	<div id="main-content">

      <div class="container" width="100%">
      	<table class="striped" id="item_table" style="padding: 10px; margin: 20px;">
	        <thead>
	          	<tr>
	              	<th data-field="id">Date</th>
	              	<th data-field="name">Cash</th>
	              	<th data-field="price">Capital</th>
	              	<th>Actions</th>
	          	</tr>
	        </thead>

	        <tbody>
	          	<tr>
	            	<td></td>
	            	<td align="right"></td>
	            	<td align="right"></td>
	            	<td><a href="">Income Statement</a> | <a href="">Balance Sheet</a> | <a href="">Posting</a> | <a href="">Trial Balance</a></td>
	          	</tr>
	        </tbody> 
      	</table>
	</div>
</div>