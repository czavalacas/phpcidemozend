<html lang="en">
<?php $this->load->helper('url'); ?>
<head>
    <meta charset="utf-8">
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.min.css" type="text/css">
    <link href="<?php echo base_url();?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>public/js/jquery.js"></script>
    <style type="text/css">
    
/*
    Note: It is best to use a less version of this file ( see http://css2less.cc
    For the media queries use @screen-sm-min instead of 768px.
    For .omb_spanOr use @body-bg instead of white.
*/

@media (min-width: 768px) {
    .omb_row-sm-offset-3 div:first-child[class*="col-"] {
        margin-left: 25%;
    }
}

.omb_login .omb_authTitle {
    text-align: center;
	line-height: 300%;
}
	
.omb_login .omb_socialButtons a {
	color: white; // In yourUse @body-bg 
	opacity:0.9;
}
.omb_login .omb_socialButtons a:hover {
    color: white;
	opacity:1;    	
}
.omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
.omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
.omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}


.omb_login .omb_loginOr {
	position: relative;
	font-size: 1.5em;
	color: #aaa;
	margin-top: 0em;
	margin-bottom: 1em;
	padding-top: 0.5em;
	padding-bottom: 0.5em;
}
.omb_login .omb_loginOr .omb_hrOr {
	background-color: #cdcdcd;
	height: 1px;
	margin-top: 0px !important;
	margin-bottom: 0px !important;
}
.omb_login .omb_loginOr .omb_spanOr {
	display: block;
	position: absolute;
	left: 50%;
	top: -0.6em;
	margin-left: -1.5em;
	background-color: white;
	width: 3em;
	text-align: center;
}			

.omb_login .omb_loginForm .input-group.i {
	width: 2em;
}
.omb_login .omb_loginForm  .help-block {
    color: red;
}

	
@media (min-width: 768px) {
    .omb_login .omb_forgotPwd {
        text-align: right;
		margin-top:10px;
 	}		
}
    </style>
    
</head>
<body>
<div class="container">
    <div class="omb_login">
		<div class="row omb_row-sm-offset-3 omb_loginOr">
		</div>

		<div class="row omb_row-sm-offset-3">
			<div class="col-xs-12 col-sm-6">	
			    <form class="omb_loginForm" action="logear" autocomplete="off" method="POST">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Usuario"
						 value="<?php echo isset($user) ? $user : null;?>" autofocus="true">
					</div>
					<span class="help-block"></span>
										
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Clave">
					</div>
                    <span class="help-block"><?php echo isset($error) ? $error : null;?></span>

					<!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button> -->
					<input type="submit" value="Entrar" class="btn btn-lg btn-primary btn-block"/>
				</form>
			</div>
    	</div>
		<div class="row omb_row-sm-offset-3">

			<div class="col-xs-12 col-sm-3">
				<p class="omb_forgotPwd">
					<a href="#">Olvidaste tu clave?</a>
				</p>
			</div>
		</div>	    	
	</div>
</div>
<?php
   /*$res = $this->db->query('SELECT MOD(29,9) as resu');
   if ($res->num_rows() > 0) {
   	   echo $res->row()->resu;
   }*/
?>
</body>
</html>