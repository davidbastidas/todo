<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;" class="bordertd"';
$style_centro_middel='style="text-align: center;vertical-align: middle;" class="bordertd"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;" class="bordertd"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;" class="bordertd"';
?>
<h4>Resistencia de Contacto</h4>
<table class="border">
	<thead>
		<tr>
			<th <?php echo $style_centro?>>Conexiones [Interruptor]</th>
			<th <?php echo $style_centro?>>Nivel de Amperaje</th>
			<th <?php echo $style_centro?>>Lectura &#181;&#8486;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td <?php echo $style_centro_middel?> rowspan="2">[1]-[2]</td>
			<td <?php echo $style_centro?>>100</td>
			<?php if($array['tabla'][0]['lectura']<=100){?>
			<td <?php echo $estilo_ok?>><?php echo $array['tabla'][0]['lectura']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_bad?>><?php echo $array['tabla'][0]['lectura']?></td>
			<?php }?>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][1]['amperaje']?>
			</td>
			<?php if($array['tabla'][1]['lectura']<=100){?>
			<td <?php echo $estilo_ok?>><?php echo $array['tabla'][1]['lectura']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_bad?>><?php echo $array['tabla'][1]['lectura']?></td>
			<?php }?>
		</tr>

		<tr>
			<td <?php echo $style_centro_middel?> rowspan="2">[3]-[4]</td>
			<td <?php echo $style_centro?>>100</td>
			<?php if($array['tabla'][2]['lectura']<=100){?>
			<td <?php echo $estilo_ok?>><?php echo $array['tabla'][2]['lectura']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_bad?>><?php echo $array['tabla'][2]['lectura']?></td>
			<?php }?>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][3]['amperaje']?>
			</td>
			<?php if($array['tabla'][3]['lectura']<=100){?>
			<td <?php echo $estilo_ok?>><?php echo $array['tabla'][3]['lectura']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_bad?>><?php echo $array['tabla'][3]['lectura']?></td>
			<?php }?>
		</tr>
		<tr>
			<td <?php echo $style_centro_middel?> rowspan="2">[5]-[6]</td>
			<td <?php echo $style_centro?>>100</td>
			<?php if($array['tabla'][4]['lectura']<=100){?>
			<td <?php echo $estilo_ok?>><?php echo $array['tabla'][4]['lectura']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_bad?>><?php echo $array['tabla'][4]['lectura']?></td>
			<?php }?>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>
				<?php echo $array['tabla'][5]['amperaje']?>
			</td>
			<?php if($array['tabla'][5]['lectura']<=100){?>
			<td <?php echo $estilo_ok?>><?php echo $array['tabla'][5]['lectura']?></td>
			<?php }else{ ?>
			<td <?php echo $estilo_bad?>><?php echo $array['tabla'][5]['lectura']?></td>
			<?php }?>
		</tr>
		
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>