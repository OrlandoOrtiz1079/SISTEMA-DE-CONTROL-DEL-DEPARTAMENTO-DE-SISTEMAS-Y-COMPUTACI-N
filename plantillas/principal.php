<style>
	.footer-medio {
		height: 100%;
		display: grid;
		align-items: center;
	}


	.responsive {
		display: flex;
		flex-wrap: wrap;
		flex-direction: column;
	}

	@media only screen and (min-width: 768px) {
		.responsive {
			flex-direction: row;
			justify-content: center;
		}
	}

	@media only screen and (min-width: 1366px) {
		.responsive {
			flex-wrap: nowrap;
		}
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
<?PHP
session_start();
?>
<!DOCTYPE html>
<html lang="es-ES">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msapplication-config" content="none" />
	<meta name="csrf-param" content="_csrf">
	<meta name="csrf-token" content="IlsPPYjeFxmmgAYwU51gyXeblabIaF2OZdjbwGA6aoJGFEkP7bZtQOPDf34SsDqDFM2mkoEQN70ogriUNF0e2w==">
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/js/uikit-icons.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.2/dist/css/uikit.min.css" />

	<title>CAT-DSC :: ITI</title>
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<!-- estilos -->
	<link href="../assets/951c7ac5/css/bootstrap.css" rel="stylesheet">
	<link href="../assets/ce6448b4/css/strength-meter.min.css" rel="stylesheet">
	<link href="../assets/ef7a4106/css/kv-widgets.min.css" rel="stylesheet">
	<link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/responsive.css" rel="stylesheet">
	<link href="../assets/css/tecnm.css" rel="stylesheet">
	<link href="../assets/css/tecnm_responsive.css" rel="stylesheet">
	<link href="plantillas/plugins/alertify/css/alertify.css" rel="stylesheet">
	<link href="plantillas/plugins/imp-gallery/css/blueimp-gallery.min.css" rel="stylesheet">
	<link href="../assets/css/cat.css" rel="stylesheet">


</head>

<body>
	<header>
		<div class="row sinmargenes">
			<div class="fondo col-md-12 col-xs-12">
				<div class="logoizquierdo col-md-3 hidden-sm hidden-xs">
					<img src="../assets/images/logos/TecNM_Azteca.png" class="img-fluid">
				</div>
				<div class="logocentral col-md-5 col-sm-6">
					<img src="../assets/images/logos/TecNM_logo.png" class="img-fluid2">
				</div>
				<div class="logoderecho col-md-4 col-sm-6 hidden-xs">
					<p></p>
					<p></p>
					<span>CAT-DSC :: Centro de Aplicaciones</span><br />
					<span style="font-size: 1.5vw">
						<?php
						// $_SESSION['nombre']="Nazario Santana Rodriguez";
						$nombre = $_SESSION['nombre'];
						echo "<span>$nombre</span><br/>"; ?>
					</span>
					<span style="font-size: 1.5vw">
						<?php
						//  $_SESSION['perfil'] = "Secretaria";
						$perfil = $_SESSION['perfil'];
						echo "<span>$perfil</span><br/>"; ?>
					</span>
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
				<?php
				// $_SESSION['iniciarSesion'] = "ok";
				if (isset($_SESSION['iniciarSesion']) && $_SESSION['iniciarSesion'] == "ok") {

					echo '<div class="horizontal-main-wrapper">';

					// Usuario administrativo
					if ($_SESSION['perfil'] == "Administrador") {
				?>
						<ul id="w2" class="navbar-nav navbar-left nav">
							<li>
								<a href="../DeleteUser/index.php">
									<span class="glyphicon glyphicon-user" style="margin-right: 10px;"></span>
									Agregar Usuario
								</a>
							</li>
						</ul>
				<?php
					}
					echo '</div>';
				}
				?>
				<ul id="w2" class="navbar-nav navbar-right nav">
					<li><a href="cerrar_sesion.php"><span class="glyphicon glyphicon-log-out"></span>
							Cerrar Sesión</a></li>
				</ul>
			</div>
		</div>
	</nav> <br>
	<!-- /botones  -->
	<div class="footersistema">
		<br>
		<br>
		<br>

		<article style="margin-top: 2%; margin-bottom:2% " id="about" class="uk-flex uk-flex-middle uk-flex-column">
			<div class="responsive uk-width-expand">

				<?php
				if ($_SESSION['perfil'] == "Administrador") {
					include 'SDR.php';
					include 'SCA.php';
					include 'POLIS.php';
					include 'SEF.php';
					include 'SISTEMAGESTOR.php';
					include 'SCE.php';
					include 'SEC.php';

					 
				}
				?>

				<?php
				if ($_SESSION['perfil'] == "Secretaria") {
					include "SDR.php";
					include "SEF.php";
					include "SISTEMAGESTOR.php";
				}
				?>

				<?php
				if ($_SESSION['perfil'] == "Servicio") {
					include 'SDR.php';
					include 'SCA.php';
					include 'SISTEMAGESTOR.php';
					
				}
				?>

				<?php
				if ($_SESSION['perfil'] == "Laboratorio") {
					include 'SCA.php';
				}
				?>


				<?php
				if ($_SESSION['perfil'] == "Policia") {
					echo '<br/>';
					echo '<br/>';
					include 'POLIS.php';
					echo '<br/>';
					echo '<br/>';
					echo '<br/>';
				}
				?>


			</div>
			<br>
			<br>
		</article>
	</div>
	<!-- /Fin botones  -->
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
							<img class="img-fluid" style="max-height:45px;" src="../assets/images/logos/educacion.png" />
						</a>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="height: 100%; display: grid; align-items: center;">
						<a href="https://www.educacionsuperior.sep.gob.mx/institutos_tecnologicos.html" target="_blank">
							<img class="img-fluid" style="max-height:60px;" src="../assets/images/logos/TecNM2021.png" />
						</a>
					</div>
					<div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="height: 100%; display: grid; align-items: center;">
						<a href="https://itiguala.edu.mx/" target="_blank">
							<img class="img-fluid" style="max-height:60px;" src="../assets/images/logos/logosnc.png" />
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
	</div>

	<!-- /Pie de página -->
	<!-- script -->
	<script type="text/javascript">
		window.strength_06b96b85 = {
			"showMeter": false,
			"language": "es",
			"inputTemplate": "\u003Cdiv class=\u0022input-group\u0022\u003E{input}\u003Cspan class=\u0022input-group-addon\u0022\u003E{toggle}\u003C\/span\u003E\u003C\/div\u003E"
		};
	</script>
	<script src="../assets/690dc397/jquery.js"></script>
	<script src="../assets/be9f0a59/yii.js"></script>
	<script src="../assets/be9f0a59/yii.validation.js"></script>
	<script src="../assets/ce6448b4/js/strength-meter.min.js"></script>
	<script src="../assets/ce6448b4/js/locales/strength-meter-es.js"></script>
	<script src="../assets/ef7a4106/js/kv-widgets.min.js"></script>
	<script src="../assets/be9f0a59/yii.activeForm.js"></script>
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
	<script src="../assets/951c7ac5/js/bootstrap.js"></script>
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
</body>

</html>