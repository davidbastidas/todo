<?php

class PreinformesController extends Controller{

	public $layout='//layouts/column1';
	public $rowsPerPage=10;
	/**
	 * @return array action filters
	 */
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'ListarPruebas', 'ImprimirWord', ),

				'roles' => array('rol_administrador','rol_digitador','rol_consultas','rol_analista_odt'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex(){
		$ubicacion = Ubicacion::model()->findAll();
		$this -> render('index', array('ubicacion' => $ubicacion, ));
	}
	public function actionListarPruebas(){
		$page=0;
		if(isset($_POST['page'])) {
			if($_POST['page']!=0){
				$page = (isset($_POST['page']) ? $_POST['page'] : 1);
				$cur_page = $page;
				$page -= 1;
				$per_page = $this->rowsPerPage; // Per page records
				$previous_btn = true;
				$next_btn = true;
				$first_btn = true;
				$last_btn = true;
				$start = $page * $per_page;
			}else{
				$per_page = $this->rowsPerPage; // Per page records
				$start = $page * $per_page;
				$cur_page = 1;
				$previous_btn = true;
				$next_btn = true;
				$first_btn = true;
				$last_btn = true;
			}
		}else{
			$per_page = $this->rowsPerPage; // Per page records
			$start = $page * $per_page;
			$cur_page = 1;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
		}
		$fecha = "";
		if($_POST['desde']!="" && $_POST['hasta']!=""){
			$fecha = " and fecha between '".$_POST['desde']."' and '".$_POST['hasta']."'";
		}
		
		$fk_usuario='';
		if(Yii::app()->authManager->checkAccess('rol_digitador', Yii::app()->user->id)){
			$fk_usuario=' and fk_usuario='.Yii::app()->user->id;
		}
		$fk_equipo="fk_estado!=5 AND fk_equipos=".$_POST['equipo'];

		$consulta1 = $fk_equipo . $fk_usuario . $fecha ." ORDER BY fecha DESC LIMIT ".$start.",".$per_page;
    	$consulta2 = $fk_equipo . $fk_usuario . $fecha;
    	$pruebas = Pruebas::model()->findAll($consulta1);
    	$modelcount = Pruebas::model()->count($consulta2);
    	$no_of_paginations = ceil($modelcount / $per_page);
    	$res='';
    	if($modelcount>$this->rowsPerPage){
    		$res.=$this->renderPartial('paginacion_partial', array(
				'cur_page' => $cur_page,
				'no_of_paginations' => $no_of_paginations,
				'first_btn' => $first_btn,
				'previous_btn' => $previous_btn,
				'next_btn' => $next_btn,
				'last_btn' => $last_btn,
				'modelcount' => $modelcount,
			), true);
    	}
        $res.= $this->renderPartial('lista_pruebas', array(
            'pruebas' => $pruebas,
            'modelcount' => $modelcount,
                ), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
	}
	public function actionImprimirWord($id){
		//realmente imprime pdf por un cambio
		$div="";
		$pruebas = Pruebas::model()->findByPk($id);
		$datos_pruebas = DatosPruebas::model()->findAll("fk_pruebas=".$id);
		$equipo = Equipos::model()->findByPk($pruebas->fk_equipos);
		$fotos_anexo = FotosPruebas::model()->findAll('fk_pruebas='.$id);
		if($equipo->fk_categoria==1){
			$div.= $this->renderPartial('partial/encabezado', array(), true);
			$div.='<div id="content">';
			if($equipo->devanados==2){//transformador
				$div.= $this->renderPartial('partial/equipo_temperaturas2', 
					array('temperaturas' => $pruebas->datos, 'equipo'=>$equipo), true);
				$div.= $this->renderPartial('partial/fotos', 
					array('fotos_equipo' => $equipo->datosfotos, 'id'=>$equipo->id), true);//imagenes equipo
				foreach ($datos_pruebas as $key) {
					if($key->fk_tipo_pruebas==1){//tangente delta
						$div.= $this->renderPartial('partial/tangente_delta2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==2){//collar caliente
						$div.= $this->renderPartial('partial/collar_caliente2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==3){//bushing
						$div.= $this->renderPartial('partial/bushing2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==4){//corriente de excitacion
						$div.= $this->renderPartial('partial/corriente_excitacion2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==5){//relacion de transformacion
						$div.= $this->renderPartial('partial/relacion_transformacion2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==6){//resistencia de devanados
						$div.= $this->renderPartial('partial/resistencia_devanado2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
						$div.= $this->renderPartial('partial/resistencia_aislamiento', array('datos' => $key->datos, 'devanados'=>2), true);
					}
				}
				$div.= $this->renderPartial('partial/fotos_anexo', 
					array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
			}else if($equipo->devanados==3){
				$div.= $this->renderPartial('partial/equipo_temperaturas3', array('temperaturas' => $pruebas->datos, 'equipo'=>$equipo), true);
				$div.= $this->renderPartial('partial/fotos', 
					array('fotos_equipo' => $equipo->datosfotos, 'id'=>$equipo->id), true);//imagenes equipo
				foreach ($datos_pruebas as $key) {
					if($key->fk_tipo_pruebas==1){//tangente delta
						$div.= $this->renderPartial('partial/tangente_delta3', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==2){//collar caliente
						$div.= $this->renderPartial('partial/collar_caliente3', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==3){//bushing
						$div.= $this->renderPartial('partial/bushing3', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==4){//corriente de excitacion
						$div.= $this->renderPartial('partial/corriente_excitacion2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==5){//relacion de transformacion
						$div.= $this->renderPartial('partial/relacion_transformacion2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==6){//resistencia de devanados
						$div.= $this->renderPartial('partial/resistencia_devanado2', array('datos' => $key->datos), true);
					}else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
						$div.= $this->renderPartial('partial/resistencia_aislamiento', array('datos' => $key->datos, 'devanados'=>3), true);
					}
				}
				$div.= $this->renderPartial('partial/fotos_anexo', 
					array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
			}
			$div.='</div>';
		}else if($equipo->fk_categoria==2){//interruptor de potencia
			$div.= $this->renderPartial('interruptor_potencia/encabezado', array(), true);
			$div.='<div id="content">';
			$div.= $this->renderPartial('interruptor_potencia/equipo_temperaturas', array('temperaturas' => $pruebas->datos, 'equipo'=>$equipo), true).'<hr>';
			$div.= $this->renderPartial('partial/fotos', 
					array('fotos_equipo' => $equipo->datosfotos, 'id'=>$equipo->id), true);//imagenes equipo
			foreach ($datos_pruebas as $key) {
				if($key->fk_tipo_pruebas==8){//factor disipacion
					$div.= $this->renderPartial('interruptor_potencia/factor_disipacion', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==2){//collar caliente
					$div.= $this->renderPartial('interruptor_potencia/collar_caliente', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==10){//resistencia de contactos
					$div.='<hr>'. $this->renderPartial('interruptor_potencia/resistencia_contacto', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==9){//pruebas dinamicas
					$div.='<hr>'. $this->renderPartial(
						'interruptor_potencia/pruebas_dinamicas', 
						array(
							'datos' => $key->datos, 
							'datosequipo' => $equipo->datosjson,
							'id' => $key->id, 
							), true);
				}else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
					$div.= $this->renderPartial('interruptor_potencia/resistencia_aislamiento',
												 array(
												 	'datos' => $key->datos, 
												 	'datosequipo' => $equipo->datosjson,
												 	'temperaturas' => $pruebas->datos,), true);
				}
			}
			$div.= $this->renderPartial('interruptor_potencia/fotos_anexo', 
					array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
			$div.='</div>';
		}else if($equipo->fk_categoria==3){//transformador de corriente
			$div.= $this->renderPartial('transformador_corriente/encabezado', array(), true);
			$div.='<div id="content">';
			$div.= $this->renderPartial('transformador_corriente/equipo_temperaturas', array('temperaturas' => $pruebas->datos, 'equipo'=>$equipo), true).'<hr>';
			$div.= $this->renderPartial('transformador_corriente/fotos', 
					array('fotos_equipo' => $equipo->datosfotos, 'id'=>$equipo->id), true);//imagenes equipo
			foreach ($datos_pruebas as $key) {
				if($key->fk_tipo_pruebas==5){//relacion de transformacion
					$div.= $this->renderPartial('transformador_corriente/relacion_transformacion', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==1){//tangente delta
					$div.= $this->renderPartial('transformador_corriente/tangente_delta', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==2){//collar_caliente
					$div.= $this->renderPartial('transformador_corriente/collar_caliente', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==6){//resistencia_devanado
					$div.= $this->renderPartial('transformador_corriente/resistencia_devanado', array('datos' => $key->datos, ), true);
				}else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
					$div.= $this->renderPartial('transformador_corriente/resistencia_aislamiento', array('datos' => $key->datos,), true);
				}else if($key->fk_tipo_pruebas==4){//corriente_exitacion
					$div.= $this->renderPartial('transformador_corriente/corriente_exitacion', array('datos' => $key->datos,'id' => $key->id,), true);
				}
			}
			$div.= $this->renderPartial('transformador_corriente/fotos_anexo', 
					array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
			$div.='</div>';
		}else if($equipo->fk_categoria==4){//transformador de potencia
			$div.= $this->renderPartial('transformador_potencia/encabezado', array(), true);
			$div.='<div id="content">';
			$div.= $this->renderPartial('transformador_potencia/equipo_temperaturas', array('temperaturas' => $pruebas->datos, 'equipo'=>$equipo), true).'<hr>';
			$div.= $this->renderPartial('transformador_potencia/fotos', 
					array('fotos_equipo' => $equipo->datosfotos, 'id'=>$equipo->id), true);//imagenes equipo
			foreach ($datos_pruebas as $key) {
				if($key->fk_tipo_pruebas==5){//relacion de transformacion
					$div.= $this->renderPartial('transformador_potencia/relacion_transformacion', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==1){//tangente delta
					$div.= $this->renderPartial('transformador_potencia/tangente_delta', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==2){//collar_caliente
					$div.= $this->renderPartial('transformador_potencia/collar_caliente', array('datos' => $key->datos), true);
				}else if($key->fk_tipo_pruebas==7){//resistencia de aislamiento
					$div.= $this->renderPartial('transformador_potencia/resistencia_aislamiento', array('datos' => $key->datos,), true);
				}
			}
			$div.= $this->renderPartial('transformador_potencia/fotos_anexo', 
					array('fotos_anexo' => $fotos_anexo, 'id'=>$pruebas->id), true);//imagenes anexo
			$div.='</div>';
		}
		date_default_timezone_set('America/Bogota');
		//Yii::import('application.vendors.dompdf.*');
		Yii::import('application.vendors.dompdf.*');
		require_once ('dompdf_config.inc.php');
		Yii::registerAutoloader('DOMPDF_autoload');

		$dompdf=new DOMPDF();
		$dompdf->load_html(utf8_decode($div));
		//$dompdf->set_paper('a4','landscape');
		$dompdf->set_paper('a4','portrait');
		$dompdf->render();
		/*$canvas = $dompdf->get_canvas();
		$w = $canvas->get_width();
		$h = $canvas->get_height();
		$canvas->page_text($w - 120, $h - 40, "Pagina: {PAGE_NUM} of {PAGE_COUNT}", null, 9, array(0,0,0));*/

		$dompdf->stream("my_pdf.pdf");

		//$dompdf->stream("inf.pdf");
		//$mpdf=new mPDF();
		//$mpdf->WriteHTML($div,2);

		//$mpdf->Output('filename.pdf','D');
	}
}