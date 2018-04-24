<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Subestacion'=>array('index'),
	$model->id,
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

<h2>Ver Subestacion #<?php echo $model->id; ?></h2>
<?php //'success'  'error'  'notice'            
$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages) {
    foreach($flashMessages as $key => $message) {
    	if($key=="error"){
    		echo '<div class="alert alert-warning alert-dismissible" role="alert">
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">×</span></button> <strong>Alerta!</strong> 
    		'.$message.'</div>';
    	}
    }
}
?>
<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
		<div class="profile-info-name"> ID: </div>
		<div class="profile-info-value">
		<span style="display: inline;"><?php echo $model->id?></span>
		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name"> NOMBRE: </div>
		<div class="profile-info-value">
		<span style="display: inline;"><?php echo $model->nombre?></span>
		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name"> UBICACION: </div>
		<div class="profile-info-value">
		<span style="display: inline;"><?php echo $model->fk_ubicacion_s->nombre?></span>
		</div>
	</div>
</div>
<?php //echo '<pre>'.print_r($model).'</pre>';//echo $model->fk_tipo->nombre ?>
