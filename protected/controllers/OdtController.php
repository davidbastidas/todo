<?php

class OdtController extends Controller{
	
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
        if(Yii::app()->authManager->checkAccess('rol_administrador', Yii::app()->user->id)){
            $brigadas = Brigadas::model()->findAll();
        }else{
            $brigadas = Brigadas::model()->findAll('coordinador='.Yii::app()->user->id);
        }
        
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

        $brigada = "";
        if($_POST['brigada']!=""){
            $brigada = " and fk_brigada=".$_POST['brigada'];
        }else{
            if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){
                $brigada = " and fk_brigada=".Yii::app()->user->getState('brigada');
            }
        }
		
		$fk_usuario='';
		if(Yii::app()->authManager->checkAccess('rol_analista_odt', Yii::app()->user->id)){
			$fk_usuario=' and fk_usuario_analista='.Yii::app()->user->id;
		}
		$fk_equipo="estado>=1";

		$consulta1 = $fk_equipo . $fk_usuario . $fecha . $brigada." ORDER BY fecha DESC LIMIT ".$start.",".$per_page;
    	$consulta2 = $fk_equipo . $fk_usuario . $fecha . $brigada;
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
        //creando el array para llenar el calendario
        $array = array();
        foreach ($model as $key) {
            $date = new DateTime($key->fecha);
            $row = array(
                "tipo"=>$key->tipo_trabajo, 
                "fecha_inicio"=>$date->format('Y-m-d')." ".$key->hora_prevista_inicio,
                "fecha_fin"=>$date->format('Y-m-d')." ".$key->hora_prevista_fin,
                "brigada"=> isset($key->fk_brigada_fk->nombre) ? $key->fk_brigada_fk->nombre : 'SIN BRIGADA',
                "estado"=>$key->estado
            );
            array_push($array, $row);
        }
        //fin del array del calendario
        echo CJSON::encode(array(
            'respuesta' => $res,
            'data_calendar' => $array,
        ));
	}
	public function actionCrear(){
		
		if(isset($_POST['empresa'])){
			//buscamos la brigada y traemos el json
			$brigada = Brigadas::model()->findByPk($_POST['brigada']);
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
	            'fk_usuario_brigada' => $_POST['operarioId'],
	            'fk_usuario_analista' => Yii::app()->user->id,
                'fk_brigada' => $brigada->id,
                'fk_cliente' => $_POST['cliente_id'],
	        ));
	        echo CJSON::encode(array(
	            'respuesta' => $insert,
	        ));
		}else{
            $clientes = InfoCliente::model()->findAll();
			$ubicacion = Ubicacion::model()->findAll();
			$brigadas = Brigadas::model()->findAll('coordinador='.Yii::app()->user->id);
			$this->render('create',array('ubicacion' => $ubicacion, 'brigadas' => $brigadas, 'clientes' => $clientes,));
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
        $consulta="";
        $brigadaId=Yii::app()->user->getState('brigada');

        /*$brigadas = Brigadas::model()->findByPk($brigadaId);

        if(count($brigadas) > 0){
            $json=json_decode($brigadas->datos_json, true);
            $size=count($json['brigada']);
            
            for ($i=0; $i < $size; $i++) { 
                if($i==0){
                    $consulta="fk_usuario_brigada=".$json['brigada'][$i]['id'];
                }else{
                    $consulta.=" OR fk_usuario_brigada=".$json['brigada'][$i]['id'];
                }
            }
        }else{
            $consulta="fk_usuario_brigada=".Yii::app()->user->id;
        }*/
        $consulta = "fk_brigada = ".$brigadaId;
        

        $fecha = "fecha BETWEEN CURDATE() - INTERVAL 15 DAY AND CURDATE()";
        if($consulta != ''){
            $consulta = "(" .$consulta . ")";
            $consulta .= " AND ".$fecha;
        }else{
            $consulta .= $fecha;
        }
        $model = Odt::model()->findAll($consulta);

        if (isset($_POST['brigada'])) {
            //creando el array para llenar el calendario
            $array = array();
            foreach ($model as $key) {
                $date = new DateTime($key->fecha);
                $row = array(
                    "id"=>$key->id, 
                    "tipo"=>$key->tipo_trabajo, 
                    "fecha_inicio"=>$date->format('Y-m-d')." ".$key->hora_prevista_inicio,
                    "fecha_fin"=>$date->format('Y-m-d')." ".$key->hora_prevista_fin,
                    "brigada"=> isset($key->fk_brigada_fk->nombre) ? $key->fk_brigada_fk->nombre : 'SIN BRIGADA',
                    "estado"=>$key->estado
                );
                array_push($array, $row);
            }
            //fin del array del calendario
            echo CJSON::encode(array(
                'data_calendar' => $array,
            ));
        }else{
            $this->render('brigada',array('model' => $model,));
        }
    }

    public function actionLlenarOdt($id){//muestra los formatos y el llenado de la odt
    	$odt = Odt::model()->findByPk($id);
        /*si esta en estado 1 es solo asignado al ingresar se le insertan los formatos y se coloca
        a estado 2 para que sepa que esta pendiente*/
    	if($odt->estado==1){
    		//insertar los formatos obligatorios
    		$createCommand = Yii::app()->db->createCommand();
	        $insert = $createCommand->insert('odt_formatos', array(
	            'nombre' => 'NT.00034.GN-SP.ESS-FO.01(Control Previo A Trabajos)',
	            'fk_odt' => $id,
	            'categoria' => 'L',
	            'estado' => 1,
	        ));
	        $insert = $createCommand->insert('odt_formatos', array(
	            'nombre' => 'FR-SGI-103 01 (ATS)',
	            'fk_odt' => $id,
	            'categoria' => 'L',
	            'estado' => 1,
	        ));
	        if($insert>0){
	        	//actualizar odt
		        $update = $createCommand->update('odt', array(
		            'estado' => 2,
	            ), 'id=:id', array(':id' => $id));
	        }
    	}
    	$odt = Odt::model()->findByPk($id);
    	$odtformatos = OdtFormatos::model()->findAll("fk_odt=".$id);
        $pruebas=Pruebas::model()->findAll("fk_odt=".$id);
    	$this->render('llenar_odt',array('odt' => $odt, 'odtformatos' => $odtformatos,'pruebas' => $pruebas,));
    }
    public function actionVerFormato($id){
    	$formato = OdtFormatos::model()->findByPk($id);
    	if($formato->nombre=="NT.00034.GN-SP.ESS-FO.01(Control Previo A Trabajos)"){
    		$this->render('formato/control_previo_trabajo',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="FR-SGI-103 01 (ATS)"){
    		$this->render('formato/analisis_trabajo_seguro',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.01 (Mantenimiento Banco De Baterias)"){
    		$this->render('formato/banco_baterias',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.02 (Inspeccion Tableros PCM)"){
    		$this->render('formato/tablero_pcm',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.05 (Inspeccion Seccionador)"){
    		$this->render('formato/inspeccion_seccionador',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.06 (Inspeccion Interruptor)"){
    		$this->render('formato/inspeccion_interruptor',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.07 (Inspeccion Servicios Aux. VDC)"){
    		$this->render('formato/inspeccion_vdc',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.08 (Inspeccion Servicios Aux. VAC)"){
    		$this->render('formato/inspeccion_vac',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.09 (Inspeccion Tc y Tp)"){
    		$this->render('formato/inspeccion_tc_tp',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.10 (Inspeccion Pararrayo)"){
    		$this->render('formato/inspeccion_pararayo',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.11 (Inspeccion Fusibles)"){
    		$this->render('formato/inspeccion_fusibles',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.14 (Inspeccion Encapsulada)"){
    		$this->render('formato/inspeccion_encapsulada',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.15 (Inspeccion Instalaciones Locativas)"){
    		$this->render('formato/inspeccion_instalacion_locativa',array('odt'=>$formato->fk_odt,'formato' => $formato,));
    	}else if($formato->nombre=="MO.00142.CO-MA-FO.18 (Inspeccion Rutinaria Operador Movil)"){
    		$this->render('formato/inspeccion_rutinaria_operador',array('odt'=>$formato->fk_odt,'formato' => $formato,));
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
        $update = $createCommand->update('odt_formatos', array(
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
            $formato = OdtFormatos::model()->findByPk($id);
            if($formato->nombre=="NT.00034.GN-SP.ESS-FO.01(Control Previo A Trabajos)"){
                $div.= $this->renderPartial('pdf/control_previo_trabajo_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/control_previo_trabajo',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="FR-SGI-103 01 (ATS)"){
                $div.= $this->renderPartial('pdf/analisis_trabajo_seguro_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/analisis_trabajo_seguro',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.01 (Mantenimiento Banco De Baterias)"){
                $div.= $this->renderPartial('pdf/banco_baterias_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/banco_baterias',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.02 (Inspeccion Tableros PCM)"){
                $div.= $this->renderPartial('pdf/tablero_pcm_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/tablero_pcm',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.05 (Inspeccion Seccionador)"){
                $div.= $this->renderPartial('pdf/inspeccion_seccionador_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_seccionador',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.06 (Inspeccion Interruptor)"){
                $div.= $this->renderPartial('pdf/inspeccion_interruptor_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_interruptor',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.07 (Inspeccion Servicios Aux. VDC)"){
                $div.= $this->renderPartial('pdf/inspeccion_vdc_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_vdc',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.08 (Inspeccion Servicios Aux. VAC)"){
                $div.= $this->renderPartial('pdf/inspeccion_vac_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_vac',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.09 (Inspeccion Tc y Tp)"){
                $div.= $this->renderPartial('pdf/inspeccion_tc_tp_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_tc_tp',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.10 (Inspeccion Pararrayo)"){
                $div.= $this->renderPartial('pdf/inspeccion_pararayo_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_pararayo',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.11 (Inspeccion Fusibles)"){
                $div.= $this->renderPartial('pdf/inspeccion_fusibles_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_fusibles',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.14 (Inspeccion Encapsulada)"){
                $div.= $this->renderPartial('pdf/inspeccion_encapsulada_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_encapsulada',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.15 (Inspeccion Instalaciones Locativas)"){
                $div.= $this->renderPartial('pdf/inspeccion_instalacion_locativa_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_instalacion_locativa',array('formato' => $formato,), true);
                $div.='</div>';
            }else if($formato->nombre=="MO.00142.CO-MA-FO.18 (Inspeccion Rutinaria Operador Movil)"){
                $div.= $this->renderPartial('pdf/inspeccion_rutinaria_operador_encabezado', array(), true);
                $div.='<div id="content">';
                $div.= $this->renderPartial('pdf/inspeccion_rutinaria_operador',array('formato' => $formato,), true);
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
    public function actionImprimirOdt($id){
        $div="";
        $formato = Odt::model()->findByPk($id);
        $div.= $this->renderPartial('pdf/odt_encabezado', array(), true);
        $div.='<div id="content">';
        $div.= $this->renderPartial('pdf/odt',array('formato' => $formato,), true);
        $div.='</div>';
        
        date_default_timezone_set('America/Bogota');
        //Yii::import('application.vendors.dompdf.*');
        Yii::import('application.vendors.dompdf.*');
        require_once ('dompdf_config.inc.php');
        Yii::registerAutoloader('DOMPDF_autoload');

        $dompdf=new DOMPDF();
        $dompdf->load_html(utf8_decode($div));
        $dompdf->set_paper('a4','portrait');
        $dompdf->render();

        $dompdf->stream("odt.pdf");
    }
}


