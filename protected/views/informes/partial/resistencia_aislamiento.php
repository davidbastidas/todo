<?php 
$ruta_imagenes = Yii::app() -> params['imagenes_proyecto'];
$array = json_decode( $datos, true );?>
<h4>Resistencia de Aislamiento</h4>
<table class="border">
	<thead>
		<tr>
			<td colspan="3" class="bordertd">Resistencia de Aislamiento</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="bordertd">Tension Aplicada</td>
			<td class="bordertd" colspan="2"><?php echo $array['tabla'][0]['taplicada']?></td>
		</tr>
		<tr>
			<td class="bordertd">Tiempo de Inyeccion</td>
			<td class="bordertd" colspan="2"><?php echo $array['tabla'][0]['tinyeccion']?></td>
		</tr>
		<tr>
			<td class="bordertd">H vs Tierra</td>
			<td class="bordertd">X vs Tierra</td>
			<td class="bordertd">Y vs Tierra</td>
		</tr>
		<tr>
			<td class="bordertd">
				<?php echo $array['tabla'][0]['htierra']?>
				<?php echo $array['tabla'][0]['select_htierra']?> 
				&#937;
			</td>
			<td class="bordertd">
				<?php echo $array['tabla'][0]['xtierra']?>
				<?php echo $array['tabla'][0]['select_xtierra']?> 
				&#937;
			</td>
			<td class="bordertd">
				<?php echo $array['tabla'][0]['ytierra']?>
				<?php echo $array['tabla'][0]['select_ytierra']?> 
				&#937;
			</td>
		</tr>
		<tr>
			<td class="bordertd">H vs X</td>
			<td class="bordertd">H vs Y</td>
			<td class="bordertd">X vs Y</td>
		</tr>
		<tr>
			<td class="bordertd">
				<?php echo $array['tabla'][0]['hx']?>
				<?php echo $array['tabla'][0]['select_hx']?> 
				&#937;
			</td>
			<td class="bordertd">
				<?php echo $array['tabla'][0]['hy']?>
				<?php echo $array['tabla'][0]['select_hy']?> 
				&#937;
			</td>
			<td class="bordertd">
				<?php echo $array['tabla'][0]['xy']?>
				<?php echo $array['tabla'][0]['select_xy']?> 
				&#937;
			</td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>