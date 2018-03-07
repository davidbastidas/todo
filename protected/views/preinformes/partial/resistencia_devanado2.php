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
	<thead>
		<tr>
			<th colspan="3" >Corriente <?php echo $array['tablas'][$i]['corriente']?></th>
			<th colspan="7" >Resistencia de Devanado</th>
		</tr>
		<tr>
			<th  rowspan="3">Tap</th>
			<th  colspan="3"><?php echo $fase1?></th>
			<th  colspan="3"><?php echo $fase2?></th>
			<th  colspan="3"><?php echo $fase3?></th>
		</tr>
		<tr>
			<th  colspan="2">RD DE PLACA  m&#8486</th>
			<th >&#8486*1000</th>
			<th  colspan="2">RD DE PLACA  m&#8486</th>
			<th >&#8486*1000</th>
			<th  colspan="2">RD DE PLACA  m&#8486</th>
			<th >&#8486*1000</th>
		</tr>
		<tr>
			<th >MEDIDO</th>
			<th >X ADJ T &#8451;</th>
			<th >CORREGIDO</th>

			<th >MEDIDO</th>
			<th >X ADJ T &#8451;</th>
			<th >CORREGIDO</th>

			<th >MEDIDO</th>
			<th >X ADJ T &#8451;</th>
			<th >CORREGIDO</th>
		</tr>
	</thead>
	<tbody id="cuerpo_tabla">
		<?php 
		$n_filas=count($array['tablas'][$i]['filas']);
		for ($y=0; $y < $n_filas; $y++) {?>
			<tr>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['tap']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f1_medido']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f1_adj']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f1_corregido']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f2_medido']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f2_adj']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f2_corregido']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f3_medido']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f3_adj']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['f3_corregido']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>

<h3>Evaluacion Devanado <?php echo $array['tablas'][$i]['devanado']?></h3>
<table class="border">
	<thead>
		<tr>
			<th colspan="8" >Evaluado En base al Promedio </th>
		</tr>
		<tr>
			<th >Tap</td>
			<th >Promedio</th>
			<th >B1</th>
			<th >B2</th>
			<th >B3</th>
			<th colspan="3" >%</th>
		</tr>
		<tr>
			<th ></td>
			<th >Valor corregido</th>
			<th >valor</th>
			<th >valor</th>
			<th >valor</th>
			<th >B1</th>
			<th >B2</th>
			<th >B3</th>
		</tr>
	</thead>
	<tbody id="cuerpo_tabla">
		<?php 
		$n_filas=count($array['tablas'][$i]['filas']);
		for ($y=0; $y < $n_filas; $y++) {?>
			<tr>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['tap']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['vcorregido']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['b1']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['b2']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['b3']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['p_b1']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['p_b2']?></td>
				<td><?php echo $array['tablas'][$i]['filas'][$y]['p_b3']?></td>
			</tr>
		<?php }?>
	</tbody>
</table>
<?php }?>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>