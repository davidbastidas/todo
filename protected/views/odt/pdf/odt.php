<?php
$array = json_decode( $formato->json, true );
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
?>
<table class="border" style="width:100%">
	<tr>
		<td colspan="9" style="background-color:#DAEEF3">ORDEN DE TRABAJO (O.D.T.)</td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">EMPRESA</td>
		<td colspan="4"><?php echo $formato->empresa?></td>
		<td style="background-color:#DAEEF3">TIPO DE TRABAJO</td>
		<td colspan="3"><?php echo $formato->tipo_trabajo?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">NUMERO DE O.D.T.</td>
		<td colspan="4"><?php echo $formato->numero?></td>
		<td style="background-color:#DAEEF3">TRAZABILIDAD N°</td>
		<td colspan="3"><?php echo $formato->trazabilidad?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">CONSIGNACIÓN N°</td>
		<td colspan="2"><?php echo $formato->consignacion?></td>
		<td style="background-color:#DAEEF3">TIPO MTTO</td>
		<td colspan="2"><?php echo $formato->tipo_mantenimiento?></td>
		<td style="background-color:#DAEEF3">CATEGORIA</td>
		<td colspan="2"><?php echo $formato->categoria?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">FECHA</td>
		<td colspan="2"><?php echo $formato->fecha?></td>
		<td style="background-color:#DAEEF3">HORA PREVISTA INICIO</td>
		<td colspan="2"><?php echo $formato->hora_prevista_inicio?></td>
		<td style="background-color:#DAEEF3">HORA PREVISTA FIN</td>
		<td colspan="2"><?php echo $formato->hora_prevista_fin?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">AZT - Entrega ZP</td>
		<?php $date = new DateTime($array['fecha_zona_protegida']);?>
		<td colspan="2"><?php echo $date->format('d-m-Y') ?></td>
		<td><?php echo $array['hora_zona_protegida'] ?></td>
		<td><?php echo $array['firma_zona_protegida']?></td>
		<?php $date = new DateTime($array['jefe_zona_protegida']);?>
		<td style="background-color:#DAEEF3">JEFE DE TRABAJO - Recibe ZP</td>
		<td><?php echo $date->format('d-m-Y') ?></td>
		<td><?php echo $array['hora_jefe_zona_protegida'] ?></td>
		<td><?php echo $array['firma_jefe_zp']?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">AZT - Recibe ZT</td>
		<?php $date = new DateTime($array['fecha_zona_trabajo']);?>
		<td colspan="2"><?php echo $date->format('d-m-Y') ?></td>
		<td><?php echo $array['hora_zona_trabajo'] ?></td>
		<td><?php echo $array['firma_zona_trabajo']?></td>
		<?php $date = new DateTime($array['jefe_zona_trabajo']);?>
		<td style="background-color:#DAEEF3">JEFE DE TRABAJO -  Entrega ZT</td>
		<td><?php echo $date->format('d-m-Y') ?></td>
		<td><?php echo $array['hora_jefe_zona_trabajo'] ?></td>
		<td><?php echo $array['firma_jefe_zt']?></td>
	</tr>
	<tr>
		<td colspan="9" style="background-color:#DAEEF3">IDENTIFICACIÓN ACTIVO FÍSICO</td>
	</tr>
	<tr>
		<td>DEPARTAMENTO</td>
		<td colspan="2"><?php echo $formato->fk_equipo_fk->fk_subestacion_e->fk_ubicacion_s->nombre ?></td>
		<td colspan="2">ZONA</td>
		<td><?php echo ''?></td>
		<td colspan="2">BAHÍA/LN</td>
		<td><?php echo '' ?></td>
	</tr>
	<tr>
		<td>SUBESTACIÓN</td>
		<td colspan="2"><?php echo $formato->fk_equipo_fk->fk_subestacion_e->nombre ?></td>
		<td colspan="2">EQUIPO</td>
		<td><?php echo ''?></td>
		<td colspan="2">LUGAR TRABAJO</td>
		<td><?php echo '' ?></td>
	</tr>
	<tr>
		<td colspan="9" style="background-color:#DAEEF3">CONDICIONES DE SEGURIDAD</td>
	</tr>
	<tr>
		<td colspan="3">
			<?php 
				if($array['formato_ingreso_asociado']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
			FORMATO DE AUTORIZACÍON DE INGRESO DE ASOCIADO COMERCIAL
		</td>
		<td colspan="3">
			<?php 
				if($array['formato_analisis_riesgo']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
			ANALISIS DE RIESGOS SEGÚN FORMATO
		</td>
		<td colspan="3">
			<?php 
				if($array['formato_charla']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
			REALIZAR CHARLA INICIO ACTIVIDADES
		</td>
	</tr>
	<tr>
		<td colspan="4" style="background-color:#DAEEF3">
			<?php 
				if($array['formato_equipos_desenergizados']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
			TRABAJOS EN EQUIPOS DESERGENIZADOS
		</td>
		<td colspan="5" style="background-color:#DAEEF3">
			<?php 
				if($array['formato_tension_caliente']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
			TRABAJOS EN TENSION O EN CALIENTE
		</td>
	</tr>
	<tr>
		<td colspan="9" style="background-color:#DAEEF3">
			CUMPLIMIENTO REGLAS DE ORO Y SEGURIDAD PARA TRABAJOS EN REDES/SUBESTACIONES
		</td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">REGLA #</td>
		<td style="background-color:#DAEEF3">DESCRIPCION REGLA DE ORO</td>
		<td style="background-color:#DAEEF3">VoBo</td>
		<td style="background-color:#DAEEF3">Firma</td>
		<td style="background-color:#DAEEF3">DESCRIPCION REGLA DE ORO</td>
		<td style="background-color:#DAEEF3">VoBo</td>
		<td style="background-color:#DAEEF3">Firma</td>
		<td colspan="2" style="background-color:#DAEEF3">OBSERVACIONES</td>
	</tr>
	<tr>
		<td>1</td>
		<td>CORTE VISIBLE / EFECTIVO</td>
		<td>
			<?php echo $array['table_reglas_oro'][0]['corte_visible_efectivo'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][0]['firma_corte_visible_efectivo'] ?>
		</td>
		<td>USO ADECUADO EPP</td>
		<td>
			<?php echo $array['table_reglas_oro'][0]['uso_adecuado_epp'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][0]['firma_uso_adecuado_epp'] ?>
		</td>
		<td colspan="2">
			<?php echo $array['table_reglas_oro'][0]['observacion1'] ?>
		</td>
	</tr>
	<tr>
		<td>2</td>
		<td>BLOQUEO</td>
		<td>
			<?php echo $array['table_reglas_oro'][1]['bloqueo'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][1]['firma_bloqueo'] ?>
		</td>
		<td>PLANIFICACION DEL TRABAJO</td>
		<td>
			<?php echo $array['table_reglas_oro'][1]['planificacion_trabajo'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][1]['firma_planificacion_trabajo'] ?>
		</td>
		<td colspan="2">
			<?php echo $array['table_reglas_oro'][1]['observacion2'] ?>
		</td>
	</tr>
	<tr>
		<td>3</td>
		<td>VERIFICAR AUSENCIA DE TENSIÓN</td>
		<td>
			<?php echo $array['table_reglas_oro'][2]['verificar_ausencia_tension'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][2]['firma_verificar_ausencia_tension'] ?>
		</td>
		<td>MITIGAR RIESGOS</td>
		<td>
			<?php echo $array['table_reglas_oro'][2]['mitigar_riesgos'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][2]['firma_mitigar_riesgos'] ?>
		</td>
		<td colspan="2">
			<?php echo $array['table_reglas_oro'][2]['observacion3'] ?>
		</td>
	</tr>
	<tr>
		<td>4</td>
		<td>COLOCAR PUESTA A TIERRA</td>
		<td>
			<?php echo $array['table_reglas_oro'][3]['colocar_puesta_tierra'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][3]['firma_colocar_puesta_tierra'] ?>
		</td>
		<td>SEGUIR PROTOCOLOS-PROCEDIMIENTOS</td>
		<td>
			<?php echo $array['table_reglas_oro'][3]['seguir_protocolos_procedimientos'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][3]['firma_seguir_protocolos_procedimientos'] ?>
		</td>
		<td colspan="2">
			<?php echo $array['table_reglas_oro'][3]['observacion4'] ?>
		</td>
	</tr>
	<tr>
		<td>5</td>
		<td>DELIMITAR AREA DE TRABAJO</td>
		<td>
			<?php echo $array['table_reglas_oro'][4]['delimitar_area_trabajo'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][4]['firma_delimitar_area_trabajo'] ?>
		</td>
		<td>USO ADECUADO DE HERRAMIENTAS</td>
		<td>
			<?php echo $array['table_reglas_oro'][4]['uso_adecuado_herramientas'] ?>
		</td>
		<td>
			<?php echo $array['table_reglas_oro'][4]['firma_uso_adecuado_herramientas'] ?>
		</td>
		<td colspan="2">
			<?php echo $array['table_reglas_oro'][4]['observacion5'] ?>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="background-color:#DAEEF3">
			DESCRIPCIÓN DE LA PLANIFICACIÓN DEL TRABAJO / DAÑO
		</td>
		<td colspan="5" style="background-color:#DAEEF3">
			ZONA PROTEGIDA (ZP) - ZONA  DE TRABAJO (ZT) Croquis
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<?php echo $array['descripcion_planificacion_trabajo'] ?>
		</td>
		<td colspan="5">
			
		</td>
	</tr>
	<tr>
		<td colspan="4" style="background-color:#FFFF99">
			Cantidad  Programada = <?php echo $array['cantidad_programada'] ?>
		</td>
		<td colspan="5">
			
		</td>
	</tr>
	<tr>
		<td colspan="9" style="background-color:#DAEEF3">
			PARTE DE ACTIVIDAD
		</td>
	</tr>
	<tr>
		<th colspan="2" style="background-color:#DAEEF3">NUMERO DE HORAS</th>
		<th style="background-color:#DAEEF3">REAL</th>
		<th style="background-color:#DAEEF3">PREVISTO</th>
		<th colspan="5" style="background-color:#DAEEF3">CONDICIONES AMBIENTALES INICIALES</th>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3" colspan="2">H. DE TRABAJO PLANIFICADO (LABORADAS)</td>
		<td><?php echo $array['table_parte_actividad'][0]['real1'] ?></td>
		<td><?php echo $array['table_parte_actividad'][0]['previsto1'] ?></td>
		<td rowspan="4" colspan="5">
			<?php echo $array['table_parte_actividad'][0]['aseo_limpieza'] ?><br>
			<?php echo $array['table_parte_actividad'][0]['cuales_aseo_limpieza'] ?>
		</td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3" colspan="2">H. DESPLAZAMIENTO; IDA - REGRESO</td>
		<td><?php echo $array['table_parte_actividad'][0]['real2'] ?></td>
		<td><?php echo $array['table_parte_actividad'][0]['previsto2'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3" colspan="2">H. EXTRAS LABORADAS DIURNAS</td>
		<td><?php echo $array['table_parte_actividad'][0]['real3'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3" colspan="2">H. EXTRAS LABORADAS NOCTURNAS</td>
		<td><?php echo $array['table_parte_actividad'][0]['real4'] ?></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="9" style="background-color:#DAEEF3">
			PERSONAL OPERATIVO
		</td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">JEFE DE TRABAJO:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['jefe_trabajo'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 4:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona4'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 8:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona8'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">PERSONA 1:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona1'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 5:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona5'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 9:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona9'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">PERSONA 2:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona2'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 6:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona6'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 10:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona10'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">PERSONA 3:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona3'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 7:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona7'] ?></td>
		<td style="background-color:#DAEEF3">PERSONA 11:</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['persona11'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">HORA REAL INICIO</td>
		<td colspan="2"><?php echo $array['table_personal_operativo'][0]['hora_real_inicio'] ?></td>
		<td>RESPEL GENERADOS:</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['tubos_fluorecentes']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Tubos Fluorecentes
		</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['trapos_contaminados']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Trapos Contaminados
		</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['baterias']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Baterias
		</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['equipos_electronicos']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Equipos Electronicos
		</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['envases_quimicos']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Envases Quimicos
		</td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">HORA REAL FIN</td>
		<td colspan="2"></td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['aceites']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Aceites
		</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['contaminado_aceite']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Material Contaminado con Aceite
		</td>
		<td>
			<?php 
				if($array['table_personal_operativo'][0]['pcb']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> PCB
		</td>
		<td colspan="3">
			<?php 
				if($array['table_personal_operativo'][0]['otros_respel']){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?> Otros<br>
			Cual?. <?php echo $array['table_personal_operativo'][0]['otros_respel_texto'] ?>
		</td>
	</tr>
	<tr>
		<th colspan="4" style="background-color:#DAEEF3">INCIDENCIA EN LA NO EJECUCIÓN</th>
		<th colspan="2"  style="background-color:#DAEEF3">OBSERVACIONES</th>
		<th colspan="3"  style="background-color:#DAEEF3">CONDICIONES AMBIENTALES FINALES</th>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">OPERACIÓN</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_operacion'] ?></td>
		<td style="background-color:#DAEEF3">SEGURIDAD</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_seguridad'] ?></td>
		<td rowspan="5"  colspan="2">
			<?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_observacion'] ?>
		</td>
		<td rowspan="5" colspan="3">
			<p style="font-size:9px;">Que residuos se generaron en la ejecución de la actividades y que disposición se les dio.</p>
			<?php echo $array['table_incidencia_no_ejecucion'][0]['residuos_generados_actividad'] ?>
		</td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">CLIMATOLOGIA</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_climatologia'] ?></td>
		<td style="background-color:#DAEEF3">RECURSO HUMANO</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_recurso_humano'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">TECNICA</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_tecnica'] ?></td>
		<td style="background-color:#DAEEF3">MATERIALES</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_materiales'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">AVIFAUNA</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_avifauna'] ?></td>
		<td style="background-color:#DAEEF3">Registro Nº</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_registro'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#DAEEF3">ESPECIE</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_especie'] ?></td>
		<td style="background-color:#DAEEF3">Nº Nidos/Cantidad</td>
		<td><?php echo $array['table_incidencia_no_ejecucion'][0]['incidencia_nidos'] ?></td>
	</tr>
	<tr>
		<td colspan="9" style="background-color:#DAEEF3;text-align:center;">DESCRIPCION DEL TRABAJO REALIZADO</td>
	</tr>
	<tr>
		<td colspan="9" style="height:100px;"><?php echo $array['descripcion_trabajo_realizado'] ?></td>
	</tr>
	<tr>
		<td style="background-color:#FFFF99" colspan="4">CANTIDAD  EJECUTADA = <?php echo $array['cantidad_ejecutada'] ?></td>
		<td style="background-color:#FFFF99" colspan="5">REGISTROS: <?php echo $array['registros'] ?></td>
	</tr>
	<tr>
		<th colspan="9" style="background-color:#DAEEF3;text-align:center;">MATERIALES, EQUIPOS, HERRAMIENTAS, EPP UTILIZADOS</th>
	</tr>
	<tr>
		<th style="background-color:#DAEEF3">EQUIPOS INSTALADOS</th>
		<th style="background-color:#DAEEF3">SERIAL</th>
		<th style="background-color:#DAEEF3">HERRAMIENTAS / EPP</th>
		<th style="background-color:#DAEEF3">ESTADO</th>
		<th style="background-color:#DAEEF3">CANT.</th>
		<th colspan="2" style="background-color:#DAEEF3">EQUIPO DE PRUEBA</th>
		<th style="background-color:#DAEEF3">SERIAL</th>
		<th style="background-color:#DAEEF3">CANT.</th>
	</tr>
	<?php for ($i=0; $i < 14; $i++) {?>
	<tr>
		<td><?php echo $array['table_materiales_epp'][$i]['equipo_instalado'] ?></td>
		<td><?php echo $array['table_materiales_epp'][$i]['equipo_instalado_serial'] ?></td>
		<td><?php echo $array['table_materiales_epp'][$i]['herramientas_epp'] ?></td>
		<td><?php echo $array['table_materiales_epp'][$i]['herramientas_epp_estado'] ?></td>
		<td><?php echo $array['table_materiales_epp'][$i]['herramientas_epp_cantidad'] ?></td>
		<td colspan="2"><?php echo $array['table_materiales_epp'][$i]['equipo_prueba'] ?></td>
		<td><?php echo $array['table_materiales_epp'][$i]['equipo_prueba_serial'] ?></td>
		<td><?php echo $array['table_materiales_epp'][$i]['equipo_prueba_cantidad'] ?></td>
	</tr>
	<?php }?>
	<tr>
		<th colspan="2" style="background-color:#DAEEF3">EQUIPOS DESMONTADOS</th>
		<th colspan="2" style="background-color:#DAEEF3">SERIAL</th>
		<th colspan="2" style="background-color:#DAEEF3">MATERIALES/ INSUMOS</th>
		<th colspan="2" style="background-color:#DAEEF3">UNIDAD</th>
		<th style="background-color:#DAEEF3">CANT.</th>
	</tr>
	<?php for ($y=0; $y < 14; $y++) { $i++;?>
	<tr>
		<td colspan="2"><?php echo $array['table_equipos_desmontados'][$y]['equipo_desmontado'] ?></td>
		<td colspan="2"><?php echo $array['table_equipos_desmontados'][$y]['equipo_desmontado_serial'] ?></td>
		<td colspan="2"><?php echo $array['table_equipos_desmontados'][$y]['materiales_insumos'] ?></td>
		<td colspan="2"><?php echo $array['table_equipos_desmontados'][$y]['materiales_insumos_unidad'] ?></td>
		<td><?php echo $array['table_equipos_desmontados'][$y]['materiales_insumos_cantidad'] ?></td>
	</tr>
	<?php }?>
	<tr>
		<td colspan="3">FIRMA <?php echo $array['firma_responsable_odt'] ?></td>
		<td colspan="3">FIRMA <?php echo $array['firma_azt_sitio'] ?></td>
		<td colspan="3">FIRMA <?php echo $array['firma_feje_trabajo_sitio'] ?></td>
	</tr>
	<tr>
		<td colspan="3">NOMBRE <?php echo $array['firma_responsable_odt'] ?></td>
		<td colspan="3">NOMBRE <?php echo $array['firma_azt_sitio'] ?></td>
		<td colspan="3">NOMBRE <?php echo $array['firma_feje_trabajo_sitio'] ?></td>
	</tr>
	<tr>
		<td colspan="3" style="background-color:#DAEEF3">RESPONSABLE O.D.T.</td>
		<td colspan="3" style="background-color:#DAEEF3">AZT EN SITIO</td>
		<td colspan="3" style="background-color:#DAEEF3">JEFE DE TRABAJO EN SITIO</td>
	</tr>
	<tr>
		<td colspan="4" style="text-align:right;">¿SE CIERRA LA ODT?: <?php echo $array['cierra_odt'] ?></td>
		<td colspan="5" style="text-align:left;">FECHA CIERRE:  <?php echo $array['fecha_cierre'] ?></td>
	</tr>
	<tr>
		<td colspan="9" style="text-align:center;">
			ODT GENERADA N°: <?php echo $array['odt_generada_n'] ?>
		</td>
	</tr>
</table>