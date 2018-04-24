<?php $array = json_decode( $datos, true );
$n_tablas=count($array['tablas']);
?>
<h4>Resistencia de Devanados</h4>
<?php for ($i=0; $i < $n_tablas; $i++) {?>

<h3>Devanado <?php echo $array['tablas'][$i]['devanado']?></h3>

<?php 
$fase1="";$fase2="";$fase3="";
if($array['tablas'][$i]['devanado']=="X"){
	$fase1="FASES (X1-X0) = B1";
	$fase2="FASES (X2-X0) = B2";
	$fase3="FASES (X3-X0) = B3";
}else if($array['tablas'][$i]['devanado']=="H"){
	$fase1="FASES (H1-H0) = B1";
	$fase2="FASES (H2-H0) = B2";
	$fase3="FASES (H3-H0) = B3";
}
?>
<table class="border">
	<tbody>
		<tr>
			<td colspan="3" class="bordertd">Corriente <?php echo $array['tablas'][$i]['corriente']?></td>
			<td colspan="7" class="bordertd">Resistencia de Devanado</td>
		</tr>
		<tr>
			<td class="bordertd" rowspan="3">Tap</td>
			<td class="bordertd" colspan="3"><?php echo $fase1?></td>
			<td class="bordertd" colspan="3"><?php echo $fase2?></td>
			<td class="bordertd" colspan="3"><?php echo $fase3?></td>
		</tr>
		<tr>
			<td class="bordertd" colspan="2">RD DE PLACA  m &omega;</td>
			<td class="bordertd">&#8486 * 1000</td>
			<td class="bordertd" colspan="2">RD DE PLACA  m &#8486</td>
			<td class="bordertd">&#8486 * 1000</td>
			<td class="bordertd" colspan="2">RD DE PLACA  m &#8486</td>
			<td class="bordertd">&#8486 * 1000</td>
		</tr>
		<tr>
			<td class="bordertd">MEDIDO</td>
			<td class="bordertd">X ADJ T&#176;C</td>
			<td class="bordertd">CORREGIDO</td>

			<td class="bordertd">MEDIDO</td>
			<td class="bordertd">X ADJ T&#176;C</td>
			<td class="bordertd">CORREGIDO</td>

			<td class="bordertd">MEDIDO</td>
			<td class="bordertd">X ADJ T&#176;C</td>
			<td class="bordertd">CORREGIDO</td>
		</tr>
		<?php 
		$n_filas=count($array['tablas'][$i]['filas']);
		for ($y=0; $y < $n_filas; $y++) {?>
			<tr>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['tap']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f1_medido']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f1_adj']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f1_corregido']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f2_medido']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f2_adj']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f2_corregido']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f3_medido']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f3_adj']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['f3_corregido']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>

<h3>Evaluacion Devanado <?php echo $array['tablas'][$i]['devanado']?></h3>
<table class="border">
	<tbody>
		<tr>
			<td colspan="8" >Evaluado En base al Promedio</td>
		</tr>
		<tr>
			<td class="bordertd">Tap</td>
			<td class="bordertd">Promedio</td>
			<td class="bordertd">B1</td>
			<td class="bordertd">B2</td>
			<td class="bordertd">B3</td>
			<td class="bordertd" colspan="3" >%</td>
		</tr>
		<tr>
			<td class="bordertd"></td>
			<td class="bordertd">Valor corregido</td>
			<td class="bordertd">valor</td>
			<td class="bordertd">valor</td>
			<td class="bordertd">valor</td>
			<td class="bordertd">B1</td>
			<td class="bordertd">B2</td>
			<td class="bordertd">B3</td>
		</tr>
		<?php 
		$n_filas=count($array['tablas'][$i]['filas']);
		for ($y=0; $y < $n_filas; $y++) {?>
			<tr>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['tap']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['vcorregido']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['b1']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['b2']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['b3']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['p_b1']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['p_b2']?></td>
				<td class="bordertd"><?php echo $array['tablas'][$i]['filas'][$y]['p_b3']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>