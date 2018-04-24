<?php
$ruta_imagenes = Yii::app() -> params['imagenes_proyecto'];
$array = json_decode( $formato->json, true );
$style_centro='style="text-align: center;"';
?>

<table style="color:#1F497D">
	<tr>
		<td style="width:10%"><img src="<?php echo $ruta_imagenes?>control_prev_lateral.jpg"></td>
		<td>
			<h3 style="font-size:10px;">CONTROL PREVENTIVO PREVIO A LOS TRABAJOS (a cumplimentar por encargado de los trabajos)</h3>
			<table class="border" style="width:100%">
				<tr>
					<td>UNIDAD PROMOTORA GNF:</td>
					<td colspan="3">
						<?php echo $array['unidad_promotora_gnf']?>
					</td>
				</tr>
				<tr>
					<td>EMPRESA/UNIDAD EJECUTORA:</td>
					<td colspan="3">
						<?php echo $array['empresa_ejecutora']?>
					</td>
				</tr>
				<tr>
					<td>LUGAR DE TRABAJO:</td>
					<td colspan="3">
						<?php echo $array['lugar_trabajo']?>
					</td>
				</tr>
				<tr>
					<td>TRABAJO A REALIZAR:</td>
					<td>
						<?php echo $array['trabajo_realizar']?>
					</td>
					<td colspan="2">
						Nº PT/OT <?php echo $array['n_pt_ot']?>
					</td>
				</tr>
				<tr>
					<td>ENCARGADO DE TRABAJO::</td>
					<td colspan="3">
						<?php echo $array['encargado_trabajo']?>
					</td>
				</tr>
				<tr>
					<td>Nº PERSONAS:</td>
					<td>
						<?php echo $array['n_personas']?>
					</td>
					<td>
						Fecha <?php echo $array['fecha']?>
					</td>
					<td>
						Hora <?php echo $array['hora']?>
					</td>
				</tr>
			</table>
			<p style="font-size:9px;">
				El objetivo de la cumplimentación de este documento es la de servir como lista de chequeo previo al inicio de los trabajos para la comprobación de las medidas de seguridad adoptadas. No sustituye al documento de obligado cumplimiento que es LA EVALUACIÓN DE RIESGOS Y PLANIFICACIÓN DE MEDIDAS PREVENTIVAS del trabajo.
			</p>
			<table class="border" style="width:100%">
				<thead>
					<tr>
						<th colspan="4">1) TIPO DE TRABAJO</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_altura']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN ALTURA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_tala_poda']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS DE TALA/PODA/DESBROCE</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_zanjas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN ZANJAS/EXCAVACIONES</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_izado']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS DE IZADO/MOVIMIENTO DE CARGA</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_galerias_tunel']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN GALERIAS/TUNELES/RECINTOS CERRADOS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_sin_tension']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS SIN TENSIÓN</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_espacio_confinado']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN ESPACIOS CONFINADOS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_en_tension']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN TENSION</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_atmosferas_explosivas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN ATMOSFERAS EXPLOSIVAS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_mediciones_ensayos']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>MEDICIONES, ENSAYOS Y VERIFICACIONES ELECTRICAS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_obra_civil']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS DE OBRA CIVIL</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_proximidad_tension']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EN PROXIMIDAD DE TENSION</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_sustancias_quimicas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS CON SUSTANCIAS QUIMICAS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_tendido_fibra']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS DE TENDIDO Y MANTENIMIENTO FIBRA ÓPTICA</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_explotacion_minas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS EXPLOTACIÓN DE MINAS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_tendido_canalizacion']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRABAJOS DE TENDIDO Y MANTENIMIENTO DE CANALIZACIONES DE GAS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trabajo_otros']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>OTROS (indicar): <?php echo $array['trabajo_otros_text']?></td>
						<td colspan="2"></td>
					</tr>
				</tbody>
			</table>

			<table class="border" style="width:100%">
				<thead>
					<tr>
						<th colspan="4">2) RIESGO PREVISTOS MAS SIGNIFICATIVOS</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['caida_distinto_nivel']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CAIDA A MISMO - DISTINTO NIVEL</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['exposicion_sustancias_quimicas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>EXPOSICION SUSTANCIAS QUIMICAS/ASFIXIA</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['caida_objetos']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CAIDA DE OBJETOS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['exposicion_contaminante_biologico']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>EXPOSICION CONTAMINANTES BIOLOGICOS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['contacto_sustancias_quimicas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CONTACTO SUSTANCIAS QUIMICAS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['ruido_vibraciones']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>RUIDO/VIBRACIONES</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['contacto_termico']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CONTACTO TERMICO</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['atrapamientos']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ATRAPAMIENTOS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['contacto_electrico']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CONTACTO ELECTRICO</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['atropellos']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ATROPELLOS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['arco_electrico']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ARCO ELECTRICO</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['choques']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CHOQUES</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['incendio_explosion']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>INCENDIO/EXPLOSIÓN</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['golpes_cortes']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>GOLPES/CORTES</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['desprendimientos_derrumbes']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>DESPRENDIMIENTOS/DERRUMBES</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['proyecciones']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PROYECCIONES</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['ataques_animales']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ATAQUES ANIMALES</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['riesgos_otros']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>OTROS (indicar): <?php echo $array['riesgos_otros_text']?></td>
					</tr>
				</tbody>
			</table>

			<table class="border" style="width:100%">
				<thead>
					<tr>
						<th colspan="4">3) PROTECCIONES</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['casco_seguridad']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CASCO SEGURIDAD <small>(con barbuquejo en trabajos en altura)</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['descargo_instalacion']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>DESCARGO EN INSTALACION (5 reglas oro)</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['proteccion_auditiva']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PROTECCION AUDITIVA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['senalar_delimitar_zt']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>SEÑALIZAR Y DELIMITAR ZONA DE TRABAJO</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['proteccion_respiratoria']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PROTECCION RESPIRATORIA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['senaliar_entorno_trabajo']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>SEÑALIZAR ENTORNO TRABAJO <small>(tráfico..)</small></td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['proteccion_facial']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PROTECCIÓN FACIAL <small>(arco eléctrico, prod. químicos, etc..)</small></td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['deteccion_gases_atmosfera']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>DETECCION DE GASES EN ATMOSFERA</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['calzado_seguridad']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CALZADO SEGURIDAD <small>(mecánico, químico..)</small></td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['herramienta_aislada']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>HERRAMIENTA AISLADA</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['arnes_anticaidas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ARNES DE SEGURIDAD/SISTEMA ANTICAIDAS</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['herramienta_antichispas']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>HERRAMIENTA ANTICHISPAS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['guantes_proteccion']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>GUANTES DE PROTECCIÓN <small>(mecánico, químico..)</small></td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['iluminacion_portatil']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ILUMINACIÓN PORTATIL <small>(separ.circuitos, tensión seg</small></td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['guante_proteccion_electrico']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>GUANTES DE PROTECCION ELECTRICO AT/BT</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['sistema_rescate']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>SISTEMA DE RESCATE</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['buzo_proteccion_quimica']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>BUZO DE PROTECCION QUIMICA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['pertigas_aislantes']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PERTIGAS AISLANTES</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['ropa_ignifuga']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ROPA IGNIFUGA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['alfombras_aislantes']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ALFOMBRAS AISLANTES</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['pantalla_soldadura']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PANTALLA /GAFAS SOLDADURA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['proteccion_contra_incendios']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>PROTECCION CONTRA INCENDIOS</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['equipo_proteccion_respiratoria']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>EQUIPO PROTECCION RESPIRATORIA</td>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['chaleco_flotador']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CHALECO FLOTADOR</td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['protecciones_otros']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>OTROS (indicar): <?php echo $array['protecciones_otros_text']?></td>
						<td colspan="2"></td>
					</tr>
				</tbody>
			</table>

			<table class="border" style="width:100%">
				<thead>
					<tr>
						<th colspan="3">4) CONDICIONES DEL ENTORNO</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['zona_actividad']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>ZONA DE LA ACTIVIDAD</td>
						<td><?php echo $array['zona_actividad_text']?></td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['trafico_vehiculos']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>TRÁFICO DE VEHÍCULOS</td>
						<td><?php echo $array['trafico_vehiculos_text']?></td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['climatologia']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CLIMATOLOGÍA</td>
						<td><?php echo $array['climatologia_text']?></td>
					</tr>
					<tr>
						<td style="text-align:center;font-size:6px;width:3%">
							<?php 
								if($array['condiciones_especiales']=='true'){
									echo '<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">&#9745;</b>';
								}else{
									echo '&#9744;';
								}
							?>
						</td>
						<td>CONDICIONES ESPECIALES</td>
						<td><?php echo $array['condiciones_especiales_text']?></td>
					</tr>
				</tbody>
			</table>
			<p style="font-size:9px;">
				Si las condiciones existentes no coinciden con las contempladas en la EVALUACIÓN DE RIESGOS Y PLANIFICACIÓN PREVENTIVA DE LOS TRABAJOS que le han sido entregadas por su empresa y, afectan de manera significativa a la seguridad, NO INICIE EL TRABAJO y consulte con su superior.
			</p>
			<table style="width:100%">
				<tr>
					<td style="width:70%"></td>
					<td style="width:30%">
						<table class="border" style="width:100%">
							<thead>
								<tr>
									<th>REALIZADO </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Firma: <?php echo $array['firma']?></td>
								</tr>
								<tr>
									<td>Nombre:</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

