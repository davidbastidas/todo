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
			"Corriente de Exitación TC's".
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<style>
.owerflowy {overflow-y: auto;}
</style>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.colorbox-min.js"></script>
<script type="text/javascript">
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
function aplicarReglas(){
	$('.decimal').keypress(function(event) {
	    if(event.which == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46){
	        return true;
	    }else if((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)){
	        event.preventDefault();
	    }
	});
	$('.textomax').each(function() {
		$(this).attr('maxlength','6');
	});
	$('.decimalmax').each(function() {
		$(this).attr('maxlength','7');
	});
}
$(function() {
	$('textarea[class*=limited]').each(function() {
		var limit = parseInt($(this).attr('data-maxlength')) || 100;
		$(this).inputlimiter({
			"limit": limit,
			remText: '%n caracteres disponibles...',
			limitText: 'maximo : %n.'
		});
	});
});
$(document).on("click", ".borrar_fila", function(){
	var idtr=$(this).parent().parent().attr("id");
	var n=$('#table_1 >tbody >tr').length;
	$("#table_1").find('#n_taps').html((n-1)+" taps");
	$("#table_1 #"+idtr).remove();
});
$(document).on("click", ".eliminafoto", function(){
	var r = confirm("¿Desea Eliminar la Iamgen?");
	if (r == true) {
		$(this).parent().parent().parent().parent().find(".subir_foto").prop("disabled", false);
	    $(this).parent().parent().parent().html("");
	}
});
$(document).on("keyup", ".cprimarioa, .csecundarioa", function(){
	var idtr=$(this).parent().parent().attr("id");
	var A=$('#'+idtr).find('.cprimarioa').val();
	var B=$('#'+idtr).find('.csecundarioa').val();
	var C=A/B;
	var limmin=C*0.9975;
	var limmax=C*1.0025;
	$('#'+idtr).find('rcalculada').html(C.toFixed(2));
	$('#'+idtr).find('limmin').html(limmin.toFixed(2));
	$('#'+idtr).find('limmax').html(limmax.toFixed(2));
	
});
//5 parents coger el attr id y buscar id calculo_ratio, elegir el que esta value y reaizar formula
function crearJson(){
	var json='{'+
			 '"norma": "'+$("#norma").val()+'",'+
			 '"observaciones": "'+$("#observacion").val()+'", "tabla": [';
	var foto="";
	var foto_aux="";
	var y=1;
	$('#table_1 >tbody >tr').each(function() {
		curTable=$(this);
		foto_aux=curTable.find('.fotos_g a').length;
		if(foto_aux>0){
			foto_aux=curTable.find('.fotos_g');
			foto=foto_aux.find('.cboxElement').html();
		}else{
			foto=curTable.find('.grafica').val().replace("C:\\fakepath\\", "");
		}
		if(y==1){
			json+='{'+
		        '"nucleo": "'+$(this).find(".nucleo").val()+'",'+
		        '"vpico": "'+$(this).find(".vpico").val()+'",'+
		        '"ipico": "'+$(this).find(".ipico").val()+'",'+
		        '"foto": "'+foto+'"'+
		      '}';
		      y++;
		}else{
			json+=',{'+
		       '"nucleo": "'+$(this).find(".nucleo").val()+'",'+
		        '"vpico": "'+$(this).find(".vpico").val()+'",'+
		        '"ipico": "'+$(this).find(".ipico").val()+'",'+
		        '"foto": "'+foto+'"'+
		      '}';
		}
	});
	json+=']}';
	console.log(json);
	var data = new FormData();
    data.append('id',<?php echo $model_datos->id?>);
    data.append('json',json);
    data.append('fotoequipo',"tc");

    //buscamos todas las fotos que hay en las tablas
    var x=1;
    $(".subir_foto").each(function(){
    	var file_input = $(this);
    	if(file_input.val()!=""){
    		data.append('foto_'+x,file_input[0].files[0]);
    		x++;
    	}
    });
	$.ajax({
        url:"<?php echo $nameProyect?>/Pruebas/ActualizarTipoPrueba",
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
        	
        	if(data.update=="1" || data.update=="0"){
        		location.href="<?php echo $nameProyect?>/Pruebas/ListarPrueba/<?php echo $model_datos->fk_pruebas?>";
        	}else{
        		$(".info").html('<div class="alert alert-error">'+
        			'<button class="close" data-dismiss="alert" type="button">'+
					'<i class="icon-remove"></i>'+
					'</button>'+
					'<strong>'+
					'<i class="icon-remove"></i>'+
					'No se guardo!'+
					'</strong>'+
					'Compruebe su conexion.'+
					'<br>'+
					'</div>');
        	}
            
        }
    });
}
function cargarDatos(){
	var text='<?php echo $model_datos->datos?>';
	if(text.length>0){
		var obj = JSON.parse(text);
		var n_filas=0;
		n_filas=obj.tabla.length;
		n=n_filas;//valor para seguir agregando nucleos
		$('#ntaps').html(n);
		var disabled="";
		var html_foto="";
		$("#norma").val(obj.norma);
		for (var y = 0; y < n_filas; y++) {
			disable="";
			html_foto1="";
			if(obj.tabla[y].foto!=""){
				disable="disabled";
				html_foto='<ul class="ace-thumbnails">'+
							'<a href="<?php echo "../../../archivos/fotos_corriente_exitacion_tc/".$model_datos->id."/"?>'+obj.tabla[y].foto+'" data-rel="colorbox">'+
								obj.tabla[y].foto+
							'</a>'+
							'<a href="#">'+
								'<i class="icon-remove red eliminafoto"></i>'+
							'</a>'+
							'<br>'+
							'</ul>';
			}
			$('#table_1 tbody').append(
				'<tr id="tr_'+(y+1)+'">'+
					'<td class="center input-mini"><input id="nucleo_'+(y+1)+'" class="input-mini textomax nucleo" type="text" value="'+obj.tabla[y].nucleo+'"/></td>'+
					'<td class="center input-mini"><input id="vpico_'+(y+1)+'" class="input-mini decimal decimalmax vpico" type="text" value="'+obj.tabla[y].vpico+'"/></td>'+
					'<td class="center input-mini"><input id="ipico_'+(y+1)+'" class="input-mini decimal decimalmax ipico" type="text" value="'+obj.tabla[y].ipico+'"/></td>'+
					'<td class="center input-mini"><input id="grafica_'+(y+1)+'" class="subir_foto grafica" type="file" '+disable+'/><div id="fotos_g" class="fotos_g">'+html_foto+'</div></td>'+
					'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
				'</tr>'
			);
		}
		$("#observacion").val(obj.observaciones);
		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	}
	var estado='<?php echo $estado?>';
	if (estado==3){
		$("input").prop("disabled", true);
		$("button").prop("disabled", true);
		$("select").prop("disabled", true);
		$("textarea").prop("disabled", true);
	}
}
var n=0;
function nuevotap(){
	var n_taps=parseInt($('#taps').val());
	for (var i = (n+1); i <=(n+n_taps); i++) {
		$('#table_1 tbody').append(
			'<tr id="tr_'+i+'">'+
				'<td class="center input-mini"><input id="nucleo_'+i+'" class="input-mini textomax nucleo" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="vpico_'+i+'" class="input-mini decimal decimalmax vpico" type="text"/></td>'+
				'<td class="center input-mini"><input id="ipico_'+i+'" class="input-mini decimal decimalmax ipico" type="text" name="'+i+'"/></td>'+
				'<td class="center input-mini"><input id="grafica_'+i+'" class="subir_foto grafica" type="file" name="'+i+'"/></td>'+
				'<td class="center input-mini"><button class="btn btn-mini btn-danger borrar_fila"><i class="icon-trash bigger-120"></i></button></td>'+
			'</tr>'
			);
	}
	n=i-1;
	$('#ntaps').html(n)
}
$(document).on("change", ".subir_foto", function(){
	var file_input=$(this);
	var info_archivo=$('#info');
	var extensiones_permitidas = new Array(".jpg",".jpeg");
    
    if(comprobarArchivo(file_input.val(),extensiones_permitidas)){
        var inputFileImage = file_input[0];

	    var file = inputFileImage.files[0];
	    //console.log(file.size);
	    if(file.size>2097152){
	    	info_archivo.html('<div class="alert alert-error">'+
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

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Corriente de Exitación TC's</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<div id="grupo_tablas">
	<div class="row-fluid">
	  	<div class="span6 form-inline">
	  		<label for="taps">Agregar nucleo(s)</label>
	  		<div class="form-inline">
	  			<input id="taps" class="input-mini decimalmax decimal" type="text" placeholder="N nucleos"/>
			  	<button class="btn btn-small btn-info" onclick="nuevotap()">
					<i class="icon-bolt bigger-125"></i>
					Agregar
				</button>
	  		</div>
	  	</div>
	</div>
	<hr>
	<div class="row-fluid">
	  	<div class="span6 form-inline">
	  		<label for="taps">Norma</label>
	  		<div class="form-inline">
	  			<select id="norma">
	  				<option value="0">[Seleccione la Norma]</option>
	  				<option value="1">IEC/BS</option>
	  				<option value="2">ANSI 45°</option>
	  				<option value="3">ANSI 30°</option>
	  			</select>
	  		</div>
	  	</div>
	</div>
	<span id="ntaps">0</span> Nucleos
	<table id="table_1" class="table table-bordered">
		<thead>
			<tr>
				<th class="center">Nucleo</th>
				<th class="center">V Pico</th>
				<th class="center">I Pico</th>
				<th class="center">Grafica</th>
				<th class="center"></th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>