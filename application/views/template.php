<html>
<head>
  <title>Accounting System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="shortcut icon" href="<?php echo $system_favicon_src; ?>" id="favico_logo"/>
  <link rel="stylesheet" media="screen" href="<?php echo base_url().PATH_CSS ?>style.css" />
  <link rel="stylesheet" media="screen" href="<?php echo base_url().PATH_CSS ?>custom.css" />
  <link rel="stylesheet" href="<?php echo base_url().PATH_CSS ?>parsley.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url().PATH_CSS ?>/skins/skin_<?php echo SITE_SKIN; ?>.css">
  <link rel="stylesheet" href="<?php echo base_url().PATH_CSS ?>materialize.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().PATH_CSS ?>flaticon.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().PATH_CSS ?>material_icons.css">
  <link type="text/css" href="<?php echo base_url().PATH_CSS ?>jquery.jscrollpane.css" rel="stylesheet" media="all" />
  <link type="text/css" href="<?php echo base_url().PATH_CSS ?>component.css" rel="stylesheet" media="all" />
  <link type="text/css" href="<?php echo base_url().PATH_CSS ?>popModal.css" rel="stylesheet" media="all" />
  <link type="text/css" href="<?php echo base_url().PATH_CSS ?>selectize.default.css" rel="stylesheet" media="all" />
  
  <script src="<?php echo base_url().PATH_JS ?>less.min.js" type="text/javascript"></script>
  <!-- PAGE LOADER SCRIPT -->
  <script src="<?php echo base_url().PATH_JS ?>pace.js" type="text/javascript"></script>
  
  <?php 
	if(!EMPTY($resources["load_css"])){
		foreach($resources["load_css"] as $css): 
		  echo '<link href="'. base_url() . PATH_CSS . $css .'.css" rel="stylesheet" type="text/css">';
		endforeach; 
	}
  ?>
  
  <!-- JQUERY 2.1.1+ IS REQUIRED BY MATERIALIZE TO FUNCTION -->
  <script src="<?php echo base_url().PATH_JS ?>jquery-2.1.1.min.js"></script>
  <script src="<?php echo base_url().PATH_JS ?>jquery-ui.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url().PATH_JS ?>selectize.js" type="text/javascript"></script>
</head>

<body class="skin_<?php echo SITE_SKIN; ?>">
  <input type="hidden" id="base_url" value="<?php echo base_url() ?>">

  <script src="<?php echo base_url().PATH_JS ?>script.js" type="text/javascript"></script>


  <div id="wrapper" class="<?php echo SITE_LAYOUT; ?>">
	
	<!-- SIDEBAR MENU SECTION -->
	<nav class="side-nav fixed scroll-pane scroll-dark" id="nav-mobile" style="height:calc(100%);">
	  
	  <!-- LOGO SECTION -->
	  <div class="logo <?php echo SITE_HEADER; ?>">
	    <img src="<?php echo $system_logo_src ?>" /> <span class="hide-display show-on-hover"><?php echo SITE_TITLE; ?></span>
	  </div>
	  <!-- END LOGO SECTION -->
	  <ul class="collapsible menu" data-collapsible="accordion">
	  	<li>
			<div class="p-n m-md">
	          <input type="hidden" id="project_ceis" value="<?php echo PROJECT_CEIS ?>">
	          <input type="hidden" id="project_bas" value="<?php echo PROJECT_BAS ?>">
	          <input type="hidden" id="project_isca" value="<?php echo PROJECT_ISCA ?>">
			  <?php 
					$applications = get_app_by_role();
					
					if(count($applications) > 1) 
					{
			   ?>        	
		           <div class="input-field col s12 for-select-wrapper">
					    <select id="app_select">
					      <?php 

	                  		
	                  		foreach($applications as $app)
	                  		{
	                  			
	                  			$class = (strtolower($this->session->userdata('selected_application')) == strtolower($app['application_code']) ) ? "selected" : "";
	                  			
	                  			$link = "";
	                  			$href = "";
	                  			
	                  			$link.= strtolower($app['application_code']);  
	                  			$href = ( $app['url'] != base_url()) ? $app['url'] : base_url().$link.'/';
	                 
	                  			
	                  			$href .= $link . '_dashboard';
	                  			
	                  			echo '<option '.$class.' value="'.$href.'"><a href="'.$href.'">'.strtoupper($app['application_code']).'</a></option>';
	                  		}

	                  		?>
					    </select>
					   
				  </div>
			  <?php 
				}
              ?>
	          
			<!--   <select name="system_project" id="system_project" class="selectize" onchange="get_system_project()">
							<option value="<?php echo PROJECT_CEIS ?>" <?php if($active_project == PROJECT_CEIS) echo ' selected'; ?>>CEIS</option>
							<option value="<?php echo PROJECT_BAS ?>" <?php if($active_project == PROJECT_BAS) echo ' selected'; ?>>BAS</option>
							<option value="<?php echo PROJECT_ISCA ?>" <?php if($active_project == PROJECT_ISCA) echo ' selected'; ?>>ISCA</option>
			</select> -->
		    </div>	  	
	  	</li>
	  </ul>

	  <ul class="collapsible menu" data-collapsible="accordion">

	  	<?php 

			$main_flag		= 1;
			$parent_menu	= NULL;
			$resource		= get_menu($main_flag, $parent_menu);
			foreach($resource as $resource)
			{
				// START: GET THE CHILD/SUB MENU
				$sub_resource_str	= "";
				$span_pull_right	= "";
				$child_is_active	= 0;
				$url = base_url().strtolower($resource['application_code']).'/';

				if($resource['display_child_flag'] == '1')
				{
					$sub_resource 		= get_menu(0, $resource['resource_code']);							
					if(!empty($sub_resource))
					{
						$sub_resource_str = '<div class="collapsible-body">';
		    			$sub_resource_str.= '<ul class="menu-item">';

	    				foreach($sub_resource as $sub_resource)
						{

			    			$sub_code 	= strtolower(str_replace('-','_',$sub_resource['resource_code']));							
							if($this->router->fetch_class() == $sub_code){
								$child_is_active 	= 1;
								$sub_active			= "style='color:white;'";
							}
							else 
							{
								$sub_active			= "";
							}

							$sub_resource_str.= '
									<li >
										<a '.$sub_active.' href="'.$url. $sub_code . '">                                                        
                            				'.$sub_resource['resource_name'].'
                          				</a>
                        			</li>
                        			';	

						}

		    			$sub_resource_str.= '</ul>';
		    			$sub_resource_str.= '</div>';
					}
				}

				$code = strtolower(str_replace('-','_',$resource['resource_code']));

				$code = strtolower(str_replace('-','_',$resource['resource_code']));

				if(!empty($child_is_active))
					$active = "active";
				else
					$active = ($this->router->fetch_class() == $code) ? "active" : "";

				if( EMPTY( $sub_resource_str ) )
				{
					$par_url = $url.$code;
				}
				else 
				{
					$par_url = '#';
				}

				echo '
					<li class="'.$active.'">
						<div class="collapsible-header '.$active.'">
							<a class="waves-effect waves-teal" href="'.$par_url.'">
								<i class="'.$resource['icon'].'"></i>
								<span class="hide-display show-on-hover">
									'.$resource['resource_name'].'
								</span>
							</a>
						</div>
						'.$sub_resource_str.'
					</li>

				';
			}

	    ?>
	  </ul>
	  

	</nav>
	<!-- END SIDEBAR MENU SECTION -->
	
	<!-- RESPONSIVE MENU BUTTON -->
    <a class="button-collapse top-nav full hide-on-large-only" data-activates="nav-mobile" href="#"><i class="flaticon-menu51"></i></a>
	<!-- END RESPONSIVE MENU BUTTON -->

	<section id="content">
	  
	  <!-- HEADER SECTION -->
	  <header class="<?php echo SITE_HEADER; ?>">
	    <div class="container">
	      <div class="row">
		    <div class="col l6 s5">
				<h5 class="header-title">&nbsp;</h5>
		    </div>
		  
		    <div class="col l5 s5 right-align p-r-md">
		      &nbsp;
		    </div>
		  
		    <div class="col l1 s2 right-align">
		      <!-- Account Dropdown Trigger -->
		      <a class="dropdown-button top-bar-account" href="#" data-activates="dropdown-account"><img id="top_bar_avatar" src="<?php echo $avatar_src ?>"/><span class="notif-count" id="noti_red"></span></a>
		    </div>
		  
		  	<!-- Account Dropdown Structure -->
			<div id="dropdown-account" class="dropdown-content">
			  <div class="row account-details">
			    <div class="col s7 account-name">
				  <a href="javascript:;" class="md-trigger" data-modal="modal_profile" onclick="profile_modal_init()"><?php if($this->session->name) echo $this->session->name; else echo 'Juana dela Cruz'; ?></a>
				  <small><?php if($this->session->job_title) echo $this->session->job_title; else echo 'System Administrator' ?></small>
				</div>
			    <div class="col s5 account-action right-align">
				  <a href="javascript:;" id="logout"><i class="flaticon-power103"></i> Logout</a>
				</div>
			  </div>
			  
			  <!-- Notifications List -->
			  <div class="dropdown-title">Notifications <span class="new badge" id="notif_cnt"></span></div>
			  <ul class="collection scroll-pane m-t-md notif-list" style="height:210px;"></ul>
			</div>
			<!-- End Account Dropdown Structure -->
			
			<!-- Inbox Dropdown Structure -->
			<div id="dropdown-inbox" class="dropdown-content" style="width:380px">			  
			  
			  <div class="dropdown-title m-t-n-sm">Messages <span class="new badge">1</span></div>
			  <ul class="collection scroll-pane m-t-sm" style="height:275px;">
				<li class="collection-item avatar active">
				  <img class="circle" alt="" src="<?php echo base_url().PATH_IMAGES ?>avatar/avatar_001.jpg">
				  <a href="#" class="title mute">Kenneth Manalo</a>
				  <p class="timestamp">3 hours ago</p>
				  <p class="mute truncate">Lorem ipsum dolor sit consectetur adipiscing elit sollicitudin congue</p>
				</li>
				<li class="collection-item avatar">
				  <img class="circle" alt="" src="<?php echo base_url().PATH_IMAGES ?>avatar/avatar_002.jpg">
				  <a href="#" class="title mute">Rodel Satuito</a>
				  <p class="timestamp">7 hours ago</p>
				  <p class="mute truncate">Vivamus eu lacus hendrerit, feugiat sem ut, pellentesque nisi. Suspendisse potenti</p>
				</li>
				<li class="collection-item avatar">
				  <img class="circle" alt="" src="<?php echo base_url().PATH_IMAGES ?>avatar/avatar_005.jpg">
				  <a href="#" class="title mute">Kevin Villarojo</a>
				  <p class="timestamp">23 hours ago</p>
				  <p class="mute truncate">Suspendisse potenti feugiat sem ut, pellentesque nisi. </p>
				</li>
			  </ul>
			</div>
			<!-- End Inbox Dropdown Structure -->
			
			<!-- Followers Dropdown Structure -->
			<div id="dropdown-followers" class="dropdown-content" style="width:370px">			  
			  
			  <div class="dropdown-title m-t-n-sm">Friend Requests <span class="new badge">3</span></div>
			  <ul class="collection scroll-pane m-t-sm" style="height:275px;">
				<li class="collection-item avatar">
				  <img class="circle" alt="" src="<?php echo base_url().PATH_IMAGES ?>avatar/avatar_001.jpg">
				  <div class="row m-n">
				    <div class="col s7 p-l-n">
				      <a href="#" class="title">Kenneth Manalo</a>
				      <p class="timestamp">Software Engineer</p>
				    </div>
				    <div class="col s5 right-align">
					  <a href="#" class="btn-circle success m-r-sm  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Accept"><i class="flaticon-checkmark21"></i></a>
					  <a href="#" class="btn-circle mute tooltipped" data-position="bottom" data-delay="50" data-tooltip="Decline"><i class="flaticon-cross93"></i></a>
				    </div>
				  </div>
				</li>
				<li class="collection-item avatar">
				  <img class="circle" alt="" src="<?php echo base_url().PATH_IMAGES ?>avatar/avatar_003.jpg">
				  <div class="row m-n">
				    <div class="col s7 p-l-n">
				      <a href="#" class="title">Paolo Abendanio</a>
				      <p class="timestamp">Network Administrator</p>
				    </div>
				    <div class="col s5 right-align">
					  <a href="#" class="btn-circle success m-r-sm  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Accept"><i class="flaticon-checkmark21"></i></a>
					  <a href="#" class="btn-circle mute tooltipped" data-position="bottom" data-delay="50" data-tooltip="Decline"><i class="flaticon-cross93"></i></a>
				    </div>
				  </div>
				</li>
				<li class="collection-item avatar">
				  <img class="circle" alt="" src="<?php echo base_url().PATH_IMAGES ?>avatar/avatar_005.jpg">
				  <div class="row m-n">
				    <div class="col s7 p-l-n">
				      <a href="#" class="title">Kevin Villarojo</a>
				      <p class="timestamp">Associate Brand Manager</p>
				    </div>
				    <div class="col s5 right-align">
					  <a href="#" class="btn-circle success m-r-sm  tooltipped" data-position="bottom" data-delay="50" data-tooltip="Accept"><i class="flaticon-checkmark21"></i></a>
					  <a href="#" class="btn-circle mute tooltipped" data-position="bottom" data-delay="50" data-tooltip="Decline"><i class="flaticon-cross93"></i></a>
				    </div>
				  </div>
				</li>
			  </ul>
			</div>
			<!-- End Inbox Dropdown Structure -->
			
			<!-- Settings Dropdown Structure -->
			<div id="dropdown-settings" class="dropdown-content p-n" style="width:250px">
			  <ul class="collection m-n">
				<li class="collection-item">
				  <a href="<?php echo base_url() . PROJECT_CORE ?>/manage_settings#tab_site_settings" class="collection-link">Manage Settings<div class="secondary-content inline"><i class="flaticon-gears5"></i></div></a>
				  <p class="timestamp">Adjust your site's general settings, including modifying your site's info and features.</p>
				</li>
				<li class="collection-item">
				  <a href="#!" class="collection-link">Online Help<div class="secondary-content inline"><i class="flaticon-help17"></i></div></a>
				  <p class="timestamp">See examples and tutorials to help you navigate and use the system.</p>
				</li>
			  </ul>
			</div>
			<!-- End Settings Dropdown Structure -->
		  </div>
		</div>
	  </header>	
	  <!-- END HEADER SECTION -->
	  
	   <!-- SUB NAVIGATION SECTION (for two-column menu layout) -->
	  	<aside id="sub-nav" class="scroll-pane scroll-dark ">
	  	</aside>
	  <!-- END SUB NAVIGATION SECTION -->
	  
	  <!-- MAIN CONTENT SECTION -->
	  <main class="container" id="main_container">
		<?php echo $contents ?>	
	  </main>
	</section>	
    
	<footer class="page-footer transparent">
	  <div class="footer-copyright">
		<div class="left">
		  <ul class="footer-links">
		    <li><a href="#"><i class="flaticon-information68"></i> About</a></li>
		    <li><a href="#"><i class="flaticon-lifesaver5"></i> Help</a></li>
		  </ul>
		</div>
		<div class="right">
		  Powered by <a href="www.asiagate.com" target="_blank" class="font-bold">Asiagate Networks, Inc.</a>
		</div>
	  </div>
	</footer>
  </div>
            
  
  <!-- NOTIFICATION SECTION -->
  <div class="notify success none"><div class="success"><h4><span>Success!</span></h4><p></p></div></div>
  <div class="notify error none"><div class="error"><h4><span>Warning!</span></h4><p></p></div></div>
  
  <!-- CONFIRMATION SECTION -->
  <div id="confirm_modal" style="display:none">
	<div class="confirmModal_content">
	  <h4></h4>
	  <p></p>
	</div>
	<div class="confirmModal_footer">
	  <button type="button" value="Ok" id="confirm_modal_btn" class="btn bg-success" data-confirmmodal-but="ok">Ok</button>
	  <button type="button" data-confirmmodal-but="cancel"><?php echo BTN_CANCEL ?></button>
	</div>
  </div>
	
  <div id="loading" class="none" align="center">
	<div class="p-lg center-align">
	  <img src="<?php echo base_url() . PATH_IMAGES ?>loading40.gif" />
	</div>
  </div>
  
  <!-- Modal -->
  <script type="text/javascript">
  	var modal_height = {};
  </script>
  <div id="modal_profile" class="md-modal lg md-effect-<?php echo MODAL_EFFECT ?>">
    <div class="md-content">
	  <a class="md-close icon none">&times;</a>
	  <div id="modal_profile_content"></div>
    </div>
  </div>
  <div class="md-overlay"></div>
   <?php 

	if( ISSET( $resources['load_modal'] ) AND !EMPTY( $resources['load_modal'] ) ) :

		foreach( $resources['load_modal'] as $modal_id => $options ) :

			
			$size 		= '';
			$title 		= '';
			$id 		= '';

			$controller = '';
			$method 	= '';
			$module 	= '';

			$multiple 			= '';
			$scroll 			= '';
			$height 			= '';

			$ajax 				= false;

			if( is_numeric( $modal_id ) )
			{
				$id 			= $options;
				$clean 			= str_replace( array( 'modal_', '_' ), array( '', ' ' ), $options );

				$title 			= ucfirst( strtolower( $clean ) );

				$controller 	= $clean;
				$method 		= strtolower( $clean ).'_modal';

			}
			else 
			{

				$id 			= $modal_id;
				$clean 			= str_replace( array( 'modal_', '_' ), array( '', ' ' ), $modal_id );

				if( !EMPTY( $options ) AND is_array( $options ) )
				{
					$size 		= ( ISSET( $options['size'] ) ) ? $options['size'] 	 : '';

					if( ISSET( $options['title'] ) )
					{
						$title  = $options['title'];
					}
					else 
					{
						$title  = ucfirst( strtolower( $clean ) );
					}

					if( ISSET( $options['controller'] ) )
					{
						$controller = $options['controller'];
					}
					else 
					{
						$controller = $clean;
					}

					if( ISSET( $options['method'] ) )
					{
						$method 	= $options['method'];
					}
					else
					{
						if( ISSET( $options['multiple'] ) )
						{
							$method 	= strtolower( $clean ).'_modal';	
						}
						else 
						{
							$method 	= 'modal';
						}
						
					}

					if( ISSET( $options['module'] ) )
					{
						$module 	= $options['module'];
					}

					if( ISSET( $options['actions_elem'] ) )
					{
						$actions_elem = $options['actions_elem'];
					}

					if( ISSET( $options['actions_event'] ) )
					{
						$actions_event = $options['actions_event'];
					}

					if( ISSET( $options['height'] ) )
					{
						$height 		= $options['height'];
					}

					if( ISSET( $options['multiple'] ) )
					{
						$multiple 		= $options['multiple'];
					}

					if( ISSET( $options['ajax'] ) )
					{
						$ajax 			= $options['ajax'];
					}
					
				}
			}



?>
<div id="<?php echo $id ?>" class="md-modal md-effect-<?php echo MODAL_EFFECT ?> ">
	<div class="md-content <?php echo $size ?>">
		<a class="md-close icon">&times;</a>
		<h3 class="md-header"><?php echo $title ?></h3>
		<div id="<?php echo $id ?>_content"></div>
  	</div>
  
</div>
<div class="md-overlay"></div>

<script type="text/javascript">

	var modal_options = {},
		modalObj,
		<?php echo $id ?>;
	  
    
	modal_options.controller = '<?php echo $controller ?>';
	modal_options.modal_id   = '<?php echo $modal_id ?>';
	modal_options.method     = '<?php echo $method ?>';

	<?php 
		if( !EMPTY( $ajax ) ) :
	?>

		modal_options.ajax 	 = '<?php echo $ajax ?>'

	<?php endif; ?>

	<?php 
		if( !EMPTY( $module ) ) :
	?>
			modal_options.module = '<?php echo $module ?>';
	<?php endif; ?>

	<?php
		if( !EMPTY( $height ) ) :
	?>
		modal_options.height 	= '<?php echo $height ?>';
		modal_height['<?php echo $id ?>'] = '<?php echo $height ?>';
	<?php endif; ?>

	<?php 
		if( !EMPTY( $multiple ) ) :
	?>

		<?php echo $id ?> = new handleModal( modal_options );

		function <?php echo $id.'_init' ?>( data_id )
		{
			var data_id  = data_id || '',
				options  = {};

			options.id 	 	= data_id;
		
			<?php if( !EMPTY( $height ) ) : ?>
				<?php echo $id ?>.loadViewJscroll( options );
			<?php else : ?>
				<?php echo $id ?>.loadView( options );
			<?php endif; ?>

	 	}

	<?php 
		else :
	?>
			modalObj 		= new handleModal( modal_options );
	<?php 
		endif;
	?>

	// var modalObj = new handleModal({ controller : 'bas_line_items', modal_id: 'modal_account_code', method: 'account_code_modal', module: '<?php echo PROJECT_BAS ?>' });
</script>
<?php 
		endforeach;
	endif;
?>

  <!-- PLATFORM SCRIPT -->
  <script src="<?php echo base_url().PATH_JS ?>materialize.js"></script>
  <!-- END PLATFORM SCRIPT -->

  <script src="<?php echo base_url().PATH_JS ?>auth.js"></script>
  <script src="<?php echo base_url().PATH_JS ?>parsley.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url().PATH_JS ?>collapsible-menu.js"></script>
  
  <!-- JSCROLLPANE SCRIPT -->
  <script type="text/javascript" src="<?php echo base_url().PATH_JS ?>jquery.mousewheel.js"></script>
  <script type="text/javascript" src="<?php echo base_url().PATH_JS ?>jquery.jscrollpane.js"></script>
  <!-- END JSCROLLPANE SCRIPT -->
  
  <!-- UPLOAD FILE -->
  <link href="<?php echo base_url() . PATH_CSS; ?>uploadfile.css" rel="stylesheet" type="text/css">
  <script src="<?php echo base_url() . PATH_JS ?>jquery.uploadfile.js" type="text/javascript"></script>
  <!-- UPLOAD FILE -->
	
  <!-- POPMODAL SCRIPT -->
  <script type="text/javascript" src="<?php echo base_url().PATH_JS ?>popModal.min.js"></script>
  <!-- END POPMODAL SCRIPT -->
  
  <!-- MODAL -->
  <script type="text/javascript" src="<?php echo base_url().PATH_JS ?>classie.js"></script>
  <script type="text/javascript" src="<?php echo base_url().PATH_JS ?>modalEffects.js"></script>
  <!-- MODAL -->
  
  <!-- FULLSCREEN MODAL -->
  <link href="<?php echo base_url() . PATH_CSS; ?>animate.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="<?php echo base_url().PATH_JS ?>animatedModal.min.js"></script>
  <!-- FULLSCREEN MODAL -->
  
  <!-- SEARCH -->
  <script src="<?php echo base_url().PATH_JS ?>jquery.lookingfor.min.js"></script>
  <!-- SEARCH -->
  
  <!-- PAGE LOADER -->
  <script src="<?php echo base_url() . PATH_JS ?>jquery.isloading.js" type="text/javascript"></script>
  <!-- PAGE LOADER -->

  <!-- GENERAL FUNCTIONS -->
  <script src="<?php echo base_url() . PATH_JS ?>common/general.js" type="text/javascript"></script>
  <!-- GENERAL FUNCTIONS -->
  
  <?php 
	if(!EMPTY($resources["load_js"])){
		foreach($resources["load_js"] as $js): 
		  echo '<script src="'. base_url() . PATH_JS . $js .'.js" type="text/javascript"></script>';
		endforeach; 
	}  
  ?>
  
  <script src="<?php echo base_url().PATH_JS ?>common.js" type="text/javascript"></script>
  <script type="text/javascript">
  	function get_system_project(){
		var system_project = $("#system_project")[0].selectize.getValue();
		var project_ceis = $('#project_ceis').val();
		var project_bas = $('#project_bas').val();
		var project_isca = $('#project_isca').val();

		if(system_project == project_ceis){
			$('#menu_bas').addClass('none');
			$('#menu_isca').addClass('none');
			// add other menus - same with ^
			
			$('#menu_ceis').removeClass('none');
		}
		if(system_project == project_bas){
			$('#menu_ceis').addClass('none');
			$('#menu_isca').addClass('none');
			// add other menus - same with ^
			
			$('#menu_bas').removeClass('none');
		}
		if(system_project == project_isca){
			$('#menu_bas').addClass('none');
			$('#menu_ceis').addClass('none');
			// add other menus - same with ^
			
			$('#menu_isca').removeClass('none');
		}
	}
  
	var profilemodalObj = new handleModal({ controller : 'profile', modal_id: 'modal_profile', module: '<?php echo PROJECT_CORE ?>' });
    
	function profile_modal_init(data_id){
		var data_id = data_id || "";
		profilemodalObj.loadView({ id : data_id });
		return false;
	}
	
	$(function(){
	 $('#app_select').material_select();

	 $('#app_select').on('change', function(){
	 	window.location = $(this).val();
	 })

	  // SIDEBAR NAVIGATION
	  $(".button-collapse").sideNav();
		
	  // JSCROLLPANE
	  $('.scroll-pane').jScrollPane(settings).bind(
		  'mousewheel',
		function(e)
		{
		  e.preventDefault();
		}
	  );
			
	  // ACCORDION MENU
	  $('.collapsible').collapsible({
		accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
  	  });
		  
	  // SCROLLSPY
	  $('.scrollspy').scrollSpy();
		  
	  // TABS
	  $('ul.tabs').tabs();
		
	  // FULLSCREEN MODAL
	  $(".fullscreen-trigger").each(function() {
	    var target = $(this).data("modal-target");
		$(this).animatedModal({
			color:'#fff',
			modalTarget: target,
			animatedIn:'bounceInUp',
			animatedOut:'bounceOutDown'
		});   
	   });
	  
	  
	  // DROPDOWN
	  $('.dropdown-button').dropdown({
		inDuration: 300,
		outDuration: 225,
		constrain_width: false, // Does not change width of dropdown to that of the activator
		hover: false, // Activate on hover
		gutter: 0, // Spacing from edge
		belowOrigin: true, // Displays dropdown below the button
		alignment: 'left' // Displays dropdown with edge aligned to the left of button
	  });
		  
	  // FLOAT LABEL FORM ON FOCUS FUNCTION
	  $(".form-float-label input[type='text'], .form-float-label input[type='password'], .form-float-label input[type='email'], .form-float-label input[type='url'], .form-float-label input[type='time'], .form-float-label textarea.materialize-textarea").focusin(function() {
		$(this).closest(".col").css("background","#DCEAF1");
	  }).focusout(function() {
		$(this).closest(".col").css("background","none");
	  });
	  // END FLOAT LABEL FORM ON FOCUS FUNCTION
		
	  // NOTIFICATION DROPDOWN FUNCTION
	  $(".top-bar-notif a").blur(function() {
		$(this).parent().removeClass("active");
  	  });	 
		  
	  $(".top-bar-notif a").click(function() {
		$(this).parent().addClass("active");
  	  });
	  // END NOTIFICATION DROPDOWN FUNCTION
	  
	  <?php if(!EMPTY($resources["load_js"])){ ?>
		
		// DATEPICKER
		<?php if(in_array('jquery.datetimepicker', $resources["load_js"])){ ?>
		  $('.datepicker').datetimepicker({
			timepicker:false,
			scrollInput: false,
			format:'m/d/Y',
			formatDate:'m/d/Y'
		  });
			
		  $('.timepicker').datetimepicker({
			datepicker:false,
			format:'h:i A'
		  });
			
		  $('.datepicker_start').datetimepicker({
			format:'m/d/Y',
			formatDate:'m/d/Y',
			scrollInput: false,
			onShow:function( ct ){
			  this.setOptions({
				maxDate:jQuery('.datepicker_end').val()?jQuery('.datepicker_end').val():false
			  })
			},
			timepicker:false
		  });
			
		  $('.datepicker_end').datetimepicker({
			format:'m/d/Y',
			formatDate:'m/d/Y',
			scrollInput: false,
			onShow:function( ct ){
			  this.setOptions({
				minDate:jQuery('.datepicker_start').val()?jQuery('.datepicker_start').val():false
			  })
			},
			timepicker:false
		   });
		<?php } else { ?>
		  // DESTROY DATEPICKER TO HIDE xdsoft_datetimepicker
		  if($('.datepicker,.datepicker_start,.datepicker_end,.timepicker').length)
			$('.datepicker,.datepicker_start,.datepicker_end,.timepicker').datetimepicker('destroy');
		<?php } ?>
		
		<?php // if(in_array('selectize', $resources["load_js"])){ ?>

		  /* START: Doc's code */
		  selectize_init();
		  /* END: Doc's code */
		  
		  // ASSIGN VALUES TO SELECT (SINGLE)
		  <?php 
			if(ISSET($resources["single"])){
				foreach ($resources["single"] as $k => $v): 
		  ?>
					$("#<?php echo $k ?>")[0].selectize.setValue('<?php echo $v ?>');
		  <?php 
				endforeach; 
			} 
		  ?>
		  
		  // ASSIGN VALUES TO SELECT (MULTIPLE)
		  <?php 
			if(ISSET($resources["multiple"])){
				foreach ($resources["multiple"] as $a => $b):
					if(!EMPTY($b)){ 
						for($i=0; $i<count($b); $i++){	
		  ?>
							$("#<?php echo $a ?>")[0].selectize.addItem("<?php echo $b[$i] ?>");
		  <?php 		}
					}
				endforeach;	 
			}
		//} ?>
		
		<?php if(in_array('jquery-labelauty', $resources["load_js"])){ ?>
			// LABELAUTY RADIO BUTTON
			$(".labelauty").labelauty({
				checked_label: "",
				unchecked_label: "",
			});
		<?php } ?>
	
		<?php if(in_array('jquery.number.min', $resources["load_js"])){ ?>
			$('input.number').number(true, 2);
		<?php } ?>
		
		<?php 
		  if(in_array('jquery.uploadfile', $resources["load_js"])){ 
			foreach($resources["upload"] as $upload):
		?>

			<?php if(ISSET($upload['page'])){?>
				var page = "<?php echo $upload['page'] ?>";
			<?php } ?>
			<?php if(ISSET($upload['form_name'])){?>
				var form_name = "<?php echo $upload['form_name'] ?>";
			<?php } ?>
		
			<?php if(ISSET($upload['multiple'])){?>
				var multiple = true;
			<?php } ?>
				
			<?php if(ISSET($upload['show_progress'])){?>
				var show_progress = true;
			<?php } ?>


			<?php if(ISSET($upload['drag_drop'])){?>
				var drag_drop = <?php echo $upload['drag_drop']?:'false'; ?>;
			<?php } ?>
				
			<?php if(ISSET($upload['show_preview'])){ ?>
				var show_preview = true;
				
				<?php if(ISSET($upload['preview_height'])){ ?>
					var preview_height = "<?php $upload['preview_height'] ?>";
				<?php } ?>
				
				<?php if(ISSET($upload['preview_width'])){ ?>
					var preview_width = "<?php $upload['preview_width'] ?>";
				<?php } ?>
			<?php } ?>
				
			var page = page || "",
				multiple = multiple || false,
				show_progress = show_progress || false,
				drag_drop = drag_drop || false,
				show_preview = show_preview || false,
				preview_height = preview_height || "auto",
				preview_width = preview_width || "80px";
			
			var uploadObj = $("#<?php echo $upload['id']?>_upload").uploadFile({
				url: $base_url + "upload/",
				fileName: "file",
				allowedTypes:"<?php echo $upload['allowed_types']?>",
				acceptFiles:"*",	
				dragDrop: drag_drop,
				multiple: multiple,
				maxFileCount: 1,
				allowDuplicates: true,
				duplicateStrict: false,
				showDone: false,
				showProgress: show_progress,
				showPreview: show_preview,
				<?php if(ISSET($upload['show_preview'])){?>
					previewHeight: preview_height,
					previewWidth: preview_width,
				<?php } ?>
				returnType:"json",	
				formData: {"dir":"<?php echo $upload['path']?>"},
				uploadFolder:$base_url + "<?php echo $upload['path']?>",
				onSuccess:function(files,data,xhr){ 
					var avatar = $base_url + "<?php echo $upload['path']?>" + data;
					$("#<?php echo $upload['id']?>_src").attr("src", avatar);
					$("#<?php echo $upload['id']?>").val(data);
					$("#<?php echo $upload['id']?>_upload").prev(".ajax-file-upload").hide();
					$("#<?php echo $upload['id']?>_upload + div + div.ajax-file-upload-statusbar .ajax-file-upload-red").text("Delete");

					switch(page){
						case 'site_settings':
							var avatar = $base_url + "<?php echo $upload['path']?>" + data;
							$("#<?php echo $upload['id']?>_src").attr("src", avatar);
							
							$("#<?php echo $upload['id']?>").val(data);
							$("#<?php echo $upload['id']?>_upload").prev(".ajax-file-upload").hide();
							$("#<?php echo $upload['id']?>_upload + div + div.ajax-file-upload-statusbar .ajax-file-upload-red").text("Delete");
						break;
						case 'files':
							$( ".field-multi-attachment .ajax-file-upload-filename" ).each(function() {
								var html = $(this).html();
								
								if(html == files){
									// EXPLODE VALUE OF DATA
									var id = data.toString().split('.');
									$('<input/>').attr({type:'hidden',name:'multiple_file_name[]', value:data, id: id[0]}).appendTo('#' + form_name);
									
									$("#save_upload_file").prop("disabled", false);
								}
							});
						break;
						case 'file_version':
							$("#<?php echo $upload['id']?>").val(data);
							console.log('<?php echo $upload['id']?>' + data);
							
							$("#save_upload_file_version").prop("disabled", false);
							$("#<?php echo $upload['id']?>_upload").prev(".ajax-file-upload").hide();
						break;
						case 'aip':
							$("#<?php echo $upload['id']?>").val(data);
						break;
					}

				},
				showDelete:true,
				deleteCallback: function(data,pd)
				{
					for(var i=0;i<data.length;i++)
					{
						$.post($base_url + "upload/delete/",{op:"delete",name:data[i],dir:"<?php echo $upload['path']?>"},
						function(resp, textStatus, jqXHR)
						{ 
							$("#<?php echo $upload['id']?>_upload + div + div.ajax-file-upload-statusbar .ajax-file-upload-error").fadeOut();	
							$("#<?php echo $upload['id']?>").val(''); 
							
							<?php if(ISSET($upload['default_img_preview'])){ ?>
								var avatar = $base_url + "<?php echo PATH_IMAGES . $upload['default_img_preview'] ?>";
								$("#<?php echo $upload['id']?>_src").attr("src", avatar);
							<?php } ?>
						});
					 }      
					pd.statusbar.hide();
					$("#<?php echo $upload['id']?>_upload").prev(".ajax-file-upload").show();
				},
				onLoad:function(obj)
				{
					$.ajax({
						cache: true,
						url: $base_url + "upload/existing_files/",
						dataType: "json",
						data: { dir: '<?php echo $upload['path']?>', file: $("#<?php echo $upload['id']?>").val()} ,
						success: function(data) 
						{
							for(var i=0;i<data.length;i++)
							{
								obj.createProgress(data[i]);
							}	
							
							if(data.length > 0){
							  $("#<?php echo $upload['id']?>_upload").prev(".ajax-file-upload").hide();
							  $("#<?php echo $upload['id']?>_upload + div + div.ajax-file-upload-statusbar .ajax-file-upload-red").text("Delete");
							}else{
							  <?php if(ISSET($upload['default_img_preview'])){ ?>
								var avatar = $base_url + "<?php echo PATH_IMAGES . $upload['default_img_preview'] ?>";
								$("#<?php echo $upload['id']?>_src").attr("src", avatar);
							  <?php } ?>
							}
						}
					});
				}
			});
		<?php 
		  endforeach;
		} ?>
		
		<?php 
		  if(in_array('jquery.dataTables.min', $resources["load_js"]) AND ISSET($resources["datatable"]))
		  { 

		  	foreach($resources["datatable"] as $dtable)
		  	{
		  		$datatable 	= $dtable["datatable"];	
		  		$scroll 	= ISSET($dtable["scroll"]) ? "100%" : "";

		  		echo "load_datatable('".$dtable["table_id"]."', '".$dtable["path"]."', '".$scroll."');";
		  	}
		  }				
		}
		?>

		// DATATABLE2
		// Same as DATATABLE but have a multi-configuration

		<?php
			 if(in_array('jquery.dataTables.min', $resources["load_js"]) AND ISSET($resources["datatable2"])){
		  		foreach($resources["datatable2"] as $dtable){
		  			$config 	= json_encode($dtable);
		  			echo "load_datatable2('".$config."');";
		  		}
			}				
		?>
	  
    });

		<?php
 		
			if(!empty($resources['load_init']))
			{
	       		foreach($resources['load_init'] as $init)
	       		{
	       			echo $init;
	       		}        		
	       	}
	  	?>    
  </script>
 
</body>
</html>	