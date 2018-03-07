<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Equipos'=>array('index'),
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
			<a href="'.$nameProyect.'/Equipos/index">Equipos</a>
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
<script>
function nueva_prueba(){
	if($("#prueba").val()!="0"){
		location.href="<?php echo $nameProyect?>/Aceite/create/<?php echo $model->id?>?prueba="+$("#prueba").val();
	}else{
		$("#info").html('<div class="alert alert-error">'+
            			'<button class="close" data-dismiss="alert" type="button">'+
						'<i class="icon-remove"></i>'+
						'</button>'+
						'<strong>'+
						'<i class="icon-remove"></i>'+
						'</strong>'+
						'Elija el tipo de prueba.'+
						'<br>'+
						'</div>');
	}
	
}
</script>
<h2>Ver Equipos #<?php echo $model->id; ?></h2>
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
			<span style="display: inline;">
				<?php 
				$json_equipo = json_decode( $model->datosjson, true );
				if(isset($json_equipo['nombre_eq'])){
	                echo $json_equipo['nombre_eq'];
	            }else{
	               echo $model->serie; 
	            }
	            ?>
			</span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> SUBESTACION: </div>
		<div class="profile-info-value">
			<span style="display: inline;"><?php echo $model->fk_subestacion_e->nombre ?></span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> DEVANADOS: </div>
		<div class="profile-info-value">
			<span style="display: inline;"><?php echo $model->devanados ?></span>
		</div>
	</div>

	<div class="profile-info-row">
		<div class="profile-info-name"> CATEGORIA: </div>
		<div class="profile-info-value">
			<span style="display: inline;"><?php echo $model->fk_categoria_e->nombre ?></span>
		</div>
	</div>
</div>
<?php 
if($model->fk_categoria==1){?>
<br>
<div id="info"></div>
<div class="form-inline">
	<button class="btn btn-small btn-success" onclick="nueva_prueba()">
		<i class="icon-file bigger-110"></i>
	Nueva Prueba Aceite
	</button>
	<select id="prueba">
		<option value="0">Seleccione</option>
		<option value="1">DGA</option>
		<option value="2">FQ</option>
	</select>
</div>
<?php } ?>