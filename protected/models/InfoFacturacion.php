<?php

/**
 * This is the model class for table "info_facturacion".
 *
 * The followings are the available columns in table 'info_facturacion':
 * @property integer $id
 * @property string $item
 * @property string $descripcion
 * @property string $cliente
 * @property string $pedido
 * @property string $valor_un
 * @property string $moneda
 * @property string $alcance
 * @property string $soporte
 * @property string $estado
 * @property string $fecha_creacion
 */
class InfoFacturacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return InfoFacturacion the static model class
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
		return 'info_facturacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item, cliente, pedido, moneda', 'length', 'max'=>50),
			array('valor_un', 'length', 'max'=>20),
			array('soporte, estado', 'length', 'max'=>100),
			array('descripcion, alcance, prefijo, unidad', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, item, descripcion, cliente, pedido, valor_un, moneda, alcance, soporte, estado, fecha_creacion, prefijo, unidad', 'safe', 'on'=>'search'),
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
			'item' => 'Item',
			'prefijo' => 'Prefijo',
			'descripcion' => 'Descripcion',
			'cliente' => 'Cliente',
			'pedido' => 'Pedido',
			'valor_un' => 'Valor Un',
			'unidad' => 'Mes, Dia, Global...',
			'moneda' => 'Moneda',
			'alcance' => 'Alcance',
			'soporte' => 'Soporte',
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
		$criteria->compare('item',$this->item,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cliente',$this->cliente,true);
		$criteria->compare('pedido',$this->pedido,true);
		$criteria->compare('valor_un',$this->valor_un,true);
		$criteria->compare('moneda',$this->moneda,true);
		$criteria->compare('alcance',$this->alcance,true);
		$criteria->compare('soporte',$this->soporte,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}