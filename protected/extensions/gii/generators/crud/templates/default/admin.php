<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
echo "<?php\n";
$label=$this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Administrar',
);\n";
echo "Yii::app()->params['breadcrumbs']='";
?>
<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="<?php echo $nameProyect?>/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="<?php echo $nameProyect?>/<?php echo $label?>/index"><?php echo $label?></a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>Administrar</li>
	</ul>
</div>
<?php echo "';"?>

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
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Administrar <?php echo $this->class2name($this->modelClass); ?></h2>

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
		<?php echo "<?php \$this->renderPartial('_search',array(
			'model'=>\$model,
		)); ?>\n"; ?>
		</div>
	</div>
</div>

<?php echo "<?php"; ?> $this->widget('DGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'header' => 'Acciones',
			'class' => 'DButtonColumn',
			'viewButtonImageUrl' => '<i class="icon-zoom-in bigger-130"></i>',
			'updateButtonImageUrl' => '<i class="icon-pencil bigger-130"></i>',
			'deleteButtonImageUrl' => '<i class="icon-trash bigger-130"></i>',
		),
	),
)); ?>
