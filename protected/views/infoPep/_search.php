<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>

		<?php echo $form->label($model,'pep'); ?>
		<?php echo $form->textField($model,'pep',array('size'=>60,'maxlength'=>150)); ?>

		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->label($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'presupuesto'); ?>
		<?php echo $form->textField($model,'presupuesto',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->label($model,'margen'); ?>
		<?php echo $form->textField($model,'margen'); ?>

		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>

</fieldset>
	<button class="btn btn-small btn-success" name="yt0">
		Buscar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>

<?php $this->endWidget(); ?>
