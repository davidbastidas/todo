<?php

/**
 * This is the model class for table "info_computadores".
 *
 * The followings are the available columns in table 'info_computadores':
 * @property integer $id
 * @property string $serial
 * @property string $tipo
 * @property string $marca
 * @property string $referencia
 * @property string $procesador
 * @property string $disco_duro
 * @property string $ram
 * @property string $estado
 * @property string $fecha_creacion
 */
class InfoComputadores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoComputadores the static model class
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
		return 'info_computadores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('serial, tipo, marca, referencia, procesador, disco_duro, ram, estado', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, serial, tipo, marca, referencia, procesador, disco_duro, ram, estado, fecha_creacion', 'safe', 'on'=>'search'),
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
			'serial' => 'Serial',
			'tipo' => 'Tipo',
			'marca' => 'Marca',
			'referencia' => 'Referencia',
			'procesador' => 'Procesador',
			'disco_duro' => 'Disco Duro',
			'ram' => 'Ram',
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
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('procesador',$this->procesador,true);
		$criteria->compare('disco_duro',$this->disco_duro,true);
		$criteria->compare('ram',$this->ram,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}