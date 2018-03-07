<div class="profile-user-info profile-user-info-striped">

<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('serial')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->serial); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->tipo); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->marca); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('referencia')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->referencia); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('procesador')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->procesador); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('disco_duro')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->disco_duro); ?>
	</span>

</div></div>	<?php /*
<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('ram')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->ram); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->fecha_creacion); ?>
	</span>

</div></div>	*/ ?>

</div>