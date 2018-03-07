<?php
$this->breadcrumbs=array(
	'Info Facturacion',
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
		<li>Info Facturacion</li>
	</ul>
</div>
';


$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h2>Info Facturacion</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
