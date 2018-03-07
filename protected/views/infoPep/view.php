<?php
$this->breadcrumbs=array(
	'Info Pep'=>array('index'),
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
			<a href="/proyecto/Info Pep/index">Info Pep</a>
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

<h2>Ver InfoPep #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> pep: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->pep?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> nombre: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nombre?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> ceco: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->ceco?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> presupuesto: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->presupuesto?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> margen: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->margen?></span>
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
