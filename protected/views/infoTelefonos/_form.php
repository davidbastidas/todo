
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-telefonos-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'numero'); ?>
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo'); ?>
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'marca'); ?>
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'referencia'); ?>
		<?php echo $form->labelEx($model,'serial'); ?>
		<?php echo $form->textField($model,'serial',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'serial'); ?>
		<?php echo $form->labelEx($model,'imei'); ?>
		<?php echo $form->textField($model,'imei',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'imei'); ?>
		
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO'=>'INACTIVO'), array('empty' => '[SELECCIONE EL ESTADO]','class'=>'form-control')); ?>
		<?php echo $form->error($model,'estado'); ?>
	</fieldset>
	<div class="form-actions center">
		<button class="btn btn-small btn-success" name="yt0">
			Guardar
			<i class="icon-arrow-right icon-on-right bigger-110"></i>
		</button>
	</div>

<?php $this->endWidget(); ?>
