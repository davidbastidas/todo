<?php
$this->breadcrumbs=array(
	'Info Facturacion'=>array('index'),
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
			<a href="/proyecto/Info Facturacion/index">Info Facturacion</a>
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

<h2>Ver InfoFacturacion #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> item: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->item?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> descripcion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->descripcion?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> cliente: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->cliente?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> pedido: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->pedido?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> valor_un: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->valor_un?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> moneda: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->moneda?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> alcance: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->alcance?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> soporte: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->soporte?></span>
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
