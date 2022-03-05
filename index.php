<style>
	.footer-medio {
		height: 100%;
		display: grid;
		align-items: center;
	}
</style>
<style>
	.contenido {
		min-height: 100vh;
		position: relative;
	}

	.footersistema {
		min-height: 80vh;
		background-size: 50% 50%;
		background-repeat: repeat;
	}
</style>
<!DOCTYPE html>
<html lang="es-ES">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msapplication-config" content="none" />
	<meta name="csrf-param" content="_csrf">
	<meta name="csrf-token" content="IlsPPYjeFxmmgAYwU51gyXeblabIaF2OZdjbwGA6aoJGFEkP7bZtQOPDf34SsDqDFM2mkoEQN70ogriUNF0e2w==">
	<title>CAT-DSC :: ITI</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<!-- estilos -->
	<link href="assets/951c7ac5/css/bootstrap.css" rel="stylesheet">
	<link href="assets/ce6448b4/css/strength-meter.min.css" rel="stylesheet">
	<link href="assets/ef7a4106/css/kv-widgets.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
	<link href="assets/css/tecnm.css" rel="stylesheet">
	<link href="assets/css/tecnm_responsive.css" rel="stylesheet">
	<link href="plantillas/plugins/alertify/css/alertify.css" rel="stylesheet">
	<link href="plantillas/plugins/imp-gallery/css/blueimp-gallery.min.css" rel="stylesheet">
	<link href="assets/css/cat.css" rel="stylesheet">
	<!-- script -->
	<script type="text/javascript">
		window.strength_06b96b85 = {
			"showMeter": false,
			"language": "es",
			"inputTemplate": "\u003Cdiv class=\u0022input-group\u0022\u003E{input}\u003Cspan class=\u0022input-group-addon\u0022\u003E{toggle}\u003C\/span\u003E\u003C\/div\u003E"
		};
	</script>
	<script src="assets/690dc397/jquery.js"></script>
	<script src="assets/be9f0a59/yii.js"></script>
	<script src="assets/be9f0a59/yii.validation.js"></script>
	<script src="assets/ce6448b4/js/strength-meter.min.js"></script>
	<script src="assets/ce6448b4/js/locales/strength-meter-es.js"></script>
	<script src="assets/ef7a4106/js/kv-widgets.min.js"></script>
	<script src="assets/be9f0a59/yii.activeForm.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="plantillas/tecnm/js/jquery-animate-css-rotate-scale.js"></script>
	<script src="plantillas/tecnm/js/jquery-css-transform.js"></script>
	<script src="plantillas/tecnm/js/jquery.blackandwhite.min.js"></script>
	<script src="plantillas/tecnm/js/jquery.bxSlider.min.js"></script>
	<script src="plantillas/tecnm/js/jquery.faq.js"></script>
	<script src="plantillas/tecnm/js/jquery.simpleFAQ-0.7.min.js"></script>
	<script src="plantillas/tecnm/js/jquery.touchwipe.min.js"></script>
	<script src="plantillas/tecnm/js/js_func.js"></script>
	<script src="plantillas/tecnm/js/tecnm.js"></script>
	<script src="plantillas/plugins/alertify/alertify.js"></script>
	<script src="plantillas/plugins/bootbox.min.js"></script>
	<script src="plantillas/plugins/imp-gallery/js/blueimp-gallery.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="assets/951c7ac5/js/bootstrap.js"></script>
	<script type="text/javascript">
		jQuery(function($) {
			if (jQuery('#loginform-password').data('strength')) {
				jQuery('#loginform-password').strength('destroy');
			}
			jQuery('#loginform-password').strength(strength_06b96b85);

			jQuery('#login-form').yiiActiveForm([{
				"id": "loginform-username",
				"name": "username",
				"container": ".field-loginform-username",
				"input": "#loginform-username",
				"error": ".help-block.help-block-error",
				"encodeError": false,
				"validateOnBlur": false,
				"validate": function(attribute, value, messages, deferred, $form) {
					yii.validation.required(value, messages, {
						"message": "Usuario no puede estar vacío."
					});
				}
			}, {
				"id": "loginform-password",
				"name": "password",
				"container": ".field-loginform-password",
				"input": "#loginform-password",
				"error": ".help-block.help-block-error",
				"encodeError": false,
				"validateOnBlur": false,
				"validate": function(attribute, value, messages, deferred, $form) {
					yii.validation.required(value, messages, {
						"message": "Nueva contraseña no puede estar vacío."
					});
				}
			}], {
				"encodeErrorSummary": false,
				"errorSummary": ".help-block"
			});
			$(document).ready(function() {
				$("td").removeClass("kv-meter-container");
			});
		});
	</script>
</head>

<body>
	<header>
		<div class="row sinmargenes">
			<div class="fondo col-md-12 col-xs-12">
				<div class="logoizquierdo col-md-3 hidden-sm hidden-xs">
					<img src="assets/images/logos/TecNM_Azteca.png" class="img-fluid">
				</div>
				<div class="logocentral col-md-5 col-sm-6">
					<img src="assets/images/logos/TecNM_logo.png" class="img-fluid2">
				</div>
				<div class="logoderecho col-md-4 col-sm-6 hidden-xs">
					<p></p>
					<p></p>
					<span>CAT-DSC :: Centro de Aplicaciones</span><br />
					<span></span>
				</div>
			</div>
		</div>
	</header>
	<nav id="w0" class="navbar navbar-default tecnm-navbar">
		<div class="container">
			<div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span class="sr-only">Toggle navigation</span>
					<table>
						<tr>
							<td><span width="400px">Menú</span></td>
							<td width='10px'></td>
							<td><span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</td>
						</tr>
					</table>
				</button></div>
			<div id="w0-collapse" class="collapse navbar-collapse">
				<ul id="w1" class="navbar-nav navbar-left nav">
					<li><a href="https://itiguala.mindbox.app/login/alumno" target="_blank"><span class="glyphicon glyphicon-education"></span>
							MindBox</a></li>
				</ul>
				<ul style="cursor: pointer;" id="w1" class="navbar-nav navbar-right nav">
					<li><a onclick="location.href='../cat/Encuesta'" target="_blank"><span class="glyphicon glyphicon-duplicate"></span>
							Encuesta</a></li>
				</ul>

				<ul id="w2" class="navbar-nav navbar-right nav">
					<li><a href="https://dsc.itiguala.edu.mx/" target="_blank"><span class="glyphicon glyphicon-blackboard"></span>
							Depto de sistemas y computación</a></li>
				</ul>
			</div>
		</div>
	</nav> <br>

	<div class="wraper footersistema contenido">
		<div class="content_block">
			<div class="wraper">
				<div id="login-wrapper">
					<center>
						<div class="col-md-offset-4 col-md-4" align="center">
							<img src="assets/images/itilogo.png" width="100px" alt=""> <br>
							<br>
							<form id="login-form" class="well-lg login-form" action="plantillas/validar.php" method="post" autocomplete="off" style="background: rgb(22, 105, 173,.05);">
								<input type="hidden" name="_csrf" value="IlsPPYjeFxmmgAYwU51gyXeblabIaF2OZdjbwGA6aoJGFEkP7bZtQOPDf34SsDqDFM2mkoEQN70ogriUNF0e2w==" />
								<div class="form-group field-loginform-username required">
									<input type="text" id="loginform-username" class="form-control" name="username" placeholder="Usuario" autocomplete="off" aria-required="true" required />
									<p class="help-block help-block-error"></p>
								</div>
								<div class="form-group field-loginform-password required">
									<input type="password" id="loginform-password" name="password" placeholder="Contraseña" autocomplete="off" aria-required="true" required />
									<p class="help-block help-block-error"></p>
								</div>
								<button type="submit" class="btn btn-sm btn-tecnm btn-block" name="entrar">Acceder</button>
							</form>
							<h4>Si no recuerda su contraseña acuda a<br>el
								<font color=green><b>Departamento De Sistemas Y Computación</b></font>
								</a>
							</h4><br>
							<br />
						</div>

					</center>
				</div>
			</div>
		</div>

	</div>
	<!-- Pie de página -->
	<div class="footer">
		<div class="social_block">
			<div class="hidden-lg hidden-md">
				<p>Redes</p>
			</div>
			<div class="hidden-sm hidden-xs">
				<p>Síguenos en nuestras redes sociales</p>
			</div>
			<ul>
				<li class="facebook"><a href="https://www.facebook.com/TECNM.campus.Iguala" target="_blank">Facebook</a></li>
				<li class="twitter"><a href="https://twitter.com/TecNM_Iguala" target="_blank">Twitter </a></li>
				<li class="youtube"><a href="https://www.youtube.com/channel/UCpSJGS6p28O5qrQjQGxlE8g" target="_blank">YouTube </a></li>
			</ul>
		</div>
		<div>
			<div style="background-size: cover; height: 90px; background-color: #235b4e !important;">
				<div class='col-md-12' style="height: 100%;display: inline-grid;">
					<center>
						<div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="height: 100%; display: grid; align-items: center;">
							<a href="https://www.gob.mx/" target="_blank">
								<img class="img-fluid" style="max-height: 50px; background-color: transparent;" src="https://framework-gb.cdn.gob.mx/landing/img/logoheader.svg" />
							</a>
						</div>
						<div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="height: 100%; display: grid; align-items: center;">
							<a href="https://www.gob.mx/sep" target="_blank">
								<img class="img-fluid" style="max-height:45px;" src="assets/images/logos/educacion.png" />
							</a>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="height: 100%; display: grid; align-items: center;">
							<a href="https://www.educacionsuperior.sep.gob.mx/institutos_tecnologicos.html" target="_blank">
								<img class="img-fluid" style="max-height:60px;" src="assets/images/logos/TecNM2021.png" />
							</a>
						</div>
						<div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="height: 100%; display: grid; align-items: center;">
							<a href="https://itiguala.edu.mx/" target="_blank">
								<img class="img-fluid" style="max-height:60px;" src="assets/images/logos/logosnc.png" />
							</a>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-6 hidden-xs footer-letra" style="height: 100%; display: grid; align-items: center;">
							ITI - ALGUNOS DERECHOS RESERVADOS © 2020<br>
							Carretera Nacional Iguala-Taxco,<br>
							Esquina Periferico Norte 40030
							Iguala de la Independencia, Guerrero, Mexico
						</div>
					</center>
				</div>
			</div>
			<div style="background-size: auto; height:40px; background-image: url(https://framework-gb.cdn.gob.mx/landing/img/pleca.svg) !important;">
			</div>

			<!-- /Pie de página -->
</body>

</html>