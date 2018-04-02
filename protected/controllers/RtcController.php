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
				'actions'=>array('index', 'ListarPruebas', 'ListarPruebasExcel', 'Informe'),

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
                $fecha = " and fecha BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
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
	public function actionListarPruebasExcel(){
		$fecha = "";
		$desde = $_POST['desde2'];
		$hasta = $_POST['hasta2'];
		if($desde!="" && $hasta!=""){
			$fecha = " and fecha between '".$desde."' and '".$hasta."'";
		}else{
            if(Yii::app()->authManager->checkAccess('rol_brigada', Yii::app()->user->id)){
                $fecha = " and fecha BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()";
            }
        }
		
		$fk_usuario='';
		if(Yii::app()->authManager->checkAccess('rol_analista_odt', Yii::app()->user->id)){
			$fk_usuario=' and fk_usuario_analista='.Yii::app()->user->id;
		}
		$fk_equipo="estado = 3";

		$consulta1 = $fk_equipo . $fk_usuario . $fecha ." ORDER BY fecha DESC";
    	$model = Odt::model()->findAll($consulta1);

    	/** Error reporting */
        error_reporting(0);
        
        //Importando
        Yii::import('application.vendors.PHPExcel_.*');
        require_once('PHPExcel.php');
        require_once('PHPExcel/IOFactory.php');
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        
        // Set properties
        $objPHPExcel->getProperties()->setCreator("CO")
                                     ->setLastModifiedBy("CO")
                                     ->setTitle('REPORTE RTC')
                                     ->setSubject('REPORTE RTC')
                                     ->setDescription('REPORTE RTC')
                                     ->setKeywords("RTC")
                                     ->setCategory("RTC");
        //Escribiendo
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'ITEM')
                    ->setCellValue('B1', 'JEFE DE TRABAJO')
                    ->setCellValue('C1', 'AUXILIAR 1')
                    ->setCellValue('D1', 'AUXILIAR 2')
                    ->setCellValue('E1', 'SOLICITANTE')
                    ->setCellValue('F1', 'BRG')
                    ->setCellValue('G1', 'FECHA')
                    ->setCellValue('H1', 'DIA')
                    ->setCellValue('I1', 'INICIO')
                    ->setCellValue('J1', 'FIN')
                    ->setCellValue('K1', 'CONSIGNACION')
                    ->setCellValue('L1', 'TIPO')
                    ->setCellValue('M1', 'N.ODT')
                    ->setCellValue('N1', 'CATEGORIA')
                    ->setCellValue('O1', 'DEPARTAMENTO')
                    ->setCellValue('P1', 'MUNICIPIO')
                    ->setCellValue('Q1', 'UBICACION')
                    ->setCellValue('R1', 'ELEMENTO')
                    ->setCellValue('S1', 'DESCRIPCIÓN CORTA ACTIVIDAD')
                    ->setCellValue('T1', 'INFORME')
                    ->setCellValue('U1', 'EQUIPO')
                    ->setCellValue('V1', 'SERIAL')
                    ->setCellValue('W1', 'COD. ACCIÓN')
                    ->setCellValue('X1', 'TIPO DE ACCION (Item de cobro)')
                    ->setCellValue('Y1', 'Cantidad')
                    ;
        
        $row=2;
        foreach ($model as $value) {
        	$json=json_decode($value->fk_equipo_fk->datosjson, true);

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$row, $value->id)
                    ->setCellValue('B'.$row, $value->fk_usuario_brigada_fk->nombre)
                    ->setCellValue('C'.$row, '')
                    ->setCellValue('D'.$row, '')
                    ->setCellValue('E'.$row, '')
                    ->setCellValue('F'.$row, $value->fk_brigada_fk->nombre)
                    ->setCellValue('G'.$row, $value->fecha)
                    ->setCellValue('H'.$row, '')
                    ->setCellValue('I'.$row, $value->hora_prevista_inicio)
                    ->setCellValue('J'.$row, $value->hora_prevista_fin)
                    ->setCellValue('K'.$row, $value->consignacion)
                    ->setCellValue('L'.$row, $value->tipo_trabajo)
                    ->setCellValue('M'.$row, $value->numero)
                    ->setCellValue('N'.$row, $value->categoria)
                    ->setCellValue('O'.$row, '')
                    ->setCellValue('P'.$row, '')
                    ->setCellValue('Q'.$row, $value->lugar_trabajo)
                    ->setCellValue('R'.$row, '')
                    ->setCellValue('S'.$row, '')
                    ->setCellValue('T'.$row, '')
                    ->setCellValue('U'.$row, $json['nombre_eq'])
                    ->setCellValue('V'.$row, '')
                    ->setCellValue('W'.$row, '')
                    ->setCellValue('X'.$row, '')
                    ->setCellValue('Y'.$row, '')
                    ;
                    $row++;
        }
        // Redirect output to a clientâ€™s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="REPORTE RTC.xlsx"');
        header('Cache-Control: max-age=0');
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
	}

    public function actionInforme(){
        $this -> render('informe',array());
    }
}


