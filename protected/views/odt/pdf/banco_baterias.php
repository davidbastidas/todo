<?php
$array = json_decode( $formato->json, true );
?>

<h3 style="font-size:14px;width:100%;text-align:center;">
	MANTENIMIENTO BANCO DE BATERIAS
</h3>
<table class="border" style="width:100%">
	<tr>
		<td>No CONSIGNACIÓN: <?php echo $array['n_consignacion']?></td>
		<td colspan="2">Fecha <?php echo $array['fecha']?></td>
	</tr>
	<tr>
		<td>SUBESTACION: <?php echo $array['subestacion']?></td>
		<td colspan="2">VOLT. CARGADOR: <?php echo $array['volt_cargador']?></td>
	</tr>
	<tr>
		<td>T.Ambiente °C: <?php echo $array['temp_ambiente']?></td>
		<td colspan="2">VOLT. BANCO DE BATERIA: <?php echo $array['volt_banco_bateria']?></td>
	</tr>
	<tr>
		<td>FABRICANTE: <?php echo $array['fabricante']?></td>
		<td colspan="2">NUMERO DE ELEMENTOS: <?php echo $array['numero_elementos']?></td>
	</tr>
	<tr>
		<td>RESPONSABLE: <?php echo $array['responsable']?></td>
		<td>PLOMO/ACIDO: <?php echo $array['plomo_acido']?></td>
		<td>SECAS <?php echo $array['secas']?></td>
	</tr>
</table>

<table class="border" style="width:100%">
	<tr>
		<th rowspan="2" class="center">BATERIA</th>
		<th colspan="3" class="center">MEDICIONES</th>
		<th rowspan="2" class="center">BATERIA</th>
		<th colspan="3" class="center">MEDICIONES</th>
		<th rowspan="2" class="center">BATERIA</th>
		<th colspan="3" class="center">MEDICIONES</th>
	</tr>
	<tr>
		<th class="center">VOLT.</th>
		<th class="center">DENS.</th>
		<th class="center">TEMP.</th>
		<th class="center">VOLT.</th>
		<th class="center">DENS.</th>
		<th class="center">TEMP.</th>
		<th class="center">VOLT.</th>
		<th class="center">DENS.</th>
		<th class="center">TEMP.</th>
	</tr>
	<tbody>
		<?php 
		$cont=35;$col3=0;
		for ($i=1; $i <= 35 ; $i++) { $cont++;?>
			<tr>
				<td><?php echo $i?></td>
				<td><?php echo $array['table_bateria'][$i-1]['volt']?></td>
				<td><?php echo $array['table_bateria'][$i-1]['dens']?></td>
				<td><?php echo $array['table_bateria'][$i-1]['temp']?></td>
				<td><?php echo $cont?></td>
				<td><?php echo $array['table_bateria'][$cont-1]['volt']?></td>
				<td><?php echo $array['table_bateria'][$cont-1]['dens']?></td>
				<td><?php echo $array['table_bateria'][$cont-1]['temp']?></td>
				<?php $col3=($cont-$i)+$cont;?>
				<td><?php echo $col3?></td>
				<td><?php echo $array['table_bateria'][$col3-1]['volt']?></td>
				<td><?php echo $array['table_bateria'][$col3-1]['dens']?></td>
				<td><?php echo $array['table_bateria'][$col3-1]['temp']?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<table class="border" style="width:100%">
	<tr>
		<th colspan="12">PRUEBA DESCARGA DE BATERIAS</th>
	</tr>
	<tr>
		<td>TIEMPO</td>
		<td>15 min</td>
		<td>30 min</td>
		<td>45 min</td>
		<td>60 min</td>
		<td>75 min</td>
		<td>90 min</td>
		<td>105 min</td>
		<td>120 min</td>
		<td>135 min</td>
		<td>150 min</td>
		<td>180 min</td>
	</tr>
	<tr>
		<td>VOLT. DC</td>
		<td><?php echo $array['volt_15']?></td>
		<td><?php echo $array['volt_30']?></td>
		<td><?php echo $array['volt_45']?></td>
		<td><?php echo $array['volt_60']?></td>
		<td><?php echo $array['volt_75']?></td>
		<td><?php echo $array['volt_90']?></td>
		<td><?php echo $array['volt_105']?></td>
		<td><?php echo $array['volt_120']?></td>
		<td><?php echo $array['volt_135']?></td>
		<td><?php echo $array['volt_150']?></td>
		<td><?php echo $array['volt_180']?></td>
	</tr>
	<tr>
		<td colspan="12">Observaciones <?php echo $array['observacion']?></td>
	</tr>
</table>