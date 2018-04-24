<?php
$this->breadcrumbs=array(
	'Info Cliente'=>array('index'),
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
			<a href="/proyecto/Info Cliente/index">Info Cliente</a>
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

<h2>Ver InfoCliente #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> cliente: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->cliente?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> nit_id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nit_id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> descripcion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->descripcion?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> pais: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->pais?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> ciudad: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->ciudad?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> telefono: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->telefono?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> nombre_contacto: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nombre_contacto?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> otro: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->otro?></span>
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
