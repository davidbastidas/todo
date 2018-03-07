<div class="profile-user-info profile-user-info-striped">

<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('pep')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->pep); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->nombre); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('ceco')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->ceco); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('presupuesto')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->presupuesto); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('margen')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->margen); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->estado); ?>
	</span>

</div></div>	<?php /*
<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->fecha_creacion); ?>
	</span>

</div></div>	*/ ?>

</div>