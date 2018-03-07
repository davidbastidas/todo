<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);
$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Ver', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>
<?php Yii::app()->params['breadcrumbs']='<div class="breadcrumbs fixed" id="breadcrumbs">
	<ul class="breadcrumb">
		<li class="active">
			<i class="icon-home home-icon"></i>
			<a href="'.$nameProyect.'/site/index">Inicio</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li class="active">
			<a href="'.$nameProyect.'/Equipos/index">Equipos</a>
			<span class="divider">
				 <i class="icon-angle-right arrow-icon"></i>
			</span>
		</li>
		<li>Actualizar</li>
	</ul>
</div>
';?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.colorbox-min.js"></script>
<script>
var colorbox_params ;
$(function() {
	colorbox_params = {
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="icon-arrow-left"></i>',
		next:'<i class="icon-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'50%',
		maxHeight:'50%',
		onOpen:function(){
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = 'auto';
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon
});
function create(){
	
	var pasa=true;
	var motivo="";
	var countselect=0;
	var countinput=0;
	$("#form select").each(function(){
	    if($(this).val()=="0"){
	    	countselect++;
	    }
	});
	$("#form .serie").each(function(){
	    if($.trim(this.value) === ""){
	    	countinput++;
	    }
	});
    if (countinput>0 || countselect>0) {
        motivo="Por favor llena los campos vacios";
        pasa=false;
    }
    

	if(pasa){
		var data = new FormData();
		var json='';
		var json_fotos='';
		var cat=$('#fk_categoria').val();
		if(cat==1){
			//tranfo
			json='{'+
				'"fabricante":"'+$("#fabricante").val()+'",'+
				'"nombre_eq":"'+$("#nombre_eq").val()+'",'+
				'"fecha_fab":"'+$("#fecha_fab").val()+'",'+
				'"potencia1":"'+$("#potencia1").val()+'",'+
				'"potencia2":"'+$("#potencia2").val()+'",'+
				'"potencia3":"'+$("#potencia3").val()+'",'+
				'"conexion1":"'+$("#conexion1").val()+'",'+
				'"conexion2":"'+$("#conexion2").val()+'",'+
				'"ntension1":"'+$("#ntension1").val()+'",'+
				'"ntension2":"'+$("#ntension2").val()+'",'+
				'"ntension3":"'+$("#ntension3").val()+'",'+
				'"nposiciones":"'+$("#nposiciones").val()+'",'+
				'"nfases":"'+$("#nfases").val()+'",'+
				'"pesototal":"'+$("#pesototal").val()+'",'+
				'"pesoaceite":"'+$("#pesoaceite").val()+'",'+
				'"impedancia1":"'+$("#impedancia1").val()+'",'+
				'"impedancia2":"'+$("#impedancia2").val()+'",'+
				'"impedancia3":"'+$("#impedancia3").val()+'",'+
				'"fosoaceite":"'+$("#fosoaceite").val()+'",'+
				'"tipocomunicacion":"'+$("#tipocomunicacion").val()+'",'+
				'"serialconmutador":"'+$("#serialconmutador").val()+'",'+
				'"fabricanteconmutador":"'+$("#fabricanteconmutador").val()+'",'+
				'"operacionesconmutador":"'+$("#operacionesconmutador").val()+'"'+
			'}';
		}else if(cat==2){
			//interruptor de potencia
			json='{'+
				'"tipo":"'+$("#tipo_interruptor").val()+'",'+
				'"fabricante":"'+$("#fabricante").val()+'",'+
				'"nombre_eq":"'+$("#nombre_eq").val()+'",'+
				'"fecha_fab":"'+$("#fecha_fab").val()+'",'+
				'"corriente_nominal":"'+$("#corriente_nominal").val()+'",'+
				'"voltaje_nominal":"'+$("#voltaje_nominal").val()+'",'+
				'"frecuencia_nominal":"'+$("#frecuencia_nominal").val()+'",'+
				'"corriente_corto":"'+$("#corriente_corto").val()+'",'+
				'"extincion_arco":"'+$("#extincion_arco").val()+'",'+
				'"capacidad_interruptiva":"'+$("#capacidad_interruptiva").val()+'",'+
				'"tension_nominal":"'+$("#tension_nominal").val()+'",'+
				'"n_operaciones":"'+$("#n_operaciones").val()+'",'+
				'"t_apertura_min":"'+$("#t_apertura_min").val()+'",'+
				'"t_apertura_max":"'+$("#t_apertura_max").val()+'",'+
				'"t_cierre_min":"'+$("#t_cierre_min").val()+'",'+
				'"t_cierre_max":"'+$("#t_cierre_max").val()+'",'+
				'"t_cierre_aca":"'+$("#t_cierre_aca").val()+'"'+
			'}';
		}else if(cat==3){
			//transformador de corriente
			json='{'+
				'"nombre_eq":"'+$("#matricula_eca").val()+'",'+
				'"fecha_fab":"'+$("#fecha_fab").val()+'",'+
				'"fabricante":"'+$("#fabricante").val()+'",'+
				'"tipo":"'+$("#tipo").val()+'",'+
				'"relacion":"'+$("#relacion").val()+'",'+
				'"corriente_corto":"'+$("#corriente_corto").val()+'",'+
				'"frecuencia_nominal":"'+$("#frecuencia_nominal").val()+'",'+
				'"tipo_mecanismo":"'+$("#tipo_mecanismo").val()+'",'+
				'"voltaje_nominal_primario":"'+$("#voltaje_nominal_primario").val()+'",'+
				'"voltaje_nominal_secundario":"'+$("#voltaje_nominal_secundario").val()+'"'+
			'}';
		}else if(cat==4){
			//transformador de potencia
			json='{'+
				'"nombre_eq":"'+$("#matricula_eca").val()+'",'+
				'"fecha_fab":"'+$("#fecha_fab").val()+'",'+
				'"fabricante":"'+$("#fabricante").val()+'",'+
				'"tipo":"'+$("#tipo").val()+'",'+
				'"relacion":"'+$("#relacion").val()+'",'+
				'"frecuencia":"'+$("#frecuencia").val()+'",'+
				'"voltaje_nominal_primario":"'+$("#voltaje_nominal_primario").val()+'",'+
				'"voltaje_nominal_secundario":"'+$("#voltaje_nominal_secundario").val()+'",'+
				'"clase":"'+$("#clase").val()+'"'+
			'}';
		}
		data.append('serie',$("#serie").val());
		data.append('fk_sub_estacion',$("#fk_sub_estacion").val());
		data.append('devanados',$("#devanados").val());
		data.append('fk_categoria',$("#fk_categoria").val());
    	data.append('json',json);
    	json_fotos='{';
    	if($("#foto1").prop('disabled')){//verdad
    		json_fotos+='"foto1":"'+$("#caja_foto1").find(".cboxElement").html()+'",';
    	}else if($("#foto1").val()!=""){
    		json_fotos+='"foto1":"'+$("#foto1").val().replace("C:\\fakepath\\", "")+'",';
    	}else{
    		json_fotos+='"foto1":"",';
    	}

    	if($("#foto2").prop('disabled')){//verdad
    		json_fotos+='"foto2":"'+$("#caja_foto2").find(".cboxElement").html()+'",';
    	}else if($("#foto2").val()!=""){
    		json_fotos+='"foto2":"'+$("#foto2").val().replace("C:\\fakepath\\", "")+'",';
    	}else{
    		json_fotos+='"foto2":"",';
    	}

    	if($("#foto3").prop('disabled')){//verdad
    		json_fotos+='"foto3":"'+$("#caja_foto3").find(".cboxElement").html()+'",';
    	}else if($("#foto3").val()!=""){
    		json_fotos+='"foto3":"'+$("#foto3").val().replace("C:\\fakepath\\", "")+'",';
    	}else{
    		json_fotos+='"foto3":"",';
    	}

    	if($("#foto4").prop('disabled')){//verdad
    		json_fotos+='"foto4":"'+$("#caja_foto4").find(".cboxElement").html()+'"';
    	}else if($("#foto4").val()!=""){
    		json_fotos+='"foto4":"'+$("#foto4").val().replace("C:\\fakepath\\", "")+'"';
    	}else{
    		json_fotos+='"foto4":""';
    	}

		json_fotos+='}';
		data.append('json_fotos',json_fotos);
    	var x=1;
	    $(".fotos_p").each(function(){
	    	var file_input = $(this);
	    	if(file_input.val()!=""){
	    		data.append('foto_'+x,file_input[0].files[0]);
	    		x++;
	    	}
	    });
		$.ajax({
            url:"<?php echo $nameProyect?>/Equipos/Update/<?php echo $model->id?>",
            type:'POST',
            dataType:"json",
            cache:false,
            contentType:false,
        	processData:false,
            data: data,
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
            	if(data.update>0){
            		//location.href="<?php echo $nameProyect?>/Equipos/view/"+data.idview;
            	}else{
            		var html='<div class="alert alert-error">'+
			    			'<button class="close" data-dismiss="alert" type="button">'+
			    			'<i class="icon-remove"></i>'+
			    			'</button>'+
			    			'<strong>'+
			    			'<i class="icon-remove"></i>'+
			    			'Lo sentimos! '+
			    			'</strong>'+
			    			'No se encontraron cambios para actualizar'+
			    			'<br>'+
			    			'</div>';
	    			$("#info").html(html);
    			}
            }
	    });
	}else{
		var html='<div class="alert alert-error">'+
    			'<button class="close" data-dismiss="alert" type="button">'+
    			'<i class="icon-remove"></i>'+
    			'</button>'+
    			'<strong>'+
    			'<i class="icon-remove"></i>'+
    			'Error! '+
    			'</strong>'+
    			motivo+
    			'<br>'+
    			'</div>';
    	$("#info").html(html);
	}
}
function baseName(str)
{
   var base = new String(str).substring(str.lastIndexOf('/') + 1); 
    if(base.lastIndexOf(".") != -1)       
        base = base.substring(0, base.lastIndexOf("."));
   return base;
}
function cargarDatos(){
	$("#serie").val("<?php echo $model->serie?>")
	//$("#fk_sub_estacion").val("<?php echo $model->fk_sub_estacion?>")
	$("#devanados").val("<?php echo $model->devanados?>")
	$("#fk_categoria").val("<?php echo $model->fk_categoria?>")
	var text='<?php echo $model->datosjson?>';
	if(text.length>0){
		var data = JSON.parse(text);
		var fotos = "";
		try{
			fotos = JSON.parse('<?php echo $model->datosfotos?>');
		}catch(error){}
		
		var ruta_foto1='<?php echo "../../../archivos/fotos_equipos/".$model->id."/"?>'+fotos.foto1;
		var ruta_foto2='<?php echo "../../../archivos/fotos_equipos/".$model->id."/"?>'+fotos.foto2;
		var ruta_foto3='<?php echo "../../../archivos/fotos_equipos/".$model->id."/"?>'+fotos.foto3;
		var ruta_foto4='<?php echo "../../../archivos/fotos_equipos/".$model->id."/"?>'+fotos.foto4;
		<?php 
		if($model->fk_categoria==1){?>
			$('#dinamico').html('');
			//devanado
			$("#devanados").show();
			$("#devanado_s").show();
			//transformador
			$('#dinamico').append(
				'<label for="nombre_eq">Nombre</label>'+
				'<input id="nombre_eq" type="text" name="nombre_eq" maxlength="100">'+

				'<label class="control-label">A&ntildeo Fabricacion</label>'+
			    '<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="potencia1">Potencia 1 MVA (Tipo de Potencia)</label>'+
				'<input id="potencia1" type="text" name="potencia1" maxlength="100">'+

				'<label for="potencia2">Potencia 2 MVA (Tipo de Potencia)</label>'+
				'<input id="potencia2" type="text" name="potencia2" maxlength="100">'+

				'<label for="potencia3">Potencia 3 MVA (Tipo de Potencia)</label>'+
				'<input id="potencia3" type="text" name="potencia3" maxlength="100">'+

				'<label for="conexion1">Grupo de Conexion 1 (Tipo de Conexion)</label>'+
				'<input id="conexion1" type="text" name="conexion1" maxlength="100">'+

				'<label for="conexion2">Grupo de Conexion 2 (Tipo de Conexion)</label>'+
				'<input id="conexion2" type="text" name="conexion2" maxlength="100">'+

				'<label for="ntension1">Nivel de Tension 1</label>'+
				'<input id="ntension1" type="text" name="ntension1" maxlength="100">'+

				'<label for="ntension2">Nivel de Tension 2</label>'+
				'<input id="ntension2" type="text" name="ntension2" maxlength="100">'+

				'<label for="ntension3">Nivel de Tension 2</label>'+
				'<input id="ntension3" type="text" name="ntension3" maxlength="100">'+

				'<label for="nposiciones">Numero de Posiciones</label>'+
				'<input id="nposiciones" type="text" name="nposiciones" maxlength="100">'+

				'<label for="nfases">Numero de Fases</label>'+
				'<input id="nfases" type="text" name="nfases" maxlength="100">'+
				
				'<label for="pesototal">Peso Total (Kg,T)</label>'+
				'<input id="pesototal" type="text" name="pesototal" maxlength="100">'+

				'<label for="pesoaceite">Peso del Aceite (Kg,T,L)</label>'+
				'<input id="pesoaceite" type="text" name="pesoaceite" maxlength="100">'+

				'<label for="impedancia1">Impedancia 1</label>'+
				'<input id="impedancia1" type="text" name="impedancia1" maxlength="100">'+

				'<label for="impedancia2">Impedancia 2</label>'+
				'<input id="impedancia2" type="text" name="impedancia2" maxlength="100">'+

				'<label for="impedancia3">Impedancia 3</label>'+
				'<input id="impedancia3" type="text" name="impedancia3" maxlength="100">'+

				'<label for="fosoaceite">Foso de Aceite</label>'+
				'<input id="fosoaceite" type="text" name="fosoaceite" maxlength="100">'+

				'<label for="tipocomunicacion">Tipo de Comuntacion</label>'+
				'<input id="tipocomunicacion" type="text" name="tipocomunicacion" maxlength="100">'+

				'<label for="serialconmutador">Serial de Conmutador</label>'+
				'<input id="serialconmutador" type="text" name="serialconmutador" maxlength="100">'+

				'<label for="fabricanteconmutador">Fabricante de Conmutador</label>'+
				'<input id="fabricanteconmutador" type="text" name="fabricanteconmutador" maxlength="100">'+

				'<label for="operacionesconmutador">No. Operaciones de Conmutador</label>'+
				'<input id="operacionesconmutador" type="text" name="operacionesconmutador" maxlength="100">'
			);
			$('#dinamico').append(
				'<ul class="ace-thumbnails">'+
					'<label for="foto1">Foto 1</label>'+
					'<input id="foto1" type="file" name="foto1" class="fotos_p" disabled> '+
					'<fot id="caja_foto1">'+
						'<a href="'+ruta_foto1+'" data-rel="colorbox">'+
						fotos.foto1+
						'</a>'+
						'<a onclick="removerFoto(1);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto2">Foto 2</label>'+
					'<input id="foto2" type="file" name="foto2" class="fotos_p" disabled> '+
					'<fot id="caja_foto2">'+
						'<a href="'+ruta_foto2+'" data-rel="colorbox">'+
						fotos.foto2+
						'</a>'+
						'<a onclick="removerFoto(2);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto3">Foto 3</label>'+
					'<input id="foto3" type="file" name="foto3" class="fotos_p" disabled> '+
					'<fot id="caja_foto3">'+
						'<a href="'+ruta_foto3+'" data-rel="colorbox">'+
						fotos.foto3+
						'</a>'+
						'<a onclick="removerFoto(3);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto4">Foto 4</label>'+
					'<input id="foto4" type="file" name="foto4" class="fotos_p" disabled> '+
					'<fot id="caja_foto4">'+
						'<a href="'+ruta_foto4+'" data-rel="colorbox">'+
						fotos.foto4+
						'</a>'+
						'<a onclick="removerFoto(4);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
				'</ul>'
			);
			$("#fabricante").val(data.fabricante)
			$("#nombre_eq").val(data.nombre_eq)
			$("#fecha_fab").val(data.fecha_fab)
			$("#potencia1").val(data.potencia1)
			$("#potencia2").val(data.potencia2)
			$("#potencia3").val(data.potencia3)
			$("#conexion1").val(data.conexion1)
			$("#conexion2").val(data.conexion2)
			$("#ntension1").val(data.ntension1)
			$("#ntension2").val(data.ntension2)
			$("#ntension3").val(data.ntension3)
			$("#nposiciones").val(data.nposiciones)
			$("#nfases").val(data.nfases)
			$("#pesototal").val(data.pesototal)
			$("#pesoaceite").val(data.pesoaceite)
			$("#impedancia1").val(data.impedancia1)
			$("#impedancia2").val(data.impedancia2)
			$("#impedancia3").val(data.impedancia3)
			$("#fosoaceite").val(data.fosoaceite)
			$("#tipocomunicacion").val(data.tipocomunicacion)
			$("#serialconmutador").val(data.serialconmutador)
			$("#fabricanteconmutador").val(data.fabricanteconmutador)
			$("#operacionesconmutador").val(data.operacionesconmutador)
		<?php 
		}else if($model->fk_categoria==2){
		?>
			$('#dinamico').html('');
			//sin devanado
			$("#devanados").val(1);
			$("#devanados").hide();
			$("#devanado_s").hide();
			$('#dinamico').append('<label for="tipo_interruptor">Tipo de Interruptor</label>'+
				'<select id="tipo_interruptor" class="categoria">'+
					'<option value="1">ACB</option>'+
					'<option value="2">SFG</option>'+
					'<option value="3">VACIO</option>'+
					'<option value="4">GRAN VOLUMEN ACEITE</option>'+
					'<option value="5">MINIMO VOLUMEN ACEITE</option>'+
				'</select>');
			//interruptor de potencia
			$('#dinamico').append(
				'<label for="nombre_eq">Nombre</label>'+
				'<input id="nombre_eq" type="text" name="nombre_eq" maxlength="100">'+

				'<label class="control-label" for="fecha_fab">A&ntildeo Fabricacion</label>'+
				'<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="corriente_nominal">Corriente Nominal</label>'+
				'<input id="corriente_nominal" type="text" name="corriente_nominal" maxlength="100">'+

				'<label for="voltaje_nominal">Voltaje Nominal</label>'+
				'<input id="voltaje_nominal" type="text" name="voltaje_nominal" maxlength="100">'+

				'<label for="frecuencia_nominal">Frecuencia Nominal</label>'+
				'<input id="frecuencia_nominal" type="text" name="frecuencia_nominal" maxlength="100">'+

			 	'<label for="corriente_corto">Corriente Corto</label>'+
				'<input id="corriente_corto" type="text" name="corriente_corto" maxlength="100">'+

				'<label for="extincion_arco">Tipo de Extincion de Arco</label>'+
				'<input id="extincion_arco" type="text" name="extincion_arco" maxlength="100">'+

				'<label for="capacidad_interruptiva">Capacidad Interruptiva</label>'+
				'<input id="capacidad_interruptiva" type="text" name="capacidad_interruptiva" maxlength="100">'+

				'<label for="tension_nominal">Tension nominal de control</label>'+
				'<input id="tension_nominal" type="text" name="tension_nominal" maxlength="100">'+

				'<label for="n_operaciones">Numero de Operaciones</label>'+
				'<input id="n_operaciones" type="text" name="n_operaciones" maxlength="100">'+

				'<label for="t_apertura_min">Tiempo de Apertura Minimo(Segundos)</label>'+
				'<input id="t_apertura_min" type="text" name="t_apertura_min" maxlength="100">'+

				'<label for="t_apertura_max">Tiempo de Apertura Maximo(Segundos)</label>'+
				'<input id="t_apertura_max" type="text" name="t_apertura_max" maxlength="100">'+

				'<label for="t_cierre_min">Tiempo de Cierre Minimo(Segundos)</label>'+
				'<input id="t_cierre_min" type="text" name="t_cierre_min" maxlength="100">'+

				'<label for="t_cierre_max">Tiempo de Cierre Maximo(Segundos)</label>'+
				'<input id="t_cierre_max" type="text" name="t_cierre_max" maxlength="100">'+

				'<label for="t_cierre_aca">Tiempo de Apertura - Cierre - Apertura(Segundos)</label>'+
				'<input id="t_cierre_aca" type="text" name="t_cierre_aca" maxlength="100">'
			);
			$('#dinamico').append(
				'<ul class="ace-thumbnails">'+
					'<label for="foto1">Foto 1</label>'+
					'<input id="foto1" type="file" name="foto1" class="fotos_p" disabled> '+
					'<fot id="caja_foto1">'+
						'<a href="'+ruta_foto1+'" data-rel="colorbox">'+
						fotos.foto1+
						'</a>'+
						'<a onclick="removerFoto(1);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto2">Foto 2</label>'+
					'<input id="foto2" type="file" name="foto2" class="fotos_p" disabled> '+
					'<fot id="caja_foto2">'+
						'<a href="'+ruta_foto2+'" data-rel="colorbox">'+
						fotos.foto2+
						'</a>'+
						'<a onclick="removerFoto(2);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto3">Foto 3</label>'+
					'<input id="foto3" type="file" name="foto3" class="fotos_p" disabled> '+
					'<fot id="caja_foto3">'+
						'<a href="'+ruta_foto3+'" data-rel="colorbox">'+
						fotos.foto3+
						'</a>'+
						'<a onclick="removerFoto(3);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto4">Foto 4</label>'+
					'<input id="foto4" type="file" name="foto4" class="fotos_p" disabled> '+
					'<fot id="caja_foto4">'+
						'<a href="'+ruta_foto4+'" data-rel="colorbox">'+
						fotos.foto4+
						'</a>'+
						'<a onclick="removerFoto(4);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
				'</ul>'
			);
			$("#fabricante").val(data.fabricante)
			$("#tipo_interruptor").val(data.tipo)
			$("#nombre_eq").val(data.nombre_eq)
			$("#fecha_fab").val(data.fecha_fab)
			$("#corriente_nominal").val(data.corriente_nominal)
			$("#voltaje_nominal").val(data.voltaje_nominal)
			$("#frecuencia_nominal").val(data.frecuencia_nominal)
			$("#corriente_corto").val(data.corriente_corto)
			$("#extincion_arco").val(data.extincion_arco)
			$("#capacidad_interruptiva").val(data.capacidad_interruptiva)
			$("#tension_nominal").val(data.tension_nominal)
			$("#n_operaciones").val(data.n_operaciones)
			$("#t_apertura_min").val(data.t_apertura_min)
			$("#t_apertura_max").val(data.t_apertura_max)
			$("#t_cierre_min").val(data.t_cierre_min)
			$("#t_cierre_max").val(data.t_cierre_max)
			$("#t_cierre_aca").val(data.t_cierre_aca)
		<?php 
		}else if($model->fk_categoria==3){
		?>
			$('#dinamico').html('');
			//sin devanado
			$("#devanados").val(1);
			$("#devanados").hide();
			$("#devanado_s").hide();
			//transformador de corriente
			$('#dinamico').append(
				'<label for="matricula_eca">Matricula Eca</label>'+
				'<input id="matricula_eca" type="text" name="matricula_eca" maxlength="100">'+

				'<label class="control-label" for="fecha_fab">A&ntildeo Fabricacion</label>'+
				'<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="tipo">Tipo</label>'+
				'<input id="tipo" type="text" name="tipo" maxlength="100">'+

				'<label for="relacion">Relacion</label>'+
				'<input id="relacion" type="text" name="relacion" maxlength="100">'+

				'<label for="corriente_corto">Corriente de Corto</label>'+
				'<input id="corriente_corto" type="text" name="corriente_corto" maxlength="100">'+

			 	'<label for="frecuencia_nominal">Frecuencia Nominal</label>'+
				'<input id="frecuencia_nominal" type="text" name="frecuencia_nominal" maxlength="100">'+

				'<label for="voltaje_nominal_primario">Voltaje Nominal Primario</label>'+
				'<input id="voltaje_nominal_primario" type="text" name="voltaje_nominal_primario" maxlength="100">'+

			 	'<label for="voltaje_nominal_secundario">Voltaje Nominal Secundario</label>'+
				'<input id="voltaje_nominal_secundario" type="text" name="voltaje_nominal_secundario" maxlength="100">'
			);
			$('#dinamico').append('<label for="tipo_mecanismo">Tipo mecanismo</label>'+
				'<select id="tipo_mecanismo">'+
					'<option value="Solido">Solido</option>'+
					'<option value="Aceite">Aceite</option>'+
				'</select>');

			$('#dinamico').append(
				'<ul class="ace-thumbnails">'+
					'<label for="foto1">Foto 1</label>'+
					'<input id="foto1" type="file" name="foto1" class="fotos_p" disabled> '+
					'<fot id="caja_foto1">'+
						'<a href="'+ruta_foto1+'" data-rel="colorbox">'+
						fotos.foto1+
						'</a>'+
						'<a onclick="removerFoto(1);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto2">Foto 2</label>'+
					'<input id="foto2" type="file" name="foto2" class="fotos_p" disabled> '+
					'<fot id="caja_foto2">'+
						'<a href="'+ruta_foto2+'" data-rel="colorbox">'+
						fotos.foto2+
						'</a>'+
						'<a onclick="removerFoto(2);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto3">Foto 3</label>'+
					'<input id="foto3" type="file" name="foto3" class="fotos_p" disabled> '+
					'<fot id="caja_foto3">'+
						'<a href="'+ruta_foto3+'" data-rel="colorbox">'+
						fotos.foto3+
						'</a>'+
						'<a onclick="removerFoto(3);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto4">Foto 4</label>'+
					'<input id="foto4" type="file" name="foto4" class="fotos_p" disabled> '+
					'<fot id="caja_foto4">'+
						'<a href="'+ruta_foto4+'" data-rel="colorbox">'+
						fotos.foto4+
						'</a>'+
						'<a onclick="removerFoto(4);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
				'</ul>'
			);
			$("#matricula_eca").val(data.nombre_eq)
			$("#fecha_fab").val(data.fecha_fab)
			$("#fabricante").val(data.fabricante)
			$("#fecha_fab").val(data.fecha_fab)
			$("#tipo").val(data.tipo)
			$("#relacion").val(data.relacion)
			$("#corriente_corto").val(data.corriente_corto)
			$("#frecuencia_nominal").val(data.frecuencia_nominal)
			$("#tipo_mecanismo").val(data.tipo_mecanismo)
			$("#voltaje_nominal_primario").val(data.voltaje_nominal_primario)
			$("#voltaje_nominal_secundario").val(data.voltaje_nominal_secundario)
		<?php 
		}else if($model->fk_categoria==4){
		?>
			$('#dinamico').html('');
			//sin devanado
			$("#devanados").val(1);
			$("#devanados").hide();
			$("#devanado_s").hide();
			//transformador de potencia
			$('#dinamico').append(
				'<label for="matricula_eca">Matricula Eca</label>'+
				'<input id="matricula_eca" type="text" name="matricula_eca" maxlength="100">'+

				'<label class="control-label" for="fecha_fab">A&ntildeo Fabricacion</label>'+
				'<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="frecuencia">Frecuencia</label>'+
				'<input id="frecuencia" type="text" name="frecuencia" maxlength="100">'+

				'<label for="relacion">Relacion</label>'+
				'<input id="relacion" type="text" name="relacion" maxlength="100">'+

				'<label for="voltaje_nominal_primario">Voltaje Nominal Primario</label>'+
				'<input id="voltaje_nominal_primario" type="text" name="voltaje_nominal_primario" maxlength="100">'+

			 	'<label for="voltaje_nominal_secundario">Voltaje Nominal Secundario</label>'+
				'<input id="voltaje_nominal_secundario" type="text" name="voltaje_nominal_secundario" maxlength="100">'
			);
			$('#dinamico').append('<label for="tipo">Tipo</label>'+
				'<select id="tipo">'+
					'<option value="Capacitivo">Capacitivo</option>'+
					'<option value="inductivo">inductivo</option>'+
				'</select>');
			$('#dinamico').append('<label for="clase">Clase</label>'+
				'<select id="clase">'+
					'<option value="Solido">Solido</option>'+
					'<option value="Inmerso en Aceite">Inmerso en Aceite</option>'+
				'</select>');

			$('#dinamico').append(
				'<ul class="ace-thumbnails">'+
					'<label for="foto1">Foto 1</label>'+
					'<input id="foto1" type="file" name="foto1" class="fotos_p" disabled> '+
					'<fot id="caja_foto1">'+
						'<a href="'+ruta_foto1+'" data-rel="colorbox">'+
						fotos.foto1+
						'</a>'+
						'<a onclick="removerFoto(1);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto2">Foto 2</label>'+
					'<input id="foto2" type="file" name="foto2" class="fotos_p" disabled> '+
					'<fot id="caja_foto2">'+
						'<a href="'+ruta_foto2+'" data-rel="colorbox">'+
						fotos.foto2+
						'</a>'+
						'<a onclick="removerFoto(2);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto3">Foto 3</label>'+
					'<input id="foto3" type="file" name="foto3" class="fotos_p" disabled> '+
					'<fot id="caja_foto3">'+
						'<a href="'+ruta_foto3+'" data-rel="colorbox">'+
						fotos.foto3+
						'</a>'+
						'<a onclick="removerFoto(3);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
					'<label for="foto4">Foto 4</label>'+
					'<input id="foto4" type="file" name="foto4" class="fotos_p" disabled> '+
					'<fot id="caja_foto4">'+
						'<a href="'+ruta_foto4+'" data-rel="colorbox">'+
						fotos.foto4+
						'</a>'+
						'<a onclick="removerFoto(4);return false;" href="#"> '+
							'<i class="icon-remove red"></i>'+
						'</a>'+
					'</fot>'+
					'<br>'+
				'</ul>'
			);
			$("#matricula_eca").val(data.nombre_eq)
			$("#fecha_fab").val(data.fecha_fab)
			$("#fabricante").val(data.fabricante)
			$("#fecha_fab").val(data.fecha_fab)
			$("#tipo").val(data.tipo)
			$("#relacion").val(data.relacion)
			$("#frecuencia").val(data.frecuencia)
			$("#voltaje_nominal_primario").val(data.voltaje_nominal_primario)
			$("#voltaje_nominal_secundario").val(data.voltaje_nominal_secundario)
			$("#clase").val(data.clase)
		<?php 
		}
		?>
	}
}
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#fk_categoria').on('change', function() {
		var cat=$(this).val();
		if(cat==1){
			//transformador
			$('#dinamico').html(
				'<label for="nombre_eq">Nombre</label>'+
				'<input id="nombre_eq" type="text" name="nombre_eq" maxlength="100">'+

				'<label class="control-label">A&ntildeo Fabricacion</label>'+
			    '<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="potencia1">Potencia 1 MVA (Tipo de Potencia)</label>'+
				'<input id="potencia1" type="text" name="potencia1" maxlength="100">'+

				'<label for="potencia2">Potencia 2 MVA (Tipo de Potencia)</label>'+
				'<input id="potencia2" type="text" name="potencia2" maxlength="100">'+

				'<label for="potencia3">Potencia 3 MVA (Tipo de Potencia)</label>'+
				'<input id="potencia3" type="text" name="potencia3" maxlength="100">'+

				'<label for="conexion1">Grupo de Conexion 1 (Tipo de Conexion)</label>'+
				'<input id="conexion1" type="text" name="conexion1" maxlength="100">'+

				'<label for="conexion2">Grupo de Conexion 2 (Tipo de Conexion)</label>'+
				'<input id="conexion2" type="text" name="conexion2" maxlength="100">'+

				'<label for="ntension1">Nivel de Tension 1</label>'+
				'<input id="ntension1" type="text" name="ntension1" maxlength="100">'+

				'<label for="ntension2">Nivel de Tension 2</label>'+
				'<input id="ntension2" type="text" name="ntension2" maxlength="100">'+

				'<label for="ntension3">Nivel de Tension 2</label>'+
				'<input id="ntension3" type="text" name="ntension3" maxlength="100">'+

				'<label for="nposiciones">Numero de Posiciones</label>'+
				'<input id="nposiciones" type="text" name="nposiciones" maxlength="100">'+

				'<label for="nfases">Numero de Fases</label>'+
				'<input id="nfases" type="text" name="nfases" maxlength="100">'+
				
				'<label for="pesototal">Peso Total (Kg,T)</label>'+
				'<input id="pesototal" type="text" name="pesototal" maxlength="100">'+

				'<label for="pesoaceite">Peso del Aceite (Kg,T,L)</label>'+
				'<input id="pesoaceite" type="text" name="pesoaceite" maxlength="100">'+

				'<label for="impedancia1">Impedancia 1</label>'+
				'<input id="impedancia1" type="text" name="impedancia1" maxlength="100">'+

				'<label for="impedancia2">Impedancia 2</label>'+
				'<input id="impedancia2" type="text" name="impedancia2" maxlength="100">'+

				'<label for="impedancia3">Impedancia 3</label>'+
				'<input id="impedancia3" type="text" name="impedancia3" maxlength="100">'+

				'<label for="fosoaceite">Foso de Aceite</label>'+
				'<input id="fosoaceite" type="text" name="fosoaceite" maxlength="100">'+

				'<label for="tipocomunicacion">Tipo de Comuntacion</label>'+
				'<input id="tipocomunicacion" type="text" name="tipocomunicacion" maxlength="100">'+

				'<label for="serialconmutador">Serial de Conmutador</label>'+
				'<input id="serialconmutador" type="text" name="serialconmutador" maxlength="100">'+

				'<label for="fabricanteconmutador">Fabricante de Conmutador</label>'+
				'<input id="fabricanteconmutador" type="text" name="fabricanteconmutador" maxlength="100">'+

				'<label for="operacionesconmutador">No. Operaciones de Conmutador</label>'+
				'<input id="operacionesconmutador" type="text" name="operacionesconmutador" maxlength="100">'
			);
			$('#dinamico').append(
				'<label for="foto1">Foto 1</label>'+
				'<input id="foto1" type="file" name="foto1" class="fotos_p">'+

				'<label for="foto2">Foto 2</label>'+
				'<input id="foto2" type="file" name="foto2" class="fotos_p">'+

				'<label for="foto3">Foto 3</label>'+
				'<input id="foto3" type="file" name="foto3" class="fotos_p">'+

				'<label for="foto4">Foto 4</label>'+
				'<input id="foto4" type="file" name="foto4" class="fotos_p">'
			);
		}else if(cat==2){
			//interruptor de potencia
			$('#dinamico').html(
				'<label for="nombre_eq">Nombre</label>'+
				'<input id="nombre_eq" type="text" name="nombre_eq" maxlength="100">'+

				'<label class="control-label" for="fecha_fab">A&ntildeo Fabricacion</label>'+
				'<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="corriente_nominal">Corriente Nominal</label>'+
				'<input id="corriente_nominal" type="text" name="corriente_nominal" maxlength="100">'+

				'<label for="voltaje_nominal">Voltaje Nominal</label>'+
				'<input id="voltaje_nominal" type="text" name="voltaje_nominal" maxlength="100">'+

				'<label for="frecuencia_nominal">Frecuencia Nominal</label>'+
				'<input id="frecuencia_nominal" type="text" name="frecuencia_nominal" maxlength="100">'+

			 	'<label for="corriente_corto">Corriente Corto</label>'+
				'<input id="corriente_corto" type="text" name="corriente_corto" maxlength="100">'+

				'<label for="extincion_arco">Tipo de Extincion de Arco</label>'+
				'<input id="extincion_arco" type="text" name="extincion_arco" maxlength="100">'+

				'<label for="capacidad_interruptiva">Capacidad Interruptiva</label>'+
				'<input id="capacidad_interruptiva" type="text" name="capacidad_interruptiva" maxlength="100">'+

				'<label for="tension_nominal">Tension nominal de control</label>'+
				'<input id="tension_nominal" type="text" name="tension_nominal" maxlength="100">'+

				'<label for="n_operaciones">Numero de Operaciones</label>'+
				'<input id="n_operaciones" type="text" name="n_operaciones" maxlength="100">'+

				'<label for="t_apertura_min">Tiempo de Apertura Minimo(MiliSegundos)</label>'+
				'<input id="t_apertura_min" type="text" name="t_apertura_min" maxlength="100">'+

				'<label for="t_apertura_max">Tiempo de Apertura Maximo(MiliSegundos)</label>'+
				'<input id="t_apertura_max" type="text" name="t_apertura_max" maxlength="100">'+

				'<label for="t_cierre_min">Tiempo de Cierre Minimo(MiliSegundos)</label>'+
				'<input id="t_cierre_min" type="text" name="t_cierre_min" maxlength="100">'+

				'<label for="t_cierre_max">Tiempo de Cierre Maximo(MiliSegundos)</label>'+
				'<input id="t_cierre_max" type="text" name="t_cierre_max" maxlength="100">'+

				'<label for="t_cierre_aca">Tiempo de Apertura - Cierre - Apertura(MiliSegundos)</label>'+
				'<input id="t_cierre_aca" type="text" name="t_cierre_aca" maxlength="100">'
			);
			$('#dinamico').append(
				'<label for="foto1">Foto 1</label>'+
				'<input id="foto1" type="file" name="foto1" class="fotos_p">'+

				'<label for="foto2">Foto 2</label>'+
				'<input id="foto2" type="file" name="foto2" class="fotos_p">'+

				'<label for="foto3">Foto 3</label>'+
				'<input id="foto3" type="file" name="foto3" class="fotos_p">'+

				'<label for="foto4">Foto 4</label>'+
				'<input id="foto4" type="file" name="foto4" class="fotos_p">'
			);
		}else if(cat==3){
			//transformador de corriente
			$('#dinamico').html(
				'<label for="matricula_eca">Matricula Eca</label>'+
				'<input id="matricula_eca" type="text" name="matricula_eca" maxlength="100">'+

				'<label class="control-label" for="fecha_fab">A&ntildeo Fabricacion</label>'+
				'<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="tipo">Tipo</label>'+
				'<input id="tipo" type="text" name="tipo" maxlength="100">'+

				'<label for="relacion">Relacion</label>'+
				'<input id="relacion" type="text" name="relacion" maxlength="100">'+

				'<label for="corriente_corto">Corriente de Corto</label>'+
				'<input id="corriente_corto" type="text" name="corriente_corto" maxlength="100">'+

			 	'<label for="frecuencia_nominal">Frecuencia Nominal</label>'+
				'<input id="frecuencia_nominal" type="text" name="frecuencia_nominal" maxlength="100">'+

				'<label for="voltaje_nominal_primario">Voltaje Nominal Primario</label>'+
				'<input id="voltaje_nominal_primario" type="text" name="voltaje_nominal_primario" maxlength="100">'+

			 	'<label for="voltaje_nominal_secundario">Voltaje Nominal Secundario</label>'+
				'<input id="voltaje_nominal_secundario" type="text" name="voltaje_nominal_secundario" maxlength="100">'
			);
			$('#dinamico').append('<label for="tipo_mecanismo">Tipo mecanismo</label>'+
				'<select id="tipo_mecanismo">'+
					'<option value="Solido">Solido</option>'+
					'<option value="Aceite">Aceite</option>'+
				'</select>');
			$('#dinamico').append(
				'<label for="foto1">Foto 1</label>'+
				'<input id="foto1" type="file" name="foto1" class="fotos_p">'+

				'<label for="foto2">Foto 2</label>'+
				'<input id="foto2" type="file" name="foto2" class="fotos_p">'+

				'<label for="foto3">Foto 3</label>'+
				'<input id="foto3" type="file" name="foto3" class="fotos_p">'+

				'<label for="foto4">Foto 4</label>'+
				'<input id="foto4" type="file" name="foto4" class="fotos_p">'
			);
		}else if(cat==4){
			//transformador de potencia
			$('#dinamico').html(
				'<label for="matricula_eca">Matricula Eca</label>'+
				'<input id="matricula_eca" type="text" name="matricula_eca" maxlength="100">'+

				'<label class="control-label" for="fecha_fab">A&ntildeo Fabricacion</label>'+
				'<input id="fecha_fab" name="fecha_fab" type="text" maxlength="4" />'+

				'<label for="fabricante">Fabricante</label>'+
				'<input id="fabricante" type="text" name="fabricante" maxlength="100">'+

				'<label for="frecuencia">Frecuencia</label>'+
				'<input id="frecuencia" type="text" name="frecuencia" maxlength="100">'+

				'<label for="relacion">Relacion</label>'+
				'<input id="relacion" type="text" name="relacion" maxlength="100">'+

				'<label for="voltaje_nominal_primario">Voltaje Nominal Primario</label>'+
				'<input id="voltaje_nominal_primario" type="text" name="voltaje_nominal_primario" maxlength="100">'+

			 	'<label for="voltaje_nominal_secundario">Voltaje Nominal Secundario</label>'+
				'<input id="voltaje_nominal_secundario" type="text" name="voltaje_nominal_secundario" maxlength="100">'
			);
			$('#dinamico').append('<label for="tipo">Tipo</label>'+
				'<select id="tipo">'+
					'<option value="Capacitivo">Capacitivo</option>'+
					'<option value="inductivo">inductivo</option>'+
				'</select>');
			$('#dinamico').append('<label for="clase">Clase</label>'+
				'<select id="clase">'+
					'<option value="Solido">Solido</option>'+
					'<option value="Inmerso en Aceite">Inmerso en Aceite</option>'+
				'</select>');
			$('#dinamico').append(
				'<label for="foto1">Foto 1</label>'+
				'<input id="foto1" type="file" name="foto1" class="fotos_p">'+

				'<label for="foto2">Foto 2</label>'+
				'<input id="foto2" type="file" name="foto2" class="fotos_p">'+

				'<label for="foto3">Foto 3</label>'+
				'<input id="foto3" type="file" name="foto3" class="fotos_p">'+

				'<label for="foto4">Foto 4</label>'+
				'<input id="foto4" type="file" name="foto4" class="fotos_p">'
			);
		}
	});
	$('#zona').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Subestacion",
            type:'POST',
            dataType:"json",
            cache:false,
            async:false,
            data: {
                zona: this.value
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                console.log(data.response)
                $("#fk_sub_estacion").html(data.response);
                $("#info").html('');
            }
        });
    });
});
function removerFoto(foto){
	$("#caja_foto"+foto).remove();
	$("#foto"+foto).prop('disabled', false);
}
</script>
<div class="widget-box">
	<div class="widget-header">
		<h4>Actualizar Equipos</h4>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<div id="form">
				<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
				<div id="dinamico"></div>

				<div class="form-actions center">
					<button class="btn btn-small btn-success" onclick="create()">
						Guardar
						<i class="icon-arrow-right icon-on-right bigger-110"></i>
					</button>
				</div>
			</div>

		</div>
	</div>
</div>
<script type="text/javascript">
cargarDatos();
$(function() {
	$('#zona').val(<?php echo $model->fk_subestacion_e->fk_ubicacion?>).trigger('change');
    $('#fk_sub_estacion').val("<?php echo $model->fk_sub_estacion?>");
});
</script>