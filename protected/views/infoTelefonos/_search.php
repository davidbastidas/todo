<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>

		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'serial'); ?>
		<?php echo $form->textField($model,'serial',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'imei'); ?>
		<?php echo $form->textField($model,'imei',array('size'=>50,'maxlength'=>50)); ?>

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
