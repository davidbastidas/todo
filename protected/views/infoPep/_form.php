
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-pep-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'pep'); ?>
		<?php echo $form->textField($model,'pep',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'pep'); ?>
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		<?php echo $form->labelEx($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ceco'); ?>
		<?php echo $form->labelEx($model,'presupuesto'); ?>
		<?php echo $form->textField($model,'presupuesto',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'presupuesto'); ?>
		<?php echo $form->labelEx($model,'margen'); ?>
		<?php echo $form->textField($model,'margen'); ?>
		<?php echo $form->error($model,'margen'); ?>
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