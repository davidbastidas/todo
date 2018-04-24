<?php

class AceiteController extends Controller{

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

	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'create', 'update','ListarPruebas', 'DescargarDigital',),

				'roles' => array('rol_administrador','rol_digitador',),
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
		$fk_equipo="fk_equipo=".$_POST['equipo'];

		$consulta1 = $fk_equipo . $fk_usuario . $fecha ." ORDER BY fecha DESC LIMIT ".$start.",".$per_page;
    	$consulta2 = $fk_equipo . $fk_usuario . $fecha;
    	$pruebas = PruebasAceite::model()->findAll($consulta1);
    	$modelcount = PruebasAceite::model()->count($consulta2);
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
        $res.= $this->renderPartial('partial/lista_pruebas', array(
            'pruebas' => $pruebas,
            'modelcount' => $modelcount,
                ), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
	}
	public function actionCreate($id,$prueba){
		//el id es el identificador del equipo
		if(isset($_POST['json'])){
			$createCommand = Yii::app()->db->createCommand();
			date_default_timezone_set('America/Bogota');
	        $fecha_servidor = date("Y-m-d");
	        $hora_servidor = date("H:i:s");
	        $insert = $createCommand->insert('pruebas_aceite', array(
	            'fk_equipo' => $id,
	            'fecha' => $fecha_servidor,
	            'hora' => $hora_servidor,
	            'fk_usuario' => Yii::app()->user->id,
	            'datos' => $_POST['json'],
		        'fk_tipo' => $prueba,
	        ));
	        $last_insert = Yii::app()->db->getLastInsertID();

	        $nombre_archivo = $_FILES['archivo']['name'];
	        //$tipo_archivo = $_FILES['archivo']['type'];
	        //$tamano_archivo = $_FILES['archivo']['size'];
	        $tmp_archivo = $_FILES['archivo']['tmp_name'];

	        $ruta_aceite = Yii::app()->params['ruta_pruebas_aceite'].$last_insert.'/'.$nombre_archivo;
	        if (!file_exists(Yii::app()->params['ruta_pruebas_aceite'].$last_insert)) {
			    mkdir(Yii::app()->params['ruta_pruebas_aceite'].$last_insert, 0777, true);
			}
	        if (!move_uploaded_file($tmp_archivo, $ruta_aceite)) {
	            echo 'Error subiendo el archivo.';
	        } else {
	        	$createCommand2 = Yii::app()->db->createCommand();
				$createCommand2->update('pruebas_aceite', array(
	            'filename' => $nombre_archivo,
	                ), 'id=:id', array(':id' => $last_insert));
	        }

			echo CJSON::encode(array(
	            'insert' => $insert,
	        ));
		}else{
			$this->render('create',array(
				'json'=>'',
				'id'=>$id,
				'prueba'=>$prueba,
			));
		}
	}
	public function actionUpdate($id){
		//el id es el identificador de la prueba creada para actualizar
		if(isset($_POST['json'])){
			$nombre_archivo = $_FILES['archivo']['name'];
	        //$tipo_archivo = $_FILES['archivo']['type'];
	        //$tamano_archivo = $_FILES['archivo']['size'];
	        $tmp_archivo = $_FILES['archivo']['tmp_name'];

	        $ruta_aceite = Yii::app()->params['ruta_pruebas_aceite'].$id.'/'.$nombre_archivo;
	        if (!file_exists(Yii::app()->params['ruta_pruebas_aceite'].$id)) {
			    mkdir(Yii::app()->params['ruta_pruebas_aceite'].$id, 0777, true);
			}
	        if (!move_uploaded_file($tmp_archivo, $ruta_aceite)) {
	            echo 'Error subiendo el archivo.';
	        }

			$createCommand = Yii::app()->db->createCommand();
			$update = $createCommand->update('pruebas_aceite', array(
            'datos' => $_POST['json'],
            'filename' => $nombre_archivo,
                ), 'id=:id', array(':id' => $id));

			echo CJSON::encode(array(
	            'update' => $update,
	        ));
		}else{
			$model = PruebasAceite::model()->findByPk($id);
			$this->render('update',array(
				'json'=>'',
				'id'=>$id,
				'prueba'=>$model->fk_tipo,
				'model'=>$model,
			));
		}
	}
	public function actionDescargarDigital($id){
    	//descargar la prueba completa con el id
    	$prueba = PruebasAceite::model()->findByPk($id);
    	$root = Yii::app()->params['ruta_pruebas_aceite'];
		$file = basename($prueba->filename);
		$path = $root.$id."/".$file;
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
}
