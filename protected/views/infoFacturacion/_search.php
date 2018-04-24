<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>

		<?php echo $form->label($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>

		<?php echo $form->label($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'pedido'); ?>
		<?php echo $form->textField($model,'pedido',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'valor_un'); ?>
		<?php echo $form->textField($model,'valor_un',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->label($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'alcance'); ?>
		<?php echo $form->textArea($model,'alcance',array('rows'=>6, 'cols'=>50)); ?>

		<?php echo $form->label($model,'soporte'); ?>
		<?php echo $form->textField($model,'soporte',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>100)); ?>

		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>

</fieldset>
	<button class="btn btn-small btn-success" name="yt0">
		Buscar
		<i class="icon-arrow-right icon-on-right bigger-110"></i>
	</button>

<?php $this->endWidget(); ?>
