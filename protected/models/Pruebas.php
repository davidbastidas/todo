<?php

/**
 * This is the model class for table "pruebas".
 *
 * The followings are the available columns in table 'pruebas':
 * @property integer $id
 * @property string $nombre
 * @property integer $fk_equipos
 * @property string $fecha
 * @property string $hora
 * @property integer $fk_usuario
 * @property integer $fk_estado
 * @property string $datos
 * @property string $nombre_informe
 * @property string $datos_informe
 * @property integer $fk_tipo_servicio
 *
 * The followings are the available model relations:
 * @property DatosPruebas[] $datosPruebases
 * @property FotosPruebas[] $fotosPruebases
 * @property TipoServicio $fkTipoServicio
 * @property Equipos $fkEquipos
 * @property Estado $fkEstado
 * @property Usuarios $fkUsuario
 */
class Pruebas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pruebas the static model class
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
		return 'pruebas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_equipos, fecha, hora, fk_usuario, fk_estado, fk_tipo_servicio', 'required'),
			array('fk_equipos, fk_usuario, fk_estado, fk_tipo_servicio', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>45),
			array('nombre_informe', 'length', 'max'=>100),
			array('datos, datos_informe', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fk_equipos, fecha, hora, fk_usuario, fk_estado, datos, nombre_informe, datos_informe, fk_tipo_servicio', 'safe', 'on'=>'search'),
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
			'datosPruebases' => array(self::HAS_MANY, 'DatosPruebas', 'fk_pruebas'),
			'fotosPruebases' => array(self::HAS_MANY, 'FotosPruebas', 'fk_pruebas'),
			'fk_tipo_servicio' => array(self::BELONGS_TO, 'TipoServicio', 'fk_tipo_servicio'),
			'fk_equipo_p' => array(self::BELONGS_TO, 'Equipos', 'fk_equipos'),
			'fk_estado_p' => array(self::BELONGS_TO, 'Estado', 'fk_estado'),
			'fk_usuario_p' => array(self::BELONGS_TO, 'Usuarios', 'fk_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'fk_equipos' => 'Fk Equipos',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'fk_usuario' => 'Fk Usuario',
			'fk_estado' => 'Fk Estado',
			'datos' => 'Datos',
			'nombre_informe' => 'Nombre Informe',
			'datos_informe' => 'Datos Informe',
			'fk_tipo_servicio' => 'Fk Tipo Servicio',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fk_equipos',$this->fk_equipos);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('fk_usuario',$this->fk_usuario);
		$criteria->compare('fk_estado',$this->fk_estado);
		$criteria->compare('datos',$this->datos,true);
		$criteria->compare('nombre_informe',$this->nombre_informe,true);
		$criteria->compare('datos_informe',$this->datos_informe,true);
		$criteria->compare('fk_tipo_servicio',$this->fk_tipo_servicio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}