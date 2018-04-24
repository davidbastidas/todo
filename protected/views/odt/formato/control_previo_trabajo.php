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
		'<li>'.
			'<a href="'.$nameProyect.'/odt/index">Inicio</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			'<a href="'.$nameProyect.'/odt/llenarodt/'.$odt.'">Llenar ODT</a>'.
			'<span class="divider">'.
				 '<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>Control Previo Trabajo</li>'.
	'</ul>'.
'</div>';
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
$size=count($json_brigada['brigada']);
$json_formato=json_decode($formato->json, true);
?>
<div id="info"></div>

<div class="row-fluid">
	<div class="span12">
		<h3 class="header smaller lighter blue">
			CONTROL PREVENTIVO PREVIO A LOS TRABAJOS 
			<small>(a cumplimentar por encargado de los trabajos)</small>
		</h3>
		<table class="table table-bordered">
			<tr>
				<td>UNIDAD PROMOTORA GNF:</td>
				<td colspan="3">
					<input id="unidad_promotora_gnf" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>EMPRESA/UNIDAD EJECUTORA:</td>
				<td colspan="3">
					<input id="empresa_ejecutora" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>LUGAR DE TRABAJO:</td>
				<td colspan="3">
					<input id="lugar_trabajo" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>TRABAJO A REALIZAR:</td>
				<td>
					<input id="trabajo_realizar" type="text" maxlength="10"/>
				</td>
				<td colspan="2">
					<label>Nº PT/OT</label>
					<input id="n_pt_ot" type="text" maxlength="10"/>
				</td>
			</tr>
			<tr>
				<td>ENCARGADO DE TRABAJO::</td>
				<td colspan="3">
					<select id="encargado_trabajo">
						<option value="">FIRMA</option>
						<?php 
						for ($i=0; $i < $size; $i++) { 
							echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nº PERSONAS:</td>
				<td>
					<input id="n_personas" type="text" maxlength="10"/>
				</td>
				<td>
					<label>Fecha</label>
					<div class="input-append bootstrap-timepicker">
				        <input class="input-small date-picker" id="fecha" name="fecha" type="text" data-date-format="yyyy-mm-dd" />
				        <span class="add-on">
				            <i class="icon-calendar"></i>
				        </span>
				    </div>
				</td>
				<td>
					<label>Hora</label>
					<div class="input-append bootstrap-timepicker">
						<input id="hora" type="text" class="input-small" />
						<span class="add-on">
							<i class="icon-time"></i>
						</span>
					</div>
				</td>
			</tr>
		</table>
		<p>
			El objetivo de la cumplimentación de este documento es la de servir como lista de chequeo previo al inicio de los trabajos para la comprobación de las medidas de seguridad adoptadas. No sustituye al documento de obligado cumplimiento que es LA EVALUACIÓN DE RIESGOS Y PLANIFICACIÓN DE MEDIDAS PREVENTIVAS del trabajo.
		</p>
		<br>
		<table class="table table-bordered" id="trabajos">
			<thead>
				<tr>
					<th colspan="2">1) TIPO DE TRABAJO</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_altura">
							<span class="lbl"> TRABAJOS EN ALTURA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_tala_poda">
							<span class="lbl"> TRABAJOS DE TALA/PODA/DESBROCE</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_zanjas">
							<span class="lbl"> TRABAJOS EN ZANJAS/EXCAVACIONES</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_izado">
							<span class="lbl"> TRABAJOS DE IZADO/MOVIMIENTO DE CARGA </span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_galerias_tunel">
							<span class="lbl"> TRABAJOS EN GALERIAS/TUNELES/RECINTOS CERRADOS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_sin_tension">
							<span class="lbl"> TRABAJOS SIN TENSIÓN</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_espacio_confinado">
							<span class="lbl"> TRABAJOS EN ESPACIOS CONFINADOS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_en_tension">
							<span class="lbl"> TRABAJOS EN TENSION</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_atmosferas_explosivas">
							<span class="lbl"> TRABAJOS EN ATMOSFERAS EXPLOSIVAS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_mediciones_ensayos">
							<span class="lbl"> MEDICIONES, ENSAYOS Y VERIFICACIONES ELECTRICAS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_obra_civil">
							<span class="lbl"> TRABAJOS DE OBRA CIVIL</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_proximidad_tension">
							<span class="lbl"> TRABAJOS EN PROXIMIDAD DE TENSION</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_sustancias_quimicas">
							<span class="lbl"> TRABAJOS CON SUSTANCIAS QUIMICAS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_tendido_fibra">
							<span class="lbl"> TRABAJOS DE TENDIDO Y MANTENIMIENTO FIBRA ÓPTICA</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_explotacion_minas">
							<span class="lbl"> TRABAJOS EXPLOTACIÓN DE MINAS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="trabajo_tendido_canalizacion">
							<span class="lbl"> TRABAJOS DE TENDIDO Y MANTENIMIENTO DE CANALIZACIONES DE GAS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trabajo_otros">
							<span class="lbl"> OTROS (indicar):</span>
							<input id="trabajo_otros_text" type="text" maxlength="20"/>
						</label>

					</td>
					<td></td>
				</tr>
			</tbody>
		</table>

		<br>
		<table class="table table-bordered" id="riesgos">
			<thead>
				<tr>
					<th colspan="2">2) RIESGO PREVISTOS MAS SIGNIFICATIVOS</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="caida_distinto_nivel">
							<span class="lbl"> CAIDA A MISMO - DISTINTO NIVEL</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="exposicion_sustancias_quimicas">
							<span class="lbl"> EXPOSICION SUSTANCIAS QUIMICAS/ASFIXIA</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="caida_objetos">
							<span class="lbl"> CAIDA DE OBJETOS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="exposicion_contaminante_biologico">
							<span class="lbl"> EXPOSICION CONTAMINANTES BIOLOGICOS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="contacto_sustancias_quimicas">
							<span class="lbl"> CONTACTO SUSTANCIAS QUIMICAS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="ruido_vibraciones">
							<span class="lbl"> RUIDO/VIBRACIONES</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="contacto_termico">
							<span class="lbl"> CONTACTO TERMICO</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="atrapamientos">
							<span class="lbl"> ATRAPAMIENTOS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="contacto_electrico">
							<span class="lbl"> CONTACTO ELECTRICO</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="atropellos">
							<span class="lbl"> ATROPELLOS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="arco_electrico">
							<span class="lbl"> ARCO ELECTRICO</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="choques">
							<span class="lbl"> CHOQUES</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="incendio_explosion">
							<span class="lbl"> INCENDIO/EXPLOSIÓN</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="golpes_cortes">
							<span class="lbl"> GOLPES/CORTES</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="desprendimientos_derrumbes">
							<span class="lbl"> DESPRENDIMIENTOS/DERRUMBES</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="proyecciones">
							<span class="lbl"> PROYECCIONES</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="ataques_animales">
							<span class="lbl"> ATAQUES ANIMALES</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="riesgos_otros">
							<span class="lbl"> OTROS (indicar):</span>
							<input id="riesgos_otros_text" type="text" maxlength="20"/>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
		
		<br>
		<table class="table table-bordered" id="protecciones">
			<thead>
				<tr>
					<th colspan="2">3) PROTECCIONES</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="casco_seguridad">
							<span class="lbl"> CASCO SEGURIDAD <small>(con barbuquejo en trabajos en altura)</small></span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="descargo_instalacion">
							<span class="lbl"> DESCARGO EN INSTALACION (5 reglas oro)</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="proteccion_auditiva">
							<span class="lbl"> PROTECCION AUDITIVA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="senalar_delimitar_zt">
							<span class="lbl"> SEÑALIZAR Y DELIMITAR ZONA DE TRABAJO</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="proteccion_respiratoria">
							<span class="lbl"> PROTECCION RESPIRATORIA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="senaliar_entorno_trabajo">
							<span class="lbl"> SEÑALIZAR ENTORNO TRABAJO <small>(tráfico..)</small></span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="proteccion_facial">
							<span class="lbl"> PROTECCIÓN FACIAL <small>(arco eléctrico, prod. químicos, etc..)</small></span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="deteccion_gases_atmosfera">
							<span class="lbl"> DETECCION DE GASES EN ATMOSFERA</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="calzado_seguridad">
							<span class="lbl"> CALZADO SEGURIDAD <small>(mecánico, químico..)</small></span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="herramienta_aislada">
							<span class="lbl"> HERRAMIENTA AISLADA</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="arnes_anticaidas">
							<span class="lbl"> ARNES DE SEGURIDAD/SISTEMA ANTICAIDAS</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="herramienta_antichispas">
							<span class="lbl"> HERRAMIENTA ANTICHISPAS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="guantes_proteccion">
							<span class="lbl"> GUANTES DE PROTECCIÓN <small>(mecánico, químico..)</small></span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="iluminacion_portatil">
							<span class="lbl"> ILUMINACIÓN PORTATIL <small>(separ.circuitos, tensión seg</small></span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="guante_proteccion_electrico">
							<span class="lbl"> GUANTES DE PROTECCION ELECTRICO AT/BT</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="sistema_rescate">
							<span class="lbl"> SISTEMA DE RESCATE</span>
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label>
							<input type="checkbox" id="buzo_proteccion_quimica">
							<span class="lbl"> BUZO DE PROTECCION QUIMICA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="pertigas_aislantes">
							<span class="lbl"> PERTIGAS AISLANTES</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="ropa_ignifuga">
							<span class="lbl"> ROPA IGNIFUGA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="alfombras_aislantes">
							<span class="lbl"> ALFOMBRAS AISLANTES</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="pantalla_soldadura">
							<span class="lbl"> PANTALLA /GAFAS SOLDADURA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="proteccion_contra_incendios">
							<span class="lbl"> PROTECCION CONTRA INCENDIOS</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="equipo_proteccion_respiratoria">
							<span class="lbl"> EQUIPO PROTECCION RESPIRATORIA</span>
						</label>
					</td>
					<td>
						<label>
							<input type="checkbox" id="chaleco_flotador">
							<span class="lbl"> CHALECO FLOTADOR</span>
						</label>
					</td>
				</tr>

				<tr>
					<td>
						<label>
							<input type="checkbox" id="protecciones_otros">
							<span class="lbl"> OTROS (indicar):</span>
							<input id="protecciones_otros_text" type="text" maxlength="20"/>
						</label>
					</td>
					<td></td>
				</tr>
			</tbody>
		</table>

		<br>
		<table class="table table-bordered" id="condiciones">
			<thead>
				<tr>
					<th colspan="2">4) CONDICIONES DEL ENTORNO</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="zona_actividad">
							<span class="lbl"> ZONA DE LA ACTIVIDAD</span>
						</label>
					</td>
					<td>
						<input id="zona_actividad_text" type="text" maxlength="20"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="trafico_vehiculos">
							<span class="lbl"> TRÁFICO DE VEHÍCULOS</span>
						</label>
					</td>
					<td>
						<input id="trafico_vehiculos_text" type="text" maxlength="20"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="climatologia">
							<span class="lbl"> CLIMATOLOGÍA</span>
						</label>
					</td>
					<td>
						<input id="climatologia_text" type="text" maxlength="20"/>
					</td>
				</tr>
				<tr>
					<td>
						<label>
							<input type="checkbox" id="condiciones_especiales">
							<span class="lbl"> CONDICIONES ESPECIALES</span>
						</label>
					</td>
					<td>
						<input id="condiciones_especiales_text" type="text" maxlength="20"/>
					</td>
				</tr>
			</tbody>
		</table>
		<p>
			Si las condiciones existentes no coinciden con las contempladas en la EVALUACIÓN DE RIESGOS Y PLANIFICACIÓN PREVENTIVA DE LOS TRABAJOS que le han sido entregadas por su empresa y, afectan de manera significativa a la seguridad, NO INICIE EL TRABAJO y consulte con su superior.
		</p>
		<br>
		<table class="table table-bordered" id="realizado">
			<thead>
				<tr>
					<th>REALIZADO </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<label>Firma:</label>
						<select id="firma">
							<option value="">FIRMA</option>
							<?php 
							for ($i=0; $i < $size; $i++) { 
								echo '<option value="'.$json_brigada['brigada'][$i]['id'].'">'.$json_brigada['brigada'][$i]['nombre'].'</option>';
							}
							?>
						</select>
					</td>
				</tr>
			</tbody>
		</table>
		<button class="btn btn-large btn-success" onclick="crearJson()">Guardar</button>
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
	$('#hora').timepicker({
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
});
function crearJson(){
	var json='{'+
		  '"unidad_promotora_gnf": "'+$("#unidad_promotora_gnf").val()+'",'+
		  '"empresa_ejecutora": "'+$("#empresa_ejecutora").val()+'",'+
		  '"lugar_trabajo": "'+$("#lugar_trabajo").val()+'",'+
		  '"trabajo_realizar": "'+$("#trabajo_realizar").val()+'",'+
		  '"n_pt_ot": "'+$("#n_pt_ot").val()+'",'+
		  '"encargado_trabajo": "'+$("#encargado_trabajo").val()+'",'+
		  '"n_personas": "'+$("#n_personas").val()+'",'+
		  '"fecha": "'+$("#fecha").val()+'",'+
		  '"hora": "'+$("#hora").val()+'",'+

		  '"trabajo_altura": '+$("#trabajo_altura").is(':checked')+','+
		  '"trabajo_tala_poda": '+$("#trabajo_tala_poda").is(':checked')+','+
		  '"trabajo_zanjas": '+$("#trabajo_zanjas").is(':checked')+','+
		  '"trabajo_izado": '+$("#trabajo_izado").is(':checked')+','+
		  '"trabajo_galerias_tunel": '+$("#trabajo_galerias_tunel").is(':checked')+','+
		  '"trabajo_sin_tension": '+$("#trabajo_sin_tension").is(':checked')+','+
		  '"trabajo_espacio_confinado": '+$("#trabajo_espacio_confinado").is(':checked')+','+
		  '"trabajo_en_tension": '+$("#trabajo_en_tension").is(':checked')+','+
		  '"trabajo_atmosferas_explosivas": '+$("#trabajo_atmosferas_explosivas").is(':checked')+','+
		  '"trabajo_mediciones_ensayos": '+$("#trabajo_mediciones_ensayos").is(':checked')+','+
		  '"trabajo_obra_civil": '+$("#trabajo_obra_civil").is(':checked')+','+
		  '"trabajo_proximidad_tension": '+$("#trabajo_proximidad_tension").is(':checked')+','+
		  '"trabajo_sustancias_quimicas": '+$("#trabajo_sustancias_quimicas").is(':checked')+','+
		  '"trabajo_tendido_fibra": '+$("#trabajo_tendido_fibra").is(':checked')+','+
		  '"trabajo_explotacion_minas": '+$("#trabajo_explotacion_minas").is(':checked')+','+
		  '"trabajo_tendido_canalizacion": '+$("#trabajo_tendido_canalizacion").is(':checked')+','+
		  '"trabajo_otros": '+$("#trabajo_otros").is(':checked')+','+
		  '"trabajo_otros_text": "'+$("#trabajo_otros_text").val()+'",'+

		  '"caida_distinto_nivel": '+$("#caida_distinto_nivel").is(':checked')+','+
		  '"exposicion_sustancias_quimicas": '+$("#exposicion_sustancias_quimicas").is(':checked')+','+
		  '"caida_objetos": '+$("#caida_objetos").is(':checked')+','+
		  '"exposicion_contaminante_biologico": '+$("#exposicion_contaminante_biologico").is(':checked')+','+
		  '"contacto_sustancias_quimicas": '+$("#contacto_sustancias_quimicas").is(':checked')+','+
		  '"ruido_vibraciones": '+$("#ruido_vibraciones").is(':checked')+','+
		  '"contacto_termico": '+$("#contacto_termico").is(':checked')+','+
		  '"atrapamientos": '+$("#atrapamientos").is(':checked')+','+
		  '"contacto_electrico": '+$("#contacto_electrico").is(':checked')+','+
		  '"atropellos": '+$("#atropellos").is(':checked')+','+
		  '"arco_electrico": '+$("#arco_electrico").is(':checked')+','+
		  '"choques": '+$("#choques").is(':checked')+','+
		  '"incendio_explosion": '+$("#incendio_explosion").is(':checked')+','+
		  '"golpes_cortes": '+$("#golpes_cortes").is(':checked')+','+
		  '"desprendimientos_derrumbes": '+$("#desprendimientos_derrumbes").is(':checked')+','+
		  '"proyecciones": '+$("#proyecciones").is(':checked')+','+
		  '"ataques_animales": '+$("#ataques_animales").is(':checked')+','+
		  '"riesgos_otros": '+$("#riesgos_otros").is(':checked')+','+
		  '"riesgos_otros_text": "'+$("#riesgos_otros_text").val()+'",'+

		  '"casco_seguridad": '+$("#casco_seguridad").is(':checked')+','+
		  '"descargo_instalacion": '+$("#descargo_instalacion").is(':checked')+','+
		  '"proteccion_auditiva": '+$("#proteccion_auditiva").is(':checked')+','+
		  '"senalar_delimitar_zt": '+$("#senalar_delimitar_zt").is(':checked')+','+
		  '"proteccion_respiratoria": '+$("#proteccion_respiratoria").is(':checked')+','+
		  '"senaliar_entorno_trabajo": '+$("#senaliar_entorno_trabajo").is(':checked')+','+
		  '"proteccion_facial": '+$("#proteccion_facial").is(':checked')+','+
		  '"deteccion_gases_atmosfera": '+$("#deteccion_gases_atmosfera").is(':checked')+','+
		  '"calzado_seguridad": '+$("#calzado_seguridad").is(':checked')+','+
		  '"herramienta_aislada": '+$("#herramienta_aislada").is(':checked')+','+
		  '"arnes_anticaidas": '+$("#arnes_anticaidas").is(':checked')+','+
		  '"herramienta_antichispas": '+$("#herramienta_antichispas").is(':checked')+','+
		  '"guantes_proteccion": '+$("#guantes_proteccion").is(':checked')+','+
		  '"iluminacion_portatil": '+$("#iluminacion_portatil").is(':checked')+','+
		  '"guante_proteccion_electrico": '+$("#guante_proteccion_electrico").is(':checked')+','+
		  '"sistema_rescate": '+$("#sistema_rescate").is(':checked')+','+
		  '"buzo_proteccion_quimica": '+$("#buzo_proteccion_quimica").is(':checked')+','+
		  '"pertigas_aislantes": '+$("#pertigas_aislantes").is(':checked')+','+
		  '"ropa_ignifuga": '+$("#ropa_ignifuga").is(':checked')+','+
		  '"alfombras_aislantes": '+$("#alfombras_aislantes").is(':checked')+','+
		  '"pantalla_soldadura": '+$("#pantalla_soldadura").is(':checked')+','+
		  '"proteccion_contra_incendios": '+$("#proteccion_contra_incendios").is(':checked')+','+
		  '"equipo_proteccion_respiratoria": '+$("#equipo_proteccion_respiratoria").is(':checked')+','+
		  '"chaleco_flotador": '+$("#chaleco_flotador").is(':checked')+','+
		  '"protecciones_otros": '+$("#protecciones_otros").is(':checked')+','+
		  '"protecciones_otros_text": "'+$("#protecciones_otros_text").val()+'",'+

		  '"zona_actividad": '+$("#zona_actividad").is(':checked')+','+
		  '"trafico_vehiculos": '+$("#trafico_vehiculos").is(':checked')+','+
		  '"climatologia": '+$("#climatologia").is(':checked')+','+
		  '"condiciones_especiales": '+$("#condiciones_especiales").is(':checked')+','+
		  '"zona_actividad_text": "'+$("#zona_actividad_text").val()+'",'+
		  '"trafico_vehiculos_text": "'+$("#trafico_vehiculos_text").val()+'",'+
		  '"climatologia_text": "'+$("#climatologia_text").val()+'",'+
		  '"condiciones_especiales_text": "'+$("#condiciones_especiales_text").val()+'",'+

		  '"firma": "'+$("#firma").val()+'"'+
		'}';
	//console.log(json);
	$.ajax({
        url:"<?php echo $nameProyect?>/Odt/ActualizarFormato",
        type:'POST',
        dataType:"json",
        cache:false,
        data: {
            json: json,
            id: <?php echo $formato->id?>
        },
        beforeSend:  function() {
            $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
        },
        success: function(data){
        	
        	if(data.update=="1" || data.update=="0"){
        		location.href="<?php echo $nameProyect?>/odt/llenarodt/<?php echo $odt?>";
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
	var text='<?php echo $formato->json?>';
	if(text.length>0){
		var data = JSON.parse('<?php echo $formato->json?>');
		$("#unidad_promotora_gnf").val(data.unidad_promotora_gnf)
		$("#empresa_ejecutora").val(data.empresa_ejecutora)
		$("#lugar_trabajo").val(data.lugar_trabajo)
		$("#trabajo_realizar").val(data.trabajo_realizar)
		$("#n_pt_ot").val(data.n_pt_ot)
		$("#encargado_trabajo").val(data.encargado_trabajo)
		$("#n_personas").val(data.n_personas)
		$("#fecha").val(data.fecha)
		$("#hora").val(data.hora)

		$('#trabajo_altura').prop('checked', data.trabajo_altura)
		$('#trabajo_tala_poda').prop('checked', data.trabajo_tala_poda)
		$('#trabajo_zanjas').prop('checked', data.trabajo_zanjas)
		$('#trabajo_izado').prop('checked', data.trabajo_izado)
		$('#trabajo_galerias_tunel').prop('checked', data.trabajo_galerias_tunel)
		$('#trabajo_sin_tension').prop('checked', data.trabajo_sin_tension)
		$('#trabajo_espacio_confinado').prop('checked', data.trabajo_espacio_confinado)
		$('#trabajo_en_tension').prop('checked', data.trabajo_en_tension)
		$('#trabajo_atmosferas_explosivas').prop('checked', data.trabajo_atmosferas_explosivas)
		$('#trabajo_mediciones_ensayos').prop('checked', data.trabajo_mediciones_ensayos)
		$('#trabajo_obra_civil').prop('checked', data.trabajo_obra_civil)
		$('#trabajo_proximidad_tension').prop('checked', data.trabajo_proximidad_tension)
		$('#trabajo_sustancias_quimicas').prop('checked', data.trabajo_sustancias_quimicas)
		$('#trabajo_tendido_fibra').prop('checked', data.trabajo_tendido_fibra)
		$('#trabajo_explotacion_minas').prop('checked', data.trabajo_explotacion_minas)
		$('#trabajo_tendido_canalizacion').prop('checked', data.trabajo_tendido_canalizacion)
		$('#trabajo_otros').prop('checked', data.trabajo_otros)
		$("#trabajo_otros_text").val(data.trabajo_otros_text)

		$('#caida_distinto_nivel').prop('checked', data.caida_distinto_nivel)
		$('#exposicion_sustancias_quimicas').prop('checked', data.exposicion_sustancias_quimicas)
		$('#caida_objetos').prop('checked', data.caida_objetos)
		$('#exposicion_contaminante_biologico').prop('checked', data.exposicion_contaminante_biologico)
		$('#contacto_sustancias_quimicas').prop('checked', data.contacto_sustancias_quimicas)
		$('#ruido_vibraciones').prop('checked', data.ruido_vibraciones)
		$('#contacto_termico').prop('checked', data.contacto_termico)
		$('#atrapamientos').prop('checked', data.atrapamientos)
		$('#contacto_electrico').prop('checked', data.contacto_electrico)
		$('#atropellos').prop('checked', data.atropellos)
		$('#arco_electrico').prop('checked', data.arco_electrico)
		$('#choques').prop('checked', data.choques)
		$('#incendio_explosion').prop('checked', data.incendio_explosion)
		$('#golpes_cortes').prop('checked', data.golpes_cortes)
		$('#desprendimientos_derrumbes').prop('checked', data.desprendimientos_derrumbes)
		$('#proyecciones').prop('checked', data.proyecciones)
		$('#ataques_animales').prop('checked', data.ataques_animales)
		$('#riesgos_otros').prop('checked', data.riesgos_otros)
		$("#riesgos_otros_text").val(data.riesgos_otros_text)

		$('#casco_seguridad').prop('checked', data.casco_seguridad)
		$('#descargo_instalacion').prop('checked', data.descargo_instalacion)
		$('#proteccion_auditiva').prop('checked', data.proteccion_auditiva)
		$('#senalar_delimitar_zt').prop('checked', data.senalar_delimitar_zt)
		$('#proteccion_respiratoria').prop('checked', data.proteccion_respiratoria)
		$('#senaliar_entorno_trabajo').prop('checked', data.senaliar_entorno_trabajo)
		$('#proteccion_facial').prop('checked', data.proteccion_facial)
		$('#deteccion_gases_atmosfera').prop('checked', data.deteccion_gases_atmosfera)
		$('#calzado_seguridad').prop('checked', data.calzado_seguridad)
		$('#herramienta_aislada').prop('checked', data.herramienta_aislada)
		$('#arnes_anticaidas').prop('checked', data.arnes_anticaidas)
		$('#herramienta_antichispas').prop('checked', data.herramienta_antichispas)
		$('#guantes_proteccion').prop('checked', data.guantes_proteccion)
		$('#iluminacion_portatil').prop('checked', data.iluminacion_portatil)
		$('#guante_proteccion_electrico').prop('checked', data.guante_proteccion_electrico)
		$('#sistema_rescate').prop('checked', data.sistema_rescate)
		$('#buzo_proteccion_quimica').prop('checked', data.buzo_proteccion_quimica)
		$('#pertigas_aislantes').prop('checked', data.pertigas_aislantes)
		$('#ropa_ignifuga').prop('checked', data.ropa_ignifuga)
		$('#alfombras_aislantes').prop('checked', data.alfombras_aislantes)
		$('#pantalla_soldadura').prop('checked', data.pantalla_soldadura)
		$('#proteccion_contra_incendios').prop('checked', data.proteccion_contra_incendios)
		$('#equipo_proteccion_respiratoria').prop('checked', data.equipo_proteccion_respiratoria)
		$('#chaleco_flotador').prop('checked', data.chaleco_flotador)
		$('#protecciones_otros').prop('checked', data.protecciones_otros)
		$("#protecciones_otros_text").val(data.protecciones_otros_text)

		$('#zona_actividad').prop('checked', data.zona_actividad)
		$('#trafico_vehiculos').prop('checked', data.trafico_vehiculos)
		$('#climatologia').prop('checked', data.climatologia)
		$('#condiciones_especiales').prop('checked', data.condiciones_especiales)

		$("#zona_actividad_text").val(data.zona_actividad_text)
		$("#trafico_vehiculos_text").val(data.trafico_vehiculos_text)
		$("#climatologia_text").val(data.climatologia_text)
		$("#condiciones_especiales_text").val(data.condiciones_especiales_text)

		$("#firma").val(data.firma)
	}
	var estado='<?php echo $formato->estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
cargarDatos();
</script>
