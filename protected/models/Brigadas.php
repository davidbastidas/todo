<?php

/**
 * This is the model class for table "brigadas".
 *
 * The followings are the available columns in table 'brigadas':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $ubicacion
 * @property string $pep
 * @property string $jefe
 * @property string $vehiculo
 * @property string $telefono
 * @property string $datos_json
 * @property integer $estado
 * @property integer $coordinador
 *
 * The followings are the available model relations:
 * @property Usuarios $coordinador0
 */
class Brigadas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Brigadas the static model class
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
		return 'brigadas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, datos_json, horario', 'required'),
			array('estado, coordinador', 'numerical', 'integerOnly'=>true),
			array('nombre, descripcion, ubicacion, pep', 'length', 'max'=>150),
			array('jefe, vehiculo, telefono', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, ubicacion, pep, jefe, vehiculo, telefono, datos_json, estado, coordinador, horario', 'safe', 'on'=>'search'),
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
			'fk_coordinador_usuario' => array(self::BELONGS_TO, 'Usuarios', 'coordinador'),
			'fk_pep' => array(self::BELONGS_TO, 'InfoPep', 'pep'),
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
			'descripcion' => 'Descripcion',
			'ubicacion' => 'Ubicacion',
			'pep' => 'Pep',
			'jefe' => 'Jefe',
			'vehiculo' => 'Vehiculo',
			'telefono' => 'Telefono',
			'datos_json' => 'Datos Json',
			'estado' => 'Estado',
			'coordinador' => 'Coordinador',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('pep',$this->pep,true);
		$criteria->compare('jefe',$this->jefe,true);
		$criteria->compare('vehiculo',$this->vehiculo,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('datos_json',$this->datos_json,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('coordinador',$this->coordinador);
		$criteria->compare('horario',$this->horario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}