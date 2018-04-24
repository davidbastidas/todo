<?php

/**
 * This is the model class for table "info_cliente".
 *
 * The followings are the available columns in table 'info_cliente':
 * @property integer $id
 * @property string $cliente
 * @property string $nit_id
 * @property string $descripcion
 * @property string $pais
 * @property string $ciudad
 * @property string $telefono
 * @property string $nombre_contacto
 * @property string $otro
 * @property string $estado
 * @property string $fecha_creacion
 */
class InfoCliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoCliente the static model class
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
		return 'info_cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, estado', 'required'),
			array('cliente, nit_id, pais, ciudad, telefono, nombre_contacto, otro', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cliente, nit_id, descripcion, pais, ciudad, telefono, nombre_contacto, otro, estado, fecha_creacion', 'safe', 'on'=>'search'),
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
			'cliente' => 'Cliente',
			'nit_id' => 'Nit',
			'descripcion' => 'Descripcion',
			'pais' => 'Pais',
			'ciudad' => 'Ciudad',
			'telefono' => 'Telefono',
			'nombre_contacto' => 'Nombre Contacto',
			'otro' => 'Otro',
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
		$criteria->compare('cliente',$this->cliente,true);
		$criteria->compare('nit_id',$this->nit_id,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('pais',$this->pais,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('nombre_contacto',$this->nombre_contacto,true);
		$criteria->compare('otro',$this->otro,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}