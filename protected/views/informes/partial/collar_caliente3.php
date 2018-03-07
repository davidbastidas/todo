<?php $array = json_decode( $datos, true );?>
<h4>Collar Caliente</h4>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd" rowspan="2">Prueba</td>
			<td class="bordertd" rowspan="2">Kv</td>
			<td class="bordertd" colspan="12">Bujes</td>
		</tr>
		<tr>
			<td class="bordertd">H0</td>
			<td class="bordertd">H1</td>
			<td class="bordertd">H2</td>
			<td class="bordertd">H3</td>
			<td class="bordertd">X0</td>
			<td class="bordertd">X1</td>
			<td class="bordertd">X2</td>
			<td class="bordertd">X3</td>
			<td class="bordertd">Y0</td>
			<td class="bordertd">Y1</td>
			<td class="bordertd">Y2</td>
			<td class="bordertd">Y3</td>
		</tr>
		<tr>
			<td class="bordertd">mW</td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['kv']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h0']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h1']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h2']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h3']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['x0']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['x1']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['x2']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['x3']?></td>

			<td class="bordertd"><?php echo $array['tabla1'][0]['y0']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['y1']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['y2']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['y3']?></td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>