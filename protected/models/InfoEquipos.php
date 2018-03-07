<?php

/**
 * This is the model class for table "info_equipos".
 *
 * The followings are the available columns in table 'info_equipos':
 * @property integer $id
 * @property string $serial_id
 * @property string $tipo
 * @property string $descripcion
 * @property string $marca
 * @property string $referencia
 * @property string $serial
 * @property string $fecha_calibracion
 * @property string $soporte_calibracion
 * @property string $factura
 * @property string $estado
 * @property string $fecha_creacion
 */
class InfoEquipos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoEquipos the static model class
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
		return 'info_equipos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, marca, referencia, serial, fecha_calibracion, soporte_calibracion, factura, estado', 'required'),
			array('serial_id, tipo, marca, referencia, serial', 'length', 'max'=>50),
			array('soporte_calibracion, factura, estado', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, serial_id, tipo, descripcion, marca, referencia, serial, fecha_calibracion, soporte_calibracion, factura, estado, fecha_creacion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'serial_id' => 'Serial',
			'tipo' => 'Tipo',
			'descripcion' => 'Descripcion',
			'marca' => 'Marca',
			'referencia' => 'Referencia',
			'serial' => 'Serial',
			'fecha_calibracion' => 'Fecha Calibracion',
			'soporte_calibracion' => 'Soporte Calibracion',
			'factura' => 'Factura',
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
		$criteria->compare('serial_id',$this->serial_id,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('fecha_calibracion',$this->fecha_calibracion,true);
		$criteria->compare('soporte_calibracion',$this->soporte_calibracion,true);
		$criteria->compare('factura',$this->factura,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}