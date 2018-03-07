<div class="profile-user-info profile-user-info-striped">

<div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	</span>

</div></div><div class="profile-info-row"><div class="profile-info-name"><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE')); ?>:</div><div class="profile-info-value"><span style="display: inline;">	<?php echo CHtml::encode($data->NOMBRE); ?>
	</span>

</div></div>
</div>