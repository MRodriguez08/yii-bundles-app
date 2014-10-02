<?php

/**
 * This is the model class for table "barrios".
 *
 * The followings are the available columns in table 'barrios':
 * @property integer $id
 * @property string $nombre
 * @property integer $id_ciudad
 *
 * The followings are the available model relations:
 * @property Ciudades $idCiudad
 */
class Barrio extends CActiveRecord {

    public $ciudad;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'barrios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_ciudad,nombre', 'required', "message" => Yii::app()->params["templateEmptyValueErrorMessage"]),
            array('id_ciudad', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 128),
            array('nombre', 'duplicatedName', 'message' => Yii::app()->params["templateDuplicatedValueErrorMessage"]),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre, id_ciudad', 'safe', 'on' => 'search'),
        );
    }

    public function duplicatedName($attribute, $params) {
        if ($this->isNewRecord) {
            if (count(Barrio::model()->findALl('nombre=:nombre and id_ciudad=:id_ciudad', array("nombre" => $this->nombre, "id_ciudad" => $this->id_ciudad))) > 0)
                $this->addError($attribute, "Ya existe un barrio {$this->nombre} en la ciudad seleccionada");
        } else {
            if (count(Barrio::model()->findALl('id <> :id and nombre=:nombre and id_ciudad=:id_ciudad', array("nombre" => $this->nombre, "id_ciudad" => $this->id_ciudad, "id" => $this->id))) > 0)
                $this->addError($attribute, "Ya existe un barrio {$this->nombre} en la ciudad seleccionada");
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCiudad' => array(self::BELONGS_TO, 'Ciudades', 'id_ciudad'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'nombre' => 'Nombre',
            'id_ciudad' => 'Ciudad',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('id_ciudad', $this->id_ciudad);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Barrio the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
