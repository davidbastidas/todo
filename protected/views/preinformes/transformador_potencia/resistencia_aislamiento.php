<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
?>
<h4>Resistencia de Aislamiento TP's</h4>
<table class="border">
		<tr>
			<th <?php echo $style_centro?> rowspan="4" colspan="4"></th>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>Tensión Aplicada:</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['tension_aplicada']?></td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>Tiempo de inyección:</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['tiempo_inyeccion']?></td>
		</tr>
		<tr>
			<td <?php echo $style_centro?>>Factor de Corrección K</td>
			<td <?php echo $style_centro?>><?php echo $array['tabla'][0]['fcorreccionk']?></td>
		</tr>
		<tr>
			<th <?php echo $style_centro?> colspan="3">Resistencia de aislamiento [G&#937;]</th>
			<th <?php echo $style_centro?> colspan="3">Resistencia de aislamiento [G&#937;] &#64;20&#176;C</th>
		</tr>
		<tr>
			<th <?php echo $style_centro?>>H - X</th>
			<th <?php echo $style_centro?>>H - G</th>
			<th <?php echo $style_centro?>>X - G</th>
			<th <?php echo $style_centro?>>H - X</th>
			<th <?php echo $style_centro?>>H - G</th>
			<th <?php echo $style_centro?>>X - G</th>
		</tr>
	<tbody>
		<tr>
			<th <?php echo $style_centro?>><?php echo $array['tabla'][0]['lecturahx']?></th>
			<th <?php echo $style_centro?>><?php echo $array['tabla'][0]['lecturahg']?></th>
			<th <?php echo $style_centro?>><?php echo $array['tabla'][0]['lecturaxg']?></th>
			<th <?php echo $style_centro?>>
				<?php 
				if($array['tabla'][0]['calculohx']>=5){ ?>
				<span <?php echo $estilo_ok?>><?php echo $array['tabla'][0]['calculohx']?></span>
		  <?php }else{ ?>
				<span <?php echo $estilo_bad?>><?php echo $array['tabla'][0]['calculohx']?></span>
		  <?php } ?>
			</th>
			<th <?php echo $style_centro?>>
				<?php 
				if($array['tabla'][0]['calculohg']>=5){ ?>
				<span <?php echo $estilo_ok?>><?php echo $array['tabla'][0]['calculohg']?></span>
		  <?php }else{ ?>
				<span <?php echo $estilo_bad?>><?php echo $array['tabla'][0]['calculohg']?></span>
		  <?php } ?>
			</th>
			<th <?php echo $style_centro?>>
				<?php 
				if($array['tabla'][0]['calculoxg']>=5){ ?>
				<span <?php echo $estilo_ok?>><?php echo $array['tabla'][0]['calculoxg']?></span>
		  <?php }else{ ?>
				<span <?php echo $estilo_bad?>><?php echo $array['tabla'][0]['calculoxg']?></span>
		  <?php } ?>
			</th>
		</tr>
	</tbody>
</table>
<br>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>