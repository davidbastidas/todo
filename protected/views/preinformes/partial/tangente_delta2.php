<?php $array = json_decode( $datos, true );?>
<h4>Tangente Delta</h4>
<h4>Voltaje 1</h4>
<table class="border">
	<tbody>
		<tr>
			<th rowspan="2">N</th>
			<th rowspan="2">Modo Prueba</th>
			<th colspan="3">Grupo Conexion</th>
			<th rowspan="2">Kv Meas</th>
			<th rowspan="2">%Pfcorr</th>
			<th rowspan="2">Cap(Pf)</th>
		</tr>
		<tr>
			<td>Cable Alta tension</td>
			<td>Cable Baja tension</td>
			<td>Medio</td>
		</tr>
		<tr>
			<td>1</td>
			<td>CHL + CH (GST)</td>
			<td>ALTA</td>
			<td>BAJA</td>
			<td>GND</td>
			<td><?php echo $array['tabla1'][0]['alta_baja_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla1'][0]['alta_baja_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla1'][0]['alta_baja_gnd_cap']?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>CH (GST -G)</td>
			<td>ALTA</td>
			<td>BAJA</td>
			<td>GAR</td>
			<td><?php echo $array['tabla1'][1]['alta_baja_gar_kvmeas']?></td>
			<td><?php echo $array['tabla1'][1]['alta_baja_gar_pfcorr']?></td>
			<td><?php echo $array['tabla1'][1]['alta_baja_gar_cap']?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>CHL (UST)</td>
			<td>ALTA</td>
			<td>ALTA</td>
			<td>UST</td>
			<td><?php echo $array['tabla1'][2]['alta_alta_ust_kvmeas']?></td>
			<td><?php echo $array['tabla1'][2]['alta_alta_ust_pfcorr']?></td>
			<td><?php echo $array['tabla1'][2]['alta_alta_ust_cap']?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4</td>
			<td>CL + CHL (GST)</td>
			<td>BAJA</td>
			<td>ALTA</td>
			<td>GND</td>
			<td><?php echo $array['tabla1'][3]['baja_alta_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla1'][3]['baja_alta_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla1'][3]['baja_alta_gnd_cap']?></td>
		</tr>
		<tr>
			<td>5</td>
			<td>CL (GST -G)</td>
			<td>BAJA</td>
			<td>ALTA</td>
			<td>GAR</td>
			<td><?php echo $array['tabla1'][4]['baja_alta_gar_kvmeas']?></td>
			<td><?php echo $array['tabla1'][4]['baja_alta_gar_pfcorr']?></td>
			<td><?php echo $array['tabla1'][4]['baja_alta_gar_cap']?></td>
		</tr>
		<tr>
			<td>6</td>
			<td>CHL (UST)</td>
			<td>BAJA</td>
			<td>ALTA</td>
			<td>UST</td>
			<td><?php echo $array['tabla1'][5]['baja_alta_ust_kvmeas']?></td>
			<td><?php echo $array['tabla1'][5]['baja_alta_ust_pfcorr']?></td>
			<td><?php echo $array['tabla1'][5]['baja_alta_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<hr>
<h4>Voltaje 2</h4>
<table class="border">
	<tbody>
		<tr>
			<th rowspan="2">N</th>
			<th rowspan="2">Modo Prueba</th>
			<th colspan="3">Grupo Conexion</th>
			<th rowspan="2">Kv Meas</th>
			<th rowspan="2">%Pfcorr</th>
			<th rowspan="2">Cap(Pf)</th>
		</tr>
		<tr>
			<td>Cable Alta tension</td>
			<td>Cable Baja tension</td>
			<td>Medio</td>
		</tr>
		<tr>
			<td>1</td>
			<td>CHL + CH (GST)</td>
			<td>ALTA</td>
			<td>BAJA</td>
			<td>GND</td>
			<td><?php echo $array['tabla2'][0]['alta_baja_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla2'][0]['alta_baja_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla2'][0]['alta_baja_gnd_cap']?></td>
		</tr>
		<tr>
			<td>2</td>
			<td>CH (GST -G)</td>
			<td>ALTA</td>
			<td>BAJA</td>
			<td>GAR</td>
			<td><?php echo $array['tabla2'][1]['alta_baja_gar_kvmeas']?></td>
			<td><?php echo $array['tabla2'][1]['alta_baja_gar_pfcorr']?></td>
			<td><?php echo $array['tabla2'][1]['alta_baja_gar_cap']?></td>
		</tr>
		<tr>
			<td>3</td>
			<td>CHL (UST)</td>
			<td>ALTA</td>
			<td>ALTA</td>
			<td>UST</td>
			<td><?php echo $array['tabla2'][2]['alta_alta_ust_kvmeas']?></td>
			<td><?php echo $array['tabla2'][2]['alta_alta_ust_pfcorr']?></td>
			<td><?php echo $array['tabla2'][2]['alta_alta_ust_cap']?></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4</td>
			<td>CL + CHL (GST)</td>
			<td>BAJA</td>
			<td>ALTA</td>
			<td>GND</td>
			<td><?php echo $array['tabla2'][3]['baja_alta_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla2'][3]['baja_alta_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla2'][3]['baja_alta_gnd_cap']?></td>
		</tr>
		<tr>
			<td>5</td>
			<td>CL (GST -G)</td>
			<td>BAJA</td>
			<td>ALTA</td>
			<td>GAR</td>
			<td><?php echo $array['tabla2'][4]['baja_alta_gar_kvmeas']?></td>
			<td><?php echo $array['tabla2'][4]['baja_alta_gar_pfcorr']?></td>
			<td><?php echo $array['tabla2'][4]['baja_alta_gar_cap']?></td>
		</tr>
		<tr>
			<td>6</td>
			<td>CHL (UST)</td>
			<td>BAJA</td>
			<td>ALTA</td>
			<td>UST</td>
			<td><?php echo $array['tabla2'][5]['baja_alta_ust_kvmeas']?></td>
			<td><?php echo $array['tabla2'][5]['baja_alta_ust_pfcorr']?></td>
			<td><?php echo $array['tabla2'][5]['baja_alta_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>