<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<fieldset>
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>

		<?php echo $form->label($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->label($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'correo'); ?>
		<?php echo $form->textField($model,'correo',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'licencia_conducir'); ?>
		<?php echo $form->textField($model,'licencia_conducir',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'rango_titulo'); ?>
		<?php echo $form->textField($model,'rango_titulo',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'nombre_titulo'); ?>
		<?php echo $form->textField($model,'nombre_titulo',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'fecha_titulo'); ?>
		<?php echo $form->textField($model,'fecha_titulo',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'institucion'); ?>
		<?php echo $form->textField($model,'institucion',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'mat_prof'); ?>
		<?php echo $form->textField($model,'mat_prof',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'rh'); ?>
		<?php echo $form->textField($model,'rh',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'contacto_emergencia'); ?>
		<?php echo $form->textField($model,'contacto_emergencia',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'telefono_contacto'); ?>
		<?php echo $form->textField($model,'telefono_contacto',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'talla_camisa'); ?>
		<?php echo $form->textField($model,'talla_camisa',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'talla_pantalon'); ?>
		<?php echo $form->textField($model,'talla_pantalon',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'talla_zapato'); ?>
		<?php echo $form->textField($model,'talla_zapato',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'cargo'); ?>
		<?php echo $form->textField($model,'cargo',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'telefono_corp'); ?>
		<?php echo $form->textField($model,'telefono_corp',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'pc_corp'); ?>
		<?php echo $form->textField($model,'pc_corp',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'id_sap'); ?>
		<?php echo $form->textField($model,'id_sap',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'ceco'); ?>
		<?php echo $form->textField($model,'ceco',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'pep'); ?>
		<?php echo $form->textField($model,'pep',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'tipo_contrato'); ?>
		<?php echo $form->textField($model,'tipo_contrato',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'contratante'); ?>
		<?php echo $form->textField($model,'contratante',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'eps'); ?>
		<?php echo $form->textField($model,'eps',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'arl'); ?>
		<?php echo $form->textField($model,'arl',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'salario_base'); ?>
		<?php echo $form->textField($model,'salario_base',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->label($model,'bono_fijo'); ?>
		<?php echo $form->textField($model,'bono_fijo',array('size'=>20,'maxlength'=>20)); ?>

		<?php echo $form->label($model,'fecha_ingreso'); ?>
		<?php echo $form->textField($model,'fecha_ingreso'); ?>

		<?php echo $form->label($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>50,'maxlength'=>50)); ?>

		<?php echo $form->label($model,'hoja_vida'); ?>
		<?php echo $form->textField($model,'hoja_vida',array('size'=>50,'maxlength'=>50)); ?>

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
