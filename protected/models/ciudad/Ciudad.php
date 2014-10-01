<?php

/**
 * This is the model class for table "ciudades".
 *
 * The followings are the available columns in table 'ciudades':
 * @property integer $id
 * @property string $nombre
 * @property integer $id_departamento
 *
 * The followings are the available model relations:
 * @property Barrios[] $barrioses
 * @property Departamentos $idDepartamento
 */
class Ciudad extends CActiveRecord {

    public $departamento;
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ciudades';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_departamento,nombre', 'required' , "message" => Yii::app()->params["templateEmptyValueErrorMessage"]),
            array('id_departamento', 'numerical', 'integerOnly' => true),
            array('nombre', 'length', 'max' => 128),
            array('nombre', 'duplicatedName', 'message' => Yii::app()->params["templateDuplicatedValueErrorMessage"]),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, nombre, id_departamento', 'safe', 'on' => 'search'),
        );
    }
    
    public function duplicatedName($attribute, $params) {
        if ($this->isNewRecord) {
            if (count(Ciudad::model()->findALl('nombre=:nombre and id_departamento=:id_departamento', array("nombre" => $this->nombre, "id_departamento" => $this->id_departamento))) > 0)
                $this->addError($attribute, "Ya existe una ciudad la ciudad {$this->nombre} en el departamento seleccionado");
        } else {
            if (count(Ciudad::model()->findALl('id <> :id and nombre=:nombre and id_departamento=:id_departamento', array("nombre" => $this->nombre, "id_departamento" => $this->id_departamento, "id" => $this->id))) > 0)
                $this->addError($attribute, "Ya existe una ciudad la ciudad {$this->nombre} en el departamento seleccionado");
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'barrioses' => array(self::HAS_MANY, 'Barrios', 'id_ciudad'),
            'idDepartamento' => array(self::BELONGS_TO, 'Departamentos', 'id_departamento'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'nombre' => 'Nombre',
            'id_departamento' => 'Departamento',
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
        $criteria->compare('id_departamento', $this->id_departamento);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ciudad the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
