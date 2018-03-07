<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$n_filas=count($array['tabla1']);
?>
<h4>Tangente Delta TP's</h4>
<span><?php echo $n_filas?></span> Fila(s)
<table class="border">
	<thead>
		<tr>
			<th <?php echo $style_centro?> colspan="5">H Vs G</th>
		</tr>
		<tr>
			<th <?php echo $style_centro?>>V prueba</th>
			<th <?php echo $style_centro?>>V salida</th>
			<th <?php echo $style_centro?>>I salida</th>
			<th <?php echo $style_centro?>>Frecuencia</th>
			<th <?php echo $style_centro?>>Capacitancia (pf)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][0]['vprueba']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][0]['vsalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][0]['isalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][0]['frecuencia']?></td>
			<td <?php echo $style_centro?>>
			<?php 
				$C1=$array['tabla1'][0]['capacitancia'];
				$C2=$array['tabla1'][1]['capacitancia'];
				$DIF=abs($C1-$C2);
				$PORC=($DIF/$C1)*100;
				if($PORC<=5){ ?>
					<span <?php echo $estilo_ok?>><?php echo $array['tabla1'][0]['capacitancia']?></span>
		  	<?php }else{ ?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla1'][0]['capacitancia']?></span>
		  	<?php } ?>
			</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][1]['vprueba']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][1]['vsalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][1]['isalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla1'][1]['frecuencia']?></td>
			<td <?php echo $style_centro?>>
			<?php 
				$C1=$array['tabla1'][0]['capacitancia'];
				$C2=$array['tabla1'][1]['capacitancia'];
				$DIF=abs($C1-$C2);
				$PORC=($DIF/$C1)*100;
				if($PORC<=5){ ?>
					<span <?php echo $estilo_ok?>><?php echo $array['tabla1'][1]['capacitancia']?></span>
		  	<?php }else{ ?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla1'][1]['capacitancia']?></span>
		  	<?php } ?>
			</td>
		</tr>
	</tbody>
</table>
<br>

<span><?php echo $n_filas?></span> Fila(s)
<table class="border">
	<thead>
		<tr>
			<th <?php echo $style_centro?> colspan="5">L Vs G</th>
		</tr>
		<tr>
			<th <?php echo $style_centro?>>V prueba</th>
			<th <?php echo $style_centro?>>V salida</th>
			<th <?php echo $style_centro?>>I salida</th>
			<th <?php echo $style_centro?>>Frecuencia</th>
			<th <?php echo $style_centro?>>Capacitancia (pf)</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][0]['vprueba']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][0]['vsalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][0]['isalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][0]['frecuencia']?></td>
			<td <?php echo $style_centro?>>
			<?php 
				$C1=$array['tabla2'][0]['capacitancia'];
				$C2=$array['tabla2'][1]['capacitancia'];
				$DIF=abs($C1-$C2);
				$PORC=($DIF/$C1)*100;
				if($PORC<=5){ ?>
					<span <?php echo $estilo_ok?>><?php echo $array['tabla2'][0]['capacitancia']?></span>
		  	<?php }else{ ?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla2'][0]['capacitancia']?></span>
		  	<?php } ?>
			</td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][1]['vprueba']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][1]['vsalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][1]['isalida']?></td>
			<td <?php echo $style_centro?>><?php echo $array['tabla2'][1]['frecuencia']?></td>
			<td <?php echo $style_centro?>>
			<?php 
				$C1=$array['tabla2'][0]['capacitancia'];
				$C2=$array['tabla2'][1]['capacitancia'];
				$DIF=abs($C1-$C2);
				$PORC=($DIF/$C1)*100;
				if($PORC<=5){ ?>
					<span <?php echo $estilo_ok?>><?php echo $array['tabla2'][1]['capacitancia']?></span>
		  	<?php }else{ ?>
					<span <?php echo $estilo_bad?>><?php echo $array['tabla2'][1]['capacitancia']?></span>
		  	<?php } ?>
			</td>
		</tr>
	</tbody>
</table>
<br>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>