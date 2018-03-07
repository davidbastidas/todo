
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-equipos-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'serial_id'); ?>
		<?php echo $form->textField($model,'serial_id',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'serial_id'); ?>
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo'); ?>
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'marca'); ?>
		<?php echo $form->labelEx($model,'referencia'); ?>
		<?php echo $form->textField($model,'referencia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'referencia'); ?>
		<?php echo $form->labelEx($model,'serial'); ?>
		<?php echo $form->textField($model,'serial',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'serial'); ?>
		<?php echo $form->labelEx($model,'fecha_calibracion'); ?>
		<?php echo $form->textField($model,'fecha_calibracion'); ?>
		<?php echo $form->error($model,'fecha_calibracion'); ?>
		<?php echo $form->labelEx($model,'soporte_calibracion'); ?>
		<?php echo $form->textField($model,'soporte_calibracion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'soporte_calibracion'); ?>
		<?php echo $form->labelEx($model,'factura'); ?>
		<?php echo $form->textField($model,'factura',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'factura'); ?>
		
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
