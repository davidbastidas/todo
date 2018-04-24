<?php $array = json_decode( $datos, true );?>
<h4>Tangente Delta</h4>
<h4>Voltaje 1</h4>
<table class="border">
	<tbody>
		<tr>
			<th rowspan="2" >N</th>
			<th rowspan="2" >Modo Prueba</th>
			<th colspan="3" >Grupo Conexion</th>
			<th rowspan="2" >Kv Meas</th>
			<th rowspan="2" >%Pfcorr</th>
			<th rowspan="2" >Cap(Pf)</th>
		</tr>
		<tr>
			<td >Cable de inyeccion</td>
			<td >Cable medida</td>
			<td >Modo</td>
		</tr>
		<tr>
			<td >1</td>
			<td >CHL + CH (GST)</td>
			<td >H</td>
			<td >BAJA/TIERRA TER/GUARDA</td>
			<td >GND/GAR</td>
			<td><?php echo $array['tabla1'][0]['h_gndgar_kvmeas']?></td>
			<td><?php echo $array['tabla1'][0]['h_gndgar_pfcorr']?></td>
			<td><?php echo $array['tabla1'][0]['h_gndgar_cap']?></td>
		</tr>
		<tr>
			<td >2</td>
			<td >CH (GST -G)</td>
			<td >H</td>
			<td >BAJA-TER/GUARDA</td>
			<td >GAR</td>
			<td><?php echo $array['tabla1'][1]['h_gar_kvmeas']?></td>
			<td><?php echo $array['tabla1'][1]['h_gar_pfcorr']?></td>
			<td><?php echo $array['tabla1'][1]['h_gar_cap']?></td>
		</tr>
		<tr>
			<td >3</td>
			<td >CHL (UST)</td>
			<td >H</td>
			<td >TER/TIERRA BAJA/UST</td>
			<td >UST</td>
			<td><?php echo $array['tabla1'][2]['h_ust_kvmeas']?></td>
			<td><?php echo $array['tabla1'][2]['h_ust_pfcorr']?></td>
			<td><?php echo $array['tabla1'][2]['h_ust_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td >4</td>
			<td >CL + CLT (GST)</td>
			<td >X</td>
			<td >TER/TIERRA ALTA/GUARDA</td>
			<td >GND</td>
			<td><?php echo $array['tabla1'][3]['x_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla1'][3]['x_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla1'][3]['x_gnd_cap']?></td>
		</tr>
		<tr>
			<td >5</td>
			<td >CL (GST - G)</td>
			<td >X</td>
			<td >ALTA-TER/GUARDA</td>
			<td >GAR</td>
			<td><?php echo $array['tabla1'][4]['x_gar_kvmeas']?></td>
			<td><?php echo $array['tabla1'][4]['x_gar_pfcorr']?></td>
			<td><?php echo $array['tabla1'][4]['x_gar_cap']?></td>
		<tr>
			<td >6</td>
			<td >CLT (UST)</td>
			<td >X</td>
			<td >ALTA/TIERRA TER/UST</td>
			<td >UST</td>
			<td><?php echo $array['tabla1'][5]['x_ust_kvmeas']?></td>
			<td><?php echo $array['tabla1'][5]['x_ust_pfcorr']?></td>
			<td><?php echo $array['tabla1'][5]['x_ust_cap']?></td>
		</tr>
		<tr>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td ></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td >7</td>
			<td >CT + CHT (GST)</td>
			<td >Y</td>
			<td >ALTA/TIERRA BAJA/GUARDA</td>
			<td >GND</td>
			<td><?php echo $array['tabla1'][6]['y_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla1'][6]['y_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla1'][6]['y_gnd_cap']?></td>
		</tr>
		<tr>
			<td >8</td>
			<td >CT (GST -G)</td>
			<td >Y</td>
			<td >ALTA-BAJA/GUARDA</td>
			<td >GAR</td>
			<td><?php echo $array['tabla1'][7]['y_gar_kvmeas']?></td>
			<td><?php echo $array['tabla1'][7]['y_gar_pfcorr']?></td>
			<td><?php echo $array['tabla1'][7]['y_gar_cap']?></td>
		</tr>
		<tr>
			<td >9</td>
			<td >CHT (UST)</td>
			<td >Y</td>
			<td >BAJA/TIERRA ALTA/UST</td>
			<td >UST</td>
			<td><?php echo $array['tabla1'][8]['y_ust_kvmeas']?></td>
			<td><?php echo $array['tabla1'][8]['y_ust_pfcorr']?></td>
			<td><?php echo $array['tabla1'][8]['y_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<hr>
<h4 class="text-success">Voltaje 2</h4>
<table class="border">
	<tbody>
		<tr>
			<th rowspan="2" >N</th>
			<th rowspan="2" >Modo Prueba</th>
			<th colspan="3" >Grupo Conexion</th>
			<th rowspan="2" >Kv Meas</th>
			<th rowspan="2" >%Pfcorr</th>
			<th rowspan="2" >Cap(Pf)</th>
		</tr>
		<tr>
			<td >Cable de inyeccion</td>
			<td >Cable medida</td>
			<td >Modo</td>
		</tr>
		<tr>
			<td >1</td>
			<td >CHL + CH (GST)</td>
			<td >H</td>
			<td >BAJA/TIERRA TER/GUARDA</td>
			<td >GND/GAR</td>
			<td><?php echo $array['tabla2'][0]['h_gndgar_kvmeas']?></td>
			<td><?php echo $array['tabla2'][0]['h_gndgar_pfcorr']?></td>
			<td><?php echo $array['tabla2'][0]['h_gndgar_cap']?></td>
		</tr>
		<tr>
			<td >2</td>
			<td >CH (GST -G)</td>
			<td >H</td>
			<td >BAJA-TER/GUARDA</td>
			<td >GAR</td>
			<td><?php echo $array['tabla2'][1]['h_gar_kvmeas']?></td>
			<td><?php echo $array['tabla2'][1]['h_gar_pfcorr']?></td>
			<td><?php echo $array['tabla2'][1]['h_gar_cap']?></td>
		</tr>
		<tr>
			<td >3</td>
			<td >CHL (UST)</td>
			<td >H</td>
			<td >TER/TIERRA BAJA/UST</td>
			<td >UST</td>
			<td><?php echo $array['tabla2'][2]['h_ust_kvmeas']?></td>
			<td><?php echo $array['tabla2'][2]['h_ust_pfcorr']?></td>
			<td><?php echo $array['tabla2'][2]['h_ust_cap']?></td>
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
			<td >4</td>
			<td >CL + CLT (GST)</td>
			<td >X</td>
			<td >TER/TIERRA ALTA/GUARDA</td>
			<td >GND</td>
			<td><?php echo $array['tabla2'][3]['x_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla2'][3]['x_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla2'][3]['x_gnd_cap']?></td>
		</tr>
		<tr>
			<td >5</td>
			<td >CL (GST - G)</td>
			<td >X</td>
			<td >ALTA-TER/GUARDA</td>
			<td >GAR</td>
			<td><?php echo $array['tabla2'][4]['x_gar_kvmeas']?></td>
			<td><?php echo $array['tabla2'][4]['x_gar_pfcorr']?></td>
			<td><?php echo $array['tabla2'][4]['x_gar_cap']?></td>
		<tr>
			<td >6</td>
			<td >CLT (UST)</td>
			<td >X</td>
			<td >ALTA/TIERRA TER/UST</td>
			<td >UST</td>
			<td><?php echo $array['tabla2'][5]['x_ust_kvmeas']?></td>
			<td><?php echo $array['tabla2'][5]['x_ust_pfcorr']?></td>
			<td><?php echo $array['tabla2'][5]['x_ust_cap']?></td>
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
			<td >7</td>
			<td >CT + CHT (GST)</td>
			<td >Y</td>
			<td >ALTA/TIERRA BAJA/GUARDA</td>
			<td >GND</td>
			<td><?php echo $array['tabla2'][6]['y_gnd_kvmeas']?></td>
			<td><?php echo $array['tabla2'][6]['y_gnd_pfcorr']?></td>
			<td><?php echo $array['tabla2'][6]['y_gnd_cap']?></td>
		</tr>
		<tr>
			<td >8</td>
			<td >CT (GST -G)</td>
			<td >Y</td>
			<td >ALTA-BAJA/GUARDA</td>
			<td >GAR</td>
			<td><?php echo $array['tabla2'][7]['y_gar_kvmeas']?></td>
			<td><?php echo $array['tabla2'][7]['y_gar_pfcorr']?></td>
			<td><?php echo $array['tabla2'][7]['y_gar_cap']?></td>
		</tr>
		<tr>
			<td >9</td>
			<td >CHT (UST)</td>
			<td >Y</td>
			<td >BAJA/TIERRA ALTA/UST</td>
			<td >UST</td>
			<td><?php echo $array['tabla2'][8]['y_ust_kvmeas']?></td>
			<td><?php echo $array['tabla2'][8]['y_ust_pfcorr']?></td>
			<td><?php echo $array['tabla2'][8]['y_ust_cap']?></td>
		</tr>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>