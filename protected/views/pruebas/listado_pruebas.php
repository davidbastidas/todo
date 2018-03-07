<?php
$nameProyect = "/" . Yii::app() -> params['nameproyect'];
Yii::app()->params['breadcrumbs']=
'<div class="breadcrumbs fixed" id="breadcrumbs">'.
	'<ul class="breadcrumb">'.
		'<li>'.
			'<i class="icon-home home-icon"></i>'.
			'<a href="'.$nameProyect.'/site/index">Inicio</a>'.
			'<span class="divider">'.
				'<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			'<a href="'.$nameProyect.'/odt/llenarodt/'.$odt.'">Odt '.$odt.'</a>'.
			'<span class="divider">'.
				'<i class="icon-angle-right arrow-icon"></i>'.
			'</span>'.
		'</li>'.
		'<li>'.
			'Lista de Pruebas'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.colorbox-min.js"></script>
<script>
	function abrirTipoPrueba(id_datos, prueba){
		location.href="<?php echo $nameProyect?>/Pruebas/AbrirTipoPrueba/"+id_datos;
	}
	function validarDevanadoMostrarTemp(){
		var devanado='<?php echo $devanado?>';
		var estado='<?php echo $estado?>';
		if(devanado=="2"){
			$("#devy").css("display", "none");
		}
		var text='<?php echo $datosjson?>';
		if(text.length>0){
			var obj = JSON.parse(text);
			$("#temp-aceite").val(obj.temperaturas[0].temp_aceite);
			$("#temp-devh").val(obj.temperaturas[0].temp_devh);
			$("#temp-devx").val(obj.temperaturas[0].temp_devx);
			$("#temp-devy").val(obj.temperaturas[0].temp_devy);
			$("#temp-ambiente").val(obj.temperaturas[0].temp_ambiente);
		}
		if (estado==3){
			$("input").prop("disabled", true);
			$("button").prop("disabled", true);
		}
		if(limite_fotos==4){
			$("#LiFormato_UPLOAD").prop("disabled", true);
			$("#SubirA").prop("disabled", true);
		}
	}
	function guardarTemperaturas(){
		var json='{'
				  +'"temperaturas": ['
				    +'{'
				      +'"temp_aceite": "'+$("#temp-aceite").val()+'",'
				      +'"temp_devh": "'+$("#temp-devh").val()+'",'
				      +'"temp_devx": "'+$("#temp-devx").val()+'",'
				      +'"temp_devy": "'+$("#temp-devy").val()+'",'
				      +'"temp_ambiente": "'+$("#temp-ambiente").val()+'"'
				    +'}'
				  +']'
				+'}';
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/ActualizarDatosPrueba",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                json: json,
                idprueba: '<?php echo $fk_prueba ?>'
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
                $("#info").html('<div class="alert alert-block alert-success">'
									+'<button class="close" data-dismiss="alert" type="button">'
										+'<i class="icon-remove"></i>'
									+'</button>'
									+'<p>'
									+'<strong>'
										+'<i class="icon-ok"></i>'
										+'Se ha guardado!'
									+'</strong>'
									+'</p>'
								+'</div>');
            }
	    });
	}

	function comprueba_extension(formulario) {
	    var extensiones_permitidas = new Array(".jpg",".jpeg");
	    
	    var archivo=document.getElementById('LiFormato_UPLOAD').value;
	    if(comprobarArchivo(archivo,extensiones_permitidas)){
	        subirArchivo();
	        return 1;
	    }else{
	        alert (mierror);
	    }
	    //si estoy aqui es que no se ha podido subir
	    return 0;
	}
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
	function subirArchivo(){
		if(limite_fotos<4){
			var htmlError='<div class="alert alert-error">'+
		                    '<button class="close" data-dismiss="alert" type="button">'+
		                        '<i class="icon-remove"></i>'+
		                    '</button>'+
		                    '<strong>'+
		                        '<i class="icon-remove"></i>'+
		                        'Error! '+
		                    '</strong>'+
		                    'No se pudo guardar la imagen'+
		                    '<br>'+
		                    '</div>';
		    var htmlSuccess='<div class="alert alert-block alert-success">'+
		                        '<button class="close" data-dismiss="alert" type="button">'+
		                            '<i class="icon-remove"></i>'+
		                        '</button>'+
		                        '<strong>'+
		                        '<i class="icon-ok"></i>'+
		                        'Hecho! '+
		                        '</strong>'+
		                        'Imagen guardada.'+
		                        '<br>'+
		                    '</div>';
		    var inputFileImage = $("#LiFormato_UPLOAD")[0];

		    var file = inputFileImage.files[0];
		    console.log(file.size);
		    if(file.size>2097152){
		    	$("#info_archivo").html('<div class="alert alert-error">'+
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
		    }else{
		    	limite_fotos++;
		    	var data = new FormData();
			    var motivo="";
			    data.append('archivo',file);
			    data.append('prueba','<?php echo $fk_prueba ?>');
			    var url = "<?php echo $nameProyect?>/Pruebas/SubirFoto";
			    document.getElementById('LiFormato_UPLOAD').disabled=true;
			    document.getElementById('SubirA').disabled=true;
			    $("#info_archivo").html('');
			    $.ajax({
			        url:url,
			        type:'POST',
			        data:data,
			        cache:false,
			        contentType:false,
			        processData:false,
			        beforeSend:  function() {
			            $("#info_archivo").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
			        },
			        error: function(XMLHttpRequest, textStatus, errorThrown) {
					    console.log(XMLHttpRequest.statusText);
						console.log(textStatus);
						console.log(errorThrown);
						document.getElementById('LiFormato_UPLOAD').disabled=false;
			            document.getElementById('SubirA').disabled=false;
				    },
			        success: function(data_response){
			            document.getElementById('LiFormato_UPLOAD').disabled=false;
			            document.getElementById('SubirA').disabled=false;
			            if(data_response=="1"){
			                $("#info_archivo").html(htmlSuccess);
			            }else{
			                $("#info_archivo").html(htmlError);
			            }
			            buscarFotos();
			        }
			    });
		    }
		}else{
			//bloquear upload y mensaje de limite
			$("#LiFormato_UPLOAD").val('');
			$("#LiFormato_UPLOAD").prop("disabled", true);
			$("#SubirA").prop("disabled", true);
			$("#info_archivo").html('<div class="alert alert-error">'+
		                    '<button class="close" data-dismiss="alert" type="button">'+
		                        '<i class="icon-remove"></i>'+
		                    '</button>'+
		                    '<strong>'+
		                        '<i class="icon-remove"></i>'+
		                        'Error! '+
		                    '</strong>'+
		                    'Ha superado el limite de fotos.'+
		                    '<br>'+
		                    '</div>');
		}
	    
	}
	function buscarFotos(){
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/BuscarFotos",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                prueba: '<?php echo $fk_prueba ?>'
            },
            beforeSend:  function() {
                 $("#info_archivo").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(response){
            	$("#info_archivo").html('');
                $("#fotos").html(response.respuesta);
                $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
            }
	    });
	}
	function removerFoto(foto){
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/EliminarFoto",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                foto: foto
            },
            beforeSend:  function() {
                 $("#info_archivo").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
            	if(data.respuesta=="1"){
            		limite_fotos--;
            		buscarFotos();
            		$("#LiFormato_UPLOAD").prop("disabled", false);
					$("#SubirA").prop("disabled", false);
					console.log(data.ruta);
            	}else{
            		$("#info_archivo").html('<div class="alert alert-error">'+
		                    '<button class="close" data-dismiss="alert" type="button">'+
		                        '<i class="icon-remove"></i>'+
		                    '</button>'+
		                    '<strong>'+
		                        '<i class="icon-remove"></i>'+
		                        'Error! '+
		                    '</strong>'+
		                    'No se pudo eliminar la foto.'+
		                    '<br>'+
		                    '</div>');
            	}
            	
            }
	    });
	}
	var colorbox_params ;
	var limite_fotos='<?php echo $n_fotos?>';
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
</script>
<div id="info"></div>

<div class="row-fluid">
	<div class="span12 form-inline">
		<h2>Por favor digite las temperaturas</h2>
		<label for="temp-aceite">Temp. Aceite</label>
		<input id="temp-aceite" class="input-mini" type="text" placeholder="">
		<label for="temp-devh">Temp. Dev H</label>
		<input id="temp-devh" class="input-mini" type="text" placeholder="">
		<label for="temp-devx">Temp. Dev X</label>
		<input id="temp-devx" class="input-mini" type="text" placeholder="">
		<devy id="devy">
			<label for="temp-devy">Temp. Dev Y</label>
			<input id="temp-devy" class="input-mini" type="text" placeholder="">
		</devy>
		<label for="temp-ambiente">Temp. Ambiente</label>
		<input id="temp-ambiente" class="input-mini" type="text" placeholder="">
		<button class="btn btn-primary btn-small" onclick="guardarTemperaturas()">
			<i class="icon-key bigger-110"></i>
			Guardar Temperaturas
		</button>
	</div>
</div>
<br>
<div class="row-fluid">
	<div class="span12">
		<blockquote>
			<p>Al guardar las temperaturas la prueba pasara a estado "Digitado" y se podra generar Informe</p>
		</blockquote>
		<hr>
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<h2>Por favor elija la prueba a digitar</h2>
		<table id="sample-table-1" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Prueba</th>
					<th>Acciones</th>
					<th>Estado</th>
				</tr>
			</thead>

			<tbody>
		<?php 
			foreach ($datos_pruebas as $key) {?>
				<tr>
					<td>
						<?php echo $key->fk_tipo_prueba_p->nombre?>
					</td>
					<td>
						<button class="btn btn-mini btn-info" onclick="abrirTipoPrueba(<?php echo $key->id?>);">
							<i class="icon-edit bigger-120"></i>
						</button>
					</td>
					<td>
						<?php echo $key->fk_estado_p->nombre?>
					</td>
				</tr>
		<?php } ?>
			</tbody>
		</table>

	</div>
	<div class="span6">
		<h2>Capture las fotografias</h2>
		<div id="info_archivo"></div>
		<form name="form_subir" method="post" action="" enctype="multipart/form-data">
			<input id="ytLiFormato_UPLOAD" type="hidden" name="LiFormato[UPLOAD]" value="">
			<input id="LiFormato_UPLOAD" type="file" name="LiFormato[UPLOAD]">
		</form>
		<button class="btn btn-small btn-primary" id="SubirA" onclick="comprueba_extension($('#form_subir'))">
			Subir
		</button>
		<hr>
		<div id="fotos"><?php echo $fotos;?></div>
	</div>
</div>
<script>
validarDevanadoMostrarTemp();
</script>