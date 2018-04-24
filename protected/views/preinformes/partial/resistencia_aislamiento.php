<?php $array = json_decode( $datos, true );?>
<h4>Resistencia de Aislamiento</h4>
<table class="border">
	<thead>
		<tr>
			<th colspan="3" >Resistencia de Aislamiento</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td >Tension Aplicada</td>
			<td  colspan="2"><?php echo $array['tabla'][0]['taplicada']?></td>
		</tr>
		<tr>
			<td >Tiempo de Inyeccion</td>
			<td  colspan="2"><?php echo $array['tabla'][0]['tinyeccion']?></td>
		</tr>
		<tr>
			<td >H vs Tierra</td>
			<td >X vs Tierra</td>
			<td >Y vs Tierra</td>
		</tr>
		<tr>
			<td >
				<?php echo $array['tabla'][0]['htierra']?>
				<?php echo $array['tabla'][0]['select_htierra']?>
				&#937;
			</td>
			<td >
				<?php echo $array['tabla'][0]['xtierra']?>
				<?php echo $array['tabla'][0]['select_xtierra']?>
				&#937;
			</td>
			<td >
				<?php echo $array['tabla'][0]['ytierra']?>
				<?php echo $array['tabla'][0]['select_ytierra']?>
				&#937;
			</td>
		</tr>
		<tr>
			<td >H vs X</td>
			<td >H vs Y</td>
			<td >X vs Y</td>
		</tr>
		<tr>
			<td >
				<?php echo $array['tabla'][0]['hx']?>
				<?php echo $array['tabla'][0]['select_hx']?>
				&#937;
			</td>
			<td >
				<?php echo $array['tabla'][0]['hy']?>
				<?php echo $array['tabla'][0]['select_hy']?>
				&#937;
			</td>
			<td >
				<?php echo $array['tabla'][0]['xy']?>
				<?php echo $array['tabla'][0]['select_xy']?>
				&#937;
			</td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>