<?php

/**
 * This is the model class for table "info_pep".
 *
 * The followings are the available columns in table 'info_pep':
 * @property integer $id
 * @property string $pep
 * @property string $nombre
 * @property string $ceco
 * @property string $presupuesto
 * @property integer $margen
 * @property string $estado
 * @property string $fecha_creacion
 */
class InfoPep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoPep the static model class
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
		return 'info_pep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pep, nombre, ceco, presupuesto, margen, estado', 'required'),
			array('margen', 'numerical', 'integerOnly'=>true),
			array('pep', 'length', 'max'=>150),
			array('nombre', 'length', 'max'=>100),
			array('ceco, estado', 'length', 'max'=>50),
			array('presupuesto', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pep, nombre, ceco, presupuesto, margen, estado, fecha_creacion', 'safe', 'on'=>'search'),
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
			'pep' => 'Pep',
			'nombre' => 'Nombre',
			'ceco' => 'Ceco',
			'presupuesto' => 'Presupuesto',
			'margen' => 'Margen',
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
		$criteria->compare('pep',$this->pep,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('ceco',$this->ceco,true);
		$criteria->compare('presupuesto',$this->presupuesto,true);
		$criteria->compare('margen',$this->margen);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}