<div class="profile-user-info profile-user-info-striped">

	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php echo CHtml::encode($data -> getAttributeLabel('id')); ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> <?php echo CHtml::link(CHtml::encode($data -> id), array('view', 'id' => $data -> id)); ?></span>

		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php echo CHtml::encode($data -> getAttributeLabel('nombre')); ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> <?php echo CHtml::encode($data -> nombre); ?></span>

		</div>
	</div>

</div>