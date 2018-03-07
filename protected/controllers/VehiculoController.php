<?php

class VehiculoController extends Controller{
	
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
				'actions'=>array('index', 'Formatos', 'BuscarVehiculos', 'UsarVehiculo', 'VerFormato', 'ActualizarFormato',
                                 'ImprimirFormato', ),

				'roles' => array('rol_administrador','rol_digitador','rol_consultas','rol_analista_odt','rol_brigada'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex(){
		$this -> render('index');
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
		if(Yii::app()->authManager->checkAccess('rol_analista_odt', Yii::app()->user->id)){
			$fk_usuario=' and fk_usuario_analista='.Yii::app()->user->id;
		}
		$fk_equipo="estado>=1";

		$consulta1 = $fk_equipo . $fk_usuario . $fecha ." ORDER BY fecha DESC LIMIT ".$start.",".$per_page;
    	$consulta2 = $fk_equipo . $fk_usuario . $fecha;
    	$model = Odt::model()->findAll($consulta1);
    	$modelcount = Odt::model()->count($consulta2);
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
        $res.= $this->renderPartial('_data', array(
            'model' => $model,
            'modelcount' => $modelcount,
                ), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
	}
	public function actionCrear(){
		
		if(isset($_POST['empresa'])){
			//consultar de el post brigada el json brigada
			$usuario = Usuarios::model()->findByPk($_POST['brigada']);
			$brigada = Brigadas::model()->findByPk($usuario->fk_brigada);
			$createCommand = Yii::app()->db->createCommand();
	        $insert = $createCommand->insert('odt', array(
	            'empresa' => $_POST['empresa'],
	            'numero' => $_POST['numero'],
	            'consignacion' => $_POST['consignacion'],
	            'tipo_trabajo' => $_POST['tipo_trabajo'],
	            'trazabilidad' => $_POST['trazabilidad'],
	            'tipo_mantenimiento' => $_POST['tipo_mantenimiento'],
	            'categoria' => $_POST['categoria'],
	            'fecha' => $_POST['fecha'],
	            'hora_prevista_inicio' => $_POST['hora_prevista_inicio'],
	            'hora_prevista_fin' => $_POST['hora_prevista_fin'],
	            'fk_equipo' => $_POST['equipo'],
	            'bahia_ln' => $_POST['bahia_ln'],
	            'lugar_trabajo' => $_POST['lugar_trabajo'],
	            'estado' => 1,
	            'brigada_json' => $brigada->datos_json,
	            'fk_usuario_brigada' => $_POST['brigada'],
	            'fk_usuario_analista' => Yii::app()->user->id,
	        ));
	        echo CJSON::encode(array(
	            'respuesta' => $insert,
	        ));
		}else{
			$ubicacion = Ubicacion::model()->findAll();
			$brigadas = Brigadas::model()->findAll();
			$this->render('create',array('ubicacion' => $ubicacion, 'brigadas' => $brigadas,));
		}
	}
	public function actionDelete() {
        $createCommand = Yii::app()->db->createCommand();
        $delete=$createCommand->delete('odt', 'id=:id', array(
            ':id' => $_POST['id'],
        ));
        $res=false;
        if($delete>0){
            $res=true;
        }
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
    }

    public function actionBrigada(){//muestra las odt de las brigadas
    	$brigada=Yii::app()->user->getState('brigada');
    	$brigadas = Brigadas::model()->findByPk($brigada);
    	$json=json_decode($brigadas->datos_json, true);
    	$size=count($json['brigada']);
    	$consulta="";
    	for ($i=0; $i < $size; $i++) { 
    		if($i==0){
    			$consulta="fk_usuario_brigada=".$json['brigada'][$i]['id'];
    		}else{
    			$consulta.=" OR fk_usuario_brigada=".$json['brigada'][$i]['id'];
    		}
    	}
    	$model = Odt::model()->findAll($consulta);
    	$this->render('brigada',array('model' => $model,));
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
    public function actionInsertarFormato($id){
    	$nombre='';
    	if($_POST['formato']==1){
    		$nombre='MO.00142.CO-MA-FO.01 (Mantenimiento Banco De Baterias)';
    	}else if($_POST['formato']==2){
    		$nombre='MO.00142.CO-MA-FO.02 (Inspeccion Tableros PCM)';
    	}else if($_POST['formato']==3){
    		$nombre='MO.00142.CO-MA-FO.05 (Inspeccion Seccionador)';
    	}else if($_POST['formato']==4){
    		$nombre='MO.00142.CO-MA-FO.06 (Inspeccion Interruptor)';
    	}else if($_POST['formato']==5){
    		$nombre='MO.00142.CO-MA-FO.07 (Inspeccion Servicios Aux. VDC)';
    	}else if($_POST['formato']==6){
    		$nombre='MO.00142.CO-MA-FO.08 (Inspeccion Servicios Aux. VAC)';
    	}else if($_POST['formato']==7){
    		$nombre='MO.00142.CO-MA-FO.09 (Inspeccion Tc y Tp)';
    	}else if($_POST['formato']==8){
    		$nombre='MO.00142.CO-MA-FO.10 (Inspeccion Pararrayo)';
    	}else if($_POST['formato']==9){
    		$nombre='MO.00142.CO-MA-FO.11 (Inspeccion Fusibles)';
    	}else if($_POST['formato']==10){
    		$nombre='MO.00142.CO-MA-FO.14 (Inspeccion Encapsulada)';
    	}else if($_POST['formato']==11){
    		$nombre='MO.00142.CO-MA-FO.15 (Inspeccion Instalaciones Locativas)';
    	}else if($_POST['formato']==12){
    		$nombre='MO.00142.CO-MA-FO.18 (Inspeccion Rutinaria Operador Movil)';
    	}
		$createCommand = Yii::app()->db->createCommand();
        $insert = $createCommand->insert('odt_formatos', array(
            'nombre' => $nombre,
            'fk_odt' => $id,
            'categoria' => 'R',
            'estado' => 1,
        ));
        $last_insert = Yii::app()->db->getLastInsertID();

        echo CJSON::encode(array(
            'respuesta' => $insert,
            'nombre' => $nombre,
            'lasinsert' => $last_insert,
        ));
    }
    public function actionEliminarFormato() {
        $createCommand = Yii::app()->db->createCommand();
        $delete=$createCommand->delete('odt_formatos', 'id=:id', array(
            ':id' => $_POST['formato'],
        ));
        $res=false;
        if($delete>0){
            $res=true;
        }
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
    }
    public function actionActualizarOdt(){
		$createCommand = Yii::app()->db->createCommand();
        $update = $createCommand->update('odt', array(
            'json' => $_POST['json'],
            'estado' => 3,
                ), 'id=:id', array(':id' => $_POST['id']));
		echo CJSON::encode(array(
            'update' => $update,
        ));
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
}






