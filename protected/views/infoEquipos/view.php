<?php
$this->breadcrumbs=array(
	'Info Equipos'=>array('index'),
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
			<a href="/proyecto/Info Equipos/index">Info Equipos</a>
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

<h2>Ver InfoEquipos #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> serial_id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->serial_id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> tipo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->tipo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> descripcion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->descripcion?></span>
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
	<div class="profile-info-name"> serial: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->serial?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> fecha_calibracion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->fecha_calibracion?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> soporte_calibracion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->soporte_calibracion?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> factura: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->factura?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> estado: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->estado?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> fecha_creacion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->fecha_creacion?></span>
	</div>
	</div>

</div>
