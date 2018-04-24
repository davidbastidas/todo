<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$n_filas=count($array['tabla']);
?>
<h4>Relacion de Transformacion TC's</h4>
<span><?php echo $n_filas?></span> Nucleos
<table class="border">
	<thead>
		<tr>
			<th class="bordertd" <?php echo $style_centro?>>Nucleo</th>
			<th class="bordertd" <?php echo $style_centro?>>Corriente Primario A</th>
			<th class="bordertd" <?php echo $style_centro?>>Corriente secundario A</th>
			<th class="bordertd" <?php echo $style_centro?>>Relacion Calculada</th>
			<th class="bordertd" <?php echo $style_centro?>>Corriente Inyectada (A)</th>
			<th class="bordertd" <?php echo $style_centro?>>Corriente Medida (A)</th>
			<th class="bordertd" <?php echo $style_centro?>>Lim. Min</th>
			<th class="bordertd" <?php echo $style_centro?>>Relacion Medida</th>
			<th class="bordertd" <?php echo $style_centro?>>Lim. Max</th>
			<th class="bordertd" <?php echo $style_centro?>>Tolerancia</th>
		</tr>
	</thead>
	<tbody>
<?php 
for ($y=0; $y < $n_filas; $y++) {?>
		<tr>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['nucleo']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['cprimarioa']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['csecundarioa']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['rcalculada']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['cinyectada']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['cmedia']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['limmin']?></td>
			<td class="bordertd" <?php echo $style_centro?>>
				<?php 
				if($array['tabla'][$y]['rmedia']<$array['tabla'][$y]['limmin']){?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla'][$y]['rmedia']?></span>
		  <?php }else if($array['tabla'][$y]['rmedia']>$array['tabla'][$y]['limmax']){?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla'][$y]['rmedia']?></span>
		  <?php	}else{?>
					<span <?php echo $estilo_ok?>><?php echo $array['tabla'][$y]['rmedia']?></span>
		  <?php	}
				?>
			</td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['limmax']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['tolerancia']?></td>
		</tr>
<?php } ?>
	</tbody>
</table>
<br>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>