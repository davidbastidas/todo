<?php
$array = json_decode( $formato->json, true );
?>
<h3 style="font-size:14px;width:100%;text-align:center;">
	 INSPECCIÓN FUSIBLES
</h3>
<table class="border" style="width:100%">
	<tr>
		<td>Subestación: <?php echo $array['subestacion']?></td>
		<td>Fecha: <?php echo $array['fecha']?></td>
		<td>Hora: <?php echo $array['hora']?></td>
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
		<th style="font-size:8px;width:20%" rowspan="4">Anotaciones: <?php echo $array['anotacion_preliminar']?></th>
	</tr>
	<tr>
		<td>Limpieza</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['limpieza']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Puntos</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['puntos']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['puntos']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['puntos']=='malo'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
	</tr>
	<tr>
		<td>Estado de fusibles</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_fusibles']=='bueno'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_fusibles']=='regular'){
					echo '<b style="color:red;font-size:10px;font-weight:normal;">&#9745;</b>';
				}else{
					echo '&#9744;';
				}
			?>
		</td>
		<td style="text-align:center;font-size:8px;width:10%">
			<?php 
				if($array['estado_fusibles']=='malo'){
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