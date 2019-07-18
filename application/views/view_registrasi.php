
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/dashgum/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>assets/dashgum/font-awesome/css/font-awesome.css" rel="stylesheet" />


    <!-- Include SmartWizard CSS -->
    <link href="<?=base_url()?>assets/smart_wizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />
    
    <!-- Optional SmartWizard theme -->
    <link href="<?=base_url()?>assets/smart_wizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />


    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/dashgum/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/dashgum/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

   <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
		  
			  <?php
                    $attr = array('class' => 'form-login','id'	=> 'form_regis');
                    $hidden = array('id_user' => $id_user, 'id_bio' => $id_bio);
                    
                    echo validation_errors();

                    echo form_open('C_User/daftar',$attr,$hidden); 
			  ?>
		      <!-- <form id="form-regis" class="form-login" action=""> -->
                <h2 class="form-login-heading">Daftar</h2>

                
				<!-- SmartWizard-->
                <div id="smartwizard" style="margin:10px;" >
					<ul>
						<li><a href="#step-1">Step 1<br /><small>Data Akun</small></a></li>
						<li><a href="#step-2">Step 2<br /><small>Data Pribadi</small></a></li>
                        <li><a href="#step-3">Step 3<br /><small>Alamat</small></a></li>
					</ul>

					<div class="login-wrap">
						<div id="step-1">
							<input type="text" name="username" class="form-control" placeholder="Username" autofocus >
							<br>
							<input type="password" name="password" class="form-control" placeholder="Password" >
						</div>
						<div id="step-2">
							<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" autofocus >
							<br>
							<input type="email" name="email" class="form-control" placeholder="Email">
							<br>
                            <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon">
						</div>
                        <div id="step-3">
							<textarea name="alamat" class="form-control" placeholder="Alamat" autofocus style="resize:none;"></textarea>
							<br>
							<input type="text" name="kota" class="form-control" placeholder="Kota">
							<br>
                            <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos">
						</div>
					</div>
					
				</div>
				
				<div class="login-wrap">
					<div class="registration">
		                Sudah mempunyai akun?<br/>
		                <a class="" href="<?=site_url()?>/C_User/">
		                    Log in
		                </a>
		            </div>
				</div>
				
		
		      </form>	  	
	  	
	  	</div>
	  </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/dashgum/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/dashgum/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
	
	 <!-- Include jQuery -->
	 <script src="<?=base_url()?>assets/smart_wizard/js/jquery-1.11.2.min.js"></script>
    <!-- Include jQuery Validator plugin -->
    <script src="<?=base_url()?>assets/smart_wizard/js/bootstrap.js"></script>

	<script src="<?=base_url()?>assets/smart_wizard/js/jquery.smartWizard.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/dashgum/js/jquery.backstretch.min.js"></script>

	<script type="text/javascript">
        $.backstretch("<?=base_url()?>assets/img/bg-login/login-bg.jpg", {speed: 500});


        $(document).ready(function(){
            
            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Daftar')
                                            .attr('id','btn-finish')
											 .addClass('btn btn-info')
                                             .on('click', function(){ 
                                                    
                                                });
            // var btnCancel = $('<button></button>').text('Cancel')
            //                                  .addClass('btn btn-danger')
            //                                  .on('click', function(){ 
            //                                         $('#smartwizard').smartWizard("reset");  
            //                                     });                         
            
            
            
            // Smart Wizard
            $('#smartwizard').smartWizard({ 
                    selected: 0, 
                    theme: 'dots',
                    transitionEffect:'fade',
                    toolbarSettings: {toolbarPosition: 'bottom',
                                      toolbarExtraButtons: [btnFinish]
                                    },
                    anchorSettings: {
                                markDoneStep: true, // add done css
                                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                                removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                            }
                 });
            
            $("#btn-finish").addClass('disabled');
             $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                   //alert("You are on step "+stepNumber+" now");
                   if(stepPosition == 'first'){
                       $("#prev-btn").addClass('disabled');
                       $("#btn-finish").addClass('disabled');
                   }else if(stepPosition == 'final'){
                       $("#next-btn").addClass('disabled');
                       $("#btn-finish").removeClass('disabled');
                   }else{
                       $("#prev-btn").removeClass('disabled');
                       $("#next-btn").removeClass('disabled');
                       $("#btn-finish").addClass('disabled');
                   }
                });                               
            
        });   
    </script>  




  </body>
</html>
