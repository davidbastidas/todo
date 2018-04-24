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
	\$model->{$nameColumn},
);\n";
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
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
		<li>'.<?php echo "\$model->{$this->tableSchema->primaryKey}";?>.'</li>
	</ul>
</div>
<?php echo "';"?>

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
	array('label'=>'Eliminar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Desea eliminar este item?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h2>Ver <?php echo $this->modelClass." #<?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h2>

<div class="profile-user-info profile-user-info-striped">
<?php 
foreach($this->tableSchema->columns as $column){?>
	<div class="profile-info-row">
	<div class="profile-info-name"> <?php echo $column->name?>: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo '<?php echo $model->'.$column->name.'?>'; ?></span>
	</div>
	</div>
<?php } ?>

</div>
