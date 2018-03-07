<div class="profile-user-info profile-user-info-striped">

<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('cedula')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->cedula); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->nombres); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->apellidos); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->ciudad); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->direccion); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->telefono); ?>
	</span>

</div></div>	<?php /*
<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('celular')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->celular); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->correo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('licencia_conducir')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->licencia_conducir); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('rango_titulo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->rango_titulo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('nombre_titulo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->nombre_titulo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('fecha_titulo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->fecha_titulo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('institucion')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->institucion); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('mat_prof')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->mat_prof); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('rh')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->rh); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('contacto_emergencia')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->contacto_emergencia); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('telefono_contacto')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->telefono_contacto); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('talla_camisa')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->talla_camisa); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('talla_pantalon')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->talla_pantalon); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('talla_zapato')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->talla_zapato); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('cargo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->cargo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('telefono_corp')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->telefono_corp); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('pc_corp')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->pc_corp); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('id_sap')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->id_sap); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('ceco')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->ceco); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('pep')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->pep); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('tipo_contrato')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->tipo_contrato); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('contratante')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->contratante); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('eps')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->eps); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('arl')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->arl); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('salario_base')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->salario_base); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('bono_fijo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->bono_fijo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->foto); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('hoja_vida')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->hoja_vida); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->estado); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->fecha_creacion); ?>
	</span>

</div></div>	*/ ?>

</div>