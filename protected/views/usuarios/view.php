<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);
Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="'.$nameProyect.'/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="'.$nameProyect.'/Usuarios/index">Usuarios</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>'.$model->id.'</li>
	</ul>
</div>
';
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Desea eliminar este item?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h2>Ver Usuarios #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> ID: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> NOMBRE: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nombre?></span>
	</div>
	</div>


	<div class="profile-info-row">
	<div class="profile-info-name"> NICKNAME: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nickname?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> ESTADO: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php if($model->estado == 1){echo 'ACTIVADO';}else if($model->estado == 0){echo 'DESACTIVADO';}?></span>
	</div>
	</div>

	<div class="profile-info-row">
	<div class="profile-info-name"> FK_TIPO: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->fk_tipo_u->nombre ?></span>
	</div>
	</div>

</div>
<?php //echo '<pre>'.print_r($model).'</pre>';//echo $model->fk_tipo->nombre ?>
