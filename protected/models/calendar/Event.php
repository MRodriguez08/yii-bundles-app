<?php

/**
 * This is the model class for table "eventos".
 *
 * The followings are the available columns in table 'eventos':
 * @property string $id
 * @property string $titulo
 * @property string $description
 * @property string $fecha_hora_desde
 * @property string $fecha_hora_hasta
 * @property integer $id_inmueble
 * @property integer $id_cliente
 * @property string $id_usuario
 *
 * The followings are the available model relations:
 * @property Inmuebles $idInmueble
 * @property Clientes $idCliente
 * @property Usuarios $idUsuario
 */
class Event extends CActiveRecord {

    public $fechaDesde;
    public $fechaHasta;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'calendar';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titulo, fecha_hora_desde, id_inmueble, id_cliente, id_usuario', 'required', 'message' => Yii::app()->params["templateEmptyValueErrorMessage"]),
            array('id_inmueble, id_cliente', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 100),
            array('description', 'length', 'max' => 512),
            array('id_usuario', 'length', 'max' => 64),
            array('fecha_hora_hasta', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('titulo, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'inmueble' => array(self::BELONGS_TO, 'Inmueble', 'id_inmueble'),
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'id_cliente'),
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'titulo' => 'T&iacute;tulo',
            'description' => 'description',
            'fecha_hora_desde' => 'Inicio',
            'fecha_hora_hasta' => 'Fin',
            'id_inmueble' => 'Inmueble',
            'id_cliente' => 'Cliente',
            'id_usuario' => 'Usuario',
            'fechaDesde' => 'Desde',
            'fechaHasta' => 'Hasta',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('description', $this->description, true);
        
        if (isset($_GET["Evento"])) {
            $dH = new DateTimeHelper;            
            $desde = $dH->getDateTimeFromUI($_GET["Evento"]["fechaDesde"]);
            $hasta = $dH->getDateTimeFromUI($_GET["Evento"]["fechaHasta"]);
            if ($desde !== false) {
                $criteria->addCondition('fecha_hora_desde >= ' . $desde->getTimestamp());
            } else {
                $criteria->addCondition('fecha_hora_desde >= ' . $dH->getDefaultStartRangeFilter("eventos")->getTimestamp());
            }
            if ($hasta !== false) {
                $criteria->addCondition('fecha_hora_desde <= ' . $hasta->getTimestamp());
            } else {
                $criteria->addCondition('fecha_hora_desde <= ' . $dH->getDefaultEndRangeFilter("eventos")->getTimestamp());
            }
        }
        $criteria->compare('id_inmueble', $this->id_inmueble);
        $criteria->compare('id_cliente', $this->id_cliente);
        $criteria->compare('id_usuario', $this->id_usuario, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Evento the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
