<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$n_filas=count($array['tabla']);
?>
<h4>Collar Caliente TC's</h4>
<span><?php echo $n_filas?></span> Fila(s)
<table class="border">
	<thead>
		<tr>
			<th class="bordertd" <?php echo $style_centro?>>skirt</th>
			<th class="bordertd" <?php echo $style_centro?>>V Prueba</th>
			<th class="bordertd" <?php echo $style_centro?>>V Salida</th>
			<th class="bordertd" <?php echo $style_centro?>>Wattios (mW)</th>
		</tr>
	</thead>
	<tbody>
<?php 
for ($y=0; $y < $n_filas; $y++) {?>
		<tr>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['fase']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['serie']?></td>
			<td class="bordertd" <?php echo $style_centro?>><?php echo $array['tabla'][$y]['vprueba']?></td>
			<td class="bordertd" <?php echo $style_centro?>>
			<?php 
			if($array['tabla'][$y]['wattios']<100){ ?>
				<span <?php echo $estilo_ok?>><?php echo $array['tabla'][$y]['wattios']?></span>
			<?php }else{ ?>
				<span <?php echo $estilo_bad?>><?php echo $array['tabla'][$y]['wattios']?></span>
			<?php } ?>
			</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<br>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>