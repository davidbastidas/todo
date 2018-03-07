<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->class2name($this->modelClass);
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Actualizar',
);\n";
?>
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<?php 
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
echo "<?php Yii::app()->params['breadcrumbs']='";
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
		<li>Actualizar</li>
	</ul>
</div>
<?php echo "';?>"?>
<div class="widget-box">
	<div class="widget-header">
		<h4>Actualizar <?php echo $this->modelClass; ?></h4>
	</div>
	<div class="widget-body">
		<div class="widget-main no-padding">
			<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
		</div>
	</div>
</div>