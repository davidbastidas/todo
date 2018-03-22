<?php
$array = json_decode( $formato->json, true );
?>
<h3 style="font-size:14px;width:100%;text-align:center;">
	 INSPECCIÓN SERVICIOS AUXILIARES VDC
</h3>
<table class="border" style="width:100%">
	<tr>
		<td>Subestación: <?php echo $array['subestacion']?></td>
		<td>Fecha <?php echo $array['fecha']?></td>
		<td>Hora <?php echo $array['hora']?></td>
	</tr>
	<tr>
		<td>Tension: <?php echo $array['tension']?></td>
		<td>Marca: <?php echo $array['marca']?></td>
		<td>No serial: <?php echo $array['n_serial']?></td>
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
		<th style="font-size:8px;width:20%" rowspan="13">Anotaciones: <?php echo $array['anotacion_preliminar']?></th>
	</tr>
	<tr>
		<td>Voltaje de entrada cargador</td>
		<td><?php echo $array['voltaje_entrada']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_entrada_cargador']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_entrada_cargador']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_entrada_cargador']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Voltaje de salida cargador</td>
		<td><?php echo $array['voltaje_salida']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_salida_cargador']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_salida_cargador']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['voltaje_salida_cargador']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Corriente de carga - Amperímetro</td>
		<td><?php echo $array['corriente_carga']?></td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['corriente_carga_i']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['corriente_carga_i']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['corriente_carga_i']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Banco de baterías - Nivel de electrolito</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['banco_baterias']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['banco_baterias']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['banco_baterias']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado conectores banco batería - estado</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_conectores_bb']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_conectores_bb']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_conectores_bb']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado bornes</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_bornes']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_bornes']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_bornes']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado soporte banco batería</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_soportes_bb']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_soportes_bb']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_soportes_bb']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Limpieza - instalaciones y banco baterias</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_inst_bb']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_inst_bb']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_inst_bb']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado extractor de gases cuarto de baterías</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_extractor_gas']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_extractor_gas']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_extractor_gas']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Breakers -en servicio y fuera de servicio </td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['breakers_in_out']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['breakers_in_out']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['breakers_in_out']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado general tablero VDC (pintura-conexiones, etc)</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_gen_tab_vdc']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_gen_tab_vdc']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_gen_tab_vdc']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td colspan="2">Estado conexión puesta tierra</td>
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
		<td colspan="6" style="height:40px;">Anotaciones Generales: <?php echo $array['observacion']?></td>
	</tr>
</table>
<table class="border" style="width:40%">
	<tr>
		<td>JEFE TRABAJO: <?php echo $array['responsable']?></td>
	</tr>
</table>