<?php $array = json_decode( $datos, true );?>
<h4>Bushing</h4>

<table class="border">
	<tbody>
		<tr>
			<td colspan="4" class="bordertd">Datos de placa toma capacitiva</td>
		</tr>
		<tr>
			<td class="bordertd">NT</td>
			<td  colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">H0</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h0_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h0_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h0_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h0_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">H1</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h1_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h1_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h1_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h1_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">H2</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h2_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h2_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h2_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h2_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">H3</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h3_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h3_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h3_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_h'][0]['h3_c2_cap']?></td>
		</tr>
	</tbody>
</table>
<br>
<table class="border">	
	<tbody>
		<tr>
			<td colspan="4" class="bordertd">Datos de placa toma capacitiva</td>
		</tr>
		<tr>
			<td class="bordertd">NT</td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">X0</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x0_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x0_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x0_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x0_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">X1</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x1_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x1_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x1_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x1_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">X2</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x2_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x2_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x2_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x2_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">X3</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x3_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x3_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x3_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_x'][0]['x3_c2_cap']?></td>
		</tr>
	</tbody>
</table>
<br>
<table class="border">	
	<tbody>
		<tr>
			<td colspan="4" class="bordertd">Datos de placa toma capacitiva</td>
		</tr>
		<tr>
			<td class="bordertd">NT</td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">Y0</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y0_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y0_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y0_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y0_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">Y1</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y1_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y1_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y1_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y1_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">Y2</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y2_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y2_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y2_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y2_c2_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td colspan="2" class="bordertd">F.P TAP CAPACITIVO</td>
			<td class="bordertd">CAPACITANCIA</td>
		</tr>
		<tr>
			<td rowspan="2" class="bordertd">Y3</td>
			<td class="bordertd">C1</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y3_c1_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y3_c1_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">C2</td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y3_c2_tap']?></td>
			<td class="bordertd"><?php echo $array['tabla_y'][0]['y3_c2_cap']?></td>
		</tr>
	</tbody>
</table>

<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>