<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
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
		<li>Crear</li>
	</ul>
</div>
';?>
<link rel="stylesheet" href="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/css/datepicker.css" />
<script src="<?php echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/date-time/bootstrap-datepicker.min.js"></script>
<script>
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
			//transformador de corriente
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
    	json_fotos='{'+
						'"foto1":"'+$("#foto1").val().replace("C:\\fakepath\\", "")+'",'+
						'"foto2":"'+$("#foto2").val().replace("C:\\fakepath\\", "")+'",'+
						'"foto3":"'+$("#foto3").val().replace("C:\\fakepath\\", "")+'",'+
						'"foto4":"'+$("#foto4").val().replace("C:\\fakepath\\", "")+'"'+
					'}';
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
            url:"<?php echo $nameProyect?>/Equipos/Create",
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
            	if(data.insert==1){
            		location.href="<?php echo $nameProyect?>/Equipos/view/"+data.last_insert;
            	}else{
            		var html='<div class="alert alert-error">'+
			    			'<button class="close" data-dismiss="alert" type="button">'+
			    			'<i class="icon-remove"></i>'+
			    			'</button>'+
			    			'<strong>'+
			    			'<i class="icon-remove"></i>'+
			    			'Error! '+
			    			'</strong>'+
			    			'No se guardo'+
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
$(function() {
    $('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('#fk_categoria').on('change', function() {
		var cat=$(this).val();
		if(cat==1){
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
		}else if(cat==3){//transformador de corriente
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
				'<label for="foto1">Foto 1</label>'+
				'<input id="foto1" type="file" name="foto1" class="fotos_p">'+

				'<label for="foto2">Foto 2</label>'+
				'<input id="foto2" type="file" name="foto2" class="fotos_p">'+

				'<label for="foto3">Foto 3</label>'+
				'<input id="foto3" type="file" name="foto3" class="fotos_p">'+

				'<label for="foto4">Foto 4</label>'+
				'<input id="foto4" type="file" name="foto4" class="fotos_p">'
			);
		}else if(cat==4){//transformador de potencia
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
	$(document).on("change", ".fotos_p", function(){
		var file_input=$(this);
		var extensiones_permitidas = new Array(".jpg",".jpeg");
	    
	    if(comprobarArchivo(file_input.val(),extensiones_permitidas)){
	        var inputFileImage = file_input[0];

		    var file = inputFileImage.files[0];
		    //console.log(file.size);
		    if(file.size>2097152){
		    	$("#info").html('<div class="alert alert-error">'+
		            '<button class="close" data-dismiss="alert" type="button">'+
		                '<i class="icon-remove"></i>'+
		            '</button>'+
		            '<strong>'+
		                '<i class="icon-remove"></i>'+
		                'Error! '+
		            '</strong>'+
		            'Ha superado el tamaño. Limite 2MB'+
		            '<br>'+
		            '</div>');
		    	file_input.val("");
		    }
	    }else{
	    	file_input.val("");
	        alert (mierror);
	    }
	});
	$('#zona').on('change', function() {
        $.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/Subestacion",
            type:'POST',
            dataType:"json",
            cache:false,
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
function comprobarArchivo(archivo,extensiones_permitidas){
    mierror = "";
    if (!archivo) {
        //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
        mierror = "No has seleccionado ningun archivo"; 
    }else{
        //recupero la extensi�n de este nombre de archivo 
        var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        //alert (extension); 
        //compruebo si la extensi�n est� entre las permitidas 
        var permitida = false;
        for (var i = 0; i < extensiones_permitidas.length; i++) {
            if (extensiones_permitidas[i] == extension) {
                permitida = true; 
                break; 
            }
        }
        if (!permitida) {
            mierror = "Comprueba la extension de los archivos a subir. \nSolo se pueden subir archivos con extensiones: " + extensiones_permitidas.join(); 
        }else{ 
            //correcto subir
            return true; 
        }
    }
    return false;
}
</script>
<div class="widget-box">
	<div class="widget-header">
		<h4>Crear Equipos</h4>
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


