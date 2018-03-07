<?php
$array = json_decode( $formato->json, true );
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
?>
<h3 style="font-size:14px;width:100%;text-align:center;">
	 INSPECCIÓN SERVICIOS AUXILIARES VAC
</h3>
<table class="border" style="width:100%">
	<tr>
		<td>Subestación: <?php echo $array['subestacion']?></td>
		<td>Fecha <?php echo $array['fecha']?></td>
		<td>Hora <?php echo $array['hora']?></td>
	</tr>
	<tr>
		<td>No O. Trabajo <?php echo $array['n_odt']?></td>
		<td>No Consignación: <?php echo $array['n_consignacion']?></td>
		<td>Código de Opeación Equipo: <?php echo $array['cod_op_equipo']?></td>
	</tr>
</table>

<table class="border" style="width:100%">
	<tr>
		<th style="font-size:8px;width:40%">Preliminares</th>
		<th style="font-size:8px;width:10%"></th>
		<th style="text-align:center;font-size:8px;width:10%">Bueno</th>
		<th style="text-align:center;font-size:8px;width:10%">Regular</th>
		<th style="text-align:center;font-size:8px;width:10%">Malo</th>
		<th style="font-size:8px;width:20%" rowspan="21">Anotaciones: <?php echo $array['anotacion_preliminar']?></th>
	</tr>
	<tr>
		<td colspan="2">Celdas de alta tensión - Limpieza</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['celdas_alta_tension']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['celdas_alta_tension']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['celdas_alta_tension']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado cerramiento trafo servicios auxiliares</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_cerramiento_trafo']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_cerramiento_trafo']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_cerramiento_trafo']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado conexión puesta tierra trafo de servicios auxiliares</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_con_puesta_tierra']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_con_puesta_tierra']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_con_puesta_tierra']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Temperatura transformador de servicios auxiliares</td>
		<td><?php echo $array['temp_trafo_serv_aux']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['temp_trafo_serv_aux_radio']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['temp_trafo_serv_aux_radio']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['temp_trafo_serv_aux_radio']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Limpieza general - instalaciones y planta de emergencia</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpeza_gen']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpeza_gen']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpeza_gen']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Nivel de aceite - Planta de emergencia</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_aceite']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_aceite']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_aceite']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Nivel de combustible - Planta de emergencia</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_combustible']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_combustible']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_combustible']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Voltaje batería planta de emergencia</td>
		<td><?php echo $array['voltaje_bat_planta_emer']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_bat_planta_emer_radio']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_bat_planta_emer_radio']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_bat_planta_emer_radio']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Corriente batería planta de emergencia</td>
		<td><?php echo $array['corriente_bat_planta_emer']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['corriente_bat_planta_emer_radio']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['corriente_bat_planta_emer_radio']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['corriente_bat_planta_emer_radio']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Nivel liquido bateria</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_liq_bat']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_liq_bat']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_liq_bat']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado conectores batería planta de emergencia</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_conector_bat']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_conector_bat']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_conector_bat']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado soporte batería planta emergencia</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_soporte_bat']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_soporte_bat']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_soporte_bat']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado tanque de almacenamiento ACPM y accesorios</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_tanque_alm_acpm']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_tanque_alm_acpm']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_tanque_alm_acpm']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado general tablero de servicios auxiliares</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_gen_tab']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_gen_tab']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['est_gen_tab']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Voltaje AT/BT Servicios auxiliares</td>
		<td><?php echo $array['voltaje_atbt_serv']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_atbt_serv_radio']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_atbt_serv_radio']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_atbt_serv_radio']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Totalizador - Corriente de carga (Amperímetro)</td>
		<td><?php echo $array['tot_corriente_carga']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['tot_corriente_carga_radio']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['tot_corriente_carga_radio']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['tot_corriente_carga_radio']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Transferencia - Indicacion Estado interruptores de potencia </td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['tranfs_ind_est_intp']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['tranfs_ind_est_intp']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['tranfs_ind_est_intp']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Breakers tablero de distribucion AC</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['breakers_tab_distrib']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['breakers_tab_distrib']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['breakers_tab_distrib']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado extintor</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_extintor']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_extintor']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_extintor']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado conecion puesta tierra planta de emergencia </td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_conecion_p_t']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_conecion_p_t']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_conecion_p_t']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>

	<tr>
		<td colspan="6" style="height:40px;">Anotaciones Generales: <?php echo $array['observacion']?></td>
	</tr>
</table>
<table class="border" style="width:40%">
	<tr>
		<td>JEFE TRABAJO: <?php echo $array['responsable']?></td>
	</tr>
</table>