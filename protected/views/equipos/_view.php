<div class="profile-user-info profile-user-info-striped">

	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php echo CHtml::encode($data -> getAttributeLabel('id')); ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> <?php echo CHtml::link(CHtml::encode($data -> id), array('view', 'id' => $data -> id)); ?></span>

		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php 
			echo "Nombre"; ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> 
			<?php 
			$json_equipo = json_decode( $data->datosjson, true );
			if(isset($json_equipo['nombre_eq'])){
                echo $json_equipo['nombre_eq'];
            }else{
               echo $data->serie; 
            }
            ?></span>

		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php echo CHtml::encode($data -> getAttributeLabel('fk_sub_estacion')); ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> <?php echo CHtml::encode($data -> fk_subestacion_e->nombre); ?></span>

		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php echo CHtml::encode($data->getAttributeLabel('devanados')); ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> <?php echo CHtml::encode($data->devanados); ?></span>

		</div>
	</div>
	<div class="profile-info-row">
		<div class="profile-info-name">
			<?php echo CHtml::encode($data->getAttributeLabel('fk_categoria')); ?>:
		</div>
		<div class="profile-info-value">
			<span style="display: inline;"> <?php echo CHtml::encode($data->fk_categoria_e->nombre); ?></span>

		</div>
	</div>

</div>