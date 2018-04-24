<?php 
$json;
if(isset($model)){
	$json=json_decode($model->datos, true);
}else{
	$json=json_decode('{"reporte":"","fecha_muestreo":"","fecha_prueba":"","estado_equipo":"","analista":"","cliente":"","posicion_medida":"","temp_aceite_sup":"","temp_aceite_inf":"","indice_color":"","n_neutralizacion":"","tension_interfacial":"","contenido_humedad":"","r_dielectrica":"","norma_rd":"","factor_potencia":"","hidroximentil":"","furfuril":"","furaldehido":"","acetil":"","metil":"","humedad_celulosa":"","contenido_pcbs":"","indice_calidad":"","observacion":""}', true);
}
?>
<div class="row-fluid">
	<div class="span4">
		<label for="reporte">Reporte</label>
		<input id="reporte" class="input-large" type="text" value="<?php echo $json['reporte']?>"/>

		<label for="fecha_muestreo">Fecha Muestreo</label>
		<div class="input-append bootstrap-timepicker">
		    <input class="span6 date-picker" id="fecha_muestreo" name="fecha_muestreo" type="text" data-date-format="yy-mm-dd"  value="<?php echo $json['fecha_muestreo']?>"/>
		    <span class="add-on">
		        <i class="icon-calendar"></i>
		    </span>
		</div>

		<label for="fecha_prueba">Fecha Prueba</label>
		<div class="input-append bootstrap-timepicker">
		    <input class="span6 date-picker" id="fecha_prueba" name="fecha_prueba" type="text" data-date-format="yy-mm-dd"  value="<?php echo $json['fecha_prueba']?>"/>
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

		<label for="temp_aceite_sup">Temp. Aceite Superior</label>
		<input id="temp_aceite_sup" class="input-large" type="text" value="<?php echo $json['temp_aceite_sup']?>"/>

		<label for="temp_aceite_inf">Temp. Aceite Inferior</label>
		<input id="temp_aceite_inf" class="input-large" type="text" value="<?php echo $json['temp_aceite_inf']?>"/>

		<label for="indice_color">Indice de Color</label>
		<input id="indice_color" class="input-large" type="text" value="<?php echo $json['indice_color']?>"/>

		<label for="n_neutralizacion">Numero de Neutralizacion</label>
		<input id="n_neutralizacion" class="input-large" type="text" value="<?php echo $json['n_neutralizacion']?>"/>

		<label for="tension_interfacial">Tension Interfacial</label>
		<input id="tension_interfacial" class="input-large" type="text" value="<?php echo $json['tension_interfacial']?>"/>
	</div>
	<div class="span4">
		<label for="contenido_humedad">Contenido de Humedad</label>
		<input id="contenido_humedad" class="input-large" type="text" value="<?php echo $json['contenido_humedad']?>"/>

		<label for="r_dielectrica">rigidez Dielectrica</label>
		<input id="r_dielectrica" class="input-large" type="text" value="<?php echo $json['r_dielectrica']?>"/>

		<label for="norma_rd">Norma Rd</label>
		<input id="norma_rd" class="input-large" type="text" value="<?php echo $json['norma_rd']?>"/>

		<label for="factor_potencia">Factor Potencia</label>
		<input id="factor_potencia" class="input-large" type="text" value="<?php echo $json['factor_potencia']?>"/>

		<label for="hidroximentil">5Hidroximentil 2 Furaldehido</label>
		<input id="hidroximentil" class="input-large" type="text" value="<?php echo $json['hidroximentil']?>"/>

		<label for="furfuril">2 Furfuril Alcohol</label>
		<input id="furfuril" class="input-large" type="text" value="<?php echo $json['furfuril']?>"/>

		<label for="furaldehido">2 Furaldehido</label>
		<input id="furaldehido" class="input-large" type="text" value="<?php echo $json['furaldehido']?>"/>

		<label for="acetil">2 Acetil furano</label>
		<input id="acetil" class="input-large" type="text" value="<?php echo $json['acetil']?>"/>

		<label for="metil">5 Metil 2 Furaldehido</label>
		<input id="metil" class="input-large" type="text" value="<?php echo $json['metil']?>"/>

		<label for="humedad_celulosa">Humedad en Celulosa</label>
		<input id="humedad_celulosa" class="input-large" type="text" value="<?php echo $json['humedad_celulosa']?>"/>

		<label for="contenido_pcbs">Contenido de PCBs</label>
		<input id="contenido_pcbs" class="input-large" type="text" value="<?php echo $json['contenido_pcbs']?>"/>

		<label for="indice_calidad">Indice de Calidad</label>
		<input id="indice_calidad" class="input-large" type="text" value="<?php echo $json['indice_calidad']?>"/>

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