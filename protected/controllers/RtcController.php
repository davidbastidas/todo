<?php

class RtcController extends Controller{
	
	public $layout='//layouts/column1';
	public $rowsPerPage=10;
	public function filters(){
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index', 'ListarPruebas', 'crear', 'delete', 'brigada', 'ListarOdtBrigadas', 
					'LlenarOdt', 'VerFormato', 'InsertarFormato', 'EliminarFormato', 'ActualizarOdt', 
					'ActualizarFormato', 'ImprimirFormato','ImprimirOdt'),

				'roles' => array('rol_administrador','rol_digitador','rol_consultas','rol_analista_odt','rol_brigada'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex(){
        $brigadas = Brigadas::model()->findAll('coordinador='.Yii::app()->user->id);
		$this -> render('index',array('brigadas'=>$brigadas));
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
		}else{
            if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){
                $fecha = " and fecha BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE()";
            }
        }
		
		$fk_usuario='';
		if(Yii::app()->authManager->checkAccess('rol_analista_odt', Yii::app()->user->id)){
			$fk_usuario=' and fk_usuario_analista='.Yii::app()->user->id;
		}
		$fk_equipo="estado = 3";

		$consulta1 = $fk_equipo . $fk_usuario . $fecha ." ORDER BY fecha DESC LIMIT ".$start.",".$per_page;
    	$consulta2 = $fk_equipo . $fk_usuario . $fecha;
    	$model = Odt::model()->findAll($consulta1);
    	$modelcount = Odt::model()->count($consulta2);
    	$no_of_paginations = ceil($modelcount / $per_page);
    	$res='';
    	if($modelcount > $this->rowsPerPage){
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
        $res.= $this->renderPartial('_data', array(
            'model' => $model,
            'modelcount' => $modelcount,
                ), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
	}
}


