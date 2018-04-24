<?php $array = json_decode( $datos, true );?>
<h4>Tangente Delta</h4>
<h4>Voltaje 1</h4>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd" rowspan="2" >N</td>
			<td class="bordertd" rowspan="2" >Modo Prueba</td>
			<td class="bordertd" colspan="3" >Grupo Conexion</td>
			<td class="bordertd" rowspan="2" >Kv Meas</td>
			<td class="bordertd" rowspan="2" >%Pfcorr</td>
			<td class="bordertd" rowspan="2" >Cap(Pf)</td>
		</tr>
		<tr>
			<td class="bordertd">Cable de inyeccion</td>
			<td class="bordertd">Cable medida</td>
			<td class="bordertd">Modo</td>
		</tr>
		<tr>
			<td class="bordertd">1</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">H</td>
			<td class="bordertd">BAJA/TIERRA TER/GUARDA</td>
			<td class="bordertd">GND/GAR</td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h_gndgar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h_gndgar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][0]['h_gndgar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">2</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">H</td>
			<td class="bordertd">BAJA-TER/GUARDA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla1'][1]['h_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][1]['h_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][1]['h_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">3</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">H</td>
			<td class="bordertd">TER/TIERRA BAJA/UST</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla1'][2]['h_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][2]['h_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][2]['h_ust_cap']?></td>
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
			<td class="bordertd">X</td>
			<td class="bordertd">TER/TIERRA ALTA/GUARDA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla1'][3]['x_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][3]['x_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][3]['x_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">5</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">X</td>
			<td class="bordertd">ALTA-TER/GUARDA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla1'][4]['x_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][4]['x_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][4]['x_gar_cap']?></td>
		<tr>
			<td class="bordertd">6</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">X</td>
			<td class="bordertd">ALTA/TIERRA TER/UST</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla1'][5]['x_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][5]['x_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][5]['x_ust_cap']?></td>
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
			<td class="bordertd">Y</td>
			<td class="bordertd">ALTA/TIERRA BAJA/GUARDA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla1'][6]['y_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][6]['y_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][6]['y_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">5</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">Y</td>
			<td class="bordertd">ALTA-BAJA/GUARDA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla1'][7]['y_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][7]['y_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][7]['y_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">6</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">Y</td>
			<td class="bordertd">BAJA/TIERRA ALTA/UST</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla1'][8]['y_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][8]['y_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla1'][8]['y_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<h4 class="text-success">Voltaje 2</h4>
<hr>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd" rowspan="2" >N</td>
			<td class="bordertd" rowspan="2" >Modo Prueba</td>
			<td class="bordertd" colspan="3" >Grupo Conexion</td>
			<td class="bordertd" rowspan="2" >Kv Meas</td>
			<td class="bordertd" rowspan="2" >%Pfcorr</td>
			<td class="bordertd" rowspan="2" >Cap(Pf)</td>
		</tr>
		<tr>
			<td class="bordertd">Cable de inyeccion</td>
			<td class="bordertd">Cable medida</td>
			<td class="bordertd">Modo</td>
		</tr>
		<tr>
			<td class="bordertd">1</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">H</td>
			<td class="bordertd">BAJA/TIERRA TER/GUARDA</td>
			<td class="bordertd">GND/GAR</td>
			<td class="bordertd"><?php echo $array['tabla2'][0]['h_gndgar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][0]['h_gndgar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][0]['h_gndgar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">2</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">H</td>
			<td class="bordertd">BAJA-TER/GUARDA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla2'][1]['h_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][1]['h_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][1]['h_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">3</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">H</td>
			<td class="bordertd">TER/TIERRA BAJA/UST</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla2'][2]['h_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][2]['h_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][2]['h_ust_cap']?></td>
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
			<td class="bordertd">X</td>
			<td class="bordertd">TER/TIERRA ALTA/GUARDA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla2'][3]['x_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][3]['x_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][3]['x_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">5</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">X</td>
			<td class="bordertd">ALTA-TER/GUARDA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla2'][4]['x_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][4]['x_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][4]['x_gar_cap']?></td>
		<tr>
			<td class="bordertd">6</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">X</td>
			<td class="bordertd">ALTA/TIERRA TER/UST</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla2'][5]['x_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][5]['x_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][5]['x_ust_cap']?></td>
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
			<td class="bordertd">7</td>
			<td class="bordertd">CHL + CH (GST)</td>
			<td class="bordertd">Y</td>
			<td class="bordertd">ALTA/TIERRA BAJA/GUARDA</td>
			<td class="bordertd">GND</td>
			<td class="bordertd"><?php echo $array['tabla2'][6]['y_gnd_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][6]['y_gnd_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][6]['y_gnd_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">8</td>
			<td class="bordertd">CH (GST -G)</td>
			<td class="bordertd">Y</td>
			<td class="bordertd">ALTA-BAJA/GUARDA</td>
			<td class="bordertd">GAR</td>
			<td class="bordertd"><?php echo $array['tabla2'][7]['y_gar_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][7]['y_gar_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][7]['y_gar_cap']?></td>
		</tr>
		<tr>
			<td class="bordertd">9</td>
			<td class="bordertd">CHL (UST)</td>
			<td class="bordertd">Y</td>
			<td class="bordertd">BAJA/TIERRA ALTA/UST</td>
			<td class="bordertd">UST</td>
			<td class="bordertd"><?php echo $array['tabla2'][8]['y_ust_kvmeas']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][8]['y_ust_pfcorr']?></td>
			<td class="bordertd"><?php echo $array['tabla2'][8]['y_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>