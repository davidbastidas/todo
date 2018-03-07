<?php
$this->breadcrumbs=array(
	'Info Pep'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<?php Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
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
		<li>Actualizar</li>
	</ul>
</div>
';?><div class="widget-box">
	<div class="widget-header">
		<h4>Actualizar InfoPep</h4>
	</div>
	<div class="widget-body">
		<div class="widget-main no-padding">
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>		</div>
	</div>
</div>