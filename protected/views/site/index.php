<?php
Yii::app()->params['breadcrumbs']=
'<div class="breadcrumbs fixed" id="breadcrumbs">'.
	'<ul class="breadcrumb">'.
		'<li>'.
			'<i class="icon-home home-icon"></i>'.
			'Inicio'.
		'</li>'.
	'</ul>'.
'</div>';
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
?>
<?php $this->pageTitle = Yii::app()->name; ?>
<div class="page-header position-relative">
	<h1>
		Inicio
		<small>
			<i class="icon-double-angle-right"></i>
			Pruebas, Preinformes, Informes &amp; Notificaciones
		</small>
	</h1>
</div><!--/.page-header-->
<div class="row-fluid">
	<div class="span4">
		<h3 class="header smaller lighter red">Elije una tarea</h3>
		<?php if (!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {?>
		<a href="<?php echo $nameProyect ?>/Pruebas/ubicacion" class="btn btn-primary">
			<i class="icon-edit bigger-125"></i>
			Nueva Prueba
		</a>
		<?php }?>
		<a href="<?php echo $nameProyect ?>/preinformes/index" class="btn btn-inverse">
			<i class="icon-beaker bigger-125"></i>
			Preinforme
		</a>
		<a href="<?php echo $nameProyect ?>/informes/index" class="btn btn-danger">
			<i class="icon-bar-chart bigger-125"></i>
			Informe
		</a>
		<br><br>
		<?php if (!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {?>
		<a href="<?php echo $nameProyect ?>/aceite/index" class="btn btn-warning">
			<i class="icon-search bigger-125"></i>
			Pruebas Aceite
		</a>
		<?php }?>
		<a href="<?php echo $nameProyect ?>/Graficos/index" class="btn btn-purple">
			<i class="icon-bar-chart bigger-125"></i>
			Informe Grafico
		</a>
	</div>
	<div class="span8">
		<?php if (!Yii::app()->authManager->checkAccess('rol_consultas', Yii::app()->user->id)) {?>
		<div class="widget-box">
			<div class="widget-header header-color-blue" style="background: #7b5c4e;border-color: #7b5c4e;">
				<h5 class="bigger lighter">
					<i class="icon-table"></i>
					Ultimas Pruebas
				</h5>
			</div>

			<div class="widget-body" style="border-color: #7b5c4e;">
				<div class="widget-main no-padding">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>
									<i class="icon-user"></i>
									Usuario
								</th>
								<th>
									<i class="icon-file"></i>
									Prueba
								</th>
								<th class="hidden-480">Estado</th>
								<th class="hidden-480">Fecha</th>
								<th class="hidden-480">Sub</th>
								<th class="hidden-480">Equipo</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($pruebas as $key) {?>
							<tr>
								<td class=""><?php echo $key->fk_usuario_p->nombre?></td>
								<td class=""><a href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/<?php echo $key->id?>"><?php echo $key->id?></a></td>

								<td class="hidden-480">
									<?php 
										if($key->fk_estado==1){
									?>
									<span class="label label-warning">Pendiente</span>
									<?php 
										}else if($key->fk_estado==3){
									?>
									<span class="label label-success arrowed-in arrowed-in-right">Terminado</span>
									<?php 
										}else if($key->fk_estado==4){
									?>
									<span class="label label-info arrowed-in arrowed-in-right">Digitando</span>
									<?php 
										}
									?>
									<td class=""><?php echo $key->fecha?></td>
									<td class=""><?php echo SubEstacion::model()->findByPk($key->fk_equipo_p->fk_sub_estacion)->nombre ?></td>
									<td class="">
										<?php 
										$json_equipo = json_decode( $key->fk_equipo_p->datosjson, true );
										if(isset($json_equipo['nombre_eq'])){
											echo $json_equipo['nombre_eq'];
										}else{
											echo $key->fk_equipo_p->serie;
										}
										?>
									</td>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php }?>
	</div>

</div>
