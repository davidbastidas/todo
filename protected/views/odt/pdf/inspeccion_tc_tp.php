<?php
$array = json_decode( $formato->json, true );
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
?>
<h3 style="font-size:14px;width:100%;text-align:center;">
	 INSPECCIÓN TC Y TP
</h3>
<table class="border" style="width:100%">
	<tr>
		<td>Subestación: <?php echo $array['subestacion']?></td>
		<td>Fecha: <?php echo $array['fecha']?></td>
		<td>Hora: <?php echo $array['hora']?></td>
	</tr>
	<tr>
		<td>N° TC/TP: <?php echo $array['n_tc_tp']?></td>
		<td>Marca: <?php echo $array['marca']?></td>
		<td>No serial: <?php echo $array['n_serial']?></td>
	</tr>
	<tr>
		<td>Voltaje: <?php echo $array['voltaje']?></td>
		<td>RTC/RTP: <?php echo $array['rtc_rtp']?></td>
		<td>Temperatura Ambiente &#8451;: <?php echo $array['temp_ambiente']?></td>
	</tr>
	<tr>
		<td>No O. Trabajo: <?php echo $array['n_odt']?></td>
		<td>No Consignación: <?php echo $array['n_consignacion']?></td>
		<td>Código de Opeación Equipo: <?php echo $array['cod_op_equipo']?></td>
	</tr>
</table>

<table class="border" style="width:100%">
	<tr>
		<th style="font-size:8px;width:50%">Preliminares</th>
		<th style="text-align:center;font-size:8px;width:10%">Bueno</th>
		<th style="text-align:center;font-size:8px;width:10%">Regular</th>
		<th style="text-align:center;font-size:8px;width:10%">Malo</th>
		<th style="font-size:8px;width:20%" rowspan="6">Anotaciones: <?php echo $array['anotacion_insp_tc']?></th>
	</tr>
	<tr>
		<td>Aspecto Exterior ( Pintura  - Limpieza)</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['aspecto_exterior']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['aspecto_exterior']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['aspecto_exterior']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Estado conexión puesta tierra</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['conexion_tierra']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['conexion_tierra']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['conexion_tierra']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Nivel de aceite</td>
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
		<td>Estado porcelanas</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_porcelanas']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_porcelanas']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_porcelanas']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Limpieza general</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_general']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_general']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_general']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<th>Inspecciones TP</th>
		<th>Bueno</th>
		<th>Regular</th>
		<th>Malo</th>
		<th rowspan="6">Anotaciones: <?php echo $array['anotacion_insp_tp']?></th>
	</tr>
	<tr>
		<td>Aspecto Exterior ( Pintura  - Limpieza)</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['aspecto_exterior_tp']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['aspecto_exterior_tp']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['aspecto_exterior_tp']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Estado conexión puesta tierra</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['conexion_tierra_tp']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['conexion_tierra_tp']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['conexion_tierra_tp']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Nivel de aceite</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_aceite_tp']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_aceite_tp']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['nivel_aceite_tp']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Estado porcelanas</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_porcelanas_tp']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_porcelanas_tp']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_porcelanas_tp']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Limpieza general</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_general_tp']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_general_tp']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza_general_tp']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	
	<tr>
		<td colspan="5" style="height:40px;">Anotaciones Generales: <?php echo $array['observacion']?></td>
	</tr>
</table>
<table class="border" style="width:40%">
	<tr>
		<td>JEFE TRABAJO: <?php echo $array['responsable']?></td>
	</tr>
</table>