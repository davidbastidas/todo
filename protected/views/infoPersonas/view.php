<?php
$this->breadcrumbs=array(
	'Info Personas'=>array('index'),
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
			<a href="/proyecto/Info Personas/index">Info Personas</a>
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

<h2>Ver InfoPersonas #<?php echo $model->id; ?></h2>

<div class="profile-user-info profile-user-info-striped">
	<div class="profile-info-row">
	<div class="profile-info-name"> id: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> cedula: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->cedula?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> nombres: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nombres?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> apellidos: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->apellidos?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> ciudad: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->ciudad?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> direccion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->direccion?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> telefono: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->telefono?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> celular: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->celular?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> correo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->correo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> licencia_conducir: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->licencia_conducir?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> rango_titulo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->rango_titulo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> nombre_titulo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->nombre_titulo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> fecha_titulo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->fecha_titulo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> institucion: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->institucion?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> mat_prof: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->mat_prof?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> rh: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->rh?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> contacto_emergencia: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->contacto_emergencia?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> telefono_contacto: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->telefono_contacto?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> talla_camisa: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->talla_camisa?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> talla_pantalon: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->talla_pantalon?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> talla_zapato: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->talla_zapato?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> cargo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->cargo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> telefono_corp: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->telefono_corp?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> pc_corp: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->pc_corp?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> id_sap: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->id_sap?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> ceco: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->ceco?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> pep: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->pep?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> tipo_contrato: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->tipo_contrato?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> contratante: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->contratante?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> eps: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->eps?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> arl: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->arl?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> salario_base: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->salario_base?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> bono_fijo: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->bono_fijo?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> fecha_ingreso: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->fecha_ingreso?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> foto: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->foto?></span>
	</div>
	</div>
	<div class="profile-info-row">
	<div class="profile-info-name"> hoja_vida: </div>
	<div class="profile-info-value">
	<span style="display: inline;"><?php echo $model->hoja_vida?></span>
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
