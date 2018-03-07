<?php
$this->breadcrumbs=array(
	'Tipo Usuario'=>array('index'),
	$model->ID,
);
Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="/gic/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="/gic/Tipo Usuario/index">Tipo Usuario</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>'.$model->ID.'</li>
	</ul>
</div>
';
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Desea eliminar este item?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h2>Ver TipoUsuario #<?php echo $model->ID; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> ID: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->ID?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> NOMBRE: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->NOMBRE?></span>
	</div>
	</div>

</div>
