<div id="info"></div>
<div class="row-fluid">
	<div class="span4">
		<div class="form-group">
			<label for="empresa">Empresa</label>
			<input name="empresa" id="empresa" type="text" Placeholder="Empresa"/>
		</div>
		<div class="form-group">
			<label for="numero">Numero</label>
			<input name="numero" id="numero" type="text" Placeholder="Numero"/>
		</div>

		<div class="form-group">
			<label for="consignacion">Consignacion</label>
			<input name="consignacion" id="consignacion" type="text" Placeholder="Consignacion"/>
		</div>
	</div>

	<div class="span4">
		<div class="form-group">
			<label for="tipo_trabajo">Tipo Trabajo</label>
			<select name="tipo_trabajo" id="tipo_trabajo">
				<option value="0">[Elegir Tipo Trabajo]</option>
				<option value="PODA">PODA</option>
				<option value="PODA">MTTO DE LINEAS</option>
				<option value="PODA">MANTENIMIENTO DE SSEE</option>
				<option value="PODA">LAVADO</option>
				<option value="PODA">PROTECCION</option>
				<option value="PODA">TELECONTROL AT/MT</option>
				<option value="PODA">OBRA CIVIL</option>
				<option value="PODA">MTTO PREDICTIVO</option>
			</select>
		</div>

		<div class="form-group">
			<label for="trazabilidad">Trazabilidad</label>
			<input name="trazabilidad" id="trazabilidad" type="text" Placeholder="Trazabilidad"/>
		</div>

		<div class="form-group">
			<label for="tipo_mantenimiento">Tipo Mantenimiento</label>
			<select name="tipo_mantenimiento" id="tipo_mantenimiento">
				<option value="0">[Elegir Tipo Mantenimiento]</option>
				<option value="PLANIFICADO">PLANIFICADO</option>
				<option value="PROGRAMADO">PROGRAMADO</option>
				<option value="NO PROGRAMADO">NO PROGRAMADO</option>
			</select>
		</div>
	</div>

	<div class="span4">
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="categoria" id="categoria">
				<option value="0">[Elegir Categoria]</option>
				<option value="PREDICTIVO">PREDICTIVO</option>
				<option value="PREVENTIVO">PREVENTIVO</option>
				<option value="URGENTE">URGENTE</option>
				<option value="CORRECTIVO">CORRECTIVO</option>
				<option value="OBRA NUEVA">OBRA NUEVA</option>
				<option value="EMERGENCIA">EMERGENCIA</option>
			</select>
		</div>

		<div class="form-group">
			<label for="fecha">Fecha</label>
			<div class="input-append bootstrap-timepicker">
		        <input class="span6 date-picker" id="fecha" name="fecha" type="text" data-date-format="yyyy-mm-dd" />
		        <span class="add-on">
		            <i class="icon-calendar"></i>
		        </span>
		    </div>
		</div>

		<div class="form-group">
			<label for="hora_prevista_inicio">Hora Prevista Inicio</label>
			<div class="input-append bootstrap-timepicker">
				<input id="hora_prevista_inicio" name="hora_prevista_inicio" type="text" class="input-small" />
				<span class="add-on">
					<i class="icon-time"></i>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="hora_prevista_fin">Hora Prevista Fin</label>
			<div class="input-append bootstrap-timepicker">
				<input id="hora_prevista_fin" name="hora_prevista_fin" type="text" class="input-small" />
				<span class="add-on">
					<i class="icon-time"></i>
				</span>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row-fluid">
	<div class="span12">
		<div class="form-inline">
		    <label for="zona">Departamento</label>
		    <select id="zona">
		        <option value="0">[Seleccione]</option>
		        <?php 
		            foreach ($ubicacion as $key) {?>
		            <option value="<?php echo $key->id?>"><?php echo $key->nombre?></option>
		        <?php
		            }
		        ?>
		    </select>
		    <label for="subestacion2">Subestaciones</label>
		    <select id="subestacion2" name="subestacion2"><option value="0">[Seleccione]</option></select>

		    <label for="categoria2">Categoria</label>
		    <select id="categoria2" name="categoria2">
		        <option value="0">[Seleccione]</option>
		        <option value="1">Transformadores</option>
		        <option value="2">Interruptor de Potencia</option>
		        <option value="3">Transformador de Corriente</option>
		        <option value="4">Transformador de Potencia</option>
		    </select>

		    <label for="equipo">Equipo</label>
		    <select id="equipo" name="equipo"><option value="0">[Seleccione]</option></select>

		</div>
	</div>
</div>
<br>
<div class="row-fluid">
	<div class="span6">
		<div class="form-inline">
		    <label for="bahia_ln">Bahia</label>
			<input name="bahia_ln" id="bahia_ln" type="text" Placeholder="Bahia"/>
			
			<label for="lugar_trabajo">Lugar Trabajo</label>
			<input name="lugar_trabajo" id="lugar_trabajo" type="text" Placeholder="Lugar Trabajo"/>
		</div>
	</div>
	<div class="span6">
		<div class="form-inline">
		    <select id="brigada" name="brigada">
		    	<option value="0">Elija la Brigada</option>
    	<?php 
    		foreach ($brigadas as $value) {
    			$json=json_decode($value->datos_json,true);
    			for ($i=0; $i < count($json['brigada']); $i++) {
    				echo '<option value="'.$json['brigada'][$i]['id'].'">'.$value->nombre.', '.$json['brigada'][$i]['nombre'].'</option>';
    			}
    		}
    	?>
		    </select>
		</div>
	</div>
</div>

<br>
<div class="panel-footer">
	<button class="btn btn-success" type="submit" name="yt0" id="yt0">Guardar</button>
</div>
