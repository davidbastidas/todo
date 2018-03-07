<?php

$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
$size=count($json_brigada['brigada']);
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$style_centro='style="text-align: center;"';
$style_izq='style="color:red;margin-left:-8px;margin-bottom:-3px;font-size:14px;font-weight:normal;"';
?>
<table class="border" style="width:100%;">
	<tr>
		<td colspan="8" style="background-color:#BFBFBF;text-align: center;font-size:8px;">1. Datos del Vehículo</td>
	</tr>
	<tr>
		<td>Placa</td>
		<td></td>
		<td>Marca</td>
		<td></td>
		<td>Linea</td>
		<td></td>
		<td>Modelo</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="8" style="background-color:#BFBFBF;text-align: center;font-size:8px;">2. Documentación</td>
	</tr>
	<tr>
		<td style="font-size:7px;">Tarjeta Propiedad</td>
		<td style="font-size:4px;">Vigencia</td>
		<td colspan="2" style="font-size:7px;">Tarjeta Tarjeta/carta de operación</td>
		<td style="font-size:4px;">Vigencia</td>
		<td colspan="2" style="font-size:7px;">GPS</td>
		<td></td>
	</tr>
	<tr>
		<td style="font-size:7px;">Certificado de Gases</td>
		<td style="font-size:4px;">Vigencia</td>
		<td colspan="2" style="font-size:7px;">Seguro Obligatorio</td>
		<td style="font-size:4px;">Vigencia</td>
		<td colspan="2" style="font-size:7px;">Póliza Extracontractual</td>
		<td style="font-size:4px;">Vigencia</td>
	</tr>

	<tr>
		<td colspan="8" style="background-color:#BFBFBF;text-align: center;font-size:8px;">3. Estado Latonería - Carrocería exteriores.</td>
	</tr>
	<tr>
		<td colspan="8" style="height:50px"></td>
	</tr>
	<tr>
		<td>Kilometraje inicial</td>
		<td></td>
		<td>Kilometraje final</td>
		<td></td>
		<td>Proyecto</td>
		<td></td>
		<td>Ciudad</td>
		<td></td>
	</tr>
</table>
<br>
<table class="border" style="width:100%;margin-top:-20px;">
	<tr>
		<td style="background-color:#BEB8B8;">FECHA</td>
		<?php foreach ($formato as $key) {
		?>
		<td colspan="3">
			<?php 
			$date=date_create($key->fecha);
			echo date_format($date,"d/m/Y");
			?>
		</td>
	<?php } ?>
	</tr>
	<tr>
		<td style="background-color:#BEB8B8;" rowspan="2">ITEM A INSPECCIONAR</td>
	<?php foreach ($formato as $key) {
		?>
		<td colspan="3">
			<?php 
			$date=date_create($key->fecha);
			echo $dias[date_format($date,"w")];
			?>
		</td>
	<?php } ?>
	</tr>
	<tr>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>
		<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>
	</tr>
	<tr>
		<td colspan="22" style="background-color:#BFBFBF;font-size:8px;">4. Estado General del Vehículo:</td>
	</tr>
	<tr>
		<td style="font-size:7px;">Ajuste puertas cabina y cerradura</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['ajuste_puerta_cabina']=='bueno'){
				echo '<td style="color:red;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['ajuste_puerta_cabina']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['ajuste_puerta_cabina']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Estado general vidrios y elevavidrios</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['est_gen_vidrios_eleva']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['est_gen_vidrios_eleva']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['est_gen_vidrios_eleva']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Cojinería y asientos</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['cojineria_asientos']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['cojineria_asientos']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['cojineria_asientos']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Estado del vidrio frontal</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['estado_vidrio_frontal']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['estado_vidrio_frontal']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['estado_vidrio_frontal']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Espejos interiore/ exteriores</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['espejo_interior_exterior']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['espejo_interior_exterior']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['espejo_interior_exterior']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Estado general de llantas</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['estado_llantas']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['estado_llantas']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['estado_llantas']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Tapa capó motor y trasera</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['tapa_capo_motor_trasera']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">A<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['tapa_capo_motor_trasera']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['tapa_capo_motor_trasera']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td colspan="22" style="background-color:#BFBFBF;">5. Estado Mecánico del Vehículo:</td>
	</tr>
	<tr>
		<td style="font-size:7px;">Nivel aceite motor</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['nivel_aceite_motor']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_aceite_motor']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_aceite_motor']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Nivel aceite dirección hidráulica</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['nivel_aceite_direccion']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_aceite_direccion']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_aceite_direccion']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Funcionamiento de frenos</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['func_frenos']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_frenos']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_frenos']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Funcionamiento acelerador</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['func_acelerador']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_acelerador']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_acelerador']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Nivel líquido refrigerante</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['nivel_liq_refrigerante']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_liq_refrigerante']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_liq_refrigerante']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Nivel líquido de frenos</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['nivel_liq_freno']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_liq_freno']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_liq_freno']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Funcionamiento freno de seguridad</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['func_freno_seguridad']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_freno_seguridad']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_freno_seguridad']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Funcionamiento dirección</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['func_direccion']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_direccion']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_direccion']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Nivel líquido de embrague</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['nivel_liq_embrague']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_liq_embrague']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_liq_embrague']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Nivel de electrolito y carga de batería</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['nivel_electrolito_bat']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_electrolito_bat']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['nivel_electrolito_bat']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Funcionamiento embrague</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['func_embrague']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_embrague']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['func_embrague']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Limpieza del motor</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['limpieza_motor']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['limpieza_motor']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['limpieza_motor']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td colspan="22" style="background-color:#BFBFBF;">6. Estado de sistemas y accesorios del vehículo</td>
	</tr>
	<tr>
		<td style="font-size:7px;">Luces altas y bajas</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['luces_altas_bajas']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_altas_bajas']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_altas_bajas']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Luces de parqueo - direccionales</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['luces_direccionales']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_direccionales']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_direccionales']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Luces traseras, reversa y freno</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['luces_traseras']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_traseras']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_traseras']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Luz tablero de instrumentos</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['luces_tablero_inst']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_tablero_inst']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['luces_tablero_inst']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Velocímetro - Odómetro</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['velocimentro_odometro']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['velocimentro_odometro']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['velocimentro_odometro']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:7px;">Radio - Carita- antena -parlantes</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['radio_carita_antena_parlantes']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['radio_carita_antena_parlantes']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['radio_carita_antena_parlantes']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Limpia y lava parabrisas</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['limpia_parabrisas']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['limpia_parabrisas']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['limpia_parabrisas']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Cinturones de seguridad</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['cinturon_seguridad']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['cinturon_seguridad']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['cinturon_seguridad']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Aire acondicionado / Ventilador</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['aire_acondicionado']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['aire_acondicionado']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['aire_acondicionado']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Pito</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['pito']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['pito']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['pito']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Gato, Cruceta y taco.</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['gato_cruceta_taco']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['gato_cruceta_taco']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['gato_cruceta_taco']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Kit de herramienta</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['kit_herramienta']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['kit_herramienta']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['kit_herramienta']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Triángulos de señalización/ Conos</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['senalizacion_conos']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['senalizacion_conos']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['senalizacion_conos']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Botiquín</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['botiquin']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['botiquin']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['botiquin']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Estado llanta y rin de repuesto</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['est_llanta_rin_repuesto']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['est_llanta_rin_repuesto']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['est_llanta_rin_repuesto']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Alarma de reversa</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['alarma_reversa']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['alarma_reversa']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['alarma_reversa']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Extintor de 10 Lbs</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['extintor_10_lb']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['extintor_10_lb']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['extintor_10_lb']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td  style="font-size:7px;">Barra antivolco</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['barra_antivolco']=='bueno'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['barra_antivolco']=='regular'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}else if($array['barra_antivolco']=='malo'){
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else{
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">C</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NC</td>';
				echo '<td style="color:#BEB8B8;text-align: center;font-size:6px;">NA</td>';
			}
		} ?>
	</tr>
	<tr>
		<td>
			<div style="text-align:left;font-size:8px;">Firma de Inspector</div>
			<div style="text-align:right;font-size:8px;">Nombre</div>
		</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode($key->json, true );?>
			<td colspan="3"><?php echo $array['inspector']?></td>
		<?php } ?>
	</tr>
	<tr>
		<td style="text-align:right;">Firma:</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode($key->json, true );?>
			<td colspan="3"></td>
		<?php } ?>
	</tr>
	<tr>
		<td>
			<div style="text-align:left;font-size:8px;">Firma de Conductor</div>
			<div style="text-align:right;font-size:8px;">Nombre</div>
		</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode($key->json, true );?>
			<td colspan="3"><?php echo $array['conductor']?></td>
		<?php } ?>
	</tr>
	<tr>
		<td style="text-align:right;">Firma:</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode($key->json, true );?>
			<td colspan="3"></td>
		<?php } ?>
	</tr>
	<tr>
		<td style="text-align:right;font-size:8px;">Vehiculo puede operar:</td>
		<?php 
		foreach ($formato as $key) {
			$array = json_decode( $key->json, true );
			if($array['puede_operar']=='si'){
				echo '<td colspan="3" style="text-align:center;font-size:8px;">SI<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b> | NO</td>';
			}else if($array['puede_operar']=='no'){
				echo '<td colspan="3" style="text-align:center;font-size:8px;">SI | NO<b style="color:red;margin-left:-8px;font-size:10px;font-weight:normal;">X</b></td>';
			}else {
				echo '<td colspan="3" style="text-align:center;font-size:8px;">SI | NO</td>';
			}
		} ?>
	</tr>
	<tr>
		<td style="font-size:8px;">Restriccion:</td>
		<td colspan="21" style="font-size:8px;"></td>
	</tr>
</table>

