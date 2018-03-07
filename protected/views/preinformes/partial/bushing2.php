<?php $array = json_decode( $datos, true );?>
<h4>Bushing</h4>

<table class="border">
	<tbody>
		<tr>
			<th colspan="4">Datos de placa toma capacitiva</th>
		</tr>
		<tr>
			<td >NT</td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">H0</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_h'][0]['h0_c1_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h0_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_h'][0]['h0_c2_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h0_c2_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">H1</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_h'][0]['h1_c1_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h1_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_h'][0]['h1_c2_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h1_c2_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">H2</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_h'][0]['h2_c1_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h2_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_h'][0]['h2_c2_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h2_c2_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">H3</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_h'][0]['h3_c1_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h3_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_h'][0]['h3_c2_tap']?></td>
			<td ><?php echo $array['tabla_h'][0]['h3_c2_cap']?></td>
		</tr>
	</tbody>
</table>
<br>
<table class="border">
	<tbody>
		<tr>
			<th colspan="4">Datos de placa toma capacitiva</th>
		</tr>
		<tr>
			<td >NT</td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">X0</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_x'][0]['x0_c1_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x0_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_x'][0]['x0_c2_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x0_c2_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">X1</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_x'][0]['x1_c1_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x1_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_x'][0]['x1_c2_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x1_c2_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">X2</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_x'][0]['x2_c1_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x2_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_x'][0]['x2_c2_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x2_c2_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td  colspan="2">F.P TAP CAPACITIVO</td>
			<td >CAPACITANCIA</td>
		</tr>
		<tr>
			<td  rowspan="2">X3</td>
			<td >C1</td>
			<td ><?php echo $array['tabla_x'][0]['x3_c1_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x3_c1_cap']?></td>
		</tr>
		<tr>
			<td >C2</td>
			<td ><?php echo $array['tabla_x'][0]['x3_c2_tap']?></td>
			<td ><?php echo $array['tabla_x'][0]['x3_c2_cap']?></td>
		</tr>
	</tbody>
</table>



<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>