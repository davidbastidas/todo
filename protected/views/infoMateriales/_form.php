
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-materiales-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'codigo'); ?>
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>

		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->dropDownList($model,'tipo', array(
														'ELECTRICO' => 'ELECTRICO', 
														'CIVIL'=>'CIVIL',
														'OTRO'=>'OTRO'
													), array('empty' => '[SELECCIONE EL TIPO]','class'=>'form-control')); ?>
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

		<?php echo $form->labelEx($model,'unidad'); ?>
		<?php echo $form->dropDownList($model,'unidad', array(
														'UN' => 'UN', 
														'MT'=>'MT',
														'X10'=>'X10',
														'X12'=>'X12',
														'X100'=>'X100',
														'OTRO'=>'OTRO'
													), array('empty' => '[SELECCIONE LA UNIDAD]','class'=>'form-control')); ?>
		<?php echo $form->error($model,'unidad'); ?>

		<?php echo $form->labelEx($model,'precio_unitario'); ?>
		<?php echo $form->textField($model,'precio_unitario',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'precio_unitario'); ?>
		
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado', array('ACTIVO' => 'ACTIVO', 'INACTIVO'=>'INACTIVO', 'USADO'=>'USADO'), array('empty' => '[SELECCIONE EL ESTADO]','class'=>'form-control')); ?>
		<?php echo $form->error($model,'estado'); ?>
	</fieldset>
	<div class="form-actions center">
		<button class="btn btn-small btn-success" name="yt0">
			Guardar
			<i class="icon-arrow-right icon-on-right bigger-110"></i>
		</button>
	</div>

<?php $this->endWidget(); ?>
