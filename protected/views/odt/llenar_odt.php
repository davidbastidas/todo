<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
Yii::app()->params['breadcrumbs']=
'<div class="breadcrumbs fixed" id="breadcrumbs">'.
	'<ul class="breadcrumb">'.
		'<li>'.
			'<i class="icon-home home-icon"></i>'.
			'<a href="'.$nameProyect.'/site/index">Inicio</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Llenar ODT</li>'.
	'</ul>'.
'</div>';
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada="";
if(isset($brigadas->datos_json)){
	$json_brigada=json_decode($brigadas->datos_json, true);
}else{
	$json_brigada=json_decode($odt->brigada_json, true);
}

$size=count($json_brigada['brigada']);
?>
<div id="info"></div>
<div class="row-fluid">
	<div class="span6">
		<h4>Formatos Obligatorios</h4>
		<hr>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Formato</th>
					<th>Accion</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
		<?php 
			foreach ($odtformatos as $value) {
				if($value->categoria=="L"){
				?>
				<tr>
					<td>
						<?php echo $value->nombre?>
					</td>
					<td>
						<?php 
						if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){?>
				            <button class="btn btn-mini btn-primary" onclick="abrirFormato(<?php echo $value->id?>);">
								<i class="icon-edit bigger-120"></i>
							</button>
				       	<?php } ?>
						<a class="btn btn-mini btn-danger" href="<?php echo $nameProyect?>/Odt/imprimirFormato/<?php echo $value->id?>" target="_blank">
							<i class="icon-print bigger-120"></i>
						</a>
					</td>
					<td>
						<?php echo $value->estado?>
					</td>
				</tr>
		<?php 	}
			}
	    ?>
			</tbody>
		</table>

		<h4>Pruebas a Equipos</h4>
		<hr>
		<?php 
		if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){?>
            <button class="btn btn-small btn-primary" onclick="nuevaPrueba()">Nueva Prueba</button>
       	<?php } ?>
		<br><br>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Prueba</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
		<?php 
			foreach ($pruebas as $val) {?>
				<tr>
					<td>
						<a href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/<?php echo $val->id?>" target="_blank"><?php echo $val->id?></a>
					</td>
					<td>
						<?php 
							if($val->fk_estado==1){
						?>
						<span class="label label-warning">Pendiente</span>
						<?php 
							}else if($val->fk_estado==3){
						?>
						<span class="label label-success arrowed-in arrowed-in-right">Terminado</span>
						<?php 
							}else if($val->fk_estado==4){
						?>
						<span class="label label-info arrowed-in arrowed-in-right">Digitando</span>
						<?php 
							}
						?>
					</td>
				</tr>
		<?php 	
			}
	    ?>
			</tbody>
		</table>
	</div>
	<div class="span6">
		<h4>Otros Formatos</h4>
		<hr>
		<?php 
		if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){?>
			<div class="form-inline">
				<select id="otros_formatos">
					<option value="">[Seleecione un formato]</option>
					<option value="1">MO.00142.CO-MA-FO.01 (Mantenimiento Banco De Baterias)</option>
					<option value="2">MO.00142.CO-MA-FO.02 (Inspeccion Tableros PCM)</option>
					<option value="3">MO.00142.CO-MA-FO.05 (Inspeccion Seccionador)</option>
					<option value="4">MO.00142.CO-MA-FO.06 (Inspeccion Interruptor)</option>
					<option value="5">MO.00142.CO-MA-FO.07 (Inspeccion Servicios Aux. VDC)</option>
					<option value="6">MO.00142.CO-MA-FO.08 (Inspeccion Servicios Aux. VAC)</option>
					<option value="7">MO.00142.CO-MA-FO.09 (Inspeccion Tc y Tp)</option>
					<option value="8">MO.00142.CO-MA-FO.10 (Inspeccion Pararrayo)</option>
					<option value="9">MO.00142.CO-MA-FO.11 (Inspeccion Fusibles)</option>
					<option value="10">MO.00142.CO-MA-FO.14 (Inspeccion Encapsulada)</option>
					<option value="11">MO.00142.CO-MA-FO.15 (Inspeccion Instalaciones Locativas)</option>
					<option value="12">MO.00142.CO-MA-FO.18 (Inspeccion Rutinaria Operador Movil)</option>
				</select>
	            <button  class="btn btn-small btn-primary" id="agregar_formato">Agregar</button>
            </div>
            <br>
       	<?php } ?>
		
		<table id="tabla_otro_formato" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Formato</th>
					<th>Accion</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
		<?php 
			foreach ($odtformatos as $value) {
				if($value->categoria=="R"){
				?>
				<tr id="<?php echo $value->id?>">
					<td>
						<?php echo $value->nombre?>
					</td>
					<td>
						<button class="btn btn-mini btn-primary" onclick="abrirFormato(<?php echo $value->id?>);">
							<i class="icon-edit bigger-120"></i>
						</button>
						<a class="btn btn-mini btn-danger" href="<?php echo $nameProyect?>/Odt/imprimirFormato/<?php echo $value->id?>" target="_blank">
							<i class="icon-print bigger-120"></i>
						</a>
						<button class="btn btn-mini btn-danger" onclick="eliminar(<?php echo $value->id?>);">
							<i class="icon-trash bigger-120"></i>
						</button>
					</td>
					<td>
						<?php echo $value->estado?>
					</td>
				</tr>
		<?php 	}
			}
	    ?>
			</tbody>
		</table>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			ODT
			<small>Llenar</small>
			<a class="btn btn-mini btn-danger" href="<?php echo $nameProyect?>/Odt/imprimirOdt/<?php echo $odt->id?>" target="_blank">
				<i class="icon-print bigger-120"></i>
			</a>
		</h3>
		<div class="row-fluid">
			<div class="span6">
				<div class="form-inline">
					<label>AZT - Entrega ZP</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="fecha_zona_protegida" name="fecha_zona_protegida" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>

				    <div class="input-append bootstrap-timepicker">
						<input id="hora_zona_protegida" name="hora_zona_protegida" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
					<select id="firma_zona_protegida" class="input-small">
						<option value="">FIRMA</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="span6">
				<div class="form-inline">
					<label>JEFE DE TRABAJO -  Recibe ZP</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="jefe_zona_protegida" name="jefe_zona_protegida" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>

				    <div class="input-append bootstrap-timepicker">
						<input id="hora_jefe_zona_protegida" name="hora_jefe_zona_protegida" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
					<select id="firma_jefe_zp" class="input-small">
						<option value="">FIRMA</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row-fluid">
			<div class="span6">
				<div class="form-inline">
					<label>AZT - Recibe ZT</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="fecha_zona_trabajo" name="fecha_zona_trabajo" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>
				    <div class="input-append bootstrap-timepicker">
						<input id="hora_zona_trabajo" name="hora_zona_trabajo" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
					<select id="firma_zona_trabajo" class="input-small">
						<option value="">FIRMA</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</div>
			</div>
			<div class="span6">
				<div class="form-inline">
					<label>JEFE DE TRABAJO -  Entrega ZT</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="jefe_zona_trabajo" name="jefe_zona_trabajo" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>

				    <div class="input-append bootstrap-timepicker">
						<input id="hora_jefe_zona_trabajo" name="hora_jefe_zona_trabajo" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
					<select id="firma_jefe_zt" class="input-small">
						<option value="">FIRMA</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</div>			    
			</div>
		</div>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			Condiciones
			<small>de Seguridad</small>
		</h3>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_ingreso_asociado">
							<span class="lbl"></span>
						</label>
					</td>
					<td>FORMATO DE AUTORIZACÍON DE INGRESO DE ASOCIADO COMERCIAL</td>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_analisis_riesgo">
							<span class="lbl"></span>
						</label>
					</td>
					<td>ANALISIS DE RIESGOS SEGÚN FORMATO</td>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_charla">
							<span class="lbl"></span>
						</label>
					</td>
					<td>REALIZAR CHARLA INICIO ACTIVIDADES</td>
				</tr>
				<tr>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_equipos_prueba">
							<span class="lbl"></span>
						</label>
					</td>
					<td>VERIFICACIÓN EQUIPOS DE PRUEBA</td>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_inspeccion_herramientas">
							<span class="lbl"></span>
						</label>
					</td>
					<td>INSPECCION DE HERRAMIENTAS</td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_equipos_desenergizados">
							<span class="lbl"></span>
						</label>
					</td>
					<td>TRABAJOS EN EQUIPOS DESERGENIZADOS</td>
					<td>
						<label class="pull-right">
							<input type="checkbox" id="formato_tension_caliente">
							<span class="lbl"></span>
						</label>
					</td>
					<td>TRABAJOS EN TENSION O EN CALIENTE</td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			CUMPLIMIENTO REGLAS DE ORO Y SEGURIDAD 
			<small>PARA TRABAJOS EN REDES/SUBESTACIONES</small>
		</h3>
		<table class="table table-bordered" id="table_reglas_oro">
			<thead>
				<tr>
					<td>REGLA #</td>
					<td>DESCRIPCION REGLA DE ORO</td>
					<td>VoBo</td>
					<td>Firma</td>
					<td>DESCRIPCION REGLA DE ORO</td>
					<td>VoBo</td>
					<td>Firma</td>
					<td>OBSERVACIONES</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>CORTE VISIBLE / EFECTIVO</td>
					<td>
						<select id="corte_visible_efectivo" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_corte_visible_efectivo" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>USO ADECUADO EPP</td>
					<td>
						<select id="uso_adecuado_epp" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_uso_adecuado_epp" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>
						<textarea class="span12 limited" id="observacion1" data-maxlength="26" rows="1"></textarea>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>BLOQUEO</td>
					<td>
						<select id="bloqueo" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_bloqueo" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PLANIFICACION DEL TRABAJO</td>
					<td>
						<select id="planificacion_trabajo" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_planificacion_trabajo" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>
						<textarea class="span12 limited" id="observacion2" data-maxlength="26" rows="1"></textarea>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>VERIFICAR AUSENCIA DE TENSIÓN</td>
					<td>
						<select id="verificar_ausencia_tension" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_verificar_ausencia_tension" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>MITIGAR RIESGOS</td>
					<td>
						<select id="mitigar_riesgos" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_mitigar_riesgos" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>
						<textarea class="span12 limited" id="observacion3" data-maxlength="26" rows="1"></textarea>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>COLOCAR PUESTA A TIERRA</td>
					<td>
						<select id="colocar_puesta_tierra" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_colocar_puesta_tierra" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>SEGUIR PROTOCOLOS-PROCEDIMIENTOS</td>
					<td>
						<select id="seguir_protocolos_procedimientos" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_seguir_protocolos_procedimientos" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>
						<textarea class="span12 limited" id="observacion4" data-maxlength="26" rows="1"></textarea>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>DELIMITAR AREA DE TRABAJO</td>
					<td>
						<select id="delimitar_area_trabajo" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_delimitar_area_trabajo" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>USO ADECUADO DE HERRAMIENTAS</td>
					<td>
						<select id="uso_adecuado_herramientas" class="input-small">
							<option value="">N/A</option>
							<option value="OK">OK</option>
							<option value="MAL">MAL</option>
						</select>
					</td>
					<td>
						<select id="firma_uso_adecuado_herramientas" class="input-small">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>
						<textarea class="span12 limited" id="observacion5" data-maxlength="26" rows="1"></textarea>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


<div class="row-fluid">
	<div class="span6">
		<label>DESCRIPCIÓN DE LA PLANIFICACIÓN DEL TRABAJO / DAÑO</label>
		<textarea class="span12 limited" id="descripcion_planificacion_trabajo" data-maxlength="700" rows="10"></textarea>
		<div class="form-inline">
			<label>Cantidad  Programada =</label>
			<input id="cantidad_programada" name="cantidad_programada" type="text" class="input-small" />
		</div>
	</div>
	<div class="span6">
		ZONA PROTEGIDA (ZP) - ZONA  DE TRABAJO (ZT) Croquis
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			PARTE DE ACTIVIDAD
		</h3>
		<table class="table table-bordered" id="table_parte_actividad">
			<thead>
				<tr>
					<th>NUMERO DE HORAS</th>
					<th>REAL</th>
					<th>PREVISTO</th>
					<th>CONDICIONES AMBIENTALES INICIALES</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>H. DE TRABAJO PLANIFICADO (LABORADAS)</td>
					<td><input id="real1" type="text" class="input-small" /></td>
					<td><input id="previsto1" type="text" class="input-small" /></td>
					<td rowspan="4">
						<label>El sitio de trabajo se encontró en buenas condiciones de aseo y limpieza?</label>
						<select id="aseo_limpieza" class="input-small">
							<option value="SI">SI</option>
							<option value="NO">NO</option>
						</select>
						<textarea class="span12 limited" id="cuales_aseo_limpieza" data-maxlength="100" rows="5"></textarea>
					</td>
				</tr>
				<tr>
					<td>H. DESPLAZAMIENTO; IDA - REGRESO</td>
					<td><input id="real2" type="text" class="input-small" /></td>
					<td><input id="previsto2" type="text" class="input-small" /></td>
				</tr>
				<tr>
					<td>H. EXTRAS LABORADAS DIURNAS</td>
					<td><input id="real3" type="text" class="input-small" /></td>
					<td></td>
				</tr>
				<tr>
					<td>H. EXTRAS LABORADAS NOCTURNAS</td>
					<td><input id="real4" type="text" class="input-small" /></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			PERSONAL OPERATIVO
		</h3>
		<table class="table table-bordered" id="table_personal_operativo">
			<tbody>
				<tr>
					<td>JEFE DE TRABAJO:</td>
					<td>
						<select id="jefe_trabajo" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 4:</td>
					<td>
						<select id="persona4" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 8:</td>
					<td>
						<select id="persona8" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>PERSONA 1:</td>
					<td>
						<select id="persona1" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 5:</td>
					<td>
						<select id="persona5" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 9:</td>
					<td>
						<select id="persona9" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>PERSONA 2:</td>
					<td>
						<select id="persona2" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 6:</td>
					<td>
						<select id="persona6" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 10:</td>
					<td>
						<select id="persona10" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>PERSONA 3:</td>
					<td>
						<select id="persona3" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 7:</td>
					<td>
						<select id="persona7" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
					<td>PERSONA 11:</td>
					<td>
						<select id="persona11" class="input-small">
							<option value="">N/A</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>HORA REAL INICIO</td>
					<td>
						<div class="input-append bootstrap-timepicker">
							<input id="hora_real_inicio" name="hora_real_inicio" type="text" class="input-small" />
							<span class="add-on">
								<i class="icon-time"></i>
							</span>
						</div>
					</td>
					<td rowspan="2" colspan="4">
						<div class="form-inline">
							<label class="checkbox">
								<span class="lbl">RESPEL GENERADOS:</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="tubos_fluorecentes">
								<span class="lbl">Tubos Fluorecentes</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="trapos_contaminados">
								<span class="lbl">Trapos Contaminados</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="baterias">
								<span class="lbl">Baterias</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="equipos_electronicos">
								<span class="lbl">Equipos Electronicos</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="envases_quimicos">
								<span class="lbl">Envases Quimicos</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="aceites">
								<span class="lbl">Aceites</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="contaminado_aceite">
								<span class="lbl">Material Contaminado con Aceite</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="pcb">
								<span class="lbl">PCB</span>
							</label>
							<label class="checkbox">
								<input type="checkbox" id="otros_respel">
								<span class="lbl">Otros</span>
							</label>
							<input id="otros_respel_texto" type="text" class="input-small" maxlength="10"/>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="4">INCIDENCIA EN LA NO EJECUCIÓN</th>
					<th>OBSERVACIONES</th>
					<th>CONDICIONES AMBIENTALES FINALES</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>OPERACIÓN</td>
					<td>
						<select id="incidencia_operacion" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
					<td>SEGURIDAD</td>
					<td>
						<select id="incidencia_seguridad" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
					<td rowspan="5">
						<textarea class="span12 limited" id="incidencia_observacion" data-maxlength="100" rows="11"></textarea>
					</td>
					<td rowspan="5">
						<label>Que residuos se generaron en la ejecución de la actividades y que disposición se les dio.</label>
						<textarea class="span12 limited" id="residuos_generados_actividad" data-maxlength="100" rows="9"></textarea>
					</td>
				</tr>
				<tr>
					<td>CLIMATOLOGIA</td>
					<td>
						<select id="incidencia_climatologia" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
					<td>RECURSO HUMANO</td>
					<td>
						<select id="incidencia_recurso_humano" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>TECNICA</td>
					<td>
						<select id="incidencia_tecnica" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
					<td>MATERIALES</td>
					<td>
						<select id="incidencia_materiales" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>AVIFAUNA</td>
					<td>
						<select id="incidencia_avifauna" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
					<td>Registro Nº</td>
					<td>
						<input id="incidencia_registro" type="text" class="input-small"maxlength="10"/>
					</td>
				</tr>
				<tr>
					<td>ESPECIE</td>
					<td>
						<select id="incidencia_especie" class="input-small">
							<option value="">N/A</option>
							<option value="x">X</option>
						</select>
					</td>
					<td>Nº Nidos/Cantidad</td>
					<td>
						<input id="incidencia_nidos" type="text" class="input-small"maxlength="10"/>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th colspan="2">DESCRIPCION DEL TRABAJO REALIZADO</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2">
						<textarea class="span12 limited" id="descripcion_trabajo_realizado" data-maxlength="400" rows="5"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-inline">
							<label>CANTIDAD  EJECUTADA =</label>
							<input id="cantidad_ejecutada" type="text" maxlength="10"/>
						</div>
					</td>
					<td>
						<div class="form-inline">
							<label>REGISTROS: </label>
							<input id="registros" type="text" maxlength="10"/>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="table table-bordered" id="table_materiales_epp">
			<thead>
				<tr>
					<th colspan="9">MATERIALES, EQUIPOS, HERRAMIENTAS, EPP UTILIZADOS</th>
				</tr>
				<tr>
					<th></th>
					<th>EQUIPOS INSTALADOS</th>
					<th>SERIAL</th>
					<th>HERRAMIENTAS / EPP</th>
					<th>ESTADO</th>
					<th>CANT.</th>
					<th>EQUIPO DE PRUEBA</th>
					<th>SERIAL</th>
					<th>CANT.</th>
				</tr>
			</thead>
			<tbody>
				<?php for ($i=1; $i < 15; $i++) {?>
				<tr>
					<td><?php echo $i?></td>
					<td><input id="equipo_instalado_<?php echo $i?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="equipo_instalado_serial_<?php echo $i?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="herramientas_epp_<?php echo $i?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="herramientas_epp_estado_<?php echo $i?>" type="text" maxlength="4" class="input-small"/></td>
					<td><input id="herramientas_epp_cantidad_<?php echo $i?>" type="text" maxlength="3" class="input-small"/></td>
					<td><input id="equipo_prueba_<?php echo $i?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="equipo_prueba_serial_<?php echo $i?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="equipo_prueba_cantidad_<?php echo $i?>" type="text" maxlength="3" class="input-small"/></td>
				</tr>
				<?php }?>

				<tr>
					<th></th>
					<th colspan="2">EQUIPOS DESMONTADOS</th>
					<th colspan="2">SERIAL</th>
					<!--<th></th>
					<th></th>
					<th></th>-->
					<th  colspan="2">MATERIALES/ INSUMOS</th>
					<th>UNIDAD</th>
					<th>CANT.</th>
				</tr>

				<?php for ($y=1; $y < 15; $y++) { $i++;?>
				<tr>
					<td><?php echo $y?></td>
					<td colspan="2"><input id="equipo_desmontado_<?php echo $y?>" type="text" maxlength="15" class="input-small"/></td>
					<td colspan="2"><input id="equipo_desmontado_serial_<?php echo $y?>" type="text" maxlength="15" class="input-small"/></td>
					<!--<td><input id="herramientas_epp_<?php echo $i?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="herramientas_epp_estado_<?php echo $i?>" type="text" maxlength="4" class="input-small"/></td>
					<td><input id="herramientas_epp_cantidad_<?php echo $i?>" type="text" maxlength="3" class="input-small"/></td>-->
					<td colspan="2"><input id="materiales_insumos_<?php echo $y?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="materiales_insumos_unidad_<?php echo $y?>" type="text" maxlength="15" class="input-small"/></td>
					<td><input id="materiales_insumos_cantidad_<?php echo $y?>" type="text" maxlength="3" class="input-small"/></td>
				</tr>
				<?php }?>

			</tbody>
		</table>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			FIRMA
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>RESPONSABLE O.D.T.</label>
					<select id="firma_responsable_odt">
						<option value="">N/A</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
				<td>
					<label>AZT EN SITIO</label>
					<select id="firma_azt_sitio">
						<option value="">N/A</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
				<td>
					<label>JEFE DE TRABAJO EN SITIO</label>
					<select id="firma_feje_trabajo_sitio">
						<option value="">N/A</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['nombre'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
		</table>
		<table class="table table-bordered">
			<tr>
				<td>
					<label>¿SE CIERRA LA ODT?</label>
					<select id="cierra_odt">
						<option value="SI">SI</option>
						<option value="NO">NO</option>
					</select>
				</td>
				<td>
					<label>FECHA CIERRE</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="fecha_cierre" name="fecha_cierre" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="center">
					<label>ODT GENERADA N°</label>
					<input class="input-small" id="odt_generada_n" maxlength="10" type="text"/>
				</td>
			</tr>
		</table>
		<?php 
		if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){?>
            <button class="btn btn-large btn-success" onclick="crearJson()">Guardar</button>
       	<?php } ?>
	</div>
</div>

<br><br><br>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/bootstrap-timepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#hora_zona_protegida, #hora_jefe_zona_protegida,'+
	  ' #hora_zona_trabajo, #hora_jefe_zona_trabajo,'+
	  ' #hora_real_inicio, #hora_real_fin').timepicker({
		minuteStep: 1,
		showSeconds: true,
		showMeridian: false
	});
	$('textarea[class*=limited]').each(function() {
		var limit = parseInt($(this).attr('data-maxlength')) || 100;
		$(this).inputlimiter({
			"limit": limit,
			remText: '%n caracteres disponibles...',
			limitText: 'maximo : %n.'
		});
	});
	$("#agregar_formato").click(function(){
		var r = confirm("¿Seguro Desea agregar este formato?");
		if (r == true) {
			if($('#otros_formatos').val()!=""){
				$.ajax({
			        url:"<?php echo $nameProyect?>/odt/InsertarFormato/<?php echo $odt->id?>",
			        type:'POST',
		            dataType:"json",
		            cache:false,
			        data: {
			            formato: $('#otros_formatos').val()
			        },
			        beforeSend:  function() {
			            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
			        },
			        success: function(data){
			        	if(data.respuesta=="1"){
			        		$('#tabla_otro_formato tbody').append(
			        			'<tr id="'+data.lasinsert+'">'+
			        			'<td>'+data.nombre+'</td>'+
			        			'<td>'+
				        			'<button class="btn btn-mini btn-primary" onclick="abrirFormato('+data.lasinsert+');">'+
										'<i class="icon-edit bigger-120"></i>'+
									'</button> '+
									'<button class="btn btn-mini btn-danger" onclick="eliminar('+data.lasinsert+');">'+
										'<i class="icon-trash bigger-120"></i>'+
									'</button>'+
								'</td>'+
			        			'<td>1</td>'+
			        			'</tr>'
			        		);
			        		$("#info").html('');
			        	}else{
							$("#info").html('No se agrego el Formato');
			        	}
			        }
			    });
			}
		}
	});
});
function abrirFormato(id){
	location.href="<?php echo $nameProyect?>/odt/verFormato/"+id;
}
function nuevaPrueba(){
	my_form=document.createElement('form');
	my_form.name='myForm';
	my_form.method='POST';
	my_form.action="<?php echo $nameProyect?>/Pruebas/ubicacion";

	my_tb=document.createElement('input');
	my_tb.type='text';
	my_tb.name='odt';
	my_tb.value='<?php echo $odt->id?>';
	my_form.appendChild(my_tb);
	document.body.appendChild(my_form);
	my_form.submit();
}
function eliminar(id){
	var r = confirm("¿Seguro Desea ELIMINAR este formato?");
	if (r == true) {
		$.ajax({
	        url:"<?php echo $nameProyect?>/odt/EliminarFormato",
	        type:'POST',
            dataType:"json",
            cache:false,
	        data: {
	            formato: id
	        },
	        beforeSend:  function() {
	            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
	        },
	        success: function(data){
	        	if(data.respuesta){
	        		$('#tabla_otro_formato #'+id).remove();
	        		$("#info").html('');
	        	}else{
					$("#info").html('No se Elimino el Formato');
	        	}
	        }
	    });
	}
}
function crearJson(){
	var json='{'+
		  '"fecha_zona_protegida": "'+$("#fecha_zona_protegida").val()+'",'+
		  '"hora_zona_protegida": "'+$("#hora_zona_protegida").val()+'",'+
		  '"firma_zona_protegida": "'+$("#firma_zona_protegida").val()+'",'+
		  '"jefe_zona_protegida": "'+$("#jefe_zona_protegida").val()+'",'+
		  '"hora_jefe_zona_protegida": "'+$("#hora_jefe_zona_protegida").val()+'",'+
		  '"firma_jefe_zp": "'+$("#firma_jefe_zp").val()+'",'+
		  '"fecha_zona_trabajo": "'+$("#fecha_zona_trabajo").val()+'",'+
		  '"hora_zona_trabajo": "'+$("#hora_zona_trabajo").val()+'",'+
		  '"firma_zona_trabajo": "'+$("#firma_zona_trabajo").val()+'",'+
		  '"jefe_zona_trabajo": "'+$("#jefe_zona_trabajo").val()+'",'+
		  '"hora_jefe_zona_trabajo": "'+$("#hora_jefe_zona_trabajo").val()+'",'+
		  '"firma_jefe_zt": "'+$("#firma_jefe_zt").val()+'",'+
		  '"formato_ingreso_asociado": '+$("#formato_ingreso_asociado").is(':checked')+','+
		  '"formato_analisis_riesgo": '+$("#formato_analisis_riesgo").is(':checked')+','+
		  '"formato_charla": '+$("#formato_charla").is(':checked')+','+
		  '"formato_equipos_prueba": '+$("#formato_equipos_prueba").is(':checked')+','+
		  '"formato_inspeccion_herramientas": '+$("#formato_inspeccion_herramientas").is(':checked')+','+
		  '"formato_equipos_desenergizados": '+$("#formato_equipos_desenergizados").is(':checked')+','+
		  '"formato_tension_caliente": '+$("#formato_tension_caliente").is(':checked')+','+
		  '"table_reglas_oro": ['+
		    '{'+
		      '"corte_visible_efectivo":"'+$("#corte_visible_efectivo").val()+'",'+
		      '"firma_corte_visible_efectivo":"'+$("#firma_corte_visible_efectivo").val()+'",'+
		      '"uso_adecuado_epp":"'+$("#uso_adecuado_epp").val()+'",'+
		      '"firma_uso_adecuado_epp":"'+$("#firma_uso_adecuado_epp").val()+'",'+
		      '"observacion1":"'+$("#observacion1").val()+'"'+
		    '},'+
		    '{'+
		      '"bloqueo":"'+$("#bloqueo").val()+'",'+
		      '"firma_bloqueo":"'+$("#firma_bloqueo").val()+'",'+
		      '"planificacion_trabajo":"'+$("#planificacion_trabajo").val()+'",'+
		      '"firma_planificacion_trabajo":"'+$("#firma_planificacion_trabajo").val()+'",'+
		      '"observacion2":"'+$("#observacion2").val()+'"'+
		    '},'+
		    '{'+
		      '"verificar_ausencia_tension":"'+$("#verificar_ausencia_tension").val()+'",'+
		      '"firma_verificar_ausencia_tension":"'+$("#firma_verificar_ausencia_tension").val()+'",'+
		      '"mitigar_riesgos":"'+$("#mitigar_riesgos").val()+'",'+
		      '"firma_mitigar_riesgos":"'+$("#firma_mitigar_riesgos").val()+'",'+
		      '"observacion3":"'+$("#observacion3").val()+'"'+
		    '},'+
		    '{'+
		      '"colocar_puesta_tierra":"'+$("#colocar_puesta_tierra").val()+'",'+
		      '"firma_colocar_puesta_tierra":"'+$("#firma_colocar_puesta_tierra").val()+'",'+
		      '"seguir_protocolos_procedimientos":"'+$("#seguir_protocolos_procedimientos").val()+'",'+
		      '"firma_seguir_protocolos_procedimientos":"'+$("#firma_seguir_protocolos_procedimientos").val()+'",'+
		      '"observacion4":"'+$("#observacion4").val()+'"'+
		    '},'+
		    '{'+
		      '"delimitar_area_trabajo":"'+$("#delimitar_area_trabajo").val()+'",'+
		      '"firma_delimitar_area_trabajo":"'+$("#firma_delimitar_area_trabajo").val()+'",'+
		      '"uso_adecuado_herramientas":"'+$("#uso_adecuado_herramientas").val()+'",'+
		      '"firma_uso_adecuado_herramientas":"'+$("#firma_uso_adecuado_herramientas").val()+'",'+
		      '"observacion5":"'+$("#observacion5").val()+'"'+
		    '}'+
		  '],'+
		  '"descripcion_planificacion_trabajo":"'+$("#descripcion_planificacion_trabajo").val()+'",'+
		  '"cantidad_programada":"'+$("#cantidad_programada").val()+'",'+
		  '"table_parte_actividad": ['+
		    '{'+
		      '"real1":"'+$("#real1").val()+'",'+
		      '"previsto1":"'+$("#previsto1").val()+'",'+
		      '"real2":"'+$("#real2").val()+'",'+
		      '"previsto2":"'+$("#previsto2").val()+'",'+
		      '"real3":"'+$("#real3").val()+'",'+
		      '"real4":"'+$("#real4").val()+'",'+
		      '"aseo_limpieza":"'+$("#aseo_limpieza").val()+'",'+
		      '"cuales_aseo_limpieza":"'+$("#cuales_aseo_limpieza").val()+'"'+
		    '}'+
		  '],'+
		  '"table_personal_operativo": ['+
		    '{'+
		      '"jefe_trabajo":"'+$("#jefe_trabajo").val()+'",'+
		      '"persona1":"'+$("#persona1").val()+'",'+
		      '"persona2":"'+$("#persona2").val()+'",'+
		      '"persona3":"'+$("#persona3").val()+'",'+
		      '"persona4":"'+$("#persona4").val()+'",'+
		      '"persona5":"'+$("#persona5").val()+'",'+
		      '"persona6":"'+$("#persona6").val()+'",'+
		      '"persona7":"'+$("#persona7").val()+'",'+
		      '"persona8":"'+$("#persona8").val()+'",'+
		      '"persona9":"'+$("#persona9").val()+'",'+
		      '"persona10":"'+$("#persona10").val()+'",'+
		      '"persona11":"'+$("#persona11").val()+'",'+
		      '"hora_real_inicio":"'+$("#hora_real_inicio").val()+'",'+
		      '"tubos_fluorecentes":'+$("#tubos_fluorecentes").is(':checked')+','+
		      '"trapos_contaminados":'+$("#trapos_contaminados").is(':checked')+','+
		      '"baterias":'+$("#baterias").is(':checked')+','+
		      '"equipos_electronicos":'+$("#equipos_electronicos").is(':checked')+','+
		      '"envases_quimicos":'+$("#envases_quimicos").is(':checked')+','+
		      '"aceites":'+$("#aceites").is(':checked')+','+
		      '"contaminado_aceite":'+$("#contaminado_aceite").is(':checked')+','+
		      '"pcb":'+$("#pcb").is(':checked')+','+
		      '"otros_respel":'+$("#otros_respel").is(':checked')+','+
		      '"otros_respel_texto":"'+$("#otros_respel_texto").val()+'"'+
		    '}'+
		  '],'+
		  '"table_incidencia_no_ejecucion": ['+
		    '{'+
		      '"incidencia_operacion":"'+$("#incidencia_operacion").val()+'",'+
		      '"incidencia_seguridad":"'+$("#incidencia_seguridad").val()+'",'+
		      '"incidencia_climatologia":"'+$("#incidencia_climatologia").val()+'",'+
		      '"incidencia_recurso_humano":"'+$("#incidencia_recurso_humano").val()+'",'+
		      '"incidencia_tecnica":"'+$("#incidencia_tecnica").val()+'",'+
		      '"incidencia_materiales":"'+$("#incidencia_materiales").val()+'",'+
		      '"incidencia_avifauna":"'+$("#incidencia_avifauna").val()+'",'+
		      '"incidencia_registro":"'+$("#incidencia_registro").val()+'",'+
		      '"incidencia_especie":"'+$("#incidencia_especie").val()+'",'+
		      '"incidencia_nidos":"'+$("#incidencia_nidos").val()+'",'+
		      '"incidencia_observacion":"'+$("#incidencia_observacion").val()+'",'+
		      '"residuos_generados_actividad":"'+$("#residuos_generados_actividad").val()+'"'+
		    '}'+
		  '],'+
		  '"descripcion_trabajo_realizado":"'+$("#descripcion_trabajo_realizado").val()+'",'+
		  '"cantidad_ejecutada":"'+$("#cantidad_ejecutada").val()+'",'+
		  '"registros":"'+$("#registros").val()+'",'+
		  '"table_materiales_epp": [';
		  for (var i = 1; i <= 14; i++) {
		  	if(i==1){
		  	   json+='{'+
				      '"equipo_instalado":"'+$("#equipo_instalado_"+i).val()+'",'+
				      '"equipo_instalado_serial":"'+$("#equipo_instalado_serial_"+i).val()+'",'+
				      '"herramientas_epp":"'+$("#herramientas_epp_"+i).val()+'",'+
				      '"herramientas_epp_estado":"'+$("#herramientas_epp_estado_"+i).val()+'",'+
				      '"herramientas_epp_cantidad":"'+$("#herramientas_epp_cantidad_"+i).val()+'",'+
				      '"equipo_prueba":"'+$("#equipo_prueba_"+i).val()+'",'+
				      '"equipo_prueba_serial":"'+$("#equipo_prueba_serial_"+i).val()+'",'+
				      '"equipo_prueba_cantidad":"'+$("#equipo_prueba_cantidad_"+i).val()+'"'+
				    '}';
		  	}else{
		  		json+=',{'+
				      '"equipo_instalado":"'+$("#equipo_instalado_"+i).val()+'",'+
				      '"equipo_instalado_serial":"'+$("#equipo_instalado_serial_"+i).val()+'",'+
				      '"herramientas_epp":"'+$("#herramientas_epp_"+i).val()+'",'+
				      '"herramientas_epp_estado":"'+$("#herramientas_epp_estado_"+i).val()+'",'+
				      '"herramientas_epp_cantidad":"'+$("#herramientas_epp_cantidad_"+i).val()+'",'+
				      '"equipo_prueba":"'+$("#equipo_prueba_"+i).val()+'",'+
				      '"equipo_prueba_serial":"'+$("#equipo_prueba_serial_"+i).val()+'",'+
				      '"equipo_prueba_cantidad":"'+$("#equipo_prueba_cantidad_"+i).val()+'"'+
				    '}';
		  	}
		  }
		json+='],'+
		 '"table_equipos_desmontados": [';
		 for (var i = 1; i <= 14; i++) {
		 	if(i==1){
		 		json+='{'+
			      '"equipo_desmontado":"'+$("#equipo_desmontado_"+i).val()+'",'+
			      '"equipo_desmontado_serial":"'+$("#equipo_desmontado_serial_"+i).val()+'",'+
			      '"materiales_insumos":"'+$("#materiales_insumos_"+i).val()+'",'+
			      '"materiales_insumos_unidad":"'+$("#materiales_insumos_unidad_"+i).val()+'",'+
			      '"materiales_insumos_cantidad":"'+$("#materiales_insumos_cantidad_"+i).val()+'"'+
			    '}';
		 	}else{
				json+=',{'+
			      '"equipo_desmontado":"'+$("#equipo_desmontado_"+i).val()+'",'+
			      '"equipo_desmontado_serial":"'+$("#equipo_desmontado_serial_"+i).val()+'",'+
			      '"materiales_insumos":"'+$("#materiales_insumos_"+i).val()+'",'+
			      '"materiales_insumos_unidad":"'+$("#materiales_insumos_unidad_"+i).val()+'",'+
			      '"materiales_insumos_cantidad":"'+$("#materiales_insumos_cantidad_"+i).val()+'"'+
			    '}';
		 	}
		 }
		    
		json+='],'+
		  '"firma_responsable_odt":"'+$("#firma_responsable_odt").val()+'",'+
		  '"firma_azt_sitio":"'+$("#firma_azt_sitio").val()+'",'+
		  '"firma_feje_trabajo_sitio":"'+$("#firma_feje_trabajo_sitio").val()+'",'+
		  '"cierra_odt":"'+$("#cierra_odt").val()+'",'+
		  '"fecha_cierre":"'+$("#fecha_cierre").val()+'",'+
		  '"odt_generada_n":"'+$("#odt_generada_n").val()+'"';

	json+='}';
	console.log(json);
	$.ajax({
        url:"<?php echo $nameProyect?>/Odt/ActualizarOdt",
        type:'POST',
        dataType:"json",
        cache:false,
        data: {
            json: json,
            id: <?php echo $odt->id?>
        },
        beforeSend:  function() {
            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
        },
        success: function(data){
        	
        	if(data.update=="1" || data.update=="0"){
        		location.href="<?php echo $nameProyect?>/odt/brigada";
        	}else{
        		$(".info").html('<div class="alert alert-error">'+
        			'<button class="close" data-dismiss="alert" type="button">'+
					'<i class="icon-remove"></i>'+
					'</button>'+
					'<strong>'+
					'<i class="icon-remove"></i>'+
					'No se guardo!'+
					'</strong>'+
					'Compruebe su conexion.'+
					'<br>'+
					'</div>');
        	}
            
        }
    });
}
function cargarDatos(){
	var text='<?php echo $odt->json?>';
	if(text.length>0){
		var data = JSON.parse('<?php echo $odt->json?>');
		$("#fecha_zona_protegida").val(data.fecha_zona_protegida)
		$("#hora_zona_protegida").val(data.hora_zona_protegida)
		$("#firma_zona_protegida").val(data.firma_zona_protegida)
		$("#jefe_zona_protegida").val(data.jefe_zona_protegida)
		$("#hora_jefe_zona_protegida").val(data.hora_jefe_zona_protegida)
		$("#firma_jefe_zp").val(data.firma_jefe_zp)
		$("#fecha_zona_trabajo").val(data.fecha_zona_trabajo)
		$("#hora_zona_trabajo").val(data.hora_zona_trabajo)
		$("#firma_zona_trabajo").val(data.firma_zona_trabajo)
		$("#jefe_zona_trabajo").val(data.jefe_zona_trabajo)
		$("#hora_jefe_zona_trabajo").val(data.hora_jefe_zona_trabajo)
		$("#firma_jefe_zt").val(data.firma_jefe_zt)
		$('#formato_ingreso_asociado').prop('checked', data.formato_ingreso_asociado)
		$('#formato_analisis_riesgo').prop('checked', data.formato_analisis_riesgo)
		$('#formato_charla').prop('checked', data.formato_charla)
		$('#formato_equipos_prueba').prop('checked', data.formato_equipos_prueba)
		$('#formato_inspeccion_herramientas').prop('checked', data.formato_inspeccion_herramientas)
		$('#formato_equipos_desenergizados').prop('checked', data.formato_equipos_desenergizados)
		$('#formato_tension_caliente').prop('checked', data.formato_tension_caliente)

		$("#corte_visible_efectivo").val(data.corte_visible_efectivo)
		$("#firma_corte_visible_efectivo").val(data.firma_corte_visible_efectivo)
		$("#uso_adecuado_epp").val(data.uso_adecuado_epp)
		$("#firma_uso_adecuado_epp").val(data.firma_uso_adecuado_epp)
		$("#observacion1").val(data.observacion1)
		$("#bloqueo").val(data.bloqueo)
		$("#firma_bloqueo").val(data.firma_bloqueo)
		$("#planificacion_trabajo").val(data.planificacion_trabajo)
		$("#firma_planificacion_trabajo").val(data.firma_planificacion_trabajo)
		$("#observacion2").val(data.observacion2)
		$("#verificar_ausencia_tension").val(data.verificar_ausencia_tension)
		$("#firma_verificar_ausencia_tension").val(data.firma_verificar_ausencia_tension)
		$("#mitigar_riesgos").val(data.mitigar_riesgos)
		$("#firma_mitigar_riesgos").val(data.firma_mitigar_riesgos)
		$("#observacion3").val(data.observacion3)
		$("#colocar_puesta_tierra").val(data.colocar_puesta_tierra)
		$("#firma_colocar_puesta_tierra").val(data.firma_colocar_puesta_tierra)
		$("#seguir_protocolos_procedimientos").val(data.seguir_protocolos_procedimientos)
		$("#firma_seguir_protocolos_procedimientos").val(data.firma_seguir_protocolos_procedimientos)
		$("#observacion4").val(data.observacion4)
		$("#delimitar_area_trabajo").val(data.delimitar_area_trabajo)
		$("#firma_delimitar_area_trabajo").val(data.firma_delimitar_area_trabajo)
		$("#uso_adecuado_herramientas").val(data.uso_adecuado_herramientas)
		$("#firma_uso_adecuado_herramientas").val(data.firma_uso_adecuado_herramientas)
		$("#observacion5").val(data.observacion5)

		$("#descripcion_planificacion_trabajo").val(data.descripcion_planificacion_trabajo)
		$("#cantidad_programada").val(data.cantidad_programada)

		$("#real1").val(data.real1)
		$("#previsto1").val(data.previsto1)
		$("#real2").val(data.real2)
		$("#previsto2").val(data.previsto2)
		$("#real3").val(data.real3)
		$("#real4").val(data.real4)
		$("#aseo_limpieza").val(data.aseo_limpieza)
		$("#cuales_aseo_limpieza").val(data.cuales_aseo_limpieza)

		$("#jefe_trabajo").val(data.jefe_trabajo)
		$("#persona1").val(data.persona1)
		$("#persona2").val(data.persona2)
		$("#persona3").val(data.persona3)
		$("#persona4").val(data.persona4)
		$("#persona5").val(data.persona5)
		$("#persona6").val(data.persona6)
		$("#persona7").val(data.persona7)
		$("#persona8").val(data.persona8)
		$("#persona9").val(data.persona9)
		$("#persona10").val(data.persona10)
		$("#persona11").val(data.persona11)
		$("#hora_real_inicio").val(data.hora_real_inicio)
		$('#tubos_fluorecentes').prop('checked', data.tubos_fluorecentes)
		$('#trapos_contaminados').prop('checked', data.trapos_contaminados)
		$('#baterias').prop('checked', data.baterias)
		$('#equipos_electronicos').prop('checked', data.equipos_electronicos)
		$('#envases_quimicos').prop('checked', data.envases_quimicos)
		$('#aceites').prop('checked', data.aceites)
		$('#contaminado_aceite').prop('checked', data.contaminado_aceite)
		$('#pcb').prop('checked', data.pcb)
		$('#otros_respel').prop('checked', data.otros_respel)
		$("#otros_respel_texto").val(data.otros_respel_texto)

		$("#incidencia_operacion").val(data.incidencia_operacion)
		$("#incidencia_seguridad").val(data.incidencia_seguridad)
		$("#incidencia_climatologia").val(data.incidencia_climatologia)
		$("#incidencia_recurso_humano").val(data.incidencia_recurso_humano)
		$("#incidencia_tecnica").val(data.incidencia_tecnica)
		$("#incidencia_materiales").val(data.incidencia_materiales)
		$("#incidencia_avifauna").val(data.incidencia_avifauna)
		$("#incidencia_registro").val(data.incidencia_registro)
		$("#incidencia_especie").val(data.incidencia_especie)
		$("#incidencia_nidos").val(data.incidencia_nidos)
		$("#incidencia_observacion").val(data.incidencia_observacion)
		$("#residuos_generados_actividad").val(data.residuos_generados_actividad)

		$("#descripcion_trabajo_realizado").val(data.descripcion_trabajo_realizado)
		$("#cantidad_ejecutada").val(data.cantidad_ejecutada)
		$("#registros").val(data.registros)

		
		var size=data.table_materiales_epp.length;
		for (var i = 1; i <= size; i++) {
			$("#equipo_instalado_"+i).val(data.table_materiales_epp[i-1].equipo_instalado)
			$("#equipo_instalado_serial_"+i).val(data.table_materiales_epp[i-1].equipo_instalado_serial)
			$("#herramientas_epp_"+i).val(data.table_materiales_epp[i-1].herramientas_epp)
			$("#herramientas_epp_estado_"+i).val(data.table_materiales_epp[i-1].herramientas_epp_estado)
			$("#herramientas_epp_cantidad_"+i).val(data.table_materiales_epp[i-1].herramientas_epp_cantidad)
			$("#equipo_prueba_"+i).val(data.table_materiales_epp[i-1].equipo_prueba)
			$("#equipo_prueba_serial_"+i).val(data.table_materiales_epp[i-1].equipo_prueba_serial)
			$("#equipo_prueba_cantidad_"+i).val(data.table_materiales_epp[i-1].equipo_prueba_cantidad)
		}

		size=data.table_equipos_desmontados.length;
		for (var i = 1; i <= size; i++) {
			$("#equipo_desmontado_"+i).val(data.table_equipos_desmontados[i-1].equipo_desmontado)
			$("#equipo_desmontado_serial_"+i).val(data.table_equipos_desmontados[i-1].equipo_desmontado_serial)
			$("#materiales_insumos_"+i).val(data.table_equipos_desmontados[i-1].materiales_insumos)
			$("#materiales_insumos_unidad_"+i).val(data.table_equipos_desmontados[i-1].materiales_insumos_unidad)
			$("#materiales_insumos_cantidad_"+i).val(data.table_equipos_desmontados[i-1].materiales_insumos_cantidad)
		}

		$("#firma_responsable_odt").val(data.firma_responsable_odt)
		$("#firma_azt_sitio").val(data.firma_azt_sitio)
		$("#firma_feje_trabajo_sitio").val(data.firma_feje_trabajo_sitio)
		$("#cierra_odt").val(data.cierra_odt)
		$("#fecha_cierre").val(data.fecha_cierre)
		$("#odt_generada_n").val(data.odt_generada_n)
	}
	var estado='<?php echo $odt->estado?>';
	if (estado==4){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
cargarDatos();
</script>
