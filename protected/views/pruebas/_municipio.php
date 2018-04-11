<option value="0">[Seleccione]</option>
<?php 
	foreach ($municipios as $key) {?>
	<option value="<?php echo $key->id?>"><?php echo $key->nombre?></option>
<?php
	}
?>