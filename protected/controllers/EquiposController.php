<?php

class EquiposController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $rowsPerPage=10;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','ListarEquipos'),
				'roles' => array('rol_administrador',),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'roles' => array('rol_administrador',),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles' => array('rol_administrador',),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){

		if(isset($_POST['serie'])){
			$createCommand = Yii::app()->db->createCommand();
	        $insert = $createCommand->insert('equipos', array(
	            'serie' => $_POST['serie'],
	            'fk_sub_estacion' => $_POST['fk_sub_estacion'],
	            'devanados' => $_POST['devanados'],
	            'fk_categoria' => $_POST['fk_categoria'],
	            'datosjson' => $_POST['json'],
	            'datosfotos' => $_POST['json_fotos'],
	        ));
	        $last_insert = Yii::app()->db->getLastInsertID();
	        //con el last insert creo la carpeta de las fotos
	        foreach($_FILES as $nombre_campo => $valor){
				$nombre_archivo = $_FILES[$nombre_campo]['name'];
		        //$tipo_archivo = $_FILES['archivo']['type'];
		        //$tamano_archivo = $_FILES['archivo']['size'];
		        $tmp_archivo = $_FILES[$nombre_campo]['tmp_name'];

		        //$nameProyect = Yii::app() -> params['nameproyect'];
		        $ruta_fotos = Yii::app()->params['ruta_fotos_equipos'].$last_insert.'/'.$nombre_archivo;
		        if (!file_exists(Yii::app()->params['ruta_fotos_equipos'].$last_insert)) {
				    mkdir(Yii::app()->params['ruta_fotos_equipos'].$last_insert, 0777, true);
				}
				move_uploaded_file($tmp_archivo, $ruta_fotos);
			}
	        echo CJSON::encode(array(
	            'last_insert' => $last_insert,
	            'insert' => $insert
	        ));
		}else{
			$model=new Equipos;
			$this->render('create',array(
				'model'=>$model,
			));
		}
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id){

		if(isset($_POST['serie'])){
			//consultar las fotos que ya tiene y verificar cuales son las nuevas fotos que llegan.
			$model=$this->loadModel($id);
			$jfotos = json_decode(stripslashes($model->datosfotos), true);
			$clientefotos  = json_decode(stripslashes($_POST['json_fotos']), true);
			
			
			$createCommand = Yii::app()->db->createCommand();

			$update = $createCommand->update('equipos', array(
	            'serie' => $_POST['serie'],
	            'fk_sub_estacion' => $_POST['fk_sub_estacion'],
	            'devanados' => $_POST['devanados'],
	            'fk_categoria' => $_POST['fk_categoria'],
	            'datosjson' => $_POST['json'],
	            'datosfotos' => $_POST['json_fotos'],
	                ), 'id=:id', array(':id' => $id));
			if($update>0){
				//con el id creo la carpeta de las fotos
		        foreach($_FILES as $nombre_campo => $valor){
					$nombre_archivo = $_FILES[$nombre_campo]['name'];
			        //$tipo_archivo = $_FILES['archivo']['type'];
			        //$tamano_archivo = $_FILES['archivo']['size'];
			        $tmp_archivo = $_FILES[$nombre_campo]['tmp_name'];

			        //$nameProyect = Yii::app() -> params['nameproyect'];
			        $ruta_fotos = Yii::app()->params['ruta_fotos_equipos'].$id.'/'.$nombre_archivo;
			        if (!file_exists(Yii::app()->params['ruta_fotos_equipos'].$id)) {
					    mkdir(Yii::app()->params['ruta_fotos_equipos'].$id, 0777, true);
					}
					move_uploaded_file($tmp_archivo, $ruta_fotos);
				}
			}

	        echo CJSON::encode(array(
	            'idview' => $id,
	            'update' => $update,
	            'jfotos' => $jfotos,
	            'clientefotos' => $clientefotos,
	        ));
		}else{
			$model=$this->loadModel($id);
			$this->render('update',array(
				'model'=>$model,
			));
		}

		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Equipos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$ubicacion = Ubicacion::model()->findAll();
		$this->render('admin',array("ubicacion"=>$ubicacion,));
	}

	public function actionListarEquipos(){
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
		$consulta1 = "";
    	$consulta2 = "";
		if(trim($_POST['equipo'])!=""){
			$equipo="datosjson LIKE '%".$_POST['equipo']."%'";
			$consulta1 = $equipo ." ORDER BY id DESC LIMIT ".$start.",".$per_page;
    		$consulta2 = $equipo;
		}else{
			if($_POST['subestacion2']!="0"){
				$subestacion="fk_sub_estacion=".$_POST['subestacion2'];
				$categoria="";
				if($_POST['categoria']!="0"){
					$categoria=" AND fk_categoria=".$_POST['categoria'];
				}
				$consulta1 = $subestacion . $categoria ." ORDER BY id DESC LIMIT ".$start.",".$per_page;
	    		$consulta2 = $subestacion . $categoria;
			}else{
				$consulta1 = "id>1 ORDER BY id DESC LIMIT ".$start.",".$per_page;
			}
		}
		
    	$equipos = Equipos::model()->findAll($consulta1);
    	$modelcount = Equipos::model()->count($consulta2);
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
        $res.= $this->renderPartial('_admin_resultados', array(
            'equipos' => $equipos,
            'modelcount' => $modelcount,
                ), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Equipos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='equipo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
