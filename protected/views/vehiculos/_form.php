
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vehiculos-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'matricula'); ?>
		<?php echo $form->textField($model,'matricula',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'matricula'); ?>

		<?php echo $form->labelEx($model,'marca'); ?>
		<?php echo $form->textField($model,'marca',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'marca'); ?>

		<?php echo $form->labelEx($model,'modelo_anio'); ?>
		<?php echo $form->textField($model,'modelo_anio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'modelo_anio'); ?>

		<?php echo $form->labelEx($model,'propietario'); ?>
		<?php echo $form->textField($model,'propietario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'propietario'); ?>
	</fieldset>
	<div class="form-actions center">
		<button class="btn btn-small btn-success" name="yt0">
			Guardar
			<i class="icon-arrow-right icon-on-right bigger-110"></i>
		</button>
	</div>

<?php $this->endWidget(); ?>
