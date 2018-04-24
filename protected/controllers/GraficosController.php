<?php

class GraficosController extends Controller{

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
				'actions'=>array('index', 'ListarPruebas', 'Generador', ),

				'roles' => array('rol_administrador','rol_digitador','rol_consultas'),
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
		$res="";
		$categoria='';
		if($_POST['categoria']==1){
			$categoria=" AND fk_categoria=1";
		}else if($_POST['categoria']==2){
			$categoria=" AND fk_categoria=2";
		}
		$equipos = Equipos::model()->findAll("fk_sub_estacion=".$_POST['subestacion'].$categoria);
        $res.= $this->renderPartial('lista_pruebas', array(
            'equipos' => $equipos,
                ), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));
	}
	public function actionGenerador($id){
		$equipo = Equipos::model()->findByPk($id);
		//id es el equipo. hay que buscar las pruebas en las fechas dadas con este equipo
		$pruebas = Pruebas::model()->findAll("fk_equipos=".$id." AND (fk_estado=3 OR fk_estado=4) ORDER BY fecha DESC LIMIT 5");
		$enclaves = array();
		$cont=1;
/******************************************/
		// grafico 1
		$coor_line1_fp_gf1='';
		$coor_line2_fp_gf1='';
		$coor_line1_cap_gf1='';
		$coor_line2_cap_gf1='';

		// grafico 2
		$coor_line1_fp_gf2='';
		$coor_line2_fp_gf2='';
		$coor_line1_cap_gf2='';
		$coor_line2_cap_gf2='';

		// grafico 3
		$coor_line1_fp_gf3='';
		$coor_line2_fp_gf3='';
		$coor_line1_cap_gf3='';
		$coor_line2_cap_gf3='';

		// grafico 4
		$coor_line1_fp_gf4='';
		$coor_line2_fp_gf4='';
		$coor_line1_cap_gf4='';
		$coor_line2_cap_gf4='';

		// grafico 5
		$coor_line1_fp_gf5='';
		$coor_line2_fp_gf5='';
		$coor_line1_cap_gf5='';
		$coor_line2_cap_gf5='';

		// grafico 6
		$coor_line1_fp_gf6='';
		$coor_line2_fp_gf6='';
		$coor_line1_cap_gf6='';
		$coor_line2_cap_gf6='';

		// grafico 7
		$coor_line1_fp_gf7='';
		$coor_line2_fp_gf7='';
		$coor_line1_cap_gf7='';
		$coor_line2_cap_gf7='';

		// grafico 8
		$coor_line1_fp_gf8='';
		$coor_line2_fp_gf8='';
		$coor_line1_cap_gf8='';
		$coor_line2_cap_gf8='';

		// grafico 9
		$coor_line1_fp_gf9='';
		$coor_line2_fp_gf9='';
		$coor_line1_cap_gf9='';
		$coor_line2_cap_gf9='';

/******************************************/
		// grafico 1
		$coor_line1_bu_fp_gf1='';
		$coor_line2_bu_fp_gf1='';
		$coor_line1_bu_cap_gf1='';
		$coor_line2_bu_cap_gf1='';

		// grafico 2
		$coor_line1_bu_fp_gf2='';
		$coor_line2_bu_fp_gf2='';
		$coor_line1_bu_cap_gf2='';
		$coor_line2_bu_cap_gf2='';

		// grafico 3
		$coor_line1_bu_fp_gf3='';
		$coor_line2_bu_fp_gf3='';
		$coor_line1_bu_cap_gf3='';
		$coor_line2_bu_cap_gf3='';

		// grafico 4
		$coor_line1_bu_fp_gf4='';
		$coor_line2_bu_fp_gf4='';
		$coor_line1_bu_cap_gf4='';
		$coor_line2_bu_cap_gf4='';

		// grafico 5
		$coor_line1_bu_fp_gf5='';
		$coor_line2_bu_fp_gf5='';
		$coor_line1_bu_cap_gf5='';
		$coor_line2_bu_cap_gf5='';

		// grafico 6
		$coor_line1_bu_fp_gf6='';
		$coor_line2_bu_fp_gf6='';
		$coor_line1_bu_cap_gf6='';
		$coor_line2_bu_cap_gf6='';

		// grafico 7
		$coor_line1_bu_fp_gf7='';
		$coor_line2_bu_fp_gf7='';
		$coor_line1_bu_cap_gf7='';
		$coor_line2_bu_cap_gf7='';

		// grafico 8
		$coor_line1_bu_fp_gf8='';
		$coor_line2_bu_fp_gf8='';
		$coor_line1_bu_cap_gf8='';
		$coor_line2_bu_cap_gf8='';

		// grafico 9
		$coor_line1_bu_fp_gf9='';
		$coor_line2_bu_fp_gf9='';
		$coor_line1_bu_cap_gf9='';
		$coor_line2_bu_cap_gf9='';

		// grafico 10
		$coor_line1_bu_fp_gf10='';
		$coor_line2_bu_fp_gf10='';
		$coor_line1_bu_cap_gf10='';
		$coor_line2_bu_cap_gf10='';

		// grafico 11
		$coor_line1_bu_fp_gf11='';
		$coor_line2_bu_fp_gf11='';
		$coor_line1_bu_cap_gf11='';
		$coor_line2_bu_cap_gf11='';

		// grafico 12
		$coor_line1_bu_fp_gf12='';
		$coor_line2_bu_fp_gf12='';
		$coor_line1_bu_cap_gf12='';
		$coor_line2_bu_cap_gf12='';

/******************************************/
		// grafico 1
		$coor_line1_hvst_gf1='';
		// grafico 2
		$coor_line1_xvst_gf2='';
		// grafico 3
		$coor_line1_hvsx_gf3='';
		// grafico 4
		$coor_line1_yvst_gf4='';
		// grafico 5
		$coor_line1_hvsy_gf5='';
		// grafico 6
		$coor_line1_xvsy_gf6='';

/******************************************/
		$rows_corriente_excitacion='';
		$rows_rel_tranfs='';
		$rows_resd='';

		$count_td=0; $count_bush=0;$count_ais=0;$count_ext=0;$count_rel_tranfs=0;$count_resd=0;
		foreach ($pruebas as $key) {
			$enclaves = array_merge($enclaves, array('P'.$cont => ''.$key->id));
			$cont++;
			$datos_pruebas = DatosPruebas::model()->findAll("fk_pruebas=".$key->id);
			foreach ($datos_pruebas as $value) {
				if($value->fk_tipo_pruebas==1){
					//acceder al json y a los valores correspondientes para graficas
					$decode=json_decode($value->datos, true );
					if($count_td==0){
						if($key->fk_equipo_p->devanados==2){//dos devanados
							// grafico 1
							$coor_line1_fp_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['alta_baja_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['alta_baja_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['alta_baja_gnd_cap'].'"}';
							$coor_line2_cap_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['alta_baja_gnd_cap'].'"}';

							// grafico 2
							$coor_line1_fp_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['alta_baja_gar_pfcorr'].'"}';
							$coor_line2_fp_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['alta_baja_gar_pfcorr'].'"}';
							$coor_line1_cap_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['alta_baja_gar_cap'].'"}';
							$coor_line2_cap_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['alta_baja_gar_cap'].'"}';

							// grafico 3
							$coor_line1_fp_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['alta_alta_ust_pfcorr'].'"}';
							$coor_line2_fp_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['alta_alta_ust_pfcorr'].'"}';
							$coor_line1_cap_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['alta_alta_ust_cap'].'"}';
							$coor_line2_cap_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['alta_alta_ust_cap'].'"}';

							// grafico 4
							$coor_line1_fp_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['baja_alta_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['baja_alta_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['baja_alta_gnd_cap'].'"}';
							$coor_line2_cap_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['baja_alta_gnd_cap'].'"}';

							// grafico 5
							$coor_line1_fp_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['baja_alta_gar_pfcorr'].'"}';
							$coor_line2_fp_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['baja_alta_gar_pfcorr'].'"}';
							$coor_line1_cap_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['baja_alta_gar_cap'].'"}';
							$coor_line2_cap_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['baja_alta_gar_cap'].'"}';

							// grafico 6
							$coor_line1_fp_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['baja_alta_ust_pfcorr'].'"}';
							$coor_line2_fp_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['baja_alta_ust_pfcorr'].'"}';
							$coor_line1_cap_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['baja_alta_ust_cap'].'"}';
							$coor_line2_cap_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['baja_alta_ust_cap'].'"}';

						}else if($key->fk_equipo_p->devanados==3){//tres devanados
							// grafico 1
							$coor_line1_fp_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['h_gndgar_pfcorr'].'"}';
							$coor_line2_fp_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['h_gndgar_pfcorr'].'"}';
							$coor_line1_cap_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['h_gndgar_cap'].'"}';
							$coor_line2_cap_gf1='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['h_gndgar_cap'].'"}';

							// grafico 2
							$coor_line1_fp_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['h_gar_pfcorr'].'"}';
							$coor_line2_fp_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['h_gar_pfcorr'].'"}';
							$coor_line1_cap_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['h_gar_cap'].'"}';
							$coor_line2_cap_gf2='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['h_gar_cap'].'"}';

							// grafico 3
							$coor_line1_fp_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['h_ust_pfcorr'].'"}';
							$coor_line2_fp_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['h_ust_pfcorr'].'"}';
							$coor_line1_cap_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['h_ust_cap'].'"}';
							$coor_line2_cap_gf3='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['h_ust_cap'].'"}';

							// grafico 4
							$coor_line1_fp_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['x_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['x_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['x_gnd_cap'].'"}';
							$coor_line2_cap_gf4='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['x_gnd_cap'].'"}';

							// grafico 5
							$coor_line1_fp_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['x_gar_pfcorr'].'"}';
							$coor_line2_fp_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['x_gar_pfcorr'].'"}';
							$coor_line1_cap_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['x_gar_cap'].'"}';
							$coor_line2_cap_gf5='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['x_gar_cap'].'"}';

							// grafico 6
							$coor_line1_fp_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['x_ust_pfcorr'].'"}';
							$coor_line2_fp_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['x_ust_pfcorr'].'"}';
							$coor_line1_cap_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['x_ust_cap'].'"}';
							$coor_line2_cap_gf6='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['x_ust_cap'].'"}';

							// grafico 7
							$coor_line1_fp_gf7='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][6]['y_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf7='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][6]['y_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf7='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][6]['y_gnd_cap'].'"}';
							$coor_line2_cap_gf7='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][6]['y_gnd_cap'].'"}';

							// grafico 8
							$coor_line1_fp_gf8='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][7]['y_gar_pfcorr'].'"}';
							$coor_line2_fp_gf8='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][7]['y_gar_pfcorr'].'"}';
							$coor_line1_cap_gf8='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][7]['y_gar_cap'].'"}';
							$coor_line2_cap_gf8='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][7]['y_gar_cap'].'"}';

							// grafico 9
							$coor_line1_fp_gf9='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][8]['y_ust_pfcorr'].'"}';
							$coor_line2_fp_gf9='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][8]['y_ust_pfcorr'].'"}';
							$coor_line1_cap_gf9='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][8]['y_ust_cap'].'"}';
							$coor_line2_cap_gf9='{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][8]['y_ust_cap'].'"}';
						}
					}else{
						if($key->fk_equipo_p->devanados==2){//dos devanados
							// grafico 1
							$coor_line1_fp_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['alta_baja_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['alta_baja_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['alta_baja_gnd_cap'].'"}';
							$coor_line2_cap_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['alta_baja_gnd_cap'].'"}';

							// grafico 2
							$coor_line1_fp_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['alta_baja_gar_pfcorr'].'"}';
							$coor_line2_fp_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['alta_baja_gar_pfcorr'].'"}';
							$coor_line1_cap_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['alta_baja_gar_cap'].'"}';
							$coor_line2_cap_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['alta_baja_gar_cap'].'"}';

							// grafico 3
							$coor_line1_fp_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['alta_alta_ust_pfcorr'].'"}';
							$coor_line2_fp_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['alta_alta_ust_pfcorr'].'"}';
							$coor_line1_cap_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['alta_alta_ust_cap'].'"}';
							$coor_line2_cap_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['alta_alta_ust_cap'].'"}';

							// grafico 4
							$coor_line1_fp_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['baja_alta_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['baja_alta_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['baja_alta_gnd_cap'].'"}';
							$coor_line2_cap_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['baja_alta_gnd_cap'].'"}';

							// grafico 5
							$coor_line1_fp_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['baja_alta_gar_pfcorr'].'"}';
							$coor_line2_fp_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['baja_alta_gar_pfcorr'].'"}';
							$coor_line1_cap_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['baja_alta_gar_cap'].'"}';
							$coor_line2_cap_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['baja_alta_gar_cap'].'"}';

							// grafico 6
							$coor_line1_fp_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['baja_alta_ust_pfcorr'].'"}';
							$coor_line2_fp_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['baja_alta_ust_pfcorr'].'"}';
							$coor_line1_cap_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['baja_alta_ust_cap'].'"}';
							$coor_line2_cap_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['baja_alta_ust_cap'].'"}';

						}else if($key->fk_equipo_p->devanados==3){//tres devanados
							// grafico 1
							$coor_line1_fp_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['h_gndgar_pfcorr'].'"}';
							$coor_line2_fp_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['h_gndgar_pfcorr'].'"}';
							$coor_line1_cap_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][0]['h_gndgar_cap'].'"}';
							$coor_line2_cap_gf1.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][0]['h_gndgar_cap'].'"}';

							// grafico 2
							$coor_line1_fp_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['h_gar_pfcorr'].'"}';
							$coor_line2_fp_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['h_gar_pfcorr'].'"}';
							$coor_line1_cap_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][1]['h_gar_cap'].'"}';
							$coor_line2_cap_gf2.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][1]['h_gar_cap'].'"}';

							// grafico 3
							$coor_line1_fp_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['h_ust_pfcorr'].'"}';
							$coor_line2_fp_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['h_ust_pfcorr'].'"}';
							$coor_line1_cap_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][2]['h_ust_cap'].'"}';
							$coor_line2_cap_gf3.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][2]['h_ust_cap'].'"}';

							// grafico 4
							$coor_line1_fp_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['x_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['x_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][3]['x_gnd_cap'].'"}';
							$coor_line2_cap_gf4.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][3]['x_gnd_cap'].'"}';

							// grafico 5
							$coor_line1_fp_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['x_gar_pfcorr'].'"}';
							$coor_line2_fp_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['x_gar_pfcorr'].'"}';
							$coor_line1_cap_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][4]['x_gar_cap'].'"}';
							$coor_line2_cap_gf5.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][4]['x_gar_cap'].'"}';

							// grafico 6
							$coor_line1_fp_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['x_ust_pfcorr'].'"}';
							$coor_line2_fp_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['x_ust_pfcorr'].'"}';
							$coor_line1_cap_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][5]['x_ust_cap'].'"}';
							$coor_line2_cap_gf6.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][5]['x_ust_cap'].'"}';

							// grafico 7
							$coor_line1_fp_gf7.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][6]['y_gnd_pfcorr'].'"}';
							$coor_line2_fp_gf7.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][6]['y_gnd_pfcorr'].'"}';
							$coor_line1_cap_gf7.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][6]['y_gnd_cap'].'"}';
							$coor_line2_cap_gf7.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][6]['y_gnd_cap'].'"}';

							// grafico 8
							$coor_line1_fp_gf8.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][7]['y_gar_pfcorr'].'"}';
							$coor_line2_fp_gf8.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][7]['y_gar_pfcorr'].'"}';
							$coor_line1_cap_gf8.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][7]['y_gar_cap'].'"}';
							$coor_line2_cap_gf8.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][7]['y_gar_cap'].'"}';

							// grafico 9
							$coor_line1_fp_gf9.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][8]['y_ust_pfcorr'].'"}';
							$coor_line2_fp_gf9.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][8]['y_ust_pfcorr'].'"}';
							$coor_line1_cap_gf9.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla1'][8]['y_ust_cap'].'"}';
							$coor_line2_cap_gf9.=',{"x":"'.($count_td+1).'", "y":"'.$decode['tabla2'][8]['y_ust_cap'].'"}';
						}
					}
					$count_td++;
				}else if($value->fk_tipo_pruebas==3){
					/****************************************************************************************************/
					//acceder al json y a los valores correspondientes para graficas bushing
					$decode=json_decode($value->datos, true );
					if($count_bush==0){
						if($key->fk_equipo_p->devanados==2){//dos devanados
							// grafico 1
							$coor_line1_bu_fp_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_cap'].'"}';

							// grafico 2
							$coor_line1_bu_fp_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_cap'].'"}';

							// grafico 3
							$coor_line1_bu_fp_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_cap'].'"}';

							// grafico 4
							$coor_line1_bu_fp_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_cap'].'"}';

							// grafico 5
							$coor_line1_bu_fp_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_cap'].'"}';

							// grafico 6
							$coor_line1_bu_fp_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_cap'].'"}';

							// grafico 7
							$coor_line1_bu_fp_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_cap'].'"}';

							// grafico 8
							$coor_line1_bu_fp_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_cap'].'"}';

						}else if($key->fk_equipo_p->devanados==3){//tres devanados
							// grafico 1
							$coor_line1_bu_fp_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf1='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_cap'].'"}';

							// grafico 2
							$coor_line1_bu_fp_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf2='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_cap'].'"}';

							// grafico 3
							$coor_line1_bu_fp_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf3='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_cap'].'"}';

							// grafico 4
							$coor_line1_bu_fp_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf4='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_cap'].'"}';

							// grafico 5
							$coor_line1_bu_fp_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf5='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_cap'].'"}';

							// grafico 6
							$coor_line1_bu_fp_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf6='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_cap'].'"}';

							// grafico 7
							$coor_line1_bu_fp_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf7='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_cap'].'"}';

							// grafico 8
							$coor_line1_bu_fp_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf8='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_cap'].'"}';

							// grafico 9
							$coor_line1_bu_fp_gf9='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf9='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf9='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf9='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c2_cap'].'"}';

							// grafico 10
							$coor_line1_bu_fp_gf10='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf10='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf10='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf10='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c2_cap'].'"}';

							// graficov 11
							$coor_line1_bu_fp_gf11='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf11='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf11='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf11='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c2_cap'].'"}';

							// grafico 12
							$coor_line1_bu_fp_gf12='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf12='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf12='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf12='{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c2_cap'].'"}';
						}
					}else{
						if($key->fk_equipo_p->devanados==2){//dos devanados
							// grafico 1
							$coor_line1_bu_fp_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_cap'].'"}';

							// grafico 2
							$coor_line1_bu_fp_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_cap'].'"}';

							// grafico 3
							$coor_line1_bu_fp_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_cap'].'"}';

							// grafico 4
							$coor_line1_bu_fp_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_cap'].'"}';

							// grafico 5
							$coor_line1_bu_fp_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_cap'].'"}';

							// grafico 6
							$coor_line1_bu_fp_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_cap'].'"}';

							// grafico 7
							$coor_line1_bu_fp_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_cap'].'"}';

							// grafico 8
							$coor_line1_bu_fp_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_cap'].'"}';

						}else if($key->fk_equipo_p->devanados==3){//tres devanados
							// grafico 1
							$coor_line1_bu_fp_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf1.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h0_c2_cap'].'"}';

							// grafico 2
							$coor_line1_bu_fp_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf2.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h1_c2_cap'].'"}';

							// grafico 3
							$coor_line1_bu_fp_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf3.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h2_c2_cap'].'"}';

							// grafico 4
							$coor_line1_bu_fp_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf4.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_h'][0]['h3_c2_cap'].'"}';

							// grafico 5
							$coor_line1_bu_fp_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf5.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x0_c2_cap'].'"}';

							// grafico 6
							$coor_line1_bu_fp_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf6.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x1_c2_cap'].'"}';

							// grafico 7
							$coor_line1_bu_fp_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf7.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x2_c2_cap'].'"}';

							// grafico 8
							$coor_line1_bu_fp_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf8.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_x'][0]['x3_c2_cap'].'"}';

							// grafico 9
							$coor_line1_bu_fp_gf9.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c1_tap'].'"}';
							$coor_line2_bu_fp_gf9.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c2_tap'].'"}';
							$coor_line1_bu_cap_gf9.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c1_cap'].'"}';
							$coor_line2_bu_cap_gf9.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y0_c2_cap'].'"}';

							// grafico 10
							$coor_line1_bu_fp_gf10.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c1_tap'].'"}';
							$coor_line2_bu_fp_gf10.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c2_tap'].'"}';
							$coor_line1_bu_cap_gf10.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c1_cap'].'"}';
							$coor_line2_bu_cap_gf10.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y1_c2_cap'].'"}';

							// graficov 11
							$coor_line1_bu_fp_gf11.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c1_tap'].'"}';
							$coor_line2_bu_fp_gf11.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c2_tap'].'"}';
							$coor_line1_bu_cap_gf11.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c1_cap'].'"}';
							$coor_line2_bu_cap_gf11.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y2_c2_cap'].'"}';

							// grafico 12
							$coor_line1_bu_fp_gf12.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c1_tap'].'"}';
							$coor_line2_bu_fp_gf12.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c2_tap'].'"}';
							$coor_line1_bu_cap_gf12.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c1_cap'].'"}';
							$coor_line2_bu_cap_gf12.=',{"x":"'.($count_bush+1).'", "y":"'.$decode['tabla_y'][0]['y3_c2_cap'].'"}';
						}
					}
					$count_bush++;
				}else if($value->fk_tipo_pruebas==7){
					/****************************************************************************************************/
					//acceder al json y a los valores correspondientes para graficas aislamiento
					$decode=json_decode($value->datos, true );
					if($count_ais==0){
						if($key->fk_equipo_p->devanados==2){//dos devanados
							$coor_line1_hvst_gf1='{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['htierra'].'"}';
							$coor_line1_xvst_gf2='{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['xtierra'].'"}';
							$coor_line1_hvsx_gf3='{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['hx'].'"}';
						}else if($key->fk_equipo_p->devanados==3){//tres devanados
							$coor_line1_yvst_gf4='{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['ytierra'].'"}';
							$coor_line1_hvsy_gf5='{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['hy'].'"}';
							$coor_line1_xvsy_gf6='{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['xy'].'"}';
						}
					}else{
						if($key->fk_equipo_p->devanados==2){//dos devanados
							$coor_line1_hvst_gf1.=',{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['htierra'].'"}';
							$coor_line1_xvst_gf2.=',{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['xtierra'].'"}';
							$coor_line1_hvsx_gf3.=',{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['hx'].'"}';
						}else if($key->fk_equipo_p->devanados==3){//tres devanados
							$coor_line1_yvst_gf4.=',{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['ytierra'].'"}';
							$coor_line1_hvsy_gf5.=',{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['hy'].'"}';
							$coor_line1_xvsy_gf6.=',{"x":"'.($count_ais+1).'", "y":"'.$decode['tabla'][0]['xy'].'"}';
						}
					}
					$count_ais++;
				}else if($value->fk_tipo_pruebas==4){
					/****************************************************************************************************/
					//acceder al json y a los valores correspondientes para graficas corriente excitacion
					$decode=json_decode($value->datos, true );
					$rows=count($decode['tabla1']);
					for ($i=0; $i < $rows; $i++) {
						if(strpos($decode['tabla1'][$i]['resultado'], "MAL")){
							if($count_ext==0){
								$count_ext++;
								$rows_corriente_excitacion='{"prueba":"'.$key->id.
															'", "fecha":"'.$key->fecha.
															'", "tap":"'.$decode['tabla1'][$i]['tap'].
															'", "h1":"'.$decode['tabla1'][$i]['a'].
															'", "h3":"'.$decode['tabla1'][$i]['c'].
															'", "res":"'.$decode['tabla1'][$i]['resultado'].'"}';
							}else{
								$rows_corriente_excitacion.=',{"prueba":"'.$key->id.
															'", "fecha":"'.$key->fecha.
															'", "tap":"'.$decode['tabla1'][$i]['tap'].
															'", "h1":"'.$decode['tabla1'][$i]['a'].
															'", "h3":"'.$decode['tabla1'][$i]['c'].
															'", "res":"'.$decode['tabla1'][$i]['resultado'].'"}';
							}
						}
					}
				}else if($value->fk_tipo_pruebas==5){
					/****************************************************************************************************/
					//acceder al json y a los valores correspondientes para graficas relacion de transformacion
					$decode=json_decode($value->datos, true );
					$tablas=count($decode['tablas']);
					for ($t=0; $t < $tablas; $t++) {
						$rows=count($decode['tablas'][$t]['filas']);
						for ($i=0; $i < $rows; $i++) {

							if($decode['tablas'][$t]['filas'][$i]['t_ratio1']=='NO ACEPTABLE' || 
							   $decode['tablas'][$t]['filas'][$i]['t_ratio2']=='NO ACEPTABLE' || 
							   $decode['tablas'][$t]['filas'][$i]['t_ratio3']=='NO ACEPTABLE'){
							   	if($count_rel_tranfs==0){
									$count_rel_tranfs++;
									$rows_rel_tranfs='{"prueba":"'.$key->id.
													'", "fecha":"'.$key->fecha.
													'", "tabla":"'.$decode['tablas'][$t]['combinacion'].
													'", "tap1":"'.$decode['tablas'][$t]['filas'][$i]['tap1'].
													'", "hvolt":"'.$decode['tablas'][$t]['filas'][$i]['hvolt'].
													'", "xvolt":"'.$decode['tablas'][$t]['filas'][$i]['xvolt'].
													'", "calculado":"'.$decode['tablas'][$t]['filas'][$i]['calculado'].
													'", "ratio1":"'.$decode['tablas'][$t]['filas'][$i]['ratio1'].
													'", "ratio2":"'.$decode['tablas'][$t]['filas'][$i]['ratio2'].
													'", "ratio3":"'.$decode['tablas'][$t]['filas'][$i]['ratio3'].
													'", "minlim":"'.$decode['tablas'][$t]['filas'][$i]['minlim'].
													'", "maxlim":"'.$decode['tablas'][$t]['filas'][$i]['maxlim'].
													'", "t_ratio1":"'.$decode['tablas'][$t]['filas'][$i]['t_ratio1'].
													'", "t_ratio2":"'.$decode['tablas'][$t]['filas'][$i]['t_ratio2'].
													'", "t_ratio3":"'.$decode['tablas'][$t]['filas'][$i]['t_ratio3'].'"}';
								}else{
									$rows_rel_tranfs.=',{"prueba":"'.$key->id.
													'", "fecha":"'.$key->fecha.
													'", "tabla":"'.$decode['tablas'][$t]['combinacion'].
													'", "tap1":"'.$decode['tablas'][$t]['filas'][$i]['tap1'].
													'", "hvolt":"'.$decode['tablas'][$t]['filas'][$i]['hvolt'].
													'", "xvolt":"'.$decode['tablas'][$t]['filas'][$i]['xvolt'].
													'", "calculado":"'.$decode['tablas'][$t]['filas'][$i]['calculado'].
													'", "ratio1":"'.$decode['tablas'][$t]['filas'][$i]['ratio1'].
													'", "ratio2":"'.$decode['tablas'][$t]['filas'][$i]['ratio2'].
													'", "ratio3":"'.$decode['tablas'][$t]['filas'][$i]['ratio3'].
													'", "minlim":"'.$decode['tablas'][$t]['filas'][$i]['minlim'].
													'", "maxlim":"'.$decode['tablas'][$t]['filas'][$i]['maxlim'].
													'", "t_ratio1":"'.$decode['tablas'][$t]['filas'][$i]['t_ratio1'].
													'", "t_ratio2":"'.$decode['tablas'][$t]['filas'][$i]['t_ratio2'].
													'", "t_ratio3":"'.$decode['tablas'][$t]['filas'][$i]['t_ratio3'].'"}';
								}
							}
						}
					}
				}else if($value->fk_tipo_pruebas==6){
					/****************************************************************************************************/
					//acceder al json y a los valores correspondientes para graficas relacion de transformacion
					$decode=json_decode($value->datos, true );
					$tablas=count($decode['tablas']);
					for ($t=0; $t < $tablas; $t++) {
						$rows=count($decode['tablas'][$t]['filas']);
						for ($i=0; $i < $rows; $i++) {

							if($decode['tablas'][$t]['filas'][$i]['b1']!='OK' || 
							   $decode['tablas'][$t]['filas'][$i]['b2']!='OK' || 
							   $decode['tablas'][$t]['filas'][$i]['b3']!='OK'){
							   	if($count_resd==0){
									$count_resd++;
									$rows_resd='{"prueba":"'.$key->id.
											'", "fecha":"'.$key->fecha.
											'", "devanado":"'.$decode['tablas'][$t]['devanado'].
											'", "tap":"'.$decode['tablas'][$t]['filas'][$i]['tap'].
											'", "f1_medido":"'.$decode['tablas'][$t]['filas'][$i]['f1_medido'].
											'", "f1_adj":"'.$decode['tablas'][$t]['filas'][$i]['f1_adj'].
											'", "f1_corregido":"'.$decode['tablas'][$t]['filas'][$i]['f1_corregido'].
											'", "f2_medido":"'.$decode['tablas'][$t]['filas'][$i]['f2_medido'].
											'", "f2_adj":"'.$decode['tablas'][$t]['filas'][$i]['f2_adj'].
											'", "f2_corregido":"'.$decode['tablas'][$t]['filas'][$i]['f2_corregido'].
											'", "f3_medido":"'.$decode['tablas'][$t]['filas'][$i]['f3_medido'].
											'", "f3_adj":"'.$decode['tablas'][$t]['filas'][$i]['f3_adj'].
											'", "f3_corregido":"'.$decode['tablas'][$t]['filas'][$i]['f3_corregido'].
											'", "vcorregido":"'.$decode['tablas'][$t]['filas'][$i]['vcorregido'].
											'", "b1":"'.$decode['tablas'][$t]['filas'][$i]['b1'].
											'", "b2":"'.$decode['tablas'][$t]['filas'][$i]['b2'].
											'", "b3":"'.$decode['tablas'][$t]['filas'][$i]['b3'].
											'", "p_b1":"'.$decode['tablas'][$t]['filas'][$i]['p_b1'].
											'", "p_b2":"'.$decode['tablas'][$t]['filas'][$i]['p_b2'].
											'", "p_b3":"'.$decode['tablas'][$t]['filas'][$i]['p_b3'].'"}';
								}else{
									$rows_resd.=',{"prueba":"'.$key->id.
											'", "fecha":"'.$key->fecha.
											'", "devanado":"'.$decode['tablas'][$t]['devanado'].
											'", "tap":"'.$decode['tablas'][$t]['filas'][$i]['tap'].
											'", "f1_medido":"'.$decode['tablas'][$t]['filas'][$i]['f1_medido'].
											'", "f1_adj":"'.$decode['tablas'][$t]['filas'][$i]['f1_adj'].
											'", "f1_corregido":"'.$decode['tablas'][$t]['filas'][$i]['f1_corregido'].
											'", "f2_medido":"'.$decode['tablas'][$t]['filas'][$i]['f2_medido'].
											'", "f2_adj":"'.$decode['tablas'][$t]['filas'][$i]['f2_adj'].
											'", "f2_corregido":"'.$decode['tablas'][$t]['filas'][$i]['f2_corregido'].
											'", "f3_medido":"'.$decode['tablas'][$t]['filas'][$i]['f3_medido'].
											'", "f3_adj":"'.$decode['tablas'][$t]['filas'][$i]['f3_adj'].
											'", "f3_corregido":"'.$decode['tablas'][$t]['filas'][$i]['f3_corregido'].
											'", "vcorregido":"'.$decode['tablas'][$t]['filas'][$i]['vcorregido'].
											'", "b1":"'.$decode['tablas'][$t]['filas'][$i]['b1'].
											'", "b2":"'.$decode['tablas'][$t]['filas'][$i]['b2'].
											'", "b3":"'.$decode['tablas'][$t]['filas'][$i]['b3'].
											'", "p_b1":"'.$decode['tablas'][$t]['filas'][$i]['p_b1'].
											'", "p_b2":"'.$decode['tablas'][$t]['filas'][$i]['p_b2'].
											'", "p_b3":"'.$decode['tablas'][$t]['filas'][$i]['p_b3'].'"}';
							}
							}
						}
					}
				}
			}
		}
		$json_td2='{'.
				  '"td": ['.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf1.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf1.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf2.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf2.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf3.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf3.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf4.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf4.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf5.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf5.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf6.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf6.']'.
				        '}'.
				      ']'.
				    '}'.
				  ']'.
				'}';
		$json_td3='{'.
				  '"td": ['.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf1.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf1.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf2.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf2.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf3.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf3.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf4.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf4.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf5.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf5.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf6.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf6.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf7.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf7.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf7.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf7.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf8.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf8.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf8.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf8.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_fp_gf9.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_fp_gf9.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_cap_gf9.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_cap_gf9.']'.
				        '}'.
				      ']'.
				    '}'.
				  ']'.
				'}';
		/*****************************************************************************************************/
		$json_bush2='{'.
				  '"bu": ['.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf1.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf1.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf2.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf2.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf3.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf3.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf4.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf4.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf5.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf5.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf6.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf6.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf7.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf7.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf7.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf7.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf8.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf8.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf8.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf8.']'.
				        '}'.
				      ']'.
				    '}'.
				  ']'.
				'}';
		$json_bush3='{'.
				  '"bu": ['.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf1.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf1.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf1.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf2.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf2.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf2.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf3.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf3.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf3.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf4.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf4.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf4.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf5.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf5.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf5.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf6.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf6.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf6.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf7.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf7.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf7.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf7.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf8.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf8.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf8.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf8.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf9.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf9.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf9.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf9.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf10.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf10.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf10.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf10.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf11.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf11.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf11.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf11.']'.
				        '}'.
				      ']'.
				    '},'.
				    '{'.
				      '"fp": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_fp_gf12.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_fp_gf12.']'.
				        '}'.
				      '],'.
				      '"cap": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_bu_cap_gf12.']'.
				        '},'.
				        '{'.
				          '"coordenadas": ['.$coor_line2_bu_cap_gf12.']'.
				        '}'.
				      ']'.
				    '}'.
				  ']'.
				'}';
		$json_ais='{'.
				  '"ais": ['.
				    '{'.
				      '"htierra": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_hvst_gf1.']'.
				        '}'.
				      '],'.
				      '"xtierra": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_xvst_gf2.']'.
				        '}'.
				      '],'.
				      '"hx": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_hvsx_gf3.']'.
				        '}'.
				      '],'.
				      '"ytierra": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_yvst_gf4.']'.
				        '}'.
				      '],'.
				      '"hy": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_hvsy_gf5.']'.
				        '}'.
				      '],'.
				      '"xy": ['.
				        '{'.
				          '"coordenadas": ['.$coor_line1_xvsy_gf6.']'.
				        '}'.
				      ']'.
				    '}'.
				  ']'.
				'}';
		$json_ext='['.$rows_corriente_excitacion.']';
		$json_rel_tranfs='['.$rows_rel_tranfs.']';
		$json_resd='['.$rows_resd.']';
		$this -> render('graficos', array(
										'pruebas' => $pruebas,
										'enclaves' => $enclaves,
										'equipo' => $equipo,
										'json_td2' => $json_td2,
										'json_td3' => $json_td3,
										'json_bush2' => $json_bush2,
										'json_bush3' => $json_bush3,
										'json_ais'=>$json_ais,
										'json_ext'=>$json_ext,
										'json_rel_tranfs'=>$json_rel_tranfs,
										'json_resd'=>$json_resd,
									));
	}
}






