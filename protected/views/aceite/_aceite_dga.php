<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$json;
if(isset($model)){
	$json=json_decode($model->datos, true);
}else{
	$json=json_decode('{"reporte":"","fecha_muestreo":"","fecha_prueba":"","estado_equipo":"","analista":"","cliente":"","posicion_medida":"","hidrogeno":"","oxigeno":"","nitrogeno":"","metano":"","monoxido_carbono":"","dioxido_carbono":"","acetileno":"","etileno":"","etano":"","propano":"","total_gases":"","realizado_por":"","subestacion":"","temp_aceite_sup":"","temp_aceite_inf":"","observacion":""}', true);
}
?>
<div class="row-fluid">
	<div class="span4">
		<label for="reporte">Reporte</label>
		<input id="reporte" class="input-large" type="text" value="<?php echo $json['reporte']?>"/>

		<label for="fecha_muestreo">Fecha Muestreo</label>
		<div class="input-append bootstrap-timepicker">
		    <input class="span6 date-picker" id="fecha_muestreo" name="fecha_muestreo" type="text" data-date-format="yy-mm-dd" value="<?php echo $json['fecha_muestreo']?>"/>
		    <span class="add-on">
		        <i class="icon-calendar"></i>
		    </span>
		</div>

		<label for="fecha_prueba">Fecha Prueba</label>
		<div class="input-append bootstrap-timepicker">
		    <input class="span6 date-picker" id="fecha_prueba" name="fecha_prueba" type="text" data-date-format="yy-mm-dd" value="<?php echo $json['fecha_prueba']?>"/>
		    <span class="add-on">
		        <i class="icon-calendar"></i>
		    </span>
		</div>

		<label for="estado_equipo">Estado Equipo</label>
		<input id="estado_equipo" class="input-large" type="text" value="<?php echo $json['estado_equipo']?>"/>

		<label for="analista">Analista</label>
		<input id="analista" class="input-large" type="text" value="<?php echo $json['analista']?>"/>

		<label for="cliente">Cliente</label>
		<input id="cliente" class="input-large" type="text" value="<?php echo $json['cliente']?>"/>

		<label for="posicion_medida">Posicion de Medida</label>
		<input id="posicion_medida" class="input-large" type="text" value="<?php echo $json['posicion_medida']?>"/>

		<label for="hidrogeno">Hidrogeno</label>
		<input id="hidrogeno" class="input-large" type="text" value="<?php echo $json['hidrogeno']?>"/>

		<label for="oxigeno">Oxigeno</label>
		<input id="oxigeno" class="input-large" type="text" value="<?php echo $json['oxigeno']?>"/>

		<label for="nitrogeno">Nitrogeno</label>
		<input id="nitrogeno" class="input-large" type="text" value="<?php echo $json['nitrogeno']?>"/>

		<label for="metano">Metano</label>
		<input id="metano" class="input-large" type="text" value="<?php echo $json['metano']?>"/>

		<label for="monoxido_carbono">Monoxido de Carbono</label>
		<input id="monoxido_carbono" class="input-large" type="text" value="<?php echo $json['monoxido_carbono']?>"/>
	</div>
	<div class="span4">
		<label for="dioxido_carbono">Dioxido de Carbono</label>
		<input id="dioxido_carbono" class="input-large" type="text" value="<?php echo $json['dioxido_carbono']?>"/>

		<label for="acetileno">Acetileno</label>
		<input id="acetileno" class="input-large" type="text" value="<?php echo $json['acetileno']?>"/>

		<label for="etileno">Etileno</label>
		<input id="etileno" class="input-large" type="text" value="<?php echo $json['etileno']?>"/>

		<label for="etano">Etano</label>
		<input id="etano" class="input-large" type="text" value="<?php echo $json['etano']?>"/>

		<label for="propano">Propanos</label>
		<input id="propano" class="input-large" type="text" value="<?php echo $json['propano']?>"/>

		<label for="total_gases">Total Gases</label>
		<input id="total_gases" class="input-large" type="text" value="<?php echo $json['total_gases']?>"/>

		<label for="realizado_por">Realizado Por</label>
		<input id="realizado_por" class="input-large" type="text" value="<?php echo $json['realizado_por']?>"/>

		<label for="subestacion2">Subestacion</label>
		<input id="subestacion2" class="input-large" type="text" value="<?php echo $json['subestacion']?>"/>

		<label for="temp_aceite_sup">Temp. Aceite Superior</label>
		<input id="temp_aceite_sup" class="input-large" type="text" value="<?php echo $json['temp_aceite_sup']?>"/>

		<label for="temp_aceite_inf">Temp. Aceite Inferior</label>
		<input id="temp_aceite_inf" class="input-large" type="text" value="<?php echo $json['temp_aceite_inf']?>"/>

		<label for="observacion">Observaciones(Limite 400 caracteres)</label>
		<textarea class="input-large limited" id="observacion" data-maxlength="400"><?php echo $json['observacion']?></textarea>
	</div>
	<div class="span4">
		<h2>Elija el archivo PDF</h2>
		<div id="info_archivo"></div>
		<form name="form_subir" method="post" action="" enctype="multipart/form-data">
			<input id="ytLiFormato_UPLOAD" type="hidden" name="LiFormato[UPLOAD]" value="">
			<input id="LiFormato_UPLOAD" type="file" name="LiFormato[UPLOAD]">
		</form>
		<hr>
		<div id="archivopdf">
			<?php 
				if(isset($model)){
					if($model->filename!=""){?>
					<a class="btn btn-small btn-danger" href="<?php echo $nameProyect.'/Aceite/DescargarDigital/'.$model->id;?>">
                        <i class="icon-print bigger-120"></i>
                        Ver Digital
                    </a><br>
			<?php	}
					echo $model->filename;
				}
			?>
		</div>
	</div>
</div>