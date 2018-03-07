<?php $array = json_decode( $datos, true );?>
<h4>Corriente de Excitacion</h4>
<h3>Tipo de conexion</h3>
<?php 
if($array['combinacion']=="dyn"){
	echo 'Dyn';
}else if($array['combinacion']=="ddn"){
	echo 'Ddn';
}else if($array['combinacion']=="ydn"){
	echo 'Ydn';
}else if($array['combinacion']=="yyn"){
	echo 'Yyn';
}
?>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd" colspan="6">Corriente de Excitacion<div id="n_taps"></div></td>
		</tr>
		<tr>
			<td class="bordertd">Tap</td>
			<td class="bordertd">Kv</td>
			<td class="bordertd"><div id="a"><?php if($array['combinacion']=="dyn" || $array['combinacion']=="ddn"){echo 'H1-H2(A)';}else if($array['combinacion']=="ydn" || $array['combinacion']=="yyn"){echo 'H0-H1(A)';}?></div></td>
			<td class="bordertd"><div id="b"><?php if($array['combinacion']=="dyn" || $array['combinacion']=="ddn"){echo 'H2-H3(B)';}else if($array['combinacion']=="ydn" || $array['combinacion']=="yyn"){echo 'H0-H2(B)';}?></div></td>
			<td class="bordertd"><div id="c"><?php if($array['combinacion']=="dyn" || $array['combinacion']=="ddn"){echo 'H3-H1(C)';}else if($array['combinacion']=="ydn" || $array['combinacion']=="yyn"){echo 'H0-H3(C)';}?></div></td>
			<td class="bordertd">Resultado(D)</td>
			
		</tr>
		<?php for ($i=0; $i < count($array['tabla1']); $i++) {?>
			<tr>
				<td class="bordertd"><?php echo $array['tabla1'][$i]['tap']?></td>
				<td class="bordertd"><?php echo $array['tabla1'][$i]['kv']?></td>
				<td class="bordertd"><?php echo $array['tabla1'][$i]['a']?></td>
				<td class="bordertd"><?php echo $array['tabla1'][$i]['b']?></td>
				<td class="bordertd"><?php echo $array['tabla1'][$i]['c']?></td>
				<td class="bordertd"><?php echo $array['tabla1'][$i]['resultado']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>