<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property string $surname
 * @property string $streetaddress
 * @property string $comments
 */
class Customer extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customers';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'required', 'message' => Yii::app()->params["emptyValueErrorMessage"]),
            array('email', 'length', 'max' => 64),
            array('email', 'validateEmailFormat', 'message' => Yii::app()->params["invalidEmailFormatMessage"]),
            array('email', 'duplicatedClientEmail', 'message' => Yii::app()->params["templateDuplicatedValueErrorMessage"]),
            array('name, surname', 'length', 'max' => 100),
            array('streetaddress, comments', 'length', 'max' => 2048),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, name, surname, streetaddress, comments', 'safe', 'on' => 'search'),
        );
    }

    public function duplicatedClientEmail($attribute, $params) {
        if ($this->isNewRecord) {
            if (count(Customer::model()->findALl('email=:email', array("email" => $this->email))) > 0)
                $this->addError($attribute, str_replace("{attribute}", $attribute, Yii::app()->params["templateDuplicatedValueErrorMessage"]));
        }  else {
            if (count(Customer::model()->findALl('email=:email and id <> :id', array("email" => $this->email,"id" => $this->id))) > 0)
                $this->addError($attribute, str_replace("{attribute}", $attribute, Yii::app()->params["templateDuplicatedValueErrorMessage"]));
        }        
    }
    
    public function validateEmailFormat($attribute, $params) 
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            $this->addError($attribute, Yii::app()->params["invalidEmailFormatMessage"]);
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
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'name',
            'surname' => 'Apellido',
            'streetaddress' => 'Direcci&oacute;n',
            'comments' => 'Comentarios',
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('streetaddress', $this->streetaddress, true);
        $criteria->compare('comments', $this->comments, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Customer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
