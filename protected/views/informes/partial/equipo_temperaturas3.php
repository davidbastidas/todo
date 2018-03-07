<?php 
$array = json_decode( $temperaturas, true );
?>
<h4>Temperaturas</h4>
<table class="border">
	<tbody>
		<tr>
			<td class="bordertd">Temperatura Aceite</td>
			<td class="bordertd">Temperatura Devanado H</td>
			<td class="bordertd">Temperatura Devanado X</td>
			<td class="bordertd">Temperatura Devanado Y</td>
			<td class="bordertd">Temperatura Ambiente</td>
		</tr>
		<tr>
			<td class="bordertd"><?php echo $array['temperaturas'][0]['temp_aceite']?></td>
			<td class="bordertd"><?php echo $array['temperaturas'][0]['temp_devh']?></td>
			<td class="bordertd"><?php echo $array['temperaturas'][0]['temp_devx']?></td>
			<td class="bordertd"><?php echo $array['temperaturas'][0]['temp_devy']?></td>
			<td class="bordertd"><?php echo $array['temperaturas'][0]['temp_ambiente']?></td>
		</tr>
	</tbody>
</table>