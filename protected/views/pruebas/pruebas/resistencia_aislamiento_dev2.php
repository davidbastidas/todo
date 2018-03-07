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
			'Resistencia Aislamiento'.
		'</li>'.
	'</ul>'.
'</div>';

?>
<?php $this->pageTitle = Yii::app()->name; ?>
<script src="<?php  echo Yii::app() -> theme -> baseUrl . '/views'; ?>/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script>
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
	function crearJson(){

		var observacion=$("#observacion").val();

		var json=''
			  	+'{'
				  +'"tabla": ['
				    +'{'
				      +'"taplicada": "'+$("#taplicada").val()+'",'
				      +'"tinyeccion": "'+$("#tinyeccion").val()+'",'
				      +'"htierra": "'+$("#htierra").val()+'",'
				      +'"select_htierra": "'+$("#select_htierra").val()+'",'
				      +'"xtierra": "'+$("#xtierra").val()+'",'
				      +'"select_xtierra": "'+$("#select_xtierra").val()+'",'
				      +'"ytierra": "'+$("#ytierra").val()+'",'
				      +'"select_ytierra": "'+$("#select_ytierra").val()+'",'
				      +'"hx": "'+$("#hx").val()+'",'
				      +'"select_hx": "'+$("#select_hx").val()+'",'
				      +'"hy": "'+$("#hy").val()+'",'
				      +'"select_hy": "'+$("#select_hy").val()+'",'
				      +'"xy": "'+$("#xy").val()+'",'
				      +'"select_xy": "'+$("#select_xy").val()+'"'
				    +'}'
				  +'],'
				  +'"observaciones": "'+observacion+'"'
				+'}';
		$.ajax({
            url:"<?php echo $nameProyect?>/Pruebas/ActualizarTipoPrueba",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                json: json,
                id: <?php echo $model_datos->id?>
            },
            beforeSend:  function() {
                $("#info").html('<i class="icon-spinner icon-spin orange bigger-125"></i>');
            },
            success: function(data){
            	console.log(data.update);
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
			var data = JSON.parse(text);
			$("#taplicada").val(data.tabla[0].taplicada)
			$("#tinyeccion").val(data.tabla[0].tinyeccion)
			$("#htierra").val(data.tabla[0].htierra)
			$("#select_htierra").val(data.tabla[0].select_htierra)
			$("#xtierra").val(data.tabla[0].xtierra)
			$("#select_xtierra").val(data.tabla[0].select_xtierra)
			$("#ytierra").val(data.tabla[0].ytierra)
			$("#select_ytierra").val(data.tabla[0].select_ytierra)
			$("#hx").val(data.tabla[0].hx)
			$("#select_hx").val(data.tabla[0].select_hx)
			$("#hy").val(data.tabla[0].hy)
			$("#select_hy").val(data.tabla[0].select_hy)
			$("#xy").val(data.tabla[0].xy)
			$("#select_xy").val(data.tabla[0].select_xy)

			$("#observacion").val(data.observaciones);
		}
		var estado='<?php echo $estado?>';
		if (estado==3){
			$("input").prop("disabled", true);
			$("button").prop("disabled", true);
			$("select").prop("disabled", true);
			$("textarea").prop("disabled", true);
		}
		var devanado='<?php echo $devanados?>';
		if (devanado==2){
			$("#ytierra").prop("disabled", true);
			$("#select_ytierra").prop("disabled", true);
			$("#hy").prop("disabled", true);
			$("#select_hy").prop("disabled", true);
			$("#xy").prop("disabled", true);
			$("#select_xy").prop("disabled", true);
		}
	}
</script>

<div class="info"></div>
<div class="row-fluid">
  <div class="span6">
	<h3>Resistencia de Aislamiento</h3>
  </div>
  <div class="span6">
  	<button class="btn btn-primary pull-right" onclick="crearJson()">
		<i class="icon-save bigger-125"></i>
		Guardar
	</button>
  </div>
</div>
<hr>
<div class="row-fluid">
	<div class="span12">
		<table id="table_h" class="table table-bordered">
			<thead>
				<tr>
					<th colspan="3" class="center">Resistencia de Aislamiento</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="center">Tension Aplicada</td>
					<td class="center" colspan="2"><input id="taplicada" class="input-mini decimal decimalmax" type="text"/></td>
				</tr>
				<tr>
					<td class="center">Tiempo de Inyeccion</td>
					<td class="center" colspan="2"><input id="tinyeccion" class="input-mini decimal decimalmax" type="text"/></td>
				</tr>
				<tr>
					<td class="center">H vs Tierra</td>
					<td class="center">X vs Tierra</td>
					<td class="center">Y vs Tierra</td>
				</tr>
				<tr>
					<td class="center">
						<input id="htierra" class="input-mini decimal decimalmax" type="text"/>
						<select id="select_htierra" name="" class="input-small">
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="T">T</option>
						</select>
						&#8486
					</td>
					<td class="center">
						<input id="xtierra" class="input-mini decimal decimalmax" type="text"/>
						<select id="select_xtierra" name="" class="input-small">
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="T">T</option>
						</select>
						&#8486
					</td>
					<td class="center">
						<input id="ytierra" class="input-mini decimal decimalmax" type="text"/>
						<select id="select_ytierra" name="" class="input-small">
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="T">T</option>
						</select>
						&#8486
					</td>
				</tr>
				<tr>
					<td class="center">H vs X</td>
					<td class="center">H vs Y</td>
					<td class="center">X vs Y</td>
				</tr>
				<tr>
					<td class="center">
						<input id="hx" class="input-mini decimal decimalmax" type="text"/>
						<select id="select_hx" name="" class="input-small">
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="T">T</option>
						</select>
						&#8486
					</td>
					<td class="center">
						<input id="hy" class="input-mini decimal decimalmax" type="text"/>
						<select id="select_hy" name="" class="input-small">
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="T">T</option>
						</select>
						&#8486
					</td>
					<td class="center">
						<input id="xy" class="input-mini decimal decimalmax" type="text"/>
						<select id="select_xy" name="" class="input-small">
							<option value="M">M</option>
							<option value="G">G</option>
							<option value="T">T</option>
						</select>
						&#8486
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>


<label for="observacion">Observaciones(Limite 400 caracteres)</label>
<textarea class="span12 limited" id="observacion" data-maxlength="400"></textarea>
<script>
cargarDatos();
aplicarReglas();
</script>