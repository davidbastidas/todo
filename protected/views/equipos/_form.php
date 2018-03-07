	<div id="info"></div>
	<fieldset>
		<span class="help-block">Los campos con * son requeridos.</span>

		<label for="fk_categoria">Categoria</label>
		<select id="fk_categoria" class="categoria">
			<option value="0">Seleccione</option>
			<?php 
			$categorias=CategoriaEquipo::model()->findAll('');
			foreach ($categorias as $key) {?>
				<option value="<?php echo $key->id?>"><?php echo $key->nombre?></option>
			<?php }?>
		</select>

		<label for="serie">Serie</label>
		<input id="serie" type="text" name="serie" maxlength="100" class="serie">

		<label for="zona">Ubicacion</label>
		<select id="zona">
			<option value="0">Seleccione</option>
			<?php 
			$ubicacion=Ubicacion::model()->findAll('id>0 ORDER BY nombre');
			foreach ($ubicacion as $key) {?>
				<option value="<?php echo $key->id?>"><?php echo $key->nombre?></option>
			<?php }?>
		</select>

		<label for="fk_sub_estacion">Subestacion</label>
		<select id="fk_sub_estacion">
			<option value="0">Seleccione</option>
		</select>

		<label id="devanado_s" for="devanados" style="display:none;">Devanados</label>
		<select id="devanados" style="display:none;">
			<option value="0">Seleccione</option>
			<option value="1">SIN DEVANADO</option>
			<option value="2">2 Devanados</option>
			<option value="3">3 Devanados</option>
		</select>
		
	</fieldset>