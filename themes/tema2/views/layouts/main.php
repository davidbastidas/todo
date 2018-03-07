<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php  echo Yii::app() -> language; ?>" lang="<?php  echo Yii::app() -> language; ?>" dir="ltr">
<head>
<title><?php  echo CHtml::encode($this -> pageTitle); ?></title>
<meta charset="utf-8">
<meta name="description" content="Applus - Equipos">
<meta name="author" content="David Bastidas">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<!--<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<link rel="stylesheet" href="<?php  //echo Yii::app()->theme->baseUrl . '/views'; ?>/css/layout.css" type="text/css" />
<link rel="stylesheet" href="<?php  //echo Yii::app()->theme->baseUrl . '/views'; ?>/css/mypropio.css" type="text/css" />-->

<?php 
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
?>
<?php  //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<link rel="stylesheet" href="<?php  echo Yii::app() -> theme -> baseUrl . '/bootstrap'; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php  echo Yii::app() -> theme -> baseUrl . '/bootstrap'; ?>/css/bootstrap-responsive.min.css">
<link href="<?php  echo Yii::app() -> theme -> baseUrl . '/bootstrap'; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl . '/bootstrap'; ?>/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/css/fullcalendar.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/css/chosen.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/css/ace.min.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/css/ace-responsive.min.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/css/ace-skins.min.css" rel="stylesheet">
<link href="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/opensans/open-sans.css" rel="stylesheet">

</head>
<?php if(Yii::app()->user->id == ''){?>
	<body class="login-layout">
<?php }else{?>
	<body class="navbar-fixed breadcrumbs-fixed">
<?php }?>
<style>
	/*@font-face {
		font-family: 'Open Sans';
		font-style: normal;
		font-weight: 300;
		src: local('Open Sans Light'), local('OpenSans-Light'), url(http://themes.googleusercontent.com/static/fonts/opensans/v8/DXI1ORHCpsQm3Vp6mXoaTXhCUOGz7vYGh680lGh-uXM.woff) format('woff');
	}
	@font-face {
		font-family: 'Open Sans';
		font-style: normal;
		font-weight: 400;
		src: local('Open Sans'), local('OpenSans'), url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3T8E0i7KZn-EPnyo3HZu7kw.woff) format('woff');
	}*/
	.logo-page{
		width: 33px;
		height: 23px;
	}
</style>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>
<script type="text/javascript">
	if("ontouchend" in document) document.write("<script src='<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/bootstrap'; ?>/js/bootstrap.min.js"></script>
	<!--<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/bootstrap'; ?>/js/bootstrap-multiselect.js"></script>-->
	<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/chosen.jquery.min.js"></script>
	<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/fullcalendar.min.js"></script>
	<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/ace-elements.min.js"></script>
	<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/ace.min.js"></script>
	
		
		<?php 
		$MENU=array();
		if (Yii::app()->authManager->checkAccess('rol_administrador', Yii::app()->user->id)) {
			$MENU=array(
					array('label' => '<i class="icon-home home-icon"></i> Inicio', 'url' => array('/site/index')),
					array('label' => '<i class="icon-desktop"></i><span class="menu-text">Resursos</span><b class="arrow icon-angle-down"></b>',
							'url' => array('/#'),
							'visible' => !Yii::app()->user->isGuest,
							'linkOptions'=> array(
									'class' => 'dropdown-toggle',
									'activeCssClass' => 'active',
									'id'=>'recursos',
							),
							'itemOptions' => array(),
							'items' => array(
									array('label' => '<i class="icon-file-alt"></i> Nueva Prueba', 'url' => array('/Pruebas/ubicacion')),
									array('label' => '<i class="icon-beaker"></i> PreInformes', 'url' => array('/Preinformes/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-bar-chart"></i> Informes', 'url' => array('/Informes/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-bar-chart"></i> Pruebas Aceite', 'url' => array('/Aceite/index'), 'visible' => !Yii::app()->user->isGuest,),
							)),
					array('label' => '<i class="icon-group"></i><span class="menu-text">Admin</span><b class="arrow icon-angle-down"></b>',
							'url' => array('/#'),
							'visible' => !Yii::app()->user->isGuest,
							'linkOptions'=> array(
									'class' => 'dropdown-toggle',
									'activeCssClass' => 'active',
									'id'=>'admin',
							),
							'itemOptions' => array(),
							'items' => array(
									array('label' => '<i class="icon-user"></i> Usuarios', 'url' => array('/Usuarios/index')),
									array('label' => '<i class="icon-info-sign"></i> Equipos', 'url' => array('/Equipos/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-info-sign"></i> Subestaciones', 'url' => array('/Subestacion/index'), 'linkOptions'=> array('id'=>'subestacion',), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-info-sign"></i> Ubicacion', 'url' => array('/Ubicacion/index'), 'linkOptions'=> array('id'=>'ubicacion',), 'visible' => !Yii::app()->user->isGuest,),
							)),
					array('label' => '<i class="icon-cog"></i><span class="menu-text">Configuracion</span><b class="arrow icon-angle-down"></b>',
							'url' => array('/#'),
							'visible' => !Yii::app()->user->isGuest,
							'linkOptions'=> array(
									'class' => 'dropdown-toggle',
									'activeCssClass' => 'active',
									'id'=>'conf',
							),
							'itemOptions' => array(),
							'items' => array(
									array('label' => '<i class="icon-cog"></i> Brigadas', 'url' => array('/Usuarios/brigadas')),
									array('label' => '<i class="icon-cog"></i> Pep', 'url' => array('/InfoPep/index')),
									array('label' => '<i class="icon-cog"></i> Personas', 'url' => array('/InfoPersonas/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-cog"></i> Computadores', 'url' => array('/InfoComputadores/index'), 'linkOptions'=> array('id'=>'info_computadores',), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-cog"></i> Equipos', 'url' => array('/InfoEquipos/index'), 'linkOptions'=> array('id'=>'info_equipos',), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-cog"></i> Teléfonos', 'url' => array('/InfoTelefonos/index'), 'linkOptions'=> array('id'=>'info_telefonos',), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-cog"></i> Materiales', 'url' => array('/InfoMateriales/index'), 'linkOptions'=> array('id'=>'info_materiales',), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-cog"></i> Cliente', 'url' => array('/InfoCliente/index'), 'linkOptions'=> array('id'=>'info_cliente',), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-cog"></i> Facturacion', 'url' => array('/InfoFacturacion/index'), 'linkOptions'=> array('id'=>'info_facturacion',), 'visible' => !Yii::app()->user->isGuest,),
							)),
			);
		}else if (Yii::app()->authManager->checkAccess('rol_digitador', Yii::app()->user->id)) {
				$MENU=array(
					array('label' => '<i class="icon-home home-icon"></i> Inicio', 'url' => array('/site/index')),
					array('label' => '<i class="icon-desktop"></i><span class="menu-text">Resursos</span><b class="arrow icon-angle-down"></b>',
							'url' => array('/#'),
							'visible' => !Yii::app()->user->isGuest,
							'linkOptions'=> array(
									'class' => 'dropdown-toggle',
									'activeCssClass' => 'active',
									'id'=>'recursos',
							),
							'itemOptions' => array(),
							'items' => array(
									array('label' => '<i class="icon-file-alt"></i> Nueva Prueba', 'url' => array('/Equipos/equipos')),
									array('label' => '<i class="icon-beaker"></i> PreInformes', 'url' => array('/Preinformes/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-bar-chart"></i> Informes', 'url' => array('/Informes/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-bar-chart"></i> Pruebas Aceite', 'url' => array('/Aceite/index'), 'visible' => !Yii::app()->user->isGuest,),
							)),
			);
		}else if (Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {
				$MENU=array(
					array('label' => '<i class="icon-home home-icon"></i> Inicio', 'url' => array('/site/index')),
					array('label' => '<i class="icon-desktop"></i><span class="menu-text">Resursos</span><b class="arrow icon-angle-down"></b>',
							'url' => array('/#'),
							'visible' => !Yii::app()->user->isGuest,
							'linkOptions'=> array(
									'class' => 'dropdown-toggle',
									'activeCssClass' => 'active',
									'id'=>'recursos',
							),
							'itemOptions' => array(),
							'items' => array(
									array('label' => '<i class="icon-beaker"></i> PreInformes', 'url' => array('/Preinformes/index'), 'visible' => !Yii::app()->user->isGuest,),
									array('label' => '<i class="icon-bar-chart"></i> Informes', 'url' => array('/Informes/index'), 'visible' => !Yii::app()->user->isGuest,),
							)),
			);
		}
	
		if (Yii::app()->user->id>0) {
		?>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner" style="background: #DCDCDC;">
				<div class="container-fluid">
					<a href="#" class="brand" style="color:#7B5C4E;">
						<small>
							<img class="logo-page" src="<?php echo Yii::app()->baseUrl.'/images/';?>logo_applus.png">
							Equipos
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">
						
						<li class="light-blue" style="background: #DCDCDC;">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle" style="color:#7B5C4E;">
								<img class="nav-user-photo" src="<?php  echo Yii::app() -> theme -> baseUrl; ?>/views/images/avatar2.png" alt="Foto Usuario" />
								<span class="user-info">
									<small>Hola,</small>
									<?php  echo Yii::app()->user->getState('nombre'); ?>
								</span>
								<i class="icon-caret-down"></i>
							</a>
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<!--<li>
									<a href="<?php //echo $nameProyect?>/perfilusuarios/index">
										<i class="icon-user"></i>
										Mi Perfil
									</a>
								</li>
								<li class="divider"></li>-->
								<li>
									<a href="<?php echo $nameProyect?>/site/logout">
										<i class="icon-off"></i>
										Salir
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
		
		<div class="main-container container-fluid">
			<a id="menu-toggler" class="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>
			<div class="sidebar fixed menu-min" id="sidebar"><!--class="sidebar fixed" para barra expandida -->
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<?php 
				$this -> widget('zii.widgets.CMenu', array('encodeLabel' => false, 'activeCssClass' => 'active', 'activateParents' => true, 'htmlOptions' => array('class' => 'nav nav-list', ), 'submenuHtmlOptions' => array('class' => 'submenu', ), 'items' => $MENU, ));
				?>
				
				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>
			
			<div class="main-content">
				<?php echo Yii::app()->params['breadcrumbs'];?>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->
							<?php  echo $content?>
							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->
				
			</div><!--/.main-content-->
		</div>
	<?php }?>
	
	<?php if(Yii::app()->user->id == ''){?>
	<?php  echo $content?>
	<?php }?>
	
	<script type="text/javascript">
		function show_box(id) {
			$('.widget-box.visible').removeClass('visible');
			$('#'+id).addClass('visible');
		}
	</script>
	<script type="text/javascript">
		function comprobarMenus(){
			var li;
			li= $("#actividad").closest("li");
			if(li.attr("class")=='active'){
				$(li).addClass('active open');
			}
			li= $("#recursos").closest("li");
			if(li.attr("class")=='active'){
				$(li).addClass('active open');
			}
			li= $("#cita").closest("li");
			if(li.attr("class")=='active'){
				$(li).addClass('active open');
			}
			li= $("#agenda").closest("li");
			if(li.attr("class")=='active'){
				$(li).addClass('active open');
			}
		}
		comprobarMenus();
		
	</script>
	
</body>
</html>
