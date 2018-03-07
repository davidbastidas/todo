<?php

class PruebasController extends Controller
{
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
				'actions'=>array('index', 'subestacion', 'ListaEquipos', 'EscogerPruebas', 'CrearPrueba', 'ListarPrueba',
								 'AbrirTipoPrueba', 'ActualizarTipoPrueba', 'ActualizarDatosPrueba', 'SubirFoto', 'BuscarFotos', 
								 'EliminarFoto', 'Ubicacion', 'Equipos', 'EliminarPrueba',),

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
	public function actionUbicacion(){
		$odt=0;
		if(isset($_POST['odt'])){
			$odt=$_POST['odt'];
		}
		$ubicacion = Ubicacion::model()->findAll();
		$tipo_servicio = TipoServicio::model()->findAll();
		$this -> render('subestacion', array('ubicacion' => $ubicacion, 'tipo_servicio'=>$tipo_servicio, 'odt'=>$odt));
	}
	public function actionSubestacion(){//aqui se despliega lo de la accion nueva prueba
		$subestaciones = SubEstacion::model()->findAll("fk_ubicacion=".$_POST['zona']." ORDER BY nombre");
		$res=$this->renderPartial('_subestacion', array(
				'subestaciones' => $subestaciones,
			), true);
		echo CJSON::encode(array(
            'response' => $res,
        ));
	}
	public function actionEquipos(){
		$categoria='';
		if($_POST['categoria']==1){
			$categoria=" AND fk_categoria=1";
		}else if($_POST['categoria']==2){
			$categoria=" AND fk_categoria=2";
		}else if($_POST['categoria']==3){
			$categoria=" AND fk_categoria=3";
		}else if($_POST['categoria']==4){
			$categoria=" AND fk_categoria=4";
		}
		$equipos = Equipos::model()->findAll("fk_sub_estacion=".$_POST['subestacion'].$categoria);
		$res=$this->renderPartial('_equipos', array(
				'equipos' => $equipos,
			), true);
		echo CJSON::encode(array(
            'response' => $res,
        ));
	}
	public function actionListaEquipos($id){
		//$id es id de subestacion
		$equipos = Equipos::model()->findAll("fk_sub_estacion=".$id);
		$this -> render('equipos', array('equipos' => $equipos, ));
	}
	public function actionEscogerPruebas($id, $odt=0){
		#id es el tipo de prueba a realizar
		//consultar la odt y traer el equipo
		$modelOdt=Odt::model()->findByPk($odt);

		//con esta funcion se puede mostrar la lista para agregarle mas pruebas
		$categoria=Equipos::model()->findByPk($modelOdt->fk_equipo)->fk_categoria;
		$tipo_pruebas = array();
		if($categoria==1){
			$tipo_pruebas = TipoPruebas::model()->findAll("id=1 OR id=2 OR id=3 OR id=4 OR id=5 OR id=6 OR id=7");
		}else if($categoria==2){
			$tipo_pruebas = TipoPruebas::model()->findAll("id=7 OR id=8 OR id=2 OR id=9 OR id=10");
		}else if($categoria==3){
			$tipo_pruebas = TipoPruebas::model()->findAll("id=5 OR id=6 OR id=7 OR id=4 OR id=1 OR id=2");
		}else if($categoria==4){
			$tipo_pruebas = TipoPruebas::model()->findAll("id=5 OR id=1 OR id=7 OR id=2");
		}
		$this -> render('tipo_pruebas', array('tipo_pruebas' => $tipo_pruebas, 'equipo' => $modelOdt->fk_equipo, 'tp' => $id, 'odt' => $odt,));
	}
	public function actionCrearPrueba(){
		$equipo=$_POST['equipo'];
		$json=json_decode(stripslashes($_POST['json']));
		$count=count($json);
		$createCommand = Yii::app()->db->createCommand();
		date_default_timezone_set('America/Bogota');
        $fecha_servidor = date("Y-m-d");
        $hora_servidor = date("H:i:s");
        $createCommand->insert('pruebas', array(
            'fk_equipos' => $equipo,
            'fk_usuario' => Yii::app()->user->id,
            'fecha' => $_POST['fecha'],
            'hora' => $hora_servidor,
            'fk_estado' => 1,
            'fk_tipo_servicio' => $_POST['tp'],
            'fk_odt' => $_POST['odt'],
        ));
        $last_insert = Yii::app()->db->getLastInsertID();
		for ($i=0; $i < $count; $i++) {
	        
	        $createCommand->insert('datos_pruebas', array(
	            'fk_tipo_pruebas' => $json[$i],
	            'fk_usuario' => Yii::app()->user->id,
	            'fecha' => $fecha_servidor,
	            'hora' => $hora_servidor,
	            'fk_estado' => 1,
	            'fk_pruebas' => $last_insert,
	        ));
		}
		echo CJSON::encode(array(
            'respuesta' => "",
            'last_insert' => $last_insert,
        ));
	}
	public function actionListarPrueba($id){
		//$id es el id de la prueba creada
		//desde aqui se pueden recibir el id de prueba y listar 
		//las pruebas desde consultas en caso de seguir modificando
		$datos_pruebas = DatosPruebas::model()->findAll("fk_pruebas=".$id);
		$model_prueba = Pruebas::model()->findByPk($id);
		$model_equipo = Equipos::model()->findByPk($model_prueba->fk_equipos);
		if($model_equipo->fk_categoria==1){
			$devanado = $model_equipo->devanados;
			$fotos = FotosPruebas::model()->findAll("fk_pruebas=".$model_prueba->id);
	        $res=$this->renderPartial('partial/fotos', array(
					'fotos' => $fotos,
				), true);
			$this -> render('listado_pruebas', array('datos_pruebas' => $datos_pruebas, 'devanado' => $devanado, 'fk_prueba' => $id,
													 'datosjson' => $model_prueba->datos, 'estado' => $model_prueba->fk_estado, 'fotos' => $res, 
													 'n_fotos' => count($fotos), 'odt' => $model_prueba->fk_odt));
		}else if($model_equipo->fk_categoria==2){
			$fotos = FotosPruebas::model()->findAll("fk_pruebas=".$model_prueba->id);
	        $res=$this->renderPartial('partial/fotos', array(
					'fotos' => $fotos,
				), true);
			$this -> render('interruptor_potencia/listado_pruebas', array('datos_pruebas' => $datos_pruebas, 'fk_prueba' => $id,
													 'datosjson' => $model_prueba->datos, 'estado' => $model_prueba->fk_estado, 'fotos' => $res, 
													 'n_fotos' => count($fotos), 'equipojson' => $model_equipo->datosjson, 
													 'odt' => $model_prueba->fk_odt));
		}else if($model_equipo->fk_categoria==3){
			$fotos = FotosPruebas::model()->findAll("fk_pruebas=".$model_prueba->id);
	        $res=$this->renderPartial('partial/fotos', array(
					'fotos' => $fotos,
				), true);
			$this -> render('trafo_corriente/listado_pruebas', array('datos_pruebas' => $datos_pruebas, 'fk_prueba' => $id,
													 'datosjson' => $model_prueba->datos, 'estado' => $model_prueba->fk_estado, 'fotos' => $res, 
													 'n_fotos' => count($fotos), 'equipojson' => $model_equipo->datosjson,
													 'odt' => $model_prueba->fk_odt));
		}else if($model_equipo->fk_categoria==4){
			$fotos = FotosPruebas::model()->findAll("fk_pruebas=".$model_prueba->id);
	        $res=$this->renderPartial('partial/fotos', array(
					'fotos' => $fotos,
				), true);
			$this -> render('trafo_potencia/listado_pruebas', array('datos_pruebas' => $datos_pruebas, 'fk_prueba' => $id,
													 'datosjson' => $model_prueba->datos, 'estado' => $model_prueba->fk_estado, 'fotos' => $res, 
													 'n_fotos' => count($fotos), 'equipojson' => $model_equipo->datosjson,
													 'odt' => $model_prueba->fk_odt));
		}
		
	}
	public function actionAbrirTipoPrueba($id){
		//$id es el id de la tabla datos_prueba
		$model_datos = DatosPruebas::model()->findByPk($id);
		$model_prueba = Pruebas::model()->findByPk($model_datos->fk_pruebas);
		$model_equipo = Equipos::model()->findByPk($model_prueba->fk_equipos);
		if($model_equipo->fk_categoria==1){
			$devanado = $model_equipo->devanados;
			if($model_datos->fk_tipo_pruebas==1){
				//tangente delta
				if($devanado==2){
					$this -> render('pruebas/tangente_delta_dev2', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
				}else{
					$this -> render('pruebas/tangente_delta_dev3', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
				}
			} else if($model_datos->fk_tipo_pruebas==2){
				//collar caliente
				if($devanado==2){
					$this -> render('pruebas/collar_caliente_dev2', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
				}else{
					$this -> render('pruebas/collar_caliente_dev3', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
				}
			} else if($model_datos->fk_tipo_pruebas==3){
				//bushing
				if($devanado==2){
					$this -> render('pruebas/bushing_dev2', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
				}else{
					$this -> render('pruebas/bushing_dev3', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
				}
			} else if($model_datos->fk_tipo_pruebas==4){
				//corriente excitacion
				$this -> render('pruebas/corrienteex_dev2', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			} else if($model_datos->fk_tipo_pruebas==5){
				//relacion transformacion
				$this -> render('pruebas/relacion_transformacion_dev2', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			} else if($model_datos->fk_tipo_pruebas==6){
				//resistencia devanado
				$this -> render('pruebas/resistencia_devanado', array('model_datos' => $model_datos, 'devanados' => $devanado, 
																	  'temperaturas' => $model_prueba->datos, 'estado' => $model_prueba->fk_estado,));
			} else if($model_datos->fk_tipo_pruebas==7){
				//resistencia de aislamiento
				$this -> render('pruebas/resistencia_aislamiento_dev2', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado, 'devanados'=>$devanado));
			}
		}else if($model_equipo->fk_categoria==2){//interruptor potencia
			if($model_datos->fk_tipo_pruebas==2){
				//collar caliente
				$this -> render('interruptor_potencia/pruebas/collar_caliente', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==8){
				//factor disipacion
				$this -> render('interruptor_potencia/pruebas/factor_disipacion', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==7){
				//resistencia aislamiento
				$this -> render('interruptor_potencia/pruebas/resistencia_aislamiento', array(
																					'model_datos' => $model_datos, 
																					'estado' => $model_prueba->fk_estado,
																					'temperaturas' => $model_prueba->datos,
																					'datosjson' => $model_equipo->datosjson,));
			}else if($model_datos->fk_tipo_pruebas==10){
				//resistencia de contactos
				$this -> render('interruptor_potencia/pruebas/resistencia_contacto', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==9){
				//pruebas dinamicas
				$this -> render('interruptor_potencia/pruebas/pruebas_dinamicas', array(
																					'model_datos' => $model_datos, 
																					'estado' => $model_prueba->fk_estado,
																					'datosjson' => $model_equipo->datosjson,));
			}
		}else if($model_equipo->fk_categoria==3){//transformador de corriente
			if($model_datos->fk_tipo_pruebas==5){
				//relacion de transformacion
				$this -> render('trafo_corriente/pruebas/relacion_transformacion', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==6){
				//resistencia de devanado
				$this -> render('trafo_corriente/pruebas/resistencia_devanado', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==7){
				//resistencia aislamiento
				$this -> render('trafo_corriente/pruebas/resistencia_aislamiento', array(
																					'model_datos' => $model_datos, 
																					'estado' => $model_prueba->fk_estado,
																					'temperaturas' => $model_prueba->datos,
																					'datosjson' => $model_equipo->datosjson,));
			}else if($model_datos->fk_tipo_pruebas==4){
				//corriente de exitacion
				$this -> render('trafo_corriente/pruebas/corriente_exitacion', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==1){
				//tangente delta
				$this -> render('trafo_corriente/pruebas/tangente_delta', array(
																				'model_datos' => $model_datos, 
																				'estado' => $model_prueba->fk_estado,
																				'datosjson' => $model_equipo->datosjson,));
			}else if($model_datos->fk_tipo_pruebas==2){
				//collar caliente
				$this -> render('trafo_corriente/pruebas/collar_caliente', array(
																				'model_datos' => $model_datos, 
																				'estado' => $model_prueba->fk_estado,
																				'datosjson' => $model_equipo->datosjson,));
			}
		}else if($model_equipo->fk_categoria==4){//transformador de corriente
			if($model_datos->fk_tipo_pruebas==5){
				//relacion de transformacion
				$this -> render('trafo_potencia/pruebas/relacion_transformacion', array('model_datos' => $model_datos, 'estado' => $model_prueba->fk_estado,));
			}else if($model_datos->fk_tipo_pruebas==7){
				//resistencia aislamiento
				$this -> render('trafo_potencia/pruebas/resistencia_aislamiento', array(
																					'model_datos' => $model_datos, 
																					'estado' => $model_prueba->fk_estado,
																					'temperaturas' => $model_prueba->datos,
																					'datosjson' => $model_equipo->datosjson,));
			}else if($model_datos->fk_tipo_pruebas==1){
				//tangente delta
				$this -> render('trafo_potencia/pruebas/tangente_delta', array(
																				'model_datos' => $model_datos, 
																				'estado' => $model_prueba->fk_estado,
																				'datosjson' => $model_equipo->datosjson,));
			}else if($model_datos->fk_tipo_pruebas==2){
				//collar caliente
				$this -> render('trafo_potencia/pruebas/collar_caliente', array(
																				'model_datos' => $model_datos, 
																				'estado' => $model_prueba->fk_estado,
																				'datosjson' => $model_equipo->datosjson,));
			}
		}
	}
	public function actionActualizarTipoPrueba(){
		$createCommand = Yii::app()->db->createCommand();
        $update = $createCommand->update('datos_pruebas', array(
            'datos' => $_POST['json'],
            'fk_estado' => 4,
                ), 'id=:id', array(':id' => $_POST['id']));
        $t="";
		foreach($_FILES as $nombre_campo => $valor){
			$t.=$nombre_campo."; ";
			$nombre_archivo = $_FILES[$nombre_campo]['name'];
	        //$tipo_archivo = $_FILES['archivo']['type'];
	        //$tamano_archivo = $_FILES['archivo']['size'];
	        $tmp_archivo = $_FILES[$nombre_campo]['tmp_name'];

	        //$nameProyect = Yii::app() -> params['nameproyect'];
	        $pre_ruta_fotos="";
	        if(isset($_POST['fotoequipo'])){
	        	$pre_ruta_fotos=Yii::app()->params['ruta_fotos_corriente_exitacion_tc'];
	        }else{
	        	$pre_ruta_fotos=Yii::app()->params['ruta_fotos_interruptor_potencia'];
	        }
	        $ruta_fotos = $pre_ruta_fotos.$_POST['id'].'/'.$nombre_archivo;
	        if (!file_exists($pre_ruta_fotos.$_POST['id'])) {
			    mkdir($pre_ruta_fotos.$_POST['id'], 0777, true);
			}
			move_uploaded_file($tmp_archivo, $ruta_fotos);
		}
		echo CJSON::encode(array(
            'respuesta' => $t,
            'update' => $update,
        ));
	}
	public function actionActualizarDatosPrueba(){
		//actualiza los datos para la prueba principal, datos como temperatura
		$createCommand = Yii::app()->db->createCommand();
        $update = $createCommand->update('pruebas', array(
            'datos' => $_POST['json'],
            'fk_estado' => 4,
                ), 'id=:id', array(':id' => $_POST['idprueba']));
        echo CJSON::encode(array(
            'respuesta' => "",
            'update' => $update,
        ));
		
	}
	public function actionSubirFoto() {
		$idPrueba=$_POST['prueba'];
        $nombre_archivo = $_FILES['archivo']['name'];
        //$tipo_archivo = $_FILES['archivo']['type'];
        //$tamano_archivo = $_FILES['archivo']['size'];
        $tmp_archivo = $_FILES['archivo']['tmp_name'];

        //$nameProyect = Yii::app() -> params['nameproyect'];
        $ruta_informes = Yii::app()->params['ruta_fotos'].$idPrueba.'/'.$nombre_archivo;
        if (!file_exists(Yii::app()->params['ruta_fotos'].$idPrueba)) {
		    mkdir(Yii::app()->params['ruta_fotos'].$idPrueba, 0777, true);
		}
        $insert_foto=0;
        if (!move_uploaded_file($tmp_archivo, $ruta_informes)) {
            echo 'Error subiendo el archivo.';
        } else {
        	$createCommand = Yii::app()->db->createCommand();
	        $insert_foto=$createCommand->insert('fotos_pruebas', array(
	            'nombre' => $nombre_archivo,
	            'fk_pruebas' => $idPrueba,
	        ));
        }
        echo $insert_foto;

    }
    public function actionBuscarFotos() {
		$idPrueba=$_POST['prueba'];
		$fotos = FotosPruebas::model()->findAll("fk_pruebas=".$idPrueba);
        $res=$this->renderPartial('partial/fotos', array(
				'fotos' => $fotos,
			), true);
        echo CJSON::encode(array(
            'respuesta' => $res,
        ));

    }
    public function actionEliminarFoto() {
		$foto=$_POST['foto'];
		$fotos = FotosPruebas::model()->findByPk($foto);
		$createCommand = Yii::app()->db->createCommand();
        $delete_foto=$createCommand->delete('fotos_pruebas', 
        	'id=:id', 
        	array(':id'=>$foto)
        );
        $ruta_dir = Yii::app()->params['ruta_fotos'].$fotos->fk_pruebas;
        $ruta_informes = Yii::app()->params['ruta_fotos'].$fotos->fk_pruebas.'/'.$fotos->nombre;
		unlink($ruta_informes);
		
        echo CJSON::encode(array(
            'respuesta' => $delete_foto,
            'ruta' => $ruta_informes,
        ));

    }
    public function actionEliminarPrueba() {
     	//se deshabilita
		$createCommand = Yii::app()->db->createCommand();
		$delete = $createCommand->update('pruebas', array(
            'fk_estado' => 5,
                ), 'id=:id', array(':id' => $_POST['id']));
		
        echo CJSON::encode(array(
            'respuesta' => $delete,
        ));

    }
}






