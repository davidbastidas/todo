
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-facturacion-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'item'); ?>
		<?php echo $form->textField($model,'item',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'item'); ?>

		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>

		<?php echo $form->labelEx($model,'cliente'); ?>
		<?php echo $form->dropDownList($model,'cliente',CHtml::listData(InfoCliente::model()->findAll(),'cliente','cliente'),array(
	        'empty' => '[SELECCIONE EL CLIENTE]',
	        'class'=>'form-control',
        )); ?>
		<?php echo $form->error($model,'cliente'); ?>

		<?php echo $form->labelEx($model,'pedido'); ?>
		<?php echo $form->textField($model,'pedido',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pedido'); ?>

		<?php echo $form->labelEx($model,'valor_un'); ?>
		<?php echo $form->textField($model,'valor_un',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'valor_un'); ?>

		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'moneda'); ?>

		<?php echo $form->labelEx($model,'alcance'); ?>
		<?php echo $form->textArea($model,'alcance',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alcance'); ?>

		<?php echo $form->labelEx($model,'soporte'); ?>
		<?php echo $form->textField($model,'soporte',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'soporte'); ?>
		
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
