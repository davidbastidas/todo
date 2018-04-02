<?php

class VehiculosController extends Controller
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
				'actions'=>array('Formatos', 'BuscarVehiculos', 'UsarVehiculo', 'VerFormato', 'ActualizarFormato',
                                 'ImprimirFormato', ),

				'roles' => array('rol_administrador','rol_digitador','rol_consultas','rol_analista_odt','rol_brigada'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionFormatos(){//muestra los formatos y el llenado del vehiculo
        date_default_timezone_set('America/Bogota');
        $fecha_servidor = date("Y-m-d");
    	$formatos = VehiculosFormatos::model()->findAll("fk_usuario=".Yii::app()->user->id." AND fecha='".$fecha_servidor."'");
    	if(count($formatos)==0){
            //llevarlo a buscar un vehiculo disponible
            $this->redirect("BuscarVehiculos");
    	}
        $vehiculos = Vehiculos::model()->findAll();
    	$this->render('llenar_vehiculo',array('formatos' => $formatos, 'vehiculos' => $vehiculos,));
    }

    public function actionBuscarVehiculos(){
        date_default_timezone_set('America/Bogota');
        $fecha_servidor = date("Y-m-d");
        $formatos = VehiculosFormatos::model()->findAll("fecha=".$fecha_servidor." GROUP BY fk_vehiculo");
        $query="";
        $cont=0;
        foreach ($formatos as $key) {
            if($cont==0){
                $query="id!=".$key->fk_vehiculo;
            }else{
                $query=" OR id!=".$key->fk_vehiculo;
            }
            $cont++;
        }
        $vehiculos = Vehiculos::model()->findAll($query);
        $this->render('buscar_vehiculos',array("vehiculos"=>$vehiculos));
    }

    public function actionUsarVehiculo(){
        date_default_timezone_set('America/Bogota');
        $fecha_servidor = date("Y-m-d");
        $createCommand = Yii::app()->db->createCommand();
        $insert = $createCommand->insert('vehiculos_formatos', array(
            'nombre' => 'FR-SGI-061 04 (Inspeccion Preoperacional Vehiculos)',
            'fk_usuario' => Yii::app()->user->id,
            'fk_vehiculo' => $_POST['vehiculo'],
            'fecha' => $fecha_servidor,
            'categoria' => 'L',
            'estado' => 1,
        ));
        $insert = $createCommand->insert('vehiculos_formatos', array(
            'nombre' => 'PARTE DE VEHICULO',
            'fk_usuario' => Yii::app()->user->id,
            'fk_vehiculo' => $_POST['vehiculo'],
            'fecha' => $fecha_servidor,
            'categoria' => 'L',
            'estado' => 1,
        ));
        if($insert>0){
            $this->redirect("Formatos");
        }
    }

    public function actionVerFormato($id){
    	$formato = VehiculosFormatos::model()->findByPk($id);
    	if($formato->nombre=="FR-SGI-061 04 (Inspeccion Preoperacional Vehiculos)"){
    		$this->render('formato/inspeccion_preoperacional',array('formato' => $formato,));
    	}else if($formato->nombre=="PARTE DE VEHICULO"){
    		$this->render('formato/parte_vehiculo',array('formato' => $formato,));
    	}
    }

    public function actionActualizarFormato(){
		$createCommand = Yii::app()->db->createCommand();
        $update = $createCommand->update('vehiculos_formatos', array(
            'json' => $_POST['json'],
            'estado' => 2,
                ), 'id=:id', array(':id' => $_POST['id']));
		echo CJSON::encode(array(
            'update' => $update,
        ));
	}

    public function actionImprimirFormato($id){
        $div="";
        if($id==0){
            $formato = VehiculosFormatos::model()->findAll("fecha BETWEEN '".$_GET['desde']."' AND '".$_GET['hasta']."' AND fk_vehiculo=".$_GET['vehiculo'].
                " AND nombre='FR-SGI-061 04 (Inspeccion Preoperacional Vehiculos)' ORDER BY fecha");
            $div.= $this->renderPartial('pdf/encabezado_preoperacional', array(), true);
            $div.='<div id="content">';
            $div.= $this->renderPartial('pdf/inspeccion_preoperacional',array('formato' => $formato,), true);
            $div.='</div>';
        }else{
            $formato = VehiculosFormatos::model()->findByPk($id);
            if($formato->nombre=="PARTE DE VEHICULO"){
                $div.= $this->renderPartial('pdf/encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/parte_vehiculo',array('formato' => $formato,), true);
                $div.='</div>';
            }
        }
        
        date_default_timezone_set('America/Bogota');
        //Yii::import('application.vendors.dompdf.*');
        Yii::import('application.vendors.dompdf.*');
        require_once ('dompdf_config.inc.php');
        Yii::registerAutoloader('DOMPDF_autoload');

        $dompdf=new DOMPDF();
        $dompdf->load_html(utf8_decode($div));
        $dompdf->set_paper('a4','portrait');
        $dompdf->render();

        $dompdf->stream("my_pdf.pdf");
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
		$model=new Vehiculos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vehiculos']))
		{
			$model->attributes=$_POST['Vehiculos'];
			$model->marca = $_POST['Vehiculos']['marca'];
			$model->modelo_anio = $_POST['Vehiculos']['modelo_anio'];
			$model->propietario = $_POST['Vehiculos']['propietario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Vehiculos']))
		{
			$model->attributes=$_POST['Vehiculos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Vehiculos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vehiculos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vehiculos']))
			$model->attributes=$_GET['Vehiculos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Vehiculos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='vehiculos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
