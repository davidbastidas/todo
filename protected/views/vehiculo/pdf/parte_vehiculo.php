<?php
$array = json_decode( $formato->json, true );
$brigada=Yii::app()->user->getState('brigada');
$brigadas = Brigadas::model()->findByPk($brigada);
$json_brigada=json_decode($brigadas->datos_json, true);
$size=count($json_brigada['brigada']);

$n_filas=count($array['table_gastos']);
$f = new DateTime(str_replace("/", "-", $array['fecha']));
$anio = $f->format('Y');
$mes = $f->format('m');
$dia = $f->format('d');

$style_centro='style="text-align: center;"';
?>
		
<table class="border">
	<tr>
		<td colspan="7" style="background-color:#FF6600;text-align: center;">PARTE DE VEHICULOS</td>
	</tr>
	<tr>
		<td colspan="7" style="height:10px"></td>
	</tr>
	<tr>
		<td colspan="4">
			MATRICULA: <?php echo $array['matricula']?>
		</td>
		<td></td>
		<td>
			Mes: <?php echo $mes?>
		</td>
		<td>
			Mes: <?php echo $anio?>
		</td>
	</tr>
	<tr>
		<td colspan="7">ASIGNACIÓN DE VEHICULOS A ZONA / SECTOR: <?php echo $array['asignacion_vehiculo_zona']?></td>
	</tr>
	<tr>
		<td colspan="7">
			Division: <?php echo $array['division']?> MANTENIMIENTO DE SUBESTACIONES: <?php echo $array['mant_subestacion']?>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="height:10px"></td>
		<td colspan="5" style="height:10px"></td>
	</tr>
	<tr>
		<td style="width:10px;text-align: center;">DIA</td>
		<td style="width:300px;text-align: center;">RECORRIDO</td>
		<td <?php echo $style_centro?>>LECTURA KMS INICIO DÍA</td>
		<td <?php echo $style_centro?>>CANTIDAD GALONES COMBUSTIBLE</td>
		<td <?php echo $style_centro?>>COSTO EN $ DEL COMBUSTILE</td>
		<td <?php echo $style_centro?>>PEAJE, PARQUEO</td>
		<td <?php echo $style_centro?>>OTROS (REPARACIONES ETC)</td>
	</tr>
	<?php 
	for ($y=1; $y <= $n_filas; $y++) {?>
		<tr>
			<td <?php echo $style_centro?>><?php echo $y;?></td>
			<td <?php echo $style_centro?>><?php echo $array['table_gastos'][$y-1]['recorrido']?></td>
			<td <?php echo $style_centro?>><?php echo $array['table_gastos'][$y-1]['kml_inicio']?></td>
			<td <?php echo $style_centro?>><?php echo $array['table_gastos'][$y-1]['galones']?></td>
			<td <?php echo $style_centro?>><?php echo $array['table_gastos'][$y-1]['costo']?></td>
			<td <?php echo $style_centro?>><?php echo $array['table_gastos'][$y-1]['peaje']?></td>
			<td <?php echo $style_centro?>><?php echo $array['table_gastos'][$y-1]['otros']?></td>
		</tr>
	<?php } ?>
	<tr>
		<td style="background-color:#DAD6D2"></td>
		<td style="background-color:#DAD6D2"></td>
		<td <?php echo $style_centro?>>Total</td>
		<td <?php echo $style_centro?>>Total</td>
		<td <?php echo $style_centro?>>Total</td>
		<td <?php echo $style_centro?>>Total</td>
		<td <?php echo $style_centro?>>Total</td>
	</tr>
	<tr>
		<td colspan="2" style="height:10px"></td>
		<td colspan="5" style="height:10px"></td>
	</tr>
	<tr>
		<td colspan="2" <?php echo $style_centro?>>
			FIRMA JEFE DE PROYECTO<br>
			<?php echo $array['inspector']?>
		</td>
		<td colspan="5"></td>
	</tr>
</table>