<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>

		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		
		<?php echo $form->label($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>60,'maxlength'=>100)); ?>

</fieldset>
	<button class="btn btn-small btn-success" name="yt0">
		Buscar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>

<?php $this->endWidget(); ?>
