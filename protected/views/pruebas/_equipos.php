<option value="0">[Seleccione]</option>
<?php 
	foreach ($equipos as $key) {
		$json_equipo = json_decode( $key->datosjson, true );
		if(isset($json_equipo['nombre_eq'])){
		?>
	<option value="<?php echo $key->id?>"><?php echo $json_equipo['nombre_eq']?></option>
<?php
		}
	}
?>
<?php //echo  $key->serie?>