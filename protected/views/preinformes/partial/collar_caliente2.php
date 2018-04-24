<?php $array = json_decode( $datos, true );?>
<h4>Collar Caliente</h4>
<table class="border">
	<tbody>
		<tr>
			<th rowspan="2">Prueba</th>
			<th rowspan="2">Kv</th>
			<th colspan="8">Bujes</th>
		</tr>
		<tr>
			<td>H0</td>
			<td>H1</td>
			<td>H2</td>
			<td>H3</td>
			<td>X0</td>
			<td>X1</td>
			<td>X2</td>
			<td>X3</td>
		</tr>
		<tr>
			<td>mW</td>
			<td><?php echo $array['tabla1'][0]['kv']?></td>
			<td><?php echo $array['tabla1'][0]['h0']?></td>
			<td><?php echo $array['tabla1'][0]['h1']?></td>
			<td><?php echo $array['tabla1'][0]['h2']?></td>
			<td><?php echo $array['tabla1'][0]['h3']?></td>
			<td><?php echo $array['tabla1'][0]['x0']?></td>
			<td><?php echo $array['tabla1'][0]['x1']?></td>
			<td><?php echo $array['tabla1'][0]['x2']?></td>
			<td><?php echo $array['tabla1'][0]['x3']?></td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>