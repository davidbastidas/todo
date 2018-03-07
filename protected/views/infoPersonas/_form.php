
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'info-personas-form',
	'enableAjaxValidation'=>false,
)); ?>
	<fieldset>
	<span class="help-block">Los campos con * son requeridos.</span>

	<span class="help-block"><?php echo $form->errorSummary($model); ?>
</span>

		<?php echo $form->labelEx($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cedula'); ?>
		<?php echo $form->labelEx($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombres'); ?>
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'apellidos'); ?>
		<?php echo $form->labelEx($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ciudad'); ?>
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'direccion'); ?>
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'telefono'); ?>
		<?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'celular'); ?>
		<?php echo $form->labelEx($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'correo'); ?>
		<?php echo $form->labelEx($model,'licencia_conducir'); ?>
		<?php echo $form->textField($model,'licencia_conducir',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'licencia_conducir'); ?>
		<?php echo $form->labelEx($model,'rango_titulo'); ?>
		<?php echo $form->textField($model,'rango_titulo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'rango_titulo'); ?>
		<?php echo $form->labelEx($model,'nombre_titulo'); ?>
		<?php echo $form->textField($model,'nombre_titulo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre_titulo'); ?>
		<?php echo $form->labelEx($model,'fecha_titulo'); ?>
		<?php echo $form->textField($model,'fecha_titulo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'fecha_titulo'); ?>
		<?php echo $form->labelEx($model,'institucion'); ?>
		<?php echo $form->textField($model,'institucion',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'institucion'); ?>
		<?php echo $form->labelEx($model,'mat_prof'); ?>
		<?php echo $form->textField($model,'mat_prof',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mat_prof'); ?>
		<?php echo $form->labelEx($model,'rh'); ?>
		<?php echo $form->textField($model,'rh',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'rh'); ?>
		<?php echo $form->labelEx($model,'contacto_emergencia'); ?>
		<?php echo $form->textField($model,'contacto_emergencia',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contacto_emergencia'); ?>
		<?php echo $form->labelEx($model,'telefono_contacto'); ?>
		<?php echo $form->textField($model,'telefono_contacto',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'telefono_contacto'); ?>
		<?php echo $form->labelEx($model,'talla_camisa'); ?>
		<?php echo $form->textField($model,'talla_camisa',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'talla_camisa'); ?>
		<?php echo $form->labelEx($model,'talla_pantalon'); ?>
		<?php echo $form->textField($model,'talla_pantalon',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'talla_pantalon'); ?>
		<?php echo $form->labelEx($model,'talla_zapato'); ?>
		<?php echo $form->textField($model,'talla_zapato',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'talla_zapato'); ?>
		<?php echo $form->labelEx($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cargo'); ?>

		<?php echo $form->labelEx($model,'telefono_corp'); ?>
		<?php echo $form->dropDownList($model,'telefono_corp',CHtml::listData(InfoTelefonos::model()->findAll(),'id','numero'),array(
	        'empty' => '[SELECCIONE EL TELÉFONO]',
	        'class'=>'form-control',
        )); ?>
		<?php echo $form->error($model,'telefono_corp'); ?>

		<?php echo $form->labelEx($model,'pc_corp'); ?>
		<?php echo $form->dropDownList($model,'pc_corp',CHtml::listData(InfoComputadores::model()->findAll(),'id','serial'),array(
	        'empty' => '[SELECCIONE EL COMPUTADOR]',
	        'class'=>'form-control',
        )); ?>
		<?php echo $form->error($model,'pc_corp'); ?>

		<?php echo $form->labelEx($model,'id_sap'); ?>
		<?php echo $form->textField($model,'id_sap',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'id_sap'); ?>
		<?php echo $form->labelEx($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ceco'); ?>

		<?php echo $form->labelEx($model,'pep'); ?>
		<?php echo $form->dropDownList($model,'pep',CHtml::listData(InfoPep::model()->findAll(),'id','nombre'),array(
	        'empty' => '[SELECCIONE EL PEP]',
	        'class'=>'form-control',
        )); ?>
		<?php echo $form->error($model,'pep'); ?>

		<?php echo $form->labelEx($model,'tipo_contrato'); ?>
		<?php echo $form->textField($model,'tipo_contrato',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tipo_contrato'); ?>
		<?php echo $form->labelEx($model,'contratante'); ?>
		<?php echo $form->textField($model,'contratante',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contratante'); ?>
		<?php echo $form->labelEx($model,'eps'); ?>
		<?php echo $form->textField($model,'eps',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'eps'); ?>
		<?php echo $form->labelEx($model,'arl'); ?>
		<?php echo $form->textField($model,'arl',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'arl'); ?>
		<?php echo $form->labelEx($model,'salario_base'); ?>
		<?php echo $form->textField($model,'salario_base',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'salario_base'); ?>
		<?php echo $form->labelEx($model,'bono_fijo'); ?>
		<?php echo $form->textField($model,'bono_fijo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bono_fijo'); ?>

		<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
		<div class="input-append bootstrap-timepicker">
	        <input class="date-picker" id="InfoPersonas_fecha_ingreso" name="InfoPersonas[fecha_ingreso]" type="text" data-date-format="yyyy-mm-dd" />
	        <span class="add-on">
	            <i class="icon-calendar"></i>
	        </span>
	    </div>
		<?php echo $form->error($model,'fecha_ingreso'); ?>

		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'foto'); ?>

		<?php echo $form->labelEx($model,'hoja_vida'); ?>
		<input type="file" class="input-file" name="InfoPersonas[hoja_vida]" id="InfoPersonas_hoja_vida"/>
		<?php echo $form->error($model,'hoja_vida'); ?>

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
