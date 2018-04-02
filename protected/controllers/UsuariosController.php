<?php

class UsuariosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','brigadas','crearBrigada','EliminarBrigada','AsignarBrigada'),
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
	public function actionCreate()
	{
		$model=new Usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			$model->contrasena = $model->hashPassword($_POST['contrasena'], $session = $model->generateSalt());
			$model->sesion = $session;
			if($model->save()){
				$auth = Yii::app()->authManager;
				if ($model->fk_tipo == 1) {
					$auth->assign('rol_administrador', $model->id);
				}else if ($model->fk_tipo == 2) {
					$auth->assign('rol_digitador', $model->id);
				}else if ($model->fk_tipo == 3) {
					$auth->assign('rol_consultas', $model->id);
				}else if ($model->fk_tipo == 4) {//coordinador
					$auth->assign('rol_analista_odt', $model->id);
				}else if ($model->fk_tipo == 5) {//operario
					$auth->assign('rol_brigada', $model->id);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			$createCommand = Yii::app()->db->createCommand();
			$model->contrasena = $model->hashPassword($_POST['contrasena'], $session = $model->generateSalt());
			$model->sesion = $session;
			if($model->save()){
				if ($model->fk_tipo == 1) {
					$createCommand->update('auth_asignacion', array(
						'itemname' => 'rol_administrador',
						), 'userid=:id', array(':id' => $model->id));
				}else if ($model->fk_tipo == 2) {
					$createCommand->update('auth_asignacion', array(
						'itemname' => 'rol_digitador',
						), 'userid=:id', array(':id' => $model->id));
				}else if ($model->fk_tipo == 3) {
					$createCommand->update('auth_asignacion', array(
						'itemname' => 'rol_consultas',
						), 'userid=:id', array(':id' => $model->id));
				}else if ($model->fk_tipo == 4) {//coordinador
					$createCommand->update('auth_asignacion', array(
						'itemname' => 'rol_analista_odt',
						), 'userid=:id', array(':id' => $model->id));
				}else if ($model->fk_tipo == 5) {//operario
					$createCommand->update('auth_asignacion', array(
						'itemname' => 'rol_brigada',
						), 'userid=:id', array(':id' => $model->id));
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuarios', array(
			'criteria'=>array(
				'condition'=>'id>1',
				),));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuarios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuarios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuarios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionBrigadas(){
		$model=Brigadas::model()->findAll();
		$coordinadores=Usuarios::model()->findAll('fk_tipo=4');
		$this->render('brigadas/index',array('model'=>$model, 'coordinadores'=>$coordinadores));
	}

	public function actionCrearBrigada(){
		if(isset($_POST['json'])){
			//insertar
			$model=new Brigadas;
			$model->nombre = $_POST['nombre'];
			$model->jefe = $_POST['jefe'];
			$model->datos_json = '{"brigada":'.$_POST['json'].'}';
			$model->estado = 1;
			if($model->save(false)){
				//actualizar la brigada a casa usuario en la tabla usuarios
				$json=json_decode($model->datos_json, true);
				$size=count($json['brigada']);
				for ($i=0; $i < $size; $i++) {
					$usuario=Usuarios::model()->findByPk($json['brigada'][$i]['id']);
					$usuario->fk_brigada = $model->id;
					$usuario->save(false);
				}
				echo CJSON::encode(array(
					'success' => true,
					));
			}
		}else{
			$model=Usuarios::model()->findAll('fk_tipo = 5 AND (fk_brigada < 1 OR fk_brigada IS null)');
			$this->render('brigadas/crear',array('model'=>$model));
		}
	}
	public function actionEliminarBrigada(){
		//primero buscamos los usuarios dentro de la brigada para actualizarle la brigada a cero
		$model = Brigadas::model()->findByPk($_POST['id']);

        if(count($model) > 0){
            $json=json_decode($model->datos_json, true);
            $size=count($json['brigada']);
            
            for ($i=0; $i < $size; $i++) {
            	$modelUsuario = Usuarios::model()->findByPk($json['brigada'][$i]['id']);
            	$modelUsuario->fk_brigada = 0;
            	$modelUsuario->save();
            }
        }
        //eliminamos la brigada
		$model->delete();
		$success = false;
		if($model != null){
			$success = true;
		}
		echo CJSON::encode(array(
			'success' => $success,
		));
	}
	public function actionAsignarBrigada(){
		if(isset($_POST['coordinador'])){
			//actualizar
			$model=Brigadas::model()->findByPk($_POST['brigadaId']);
			$model->coordinador = $_POST['coordinador'];
			if($model->save(false)){
				echo CJSON::encode(array(
					'success' => true,
					));
			}
		}else{
			echo CJSON::encode(array(
				'success' => false,
				));
		}
	}
}
