<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_pkv_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_pkv_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
?>
<h4>Factor Disipacion</h4>
<table class="border">
	<thead>
		<tr>
			<th rowspan="2" <?php echo $style_centro?>>N</th>
			<th colspan="3" <?php echo $style_centro?>>Grupo Conexion</th>
			<th rowspan="2" <?php echo $style_centro?>>Kv Meas</th>
			<th rowspan="2" <?php echo $style_centro?>>CP</th>
			<th rowspan="2" <?php echo $style_centro?>>P&#64;10KV</th>
			<th rowspan="2" <?php echo $style_centro?>>Frecuencia</th>
			<th rowspan="2" <?php echo $style_centro?>>Estado IT</th>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>Cable Alta tension</td>
			<td <?php echo $style_centro?>>Cable Baja tension</td>
			<td <?php echo $style_centro?>>Modo</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td <?php echo $style_centro_middel?> rowspan="4">R</td>
			<td <?php echo $style_centro?> rowspan="2">1</td>
			<td <?php echo $style_centro?> rowspan="2">2</td>
			<td <?php echo $style_centro?> rowspan="2">UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['cp']?></td>
			<?php if($array['tabla'][0]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][0]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][0]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][1]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][1]['cp']?></td>
			<?php if($array['tabla'][1]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][1]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][1]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][1]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Open</td>
		</tr>

		<tr>
			<td <?php echo $style_centro?> rowspan="2">1</td>
			<td <?php echo $style_centro?> rowspan="2">GND</td>
			<td <?php echo $style_centro?> rowspan="2">GND</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][2]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][2]['cp']?></td>
			<?php if($array['tabla'][2]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][2]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][2]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][2]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][3]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][3]['cp']?></td>
			<?php if($array['tabla'][3]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][3]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][3]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][3]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>

		<tr>
			<td <?php echo $style_centro_middel?> rowspan="4">S</td>
			<td <?php echo $style_centro?> rowspan="2">3</td>
			<td <?php echo $style_centro?> rowspan="2">4</td>
			<td <?php echo $style_centro?> rowspan="2">UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][4]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][4]['cp']?></td>
			<?php if($array['tabla'][4]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][4]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][4]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][4]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][5]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][5]['cp']?></td>
			<?php if($array['tabla'][5]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][5]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][5]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][5]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Open</td>
		</tr>

		<tr>
			<td <?php echo $style_centro?> rowspan="2">3</td>
			<td <?php echo $style_centro?> rowspan="2">GND</td>
			<td <?php echo $style_centro?> rowspan="2">GND</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][6]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][6]['cp']?></td>
			<?php if($array['tabla'][6]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][6]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][6]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][6]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][7]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][7]['cp']?></td>
			<?php if($array['tabla'][7]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][7]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][7]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][7]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>

		<tr>
			<td <?php echo $style_centro_middel?> rowspan="4">T</td>
			<td <?php echo $style_centro?> rowspan="2">5</td>
			<td <?php echo $style_centro?> rowspan="2">6</td>
			<td <?php echo $style_centro?> rowspan="2">UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][8]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][8]['cp']?></td>
			<?php if($array['tabla'][8]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][8]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][8]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][8]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Open</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][9]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][9]['cp']?></td>
			<?php if($array['tabla'][9]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][9]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][9]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][9]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Open</td>
		</tr>

		<tr>
			<td <?php echo $style_centro?> rowspan="2">5</td>
			<td <?php echo $style_centro?> rowspan="2">GND</td>
			<td <?php echo $style_centro?> rowspan="2">GND</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][10]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][10]['cp']?></td>
			<?php if($array['tabla'][10]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][10]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][10]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][10]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][11]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][11]['cp']?></td>
			<?php if($array['tabla'][11]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][11]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][11]['pkv']?></td>
			<?php }?>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][11]['frecuencia']?></td>
			<td <?php echo $style_centro?>>Closed</td>
		</tr>
		
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>