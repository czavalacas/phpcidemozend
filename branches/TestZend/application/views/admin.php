<!DOCTYPE html>
<html lang="es">
<?php $this->load->helper('url'); ?>
<head>
<!--  http://uno-de-piera.com/templates-en-codeigniter/  -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $titulo;?></title>

  <!--  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
   <link href="<?php echo base_url();?>public/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
   <link href="<?php echo base_url();?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>public/css/sb-admin.css" rel="stylesheet">
   
   
   <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
   <script src="<?php echo base_url();?>public/js/jquery-1.11.1.min.js"></script>
   <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
   <!--<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
   <!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url();?>public/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url();?>public/js/bootbox.min.js"></script>
   

   
   <script type="text/javascript"
        src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart','table','piechart','linechart','controls','charteditor']}]}">
   </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
       function invocarPantalla(id){
           if(id == 'tabAjax'){
               loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'combo'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'autoc'){
        	   loadjscssfile("<?php echo base_url();?>public/css/style.css","css");
        	   loadjscssfile("<?php echo base_url();?>public/js/autosuggestion.js","js");
           }else if(id == 'tabmodal'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'grafic'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");

        	   loadjscssfile("<?php echo base_url();?>public/js/morris/morris.js","js");
        	   loadjscssfile("<?php echo base_url();?>public/js/morris/raphael.min.js","js");
        	   loadjscssfile("<?php echo base_url();?>public/css/morris/morris.css","css");

        	   loadjscssfile("<?php echo base_url();?>public/js/canvas/canvasjs.min.js","js");
           }else if(id == 'upload'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'drop'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
        	   loadjscssfile("<?php echo base_url();?>public/js/dropZone/min/dropzone.min.css","css");
        	   loadjscssfile("<?php echo base_url();?>public/js/dropZone/dropzone.js","js");    	   
           }else if(id == 'trans'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'check'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
        	   loadjscssfile("<?php echo base_url();?>public/css/"+id+"/cs"+id+".css","css");
           }else if(id == 'muchos'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'mail'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'notif'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }else if(id == 'tabPanel'){
        	   loadjscssfile("<?php echo base_url();?>public/js/"+id+"/js"+id+".js","js");
           }       	    
           
               
    	   $.ajax({
	   			type: "POST",
	   			url: id,
	   			data: { idObj:id },
	   			success: function(data){
	   				$('#page-wrapper').html(data);
	   				if(id = 'func'){
	   					$('#example').dataTable();
	   				}
	   			}
	   		});//fin del ajax
       }
      
       function loadjscssfile(filename, filetype){
    	    if (filetype == "js"){
    	        var fileref = document.createElement('script');
    	        fileref.setAttribute("type","text/javascript");
    	        fileref.setAttribute("src", filename);
    	    }
    	    else if (filetype == "css"){
    	        var fileref = document.createElement("link");
    	        fileref.setAttribute("rel", "stylesheet");
    	        fileref.setAttribute("type", "text/css");
    	        fileref.setAttribute("href", filename);
    	    }
    	    if (typeof fileref != "undefined"){
    	        document.getElementsByTagName("head")[0].appendChild(fileref);
    	    }
    	}
	</script>
</head>

<body>

    <div id="wrapper">
       
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>"><?php echo $titulo;?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;<?php echo isset($usuarioLogeado) ? $usuarioLogeado : null;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <form id="logOutForm" action="logOut" method="POST">
                               <a href="#" onclick="document.getElementById('logOutForm').submit()"><i class="fa fa-fw fa-power-off"></i>Cerrar Sesion</a>
                           </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php 
                    foreach($opciones as $opc){
                    	echo $opc;
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bienvenido <small>Demo de PHP-CI</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Hola bienvenido
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Agrega mas opciones para aprender mas rapido?</strong> 
                            
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    
 
</body>
</html>