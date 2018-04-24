<?php $array = json_decode( $datos, true );
$style_centro='style="text-align: center;"';
$style_centro_middel='style="text-align: center;vertical-align: middle;"';
$estilo_ok='style="color:green;font-weight:bold;text-decoration:underline;text-align: center;"';
$estilo_bad='style="color:red;font-weight:bold;text-decoration:underline;text-align: center;"';
$n_filas=count($array['tabla']);
$ruta_imagenes = Yii::app() -> params['ruta_fotos_corriente_exitacion_tc'];
?>
<h4>Corriente de Exitación TC's</h4>
<div>
	<?php 
	$norma="";
	if($array['norma']==1){
		$norma='IEC/BS';
	}else if($array['norma']==2){
		$norma='ANSI 45°';
	}else if($array['norma']==3){
		$norma='ANSI 30°';
	}
	?>
<span><?php echo $n_filas?></span> Nucleo(s)
<?php 
for ($y=0; $y < $n_filas; $y++) {?>
<table class="border" style="text-align: center;">
	<tbody>
	<tr>
		<td>Norma</td>
		<td><?php echo $norma?></td>
	</tr>
	<tr>
		<td>Nucleo</td>
		<td><?php echo $array['tabla'][$y]['nucleo']?></td>
	</tr>
	<tr>
		<td >V Pico</td>
		<td><?php echo $array['tabla'][$y]['vpico']?></td>
	</tr>
	<tr>
		<td>I Pico</td>
		<td><?php echo $array['tabla'][$y]['ipico']?></td>
	</tr>
	</tbody>
</table>
<br>
	<?php 
	if($array['tabla'][$y]['foto']!=""){?>
	<img src="<?php echo $ruta_imagenes.'/'.$id.'/'.$array['tabla'][$y]['foto']?>" style="width:350px;height:250px;">
	<?php }	?>
<br><br>
<?php } ?>
</div>
<br>
<h4>Observaciones</h4>
<p><?php echo $array['observaciones']?></p>