<?php

class InformesController extends Controller{

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
				'actions'=>array('index', 'ListarPruebas', 'ImprimirPdf', 'SubirPdf', 'DescargarPdf', 'DatosInforme',),

				'roles' => array('rol_administrador','rol_digitador',),
			),
			array('allow', 
				'actions'=>array('index', 'ListarPruebas', 'DescargarPdf', ),

				'roles' => array('rol_consultas',),
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
	public function actionImprimirPdf($id){
		if($_POST['json']){
			$filename="informe_".$id.".pdf";
    		$update=0;
        	//$json = json_decode($_POST['json'], true );
        	//$json['potencia1'];
        	$div="";
			$pruebas = Pruebas::model()->findByPk($id);
			$datos_pruebas = DatosPruebas::model()->findAll("fk_pruebas=".$id);
			$equipo = Equipos::model()->findByPk($pruebas->fk_equipos);
			$fotos_anexo = FotosPruebas::model()->findAll('fk_pruebas='.$id);
			if($equipo->fk_categoria==1){
				$div.= $this->renderPartial('informe_final/encabezado', 
											array(
												'pruebas'=>$pruebas,
												'equipo'=>$equipo, 
												'temperaturas' => $pruebas->datos, 
												'datos_pruebas'=>$datos_pruebas,
												'datos_form'=>$_POST['json'],
												'fotos_equipo' => $equipo->datosfotos,
												'fotos_anexo' => $fotos_anexo,
											), true);
				
			}else if($equipo->fk_categoria==2){//interruptor de potencia
				$div.= $this->renderPartial('interruptor_potencia/informe_final/encabezado', 
											array(
												'pruebas'=>$pruebas,
												'equipo'=>$equipo, 
												'temperaturas' => $pruebas->datos, 
												'datos_pruebas'=>$datos_pruebas,
												'datos_form'=>$_POST['json'],
												'fotos_equipo' => $equipo->datosfotos,
												'fotos_anexo' => $fotos_anexo,
											), true);
			}else if($equipo->fk_categoria==3){//transformador_corriente
				$div.= $this->renderPartial('transformador_corriente/informe_final/encabezado', 
											array(
												'pruebas'=>$pruebas,
												'equipo'=>$equipo, 
												'temperaturas' => $pruebas->datos, 
												'datos_pruebas'=>$datos_pruebas,
												'datos_form'=>$_POST['json'],
												'fotos_equipo' => $equipo->datosfotos,
												'fotos_anexo' => $fotos_anexo,
											), true);
			}else if($equipo->fk_categoria==4){//transformador_potencia
				$div.= $this->renderPartial('transformador_potencia/informe_final/encabezado', 
											array(
												'pruebas'=>$pruebas,
												'equipo'=>$equipo, 
												'temperaturas' => $pruebas->datos, 
												'datos_pruebas'=>$datos_pruebas,
												'datos_form'=>$_POST['json'],
												'fotos_equipo' => $equipo->datosfotos,
												'fotos_anexo' => $fotos_anexo,
											), true);
			}
			date_default_timezone_set('America/Bogota');
			Yii::import('application.vendors.dompdf.*');
			require_once ('dompdf_config.inc.php');
			Yii::registerAutoloader('DOMPDF_autoload');

			$dompdf=new DOMPDF();
			$dompdf->load_html(utf8_decode($div));
			//$dompdf->set_paper('a4','landscape');
			$dompdf->set_paper('a4','portrait');
			$dompdf->render();
			$pdf = $dompdf->output();
			//$dompdf->stream("inf.pdf");
			$ruta_informes = Yii::app()->params['ruta_informes_barra_inversa']. $filename;
			file_put_contents($ruta_informes,$pdf);
		    if(file_exists($ruta_informes)){
		        $createCommand = Yii::app()->db->createCommand();
		        $update = $createCommand->update('pruebas', array(
		            'datos_informe' => $_POST['json'],
		            'nombre_informe' => $filename,
		            'fk_estado' => 3,
		                ), 'id=:id', array(':id' => $id));
	        }else{
	        	$filename="No se pudo generar el informe";
	        }
	        
	        echo CJSON::encode(array(
	            'update' => $update,
	            'filename' => $filename,
	        ));
    	}
		/*header("Pragma: no-cache"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false); // required for certain browsers
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment; filename=\"informe.doc");
		header("Content-Transfer-Encoding: binary");
		echo $div;*/
	}
	public function actionSubirPdf() {
        $nombre_archivo = $_FILES['archivo']['name'];
        //$tipo_archivo = $_FILES['archivo']['type'];
        //$tamano_archivo = $_FILES['archivo']['size'];
        $tmp_archivo = $_FILES['archivo']['tmp_name'];

        $nameProyect = Yii::app() -> params['nameproyect'];
        $ruta_informes = Yii::app()->params['ruta_informes_barra_inversa']. $nombre_archivo;
        if (!move_uploaded_file($tmp_archivo, $ruta_informes)) {
            echo 'Error subiendo el archivo.';
        }
        $idPrueba=$_POST['prueba'];
        $createCommand = Yii::app()->db->createCommand();
		date_default_timezone_set('America/Bogota');
        $fecha_servidor = date("Y-m-d");
        $hora_servidor = date("H:i:s");
        $update_pruebas = $createCommand->update('pruebas', array(
            'nombre_informe' => $nombre_archivo,
            'fk_estado' => 3,
                ), 'id=:id', array(':id' => $idPrueba));

        $createCommand2 = Yii::app()->db->createCommand();
        $createCommand2->update('datos_pruebas', array(
            'fk_estado' => 3,
                ), 'fk_pruebas=:id', array(':id' => $idPrueba));

        echo $update_pruebas;

    }
    public function actionDescargarPdf($id){
    	//descargar la prueba completa con el id
    	$prueba = Pruebas::model()->findByPk($id);
    	$root = Yii::app()->params['ruta_informes_barra_inversa'];
		$file = basename($prueba->nombre_informe);
		$path = $root.$file;
		$type = '';
		 
		if (is_file($path)) {
		    $size = filesize($path);
		    if (function_exists('mime_content_type')) {
		        $type = mime_content_type($path);
		    } else if (function_exists('finfo_file')) {
		        $info = finfo_open(FILEINFO_MIME);
		        $type = finfo_file($info, $path);
		        finfo_close($info);  
		    }
		    if ($type == '') {
		        $type = "application/force-download";
		    }
		    // Set Headers
		    header("Content-Type: $type");
		    header("Content-Disposition: attachment; filename=$file");
		    header("Content-Transfer-Encoding: binary");
		    header("Content-Length: " . $size);
		    // Download File
		    readfile($path);
		} else {
		    die("File not exist !!. ".$path);
		}
    }
    public function actionDatosInforme($id){
    	$prueba = Pruebas::model()->findByPk($id);
    	$equipo = Equipos::model()->findByPk($prueba->fk_equipos);
		if($equipo->fk_categoria==1){
			$this->informeTransformador($id,$prueba);
		}else if($equipo->fk_categoria==2){
			$this->informeInterruptorPotencia($id,$prueba);
		}else if($equipo->fk_categoria==3){
			$this->informeTransformadorCorriente($id,$prueba);
		}else if($equipo->fk_categoria==4){
			$this->informeTransformadorPotencia($id,$prueba);
		}
    }
    public function informeTransformador($id,$prueba){
    	$pruebas = Pruebas::model()->findByPk($id);
		$pruebas_datos = DatosPruebas::model()->findAll("fk_pruebas=".$id);
    	$fotos_pruebas = FotosPruebas::model()->findAll("fk_pruebas=".$id);
    	$this->render('informe_final/datos_informe',array(
			'id'=>$id,
			'pruebas_datos'=>$pruebas_datos,
			'fotos_pruebas'=>$fotos_pruebas,
			'estado'=>$prueba->fk_estado,
			'pruebas'=>$pruebas
		));
    }
    public function informeInterruptorPotencia($id,$prueba){
    	$pruebas = Pruebas::model()->findByPk($id);
		$pruebas_datos = DatosPruebas::model()->findAll("fk_pruebas=".$id);
    	$fotos_pruebas = FotosPruebas::model()->findAll("fk_pruebas=".$id);
    	$this->render('interruptor_potencia/informe_final/datos_informe',array(
			'id'=>$id,
			'pruebas_datos'=>$pruebas_datos,
			'fotos_pruebas'=>$fotos_pruebas,
			'estado'=>$prueba->fk_estado,
			'pruebas'=>$pruebas
		));
    }
    public function informeTransformadorCorriente($id,$prueba){
    	$pruebas = Pruebas::model()->findByPk($id);
		$pruebas_datos = DatosPruebas::model()->findAll("fk_pruebas=".$id);
    	$fotos_pruebas = FotosPruebas::model()->findAll("fk_pruebas=".$id);
    	$this->render('transformador_corriente/informe_final/datos_informe',array(
			'id'=>$id,
			'pruebas_datos'=>$pruebas_datos,
			'fotos_pruebas'=>$fotos_pruebas,
			'estado'=>$prueba->fk_estado,
			'pruebas'=>$pruebas
		));
    }
    public function informeTransformadorPotencia($id,$prueba){
    	$pruebas = Pruebas::model()->findByPk($id);
		$pruebas_datos = DatosPruebas::model()->findAll("fk_pruebas=".$id);
    	$fotos_pruebas = FotosPruebas::model()->findAll("fk_pruebas=".$id);
    	$this->render('transformador_potencia/informe_final/datos_informe',array(
			'id'=>$id,
			'pruebas_datos'=>$pruebas_datos,
			'fotos_pruebas'=>$fotos_pruebas,
			'estado'=>$prueba->fk_estado,
			'pruebas'=>$pruebas
		));
    }
}






