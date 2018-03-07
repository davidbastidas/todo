
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
		
		<?php echo $form->labelEx($model,'nickname'); ?>
		<?php echo $form->textField($model,'nickname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nickname'); ?>
		
		<?php echo $form->labelEx($model,'contrasena'); ?>
		<?php echo CHtml::passwordField('contrasena','',array('size'=>60,'maxlength'=>128,'class'=>'form-control'));?>
		<?php echo $form->error($model,'contrasena'); ?>
		
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado', array('1' => 'ACTIVADO', '0'=>'DESACTIVADO'), array('empty' => '[SELECCIONE EL ESTADO]','class'=>'form-control')); ?>
		<?php echo $form->error($model,'estado'); ?>
		
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
		
		<?php echo $form->labelEx($model,'fk_tipo'); ?>
		<?php echo $form->dropDownList($model,'fk_tipo',CHtml::listData(TipoUsuario::model()->findAll(),'id','nombre'),array(
	        'empty' => '[SELECCIONE EL TIPO]',
	        'class'=>'form-control',
        )); ?>
		<?php echo $form->error($model,'fk_tipo'); ?>
	</fieldset>
	<div class="form-actions center">
		<button class="btn btn-small btn-success" name="yt0">
			Guardar
			<i class="icon-arrow-right icon-on-right bigger-110"></i>
		</button>
	</div>

<?php $this->endWidget(); ?>
