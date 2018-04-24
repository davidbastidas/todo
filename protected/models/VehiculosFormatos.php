<?php

/**
 * This is the model class for table "vehiculos_formatos".
 *
 * The followings are the available columns in table 'vehiculos_formatos':
 * @property integer $id
 * @property string $nombre
 * @property string $json
 * @property string $categoria
 * @property integer $estado
 * @property string $fecha
 * @property integer $fk_vehiculo
 * @property integer $fk_usuario
 *
 * The followings are the available model relations:
 * @property Usuarios $fkUsuario
 * @property Vehiculos $fkVehiculo
 */
class VehiculosFormatos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VehiculosFormatos the static model class
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
		return 'vehiculos_formatos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, categoria, estado, fecha, fk_vehiculo, fk_usuario', 'required'),
			array('estado, fk_vehiculo, fk_usuario', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>150),
			array('categoria', 'length', 'max'=>50),
			array('json', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, json, categoria, estado, fecha, fk_vehiculo, fk_usuario', 'safe', 'on'=>'search'),
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
			'fkUsuario' => array(self::BELONGS_TO, 'Usuarios', 'fk_usuario'),
			'fkVehiculo' => array(self::BELONGS_TO, 'Vehiculos', 'fk_vehiculo'),
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
			'json' => 'Json',
			'categoria' => 'Categoria',
			'estado' => 'Estado',
			'fecha' => 'Fecha',
			'fk_vehiculo' => 'Fk Vehiculo',
			'fk_usuario' => 'Fk Usuario',
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
		$criteria->compare('json',$this->json,true);
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fk_vehiculo',$this->fk_vehiculo);
		$criteria->compare('fk_usuario',$this->fk_usuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}