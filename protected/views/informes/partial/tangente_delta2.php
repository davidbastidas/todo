<?php $array = json_decode( $datos, true );?>
<h4>Tangente Delta</h4>
<h4>Voltaje 1</h4>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd" rowspan="2">N</td>
			<td class="bordertd" rowspan="2">Modo Prueba</td>
			<td class="bordertd" colspan="3">Grupo Conexion</td>
			<td class="bordertd" rowspan="2">Kv Meas</td>
			<td class="bordertd" rowspan="2">%Pfcorr</td>
			<td class="bordertd" rowspan="2">Cap(Pf)</td>
		</tr>
		<tr>
			<td class="bordertd">Cable Alta tension</td>
			<td class="bordertd">Cable Baja tension</td>
			<td class="bordertd">Medio</td>
		</tr>
		<tr>
			<td class="bordertd">1</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['alta_baja_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['alta_baja_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['alta_baja_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">2</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla1'][1]['alta_baja_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][1]['alta_baja_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][1]['alta_baja_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">3</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla1'][2]['alta_alta_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][2]['alta_alta_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][2]['alta_alta_ust_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
		</tr>
		<tr>
			<td class="bordertd">4</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla1'][3]['baja_alta_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][3]['baja_alta_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][3]['baja_alta_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">5</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla1'][4]['baja_alta_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][4]['baja_alta_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][4]['baja_alta_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">6</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla1'][5]['baja_alta_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][5]['baja_alta_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][5]['baja_alta_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<h4>Voltaje 2</h4>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd" rowspan="2">N</td>
			<td class="bordertd" rowspan="2">Modo Prueba</td>
			<td class="bordertd" colspan="3">Grupo Conexion</td>
			<td class="bordertd" rowspan="2">Kv Meas</td>
			<td class="bordertd" rowspan="2">%Pfcorr</td>
			<td class="bordertd" rowspan="2">Cap(Pf)</td>
		</tr>
		<tr>
			<td class="bordertd">Cable Alta tension</td>
			<td class="bordertd">Cable Baja tension</td>
			<td class="bordertd">Medio</td>
		</tr>
		<tr>
			<td class="bordertd">1</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla2'][0]['alta_baja_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][0]['alta_baja_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][0]['alta_baja_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">2</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla2'][1]['alta_baja_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][1]['alta_baja_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][1]['alta_baja_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">3</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla2'][2]['alta_alta_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][2]['alta_alta_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][2]['alta_alta_ust_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
			<td class="bordertd"></td>
		</tr>
		<tr>
			<td class="bordertd">4</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla2'][3]['baja_alta_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][3]['baja_alta_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][3]['baja_alta_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">5</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla2'][4]['baja_alta_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][4]['baja_alta_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][4]['baja_alta_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">6</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">BAJA</td>
			<td class="bordertd">ALTA</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla2'][5]['baja_alta_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][5]['baja_alta_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][5]['baja_alta_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>