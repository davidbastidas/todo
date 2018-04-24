<?php $array = json_decode( $datos, true );
$n_tablas=count($array['tablas']);
?>
<h4>Relacion de Transformacion</h4>
<?php for ($i=0; $i < $n_tablas; $i++) {?>

<h3>Ratio</h3>
<?php 
if($array['tablas'][$i]['combinacion']=="ddn"){
	echo 'Delta/Delta(Ddn)';
}else if($array['tablas'][$i]['combinacion']=="dyn"){
	echo 'Delta/Estrella(Dyn)';
}else if($array['tablas'][$i]['combinacion']=="ydn"){
	echo 'Estrella/Delta(Ydn)';
}else if($array['tablas'][$i]['combinacion']=="yyn"){
	echo 'Estrella/Estrella(Yyn)';
}
?>
<table class="border">
	<thead>
		<tr>
			<td colspan="16" class="bordertd">Calculadora de Ratio <span class="label label-inverse arrowed-in" id="n_taps"></span></td>
		</tr>
		<tr>
			<td class="bordertd">Tap</td>
			<td class="bordertd">Hvolt</td>
			<td class="bordertd">Tap</td>
			<td class="bordertd">Xvolt</td>
			<td class="bordertd">Cal</td>
			<th class="bordertd">Ratio1</th>
			<th class="bordertd">%Error</th>
			<th class="bordertd">Ratio2</th>
			<th class="bordertd">%Error</th>
			<th class="bordertd">Ratio3</th>
			<th class="bordertd">%Error</th>
			<td class="bordertd">Min.Lim</td>
			<td class="bordertd">Max.Lim</td>
			<td class="bordertd">Ratio1</td>
			<td class="bordertd">Ratio2</td>
			<td class="bordertd">Ratio3</td>
		</tr>
	</thead>
	<tbody id="cuerpo_tabla">
		<?php 
		$n_filas=count($array['tablas'][$i]['filas']);
		for ($y=0; $y < $n_filas; $y++) {?>
			<tr>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['tap1']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['hvolt']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['tap2']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['xvolt']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['calculado']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['ratio1']?></td>
				<td class="bordertd">
					<?php 
					if(isset($array['tablas'][$i]['filas'][$y]['error_ratio1'])){
						echo $array['tablas'][$i]['filas'][$y]['error_ratio1'];
					}else{
						echo "RECALCULAR";
					}
					?>
				</td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['ratio2']?></td>
				<td class="bordertd">
					<?php 
					if(isset($array['tablas'][$i]['filas'][$y]['error_ratio2'])){
						echo $array['tablas'][$i]['filas'][$y]['error_ratio2'];
					}else{
						echo "RECALCULAR";
					}
					?>
				</td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['ratio3']?></td>
				<td class="bordertd">
					<?php 
					if(isset($array['tablas'][$i]['filas'][$y]['error_ratio3'])){
						echo $array['tablas'][$i]['filas'][$y]['error_ratio3'];
					}else{
						echo "RECALCULAR";
					}
					?>
				</td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['minlim']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['maxlim']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['t_ratio1']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['t_ratio2']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['t_ratio3']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>