<?php

/**
 * This is the model class for table "info_personas".
 *
 * The followings are the available columns in table 'info_personas':
 * @property integer $id
 * @property string $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $ciudad
 * @property string $direccion
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property string $licencia_conducir
 * @property string $rango_titulo
 * @property string $nombre_titulo
 * @property string $fecha_titulo
 * @property string $institucion
 * @property string $mat_prof
 * @property string $rh
 * @property string $contacto_emergencia
 * @property string $telefono_contacto
 * @property string $talla_camisa
 * @property string $talla_pantalon
 * @property string $talla_zapato
 * @property string $cargo
 * @property integer $telefono_corp
 * @property integer $pc_corp
 * @property string $id_sap
 * @property string $ceco
 * @property integer $pep
 * @property string $tipo_contrato
 * @property string $contratante
 * @property string $eps
 * @property string $arl
 * @property string $salario_base
 * @property string $bono_fijo
 * @property string $fecha_ingreso
 * @property string $foto
 * @property string $hoja_vida
 * @property string $estado
 * @property string $fecha_creacion
 *
 * The followings are the available model relations:
 * @property InfoComputadores $pcCorp
 * @property InfoPep $pep0
 * @property InfoTelefonos $telefonoCorp
 */
class InfoPersonas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoPersonas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'info_personas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula, nombres, apellidos, ciudad, direccion, telefono, celular, correo, licencia_conducir, rango_titulo, nombre_titulo, fecha_titulo, institucion, mat_prof, rh, contacto_emergencia, telefono_contacto, talla_camisa, talla_pantalon, talla_zapato, cargo, telefono_corp, pc_corp, id_sap, ceco, pep, tipo_contrato, contratante, eps, arl, foto, estado', 'required'),
			array('telefono_corp, pc_corp, pep', 'numerical', 'integerOnly'=>true),
			array('cedula, salario_base, bono_fijo', 'length', 'max'=>20),
			array('nombres, apellidos, ciudad, direccion, telefono, celular, correo, licencia_conducir, rango_titulo, nombre_titulo, fecha_titulo, institucion, mat_prof, rh, contacto_emergencia, telefono_contacto, talla_camisa, talla_pantalon, talla_zapato, cargo, id_sap, ceco, tipo_contrato, contratante, eps, arl, foto, hoja_vida, estado', 'length', 'max'=>50),
			array('fecha_ingreso', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cedula, nombres, apellidos, ciudad, direccion, telefono, celular, correo, licencia_conducir, rango_titulo, nombre_titulo, fecha_titulo, institucion, mat_prof, rh, contacto_emergencia, telefono_contacto, talla_camisa, talla_pantalon, talla_zapato, cargo, telefono_corp, pc_corp, id_sap, ceco, pep, tipo_contrato, contratante, eps, arl, salario_base, bono_fijo, fecha_ingreso, foto, estado, fecha_creacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pcCorp' => array(self::BELONGS_TO, 'InfoComputadores', 'pc_corp'),
			'pep0' => array(self::BELONGS_TO, 'InfoPep', 'pep'),
			'telefonoCorp' => array(self::BELONGS_TO, 'InfoTelefonos', 'telefono_corp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cedula' => 'Cedula',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'ciudad' => 'Ciudad',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'correo' => 'Correo',
			'licencia_conducir' => 'Licencia Conducir',
			'rango_titulo' => 'Rango Titulo',
			'nombre_titulo' => 'Nombre Titulo',
			'fecha_titulo' => 'Fecha Titulo',
			'institucion' => 'Institucion',
			'mat_prof' => 'Mat Prof',
			'rh' => 'Rh',
			'contacto_emergencia' => 'Contacto Emergencia',
			'telefono_contacto' => 'Telefono Contacto',
			'talla_camisa' => 'Talla Camisa',
			'talla_pantalon' => 'Talla Pantalon',
			'talla_zapato' => 'Talla Zapato',
			'cargo' => 'Cargo',
			'telefono_corp' => 'Telefono Corp',
			'pc_corp' => 'Pc Corp',
			'id_sap' => 'Id Sap',
			'ceco' => 'Ceco',
			'pep' => 'Pep',
			'tipo_contrato' => 'Tipo Contrato',
			'contratante' => 'Contratante',
			'eps' => 'Eps',
			'arl' => 'Arl',
			'salario_base' => 'Salario Base',
			'bono_fijo' => 'Bono Fijo',
			'fecha_ingreso' => 'Fecha Ingreso',
			'foto' => 'Foto',
			'hoja_vida' => 'Hoja Vida',
			'estado' => 'Estado',
			'fecha_creacion' => 'Fecha Creacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('licencia_conducir',$this->licencia_conducir,true);
		$criteria->compare('rango_titulo',$this->rango_titulo,true);
		$criteria->compare('nombre_titulo',$this->nombre_titulo,true);
		$criteria->compare('fecha_titulo',$this->fecha_titulo,true);
		$criteria->compare('institucion',$this->institucion,true);
		$criteria->compare('mat_prof',$this->mat_prof,true);
		$criteria->compare('rh',$this->rh,true);
		$criteria->compare('contacto_emergencia',$this->contacto_emergencia,true);
		$criteria->compare('telefono_contacto',$this->telefono_contacto,true);
		$criteria->compare('talla_camisa',$this->talla_camisa,true);
		$criteria->compare('talla_pantalon',$this->talla_pantalon,true);
		$criteria->compare('talla_zapato',$this->talla_zapato,true);
		$criteria->compare('cargo',$this->cargo,true);
		$criteria->compare('telefono_corp',$this->telefono_corp);
		$criteria->compare('pc_corp',$this->pc_corp);
		$criteria->compare('id_sap',$this->id_sap,true);
		$criteria->compare('ceco',$this->ceco,true);
		$criteria->compare('pep',$this->pep);
		$criteria->compare('tipo_contrato',$this->tipo_contrato,true);
		$criteria->compare('contratante',$this->contratante,true);
		$criteria->compare('eps',$this->eps,true);
		$criteria->compare('arl',$this->arl,true);
		$criteria->compare('salario_base',$this->salario_base,true);
		$criteria->compare('bono_fijo',$this->bono_fijo,true);
		$criteria->compare('fecha_ingreso',$this->fecha_ingreso,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('hoja_vida',$this->hoja_vida,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}