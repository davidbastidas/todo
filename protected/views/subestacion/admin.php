<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Subestacion'=>array('index'),
	'Administrar',
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
			<a href="'.$nameProyect.'/Subestacion/index">Subestacion</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>Administrar</li>
	</ul>
</div>
';
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuarios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administrar Subestacion</h2>

<p>
Tambien puede escribir un operador de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de sus valores de busqueda para especificar como se debe hacer la comparacion.
</p>

<div class="widget-box collapsed">
	<div class="widget-header widget-header-small header-color-orange">
		<h6><i class="icon-sort"></i>Busqueda Avanzada</h6>
		<div class="widget-toolbar">
			<a data-action="collapse" href="#">
				<i class="icon-chevron-down"></i>
			</a>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-main">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div>
	</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'columns'=>array(
		'nombre',
		'fk_ubicacion_s.nombre',
		array(
			'header' => 'Acciones',
			'class' => 'DButtonColumn',
			'viewButtonImageUrl' => '<i class="icon-zoom-in bigger-130"></i>',
			'updateButtonImageUrl' => '<i class="icon-pencil bigger-130"></i>',
			'deleteButtonImageUrl' => '<i class="icon-trash bigger-130"></i>',
		),
	),
)); 
?>
