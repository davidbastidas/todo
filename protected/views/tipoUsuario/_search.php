<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>

		<?php echo $form->label($model,'NOMBRE'); ?>
		<?php echo $form->textField($model,'NOMBRE',array('size'=>45,'maxlength'=>45)); ?>

</fieldset>
	<button class="btn btn-small btn-success" name="yt0">
		Buscar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>

<?php $this->endWidget(); ?>
