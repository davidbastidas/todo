<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_pkv_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_pkv_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
?>
<h4>Collar Caliente</h4>
<p style="font-size:11px;">1. LA PRUEBA DE COLLAR CALINETE SE REALIZA CON EL INTERRUPTOR EN POSICION CLOSE, "I", ESTA PRUEBA SE LLEVARA A CABO SIEMPRE Y CUANDO EL INTERRUPTOR SEA DE TIPO EXTERIOR</p>
<p style="font-size:11px;">2. SKI C1: PRIMER FALDON DE CAMARA INTERRUPTIVA, PARTE SUPERIOR DEL INTERRUPTOR</p>
<p style="font-size:11px;">3. SKI S2: PRIMER FALDON AISLADOR DE SOPORTE, PARTE INFERIOR INTERRUPTOR</p>
<table class="border">
	<thead>
		<tr>
			<th rowspan="2" <?php echo $style_centro?>>N</th>
			<th colspan="3" <?php echo $style_centro?>>Grupo Conexion</th>
			<th rowspan="2" <?php echo $style_centro?>>Kv Meas</th>
			<th rowspan="2" <?php echo $style_centro?>>CP</th>
			<th rowspan="2" <?php echo $style_centro?>>P&#64;10KV</th>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>SKIRT</td>
			<td <?php echo $style_centro?>>Cable Alta tension</td>
			<td <?php echo $style_centro?>>Modo</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td <?php echo $style_centro_middel?> rowspan="2">1</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['skirt']?></td>
			<td <?php echo $style_centro?>>SKL C1</td>
			<td <?php echo $style_centro?>>UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['cp']?></td>
			<?php if($array['tabla'][0]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][0]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][0]['pkv']?></td>
			<?php }?>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][1]['skirt']?></td>
			<td <?php echo $style_centro?>>SKL S2</td>
			<td <?php echo $style_centro?>>UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][1]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][1]['cp']?></td>
			<?php if($array['tabla'][1]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][1]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][1]['pkv']?></td>
			<?php }?>
		</tr>

		<tr>
			<td <?php echo $style_centro_middel?> rowspan="2">2</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][2]['skirt']?></td>
			<td <?php echo $style_centro?>>SKL C1</td>
			<td <?php echo $style_centro?>>UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][2]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][2]['cp']?></td>
			<?php if($array['tabla'][2]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][2]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][2]['pkv']?></td>
			<?php }?>
			
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][3]['skirt']?></td>
			<td <?php echo $style_centro?>>SKL S2</td>
			<td <?php echo $style_centro?>>UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][3]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][3]['cp']?></td>
			<?php if($array['tabla'][3]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][3]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][3]['pkv']?></td>
			<?php }?>
			
		</tr>

		<tr>
			<td <?php echo $style_centro_middel?> rowspan="2">3</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][4]['skirt']?></td>
			<td <?php echo $style_centro?>>SKL C1</td>
			<td <?php echo $style_centro?>>UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][4]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][4]['cp']?></td>
			<?php if($array['tabla'][4]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][4]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][4]['pkv']?></td>
			<?php }?>
			
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][5]['skirt']?></td>
			<td <?php echo $style_centro?>>SKL S2</td>
			<td <?php echo $style_centro?>>UST</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][5]['kv']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][5]['cp']?></td>
			<?php if($array['tabla'][5]['pkv']<=100){?>
			<td <?php echo $estilo_pkv_ok?>><?php echo $array['tabla'][5]['pkv']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_pkv_bad?>><?php echo $array['tabla'][5]['pkv']?></td>
			<?php }?>
			
		</tr>
		
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>