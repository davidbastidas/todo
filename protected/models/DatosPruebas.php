<?php

/**
 * This is the model class for table "datos_pruebas".
 *
 * The followings are the available columns in table 'datos_pruebas':
 * @property integer $id
 * @property integer $fk_tipo_pruebas
 * @property integer $fk_usuario
 * @property string $datos
 * @property string $fecha
 * @property string $hora
 * @property integer $fk_estado
 * @property integer $fk_pruebas
 *
 * The followings are the available model relations:
 * @property TipoPruebas $fkTipoPruebas
 * @property Usuarios $fkUsuario
 * @property Estado $fkEstado
 * @property Pruebas $fkPruebas
 */
class DatosPruebas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DatosPruebas the static model class
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
		return 'datos_pruebas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_tipo_pruebas, fk_usuario, datos, fecha, hora, fk_estado, fk_pruebas', 'required'),
			array('fk_tipo_pruebas, fk_usuario, fk_estado, fk_pruebas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fk_tipo_pruebas, fk_usuario, datos, fecha, hora, fk_estado, fk_pruebas', 'safe', 'on'=>'search'),
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
			'fk_tipo_prueba_p' => array(self::BELONGS_TO, 'TipoPruebas', 'fk_tipo_pruebas'),
			'fk_usuario_p' => array(self::BELONGS_TO, 'Usuarios', 'fk_usuario'),
			'fk_estado_p' => array(self::BELONGS_TO, 'Estado', 'fk_estado'),
			'fk_prueba_p' => array(self::BELONGS_TO, 'Pruebas', 'fk_pruebas'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fk_tipo_pruebas' => 'Fk Tipo Pruebas',
			'fk_usuario' => 'Fk Usuario',
			'datos' => 'Datos',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'fk_estado' => 'Fk Estado',
			'fk_pruebas' => 'Fk Pruebas',
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
		$criteria->compare('fk_tipo_pruebas',$this->fk_tipo_pruebas);
		$criteria->compare('fk_usuario',$this->fk_usuario);
		$criteria->compare('datos',$this->datos,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('fk_estado',$this->fk_estado);
		$criteria->compare('fk_pruebas',$this->fk_pruebas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}