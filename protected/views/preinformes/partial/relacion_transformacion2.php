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
			<th colspan="16" >Calculadora de Ratio <span class="label label-inverse arrowed-in" id="n_taps"></span></th>
		</tr>
		<tr>
			<th >Tap</th>
			<th >Hvolt</th>
			<th >Tap</th>
			<th >Xvolt</th>
			<th >Cal</th>
			<th >Ratio1</th>
			<th >%Error</th>
			<th >Ratio2</th>
			<th >%Error</th>
			<th >Ratio3</th>
			<th >%Error</th>
			<th >Min.Lim</th>
			<th >Max.Lim</th>
			<th >Ratio1</th>
			<th >Ratio2</th>
			<th >Ratio3</th>
		</tr>
	</thead>
	<tbody id="cuerpo_tabla">
		<?php 
		$n_filas=count($array['tablas'][$i]['filas']);
		for ($y=0; $y < $n_filas; $y++) {?>
			<tr>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['tap1']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['hvolt']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['tap2']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['xvolt']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['calculado']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['ratio1']?></td>
				<td>
					<?php 
					if(isset($array['tablas'][$i]['filas'][$y]['error_ratio1'])){
						echo $array['tablas'][$i]['filas'][$y]['error_ratio1'];
					}else{
						echo "RECALCULAR";
					}
					?>
				</td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['ratio2']?></td>
				<td>
					<?php 
					if(isset($array['tablas'][$i]['filas'][$y]['error_ratio2'])){
						echo $array['tablas'][$i]['filas'][$y]['error_ratio2'];
					}else{
						echo "RECALCULAR";
					}
					?>
				</td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['ratio3']?></td>
				<td>
					<?php 
					if(isset($array['tablas'][$i]['filas'][$y]['error_ratio3'])){
						echo $array['tablas'][$i]['filas'][$y]['error_ratio3'];
					}else{
						echo "RECALCULAR";
					}
					?>
				</td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['minlim']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['maxlim']?></td>
				<td class="critica_r"><?php echo $array['tablas'][$i]['filas'][$y]['t_ratio1']?></td>
				<td class="critica_r"><?php echo $array['tablas'][$i]['filas'][$y]['t_ratio2']?></td>
				<td class="critica_r"><?php echo $array['tablas'][$i]['filas'][$y]['t_ratio3']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>