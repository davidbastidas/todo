<?php

/**
 * This is the model class for table "info_materiales".
 *
 * The followings are the available columns in table 'info_materiales':
 * @property integer $id
 * @property string $codigo
 * @property string $descripcion
 * @property string $tipo
 * @property string $marca
 * @property string $referencia
 * @property string $serial
 * @property string $unidad
 * @property string $precio_unitario
 * @property string $estado
 * @property string $fecha_creacion
 */
class InfoMateriales extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoMateriales the static model class
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
		return 'info_materiales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, tipo, marca, referencia, serial, unidad, precio_unitario, estado', 'required'),
			array('codigo, tipo, marca, referencia, serial, unidad, estado', 'length', 'max'=>50),
			array('precio_unitario', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigo, descripcion, tipo, marca, referencia, serial, unidad, precio_unitario, estado, fecha_creacion', 'safe', 'on'=>'search'),
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
			'codigo' => 'Codigo',
			'descripcion' => 'Descripcion',
			'tipo' => 'Tipo',
			'marca' => 'Marca',
			'referencia' => 'Referencia',
			'serial' => 'Serial',
			'unidad' => 'Unidad',
			'precio_unitario' => 'Precio Unitario',
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
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('marca',$this->marca,true);
		$criteria->compare('referencia',$this->referencia,true);
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('unidad',$this->unidad,true);
		$criteria->compare('precio_unitario',$this->precio_unitario,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}