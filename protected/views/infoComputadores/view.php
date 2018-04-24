<?php
$this->breadcrumbs=array(
	'Info Computadores'=>array('index'),
	$model->id,
);
Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="/proyecto/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="/proyecto/Info Computadores/index">Info Computadores</a>
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

<h2>Ver InfoComputadores #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> serial: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->serial?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> tipo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->tipo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> marca: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->marca?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> referencia: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->referencia?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> procesador: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->procesador?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> disco_duro: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->disco_duro?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> ram: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->ram?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> fecha_creacion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->fecha_creacion?></span>
	</div>
	</div>

</div>
