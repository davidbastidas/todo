<?php $array = json_decode( $datos, true );?>
<h4>Corriente de Excitacion</h4>
<h3>Combinacion</h3>
<?php if($array['combinacion']=="dynddn"){echo 'Dyn/Ddn';}else if($array['combinacion']=="dynddn"){echo 'Ydn/Yyn';}?>
<table class="border">
	<thead>
		<tr>
			<th colspan="6">Corriente de Excitacion<div id="n_taps"></div></th>
		</tr>
		<tr>
			<th class="center">Tap</th>
			<th class="center">Kv</th>
			<th class="center"><div id="a"><?php if($array['combinacion']=="dynddn"){echo 'H1-H2(A)';}else if($array['combinacion']=="dynddn"){echo 'H0-H1(A)';}?></div></th>
			<th class="center"><div id="b"><?php if($array['combinacion']=="dynddn"){echo 'H2-H3(B)';}else if($array['combinacion']=="dynddn"){echo 'H0-H2(B)';}?></div></th>
			<th class="center"><div id="c"><?php if($array['combinacion']=="dynddn"){echo 'H3-H1(C)';}else if($array['combinacion']=="dynddn"){echo 'H0-H3(C)';}?></div></th>
			<th class="center">Resultado(D)</th>
			
		</tr>
	</thead>
	<tbody id="cuerpo_tabla">
		<?php for ($i=0; $i < count($array['tabla1']); $i++) {?>
			<tr>
				<td><?php echo $array['tabla1'][$i]['tap']?></td>
				<td><?php echo $array['tabla1'][$i]['kv']?></td>
				<td><?php echo $array['tabla1'][$i]['a']?></td>
				<td><?php echo $array['tabla1'][$i]['b']?></td>
				<td><?php echo $array['tabla1'][$i]['c']?></td>
				<td><?php echo $array['tabla1'][$i]['resultado']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>