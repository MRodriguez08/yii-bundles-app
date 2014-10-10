<?php

/**
 * This is the model class for table "ciudades".
 *
 * The followings are the available columns in table 'ciudades':
 * @property integer $id
 * @property string $name
 * @property integer $department_id
 *
 * The followings are the available model relations:
 * @property Barrios[] $barrioses
 * @property Departamentos $idDepartamento
 */
class City extends CActiveRecord {
    
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cities';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('department_id,name', 'required' , "message" => Yii::app()->params["emptyValueErrorMessage"]),
            array('department_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('name', 'duplicatedName', 'message' => Yii::app()->params["templateDuplicatedValueErrorMessage"]),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, department_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function duplicatedName($attribute, $params) {
        if ($this->isNewRecord) {
            if (count(City::model()->findAll('name=:name and department_id=:department_id', array("name" => $this->name, "department_id" => $this->department_id))) > 0)
                $this->addError($attribute, "Ya existe una ciudad la ciudad {$this->name} en el departamento seleccionado");
        } else {
            if (count(City::model()->findAll('id <> :id and name=:name and department_id=:department_id', array("name" => $this->name, "department_id" => $this->department_id, "id" => $this->id))) > 0)
                $this->addError($attribute, "Ya existe una ciudad la ciudad {$this->name} en el departamento seleccionado");
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'neighborhoods' => array(self::HAS_MANY, 'Neighborhood', 'city_id'),
            'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'name' => 'name',
            'department_id' => 'Departamento',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('department_id', $this->department_id);

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
