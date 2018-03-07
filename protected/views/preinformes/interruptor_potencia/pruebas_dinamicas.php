<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$json_equipo = json_decode( $datosequipo, true );
$ruta_imagenes = Yii::app() -> params['ruta_fotos_interruptor_potencia'];
?>
<h4>Pruebas Dinamicas</h4>
<?php 
$n_tablas=count($array['tablas']);
for ($y=0; $y < $n_tablas; $y++) {
	if($array['tablas'][$y]['tipo']==1){
		//TIEMPO DE APERTURA Y DISCREPANCIA DE POLOS
?>
	<p style="font-size:11px;color:green;">TIEMPO DE APERTURA MAXIMO FABRICANTE:
		<?php echo $json_equipo['t_apertura_max']?>
	</p>
	<p style="font-size:11px;color:#FFA500;">TIEMPO DE APERTURA MINIMO FABRICANTE:
		<?php echo $json_equipo["t_apertura_min"]?>
	</p>
	<table class="border">
		<thead>
			<tr>
				<th colspan="3" <?php echo $style_centro?>>TIEMPO DE APERTURA Y DISCREPANCIA DE POLOS</th>
			</tr>
			<tr>
				<th <?php echo $style_centro?>>FASE</th>
				<th <?php echo $style_centro?>>LABEL</th>
				<th <?php echo $style_centro?>>TIEMPO DE APERTURA(ms)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td <?php echo $style_centro?>>A</td>
				<td <?php echo $style_centro?>>OCB-A</td>
				<?php if($array['tablas'][$y]['tad_ocb_a']<=$json_equipo['t_apertura_max'] && 
						$array['tablas'][$y]['tad_ocb_a']>=$json_equipo["t_apertura_min"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['tad_ocb_a']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['tad_ocb_a']?>
				</td>
				<?php }?>
				
			</tr>
			<tr>
				<td <?php echo $style_centro?>>B</td>
				<td <?php echo $style_centro?>>OCB-B</td>
				<?php if($array['tablas'][$y]['tad_ocb_b']<=$json_equipo['t_apertura_max'] && 
						$array['tablas'][$y]['tad_ocb_b']>=$json_equipo["t_apertura_min"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['tad_ocb_b']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['tad_ocb_b']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?>>C</td>
				<td <?php echo $style_centro?>>OCB-C</td>
				<?php if($array['tablas'][$y]['tad_ocb_c']<=$json_equipo['t_apertura_max'] && 
						$array['tablas'][$y]['tad_ocb_c']>=$json_equipo["t_apertura_min"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['tad_ocb_c']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['tad_ocb_c']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">Contacto Aux a</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tad_contacto']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">DISCREPANCIA DE POLOS</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tad_discrepancia']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">CORRIENTE PICO BOBINA</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tad_corriente_pico']?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php 
		$foto=$ruta_imagenes.$id.'/'.$array['tablas'][$y]['foto'];
		if (is_file($foto)) {
	?>
		<h3>Grafica Operacion Bobina Pico</h3>
		<img style="width:500px;height:300px;" src="<?php echo $foto?>">
	<?php 
		}
	?>
<?php 
	}else if($array['tablas'][$y]['tipo']==2){
		//TIEMPO DE CIERRE Y DISCREPANCIA DE POLOS
?>
	<br>
	<p style="font-size:11px;color:green;">TIEMPO DE CIERRE MAXIMO FABRICANTE:
		<?php echo $json_equipo["t_cierre_max"]?>
	</p>
	<p style="font-size:11px;color:#FFA500;">TIEMPO DE CIERRE MINIMO FABRICANTE:
		<?php echo $json_equipo["t_cierre_min"]?>
	</p>
	<table class="border">
		<thead>
			<tr>
				<th colspan="3" <?php echo $style_centro?>>TIEMPO DE CIERRE Y DISCREPANCIA DE POLOS</th>
			</tr>
			<tr>
				<th <?php echo $style_centro?>>FASE</th>
				<th <?php echo $style_centro?>>LABEL</th>
				<th <?php echo $style_centro?>>TIEMPO DE CIERRE (ms)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td <?php echo $style_centro?>>A</td>
				<td <?php echo $style_centro?>>OCB-A</td>
				<?php if($array['tablas'][$y]['tcd_ocb_a']<=$json_equipo['t_cierre_max'] && 
						$array['tablas'][$y]['tcd_ocb_a']>=$json_equipo["t_cierre_min"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['tcd_ocb_a']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['tcd_ocb_a']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">Rebote A</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_rebote_a']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?>>B</td>
				<td <?php echo $style_centro?>>OCB-B</td>
				<?php if($array['tablas'][$y]['tcd_ocb_b']<=$json_equipo['t_cierre_max'] && 
						$array['tablas'][$y]['tcd_ocb_b']>=$json_equipo["t_cierre_min"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['tcd_ocb_b']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['tcd_ocb_b']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">Rebote B</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_rebote_b']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?>>C</td>
				<td <?php echo $style_centro?>>OCB-C</td>
				<?php if($array['tablas'][$y]['tcd_ocb_c']<=$json_equipo['t_cierre_max'] && 
						$array['tablas'][$y]['tcd_ocb_c']>=$json_equipo["t_cierre_min"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['tcd_ocb_c']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['tcd_ocb_c']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">Rebote C</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_rebote_c']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">Contacto Aux b</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_contacto']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">DISCREPANCIA DE POLOS</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_discrepancia']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">CORRIENTE PICO BOBINA</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_corriente_pico']?>
				</td>
			</tr>
			<tr>
				<td <?php echo $style_centro?> colspan="2">CORRIENTE PICO MOTOR</td>
				<td <?php echo $style_centro?>>
					<?php echo $array['tablas'][$y]['tcd_corriente_pico_motor']?>
				</td>
			</tr>
		</tbody>
	</table>
	<?php 
		$foto=$ruta_imagenes.$id.'/'.$array['tablas'][$y]['foto1'];
		if (is_file($foto)) {
	?>
		<h3>Grafica Corriente Operacion BOBINA</h3>
		<img style="width:500px;height:300px;" src="<?php echo $foto?>">
	<?php 
		}
	?>
	<?php 
		$foto=$ruta_imagenes.$id.'/'.$array['tablas'][$y]['foto2'];
		if (is_file($foto)) {
	?>
		<h3>Grafica Corriente Operacion MOTOR</h3>
		<img style="width:500px;height:300px;" src="<?php echo $foto?>">
	<?php 
		}
	?>
<?php
	}else if($array['tablas'][$y]['tipo']==3){
		//APERTURA - CIERRE - APERTURA
?>
	<br>
	<p style="font-size:11px;color:green;">TIEMPO DE CIERRE MINIMO A-C-A FABRICANTE:
		<?php echo $json_equipo["t_cierre_aca"]?>
	</p>
	<table class="border">
		<thead>
			<tr>
				<th colspan="3" <?php echo $style_centro?>>APERTURA - CIERRE - APERTURA</th>
			</tr>
			<tr>
				<th <?php echo $style_centro?>>FASE</th>
				<th <?php echo $style_centro?>>LABEL</th>
				<th <?php echo $style_centro?>>TIEMPOS DE OPERACION (ms)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td <?php echo $style_centro?>>A</td>
				<td <?php echo $style_centro?>>OCB-A</td>
				<?php if($array['tablas'][$y]['aca_ocb_a']>=$json_equipo["t_cierre_aca"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['aca_ocb_a']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['aca_ocb_a']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?>>B</td>
				<td <?php echo $style_centro?>>OCB-B</td>
				<?php if($array['tablas'][$y]['aca_ocb_b']>=$json_equipo["t_cierre_aca"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['aca_ocb_b']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['aca_ocb_b']?>
				</td>
				<?php }?>
			</tr>
			<tr>
				<td <?php echo $style_centro?>>C</td>
				<td <?php echo $style_centro?>>OCB-C</td>
				<?php if($array['tablas'][$y]['aca_ocb_c']>=$json_equipo["t_cierre_aca"]){
				?>
				<td <?php echo $estilo_ok?>>
					<?php echo $array['tablas'][$y]['aca_ocb_c']?>
				</td>
				<?php }else{?>
				<td <?php echo $estilo_bad?>>
					<?php echo $array['tablas'][$y]['aca_ocb_c']?>
				</td>
				<?php }?>
			</tr>
		</tbody>
	</table>
	<?php 
		$foto=$ruta_imagenes.$id.'/'.$array['tablas'][$y]['foto1'];
		if (is_file($foto)) {
	?>
		<h3>Grafica tiempos Apertura - Cierre</h3>
		<img style="width:500px;height:300px;" src="<?php echo $foto?>">
	<?php 
		}
	?>
<?php
	}
}
?>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>