
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'municipio-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>

		<?php echo $form->labelEx($model,'fk_ubicacion'); ?>
		<?php echo $form->dropDownList($model,'fk_ubicacion',CHtml::listData(Ubicacion::model()->findAll(),'id','nombre'),array(
	        'empty' => '[SELECCIONE LA UBICACION]',
	        'class'=>'form-control',
        )); ?>
		<?php echo $form->error($model,'fk_ubicacion'); ?>
		
	</fieldset>
	<div class="form-actions center">
		<button class="btn btn-small btn-success" name="yt0">
			Guardar
			<i class="icon-arrow-right icon-on-right bigger-110"></i>
		</button>
	</div>

<?php $this->endWidget(); ?>
