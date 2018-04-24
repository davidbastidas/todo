<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$n_filas=count($array['tabla']);
?>
<h4>Resistencia de Devanado TC's</h4>
<span><?php echo $n_filas?></span> Bobinado(s)
<table class="border">
	<thead>
		<tr>
			<th class="bordertd" <?php echo $style_centro?>>Nucleo</th>
			<th class="bordertd" <?php echo $style_centro?>>I Prueba</th>
			<th class="bordertd" <?php echo $style_centro?>>R Medida [m&#937;]</th>
			<th class="bordertd" <?php echo $style_centro?>>R referencia [m&#937;]</th>
			<th class="bordertd" <?php echo $style_centro?>>Desviacion</th>
		</tr>
	</thead>
	<tbody>
<?php 
for ($y=0; $y < $n_filas; $y++) {?>
		<tr>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['nucleo']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['iprueba']?></td>
			<td class="bordertd" <?php echo $style_centro?>>
				<?php 
				if($array['tabla'][$y]['rmedida']<=$array['tabla'][$y]['rreferencia']){?>
					<span <?php echo $estilo_ok?>><?php echo $array['tabla'][$y]['rmedida']?></span>
		  <?php }else{?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla'][$y]['rmedida']?></span>
		  <?php	}?>
			</td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['rreferencia']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['desviacion']?></td>
		</tr>
<?php } ?>
	</tbody>
</table>
<br>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>