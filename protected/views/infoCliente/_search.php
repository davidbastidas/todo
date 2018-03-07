<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>

		<?php echo $form->label($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'nit_id'); ?>
		<?php echo $form->textField($model,'nit_id',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>

		<?php echo $form->label($model,'pais'); ?>
		<?php echo $form->textField($model,'pais',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'nombre_contacto'); ?>
		<?php echo $form->textField($model,'nombre_contacto',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'otro'); ?>
		<?php echo $form->textField($model,'otro',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textArea($model,'estado',array('rows'=>6, 'cols'=>50)); ?>

		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>

</fieldset>
	<button class="btn btn-small btn-success" name="yt0">
		Buscar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>

<?php $this->endWidget(); ?>
