<?php

/**
 * This is the model class for table "tipo_notificacion".
 *
 * The followings are the available columns in table 'tipo_notificacion':
 * @property string $name
 * @property string $description
 */
class NotificationType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notification_types';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required', 'message' => Yii::app()->params["emptyValueErrorMessage"]),
            array('name', 'length', 'max' => 64),
            array('name', 'duplicatedName', 'message' => Yii::app()->params["templateDuplicatedValueErrorMessage"]),
            array('description', 'length', 'max' => 512),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('name, description', 'safe', 'on' => 'search'),
        );
    }

    public function duplicatedName($attribute, $params) {
        if ($this->isNewRecord) {
            if (count(NotificationType::model()->findALl('name=:name', array("name" => $this->name))) > 0)
                $this->addError($attribute, str_replace("{attribute}", $attribute, Yii::app()->params["templateDuplicatedValueErrorMessage"]));
        } else {
            if (count(NotificationType::model()->findALl('id<>:id and name=:name', array("name" => $this->name, "id"=>  $this->id))) > 0)
                $this->addError($attribute, str_replace("{attribute}", $attribute, Yii::app()->params["templateDuplicatedValueErrorMessage"]));
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Id',
            'name' => 'name',
            'description' => 'description',
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

        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return NotificationType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
