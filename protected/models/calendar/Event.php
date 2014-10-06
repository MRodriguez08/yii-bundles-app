<?php

/**
 * This is the model class for table "calendar".
 *
 * The followings are the available columns in table 'calendar':
 * @property string $id
 * @property string $title
 * @property string $body
 * @property string $start
 * @property string $end
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class Event extends CActiveRecord {

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
            array('title, body, start, end, user_id', 'required'),
            array('title', 'length', 'max' => 100),
            array('body', 'length', 'max' => 1024),
            array('start, end', 'length', 'max' => 20),
            array('user_id', 'length', 'max' => 64),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, title, body, start, end, user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'start' => 'Start',
            'end' => 'End',
            'user_id' => 'User',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('body', $this->body, true);
        $criteria->compare('start', $this->start, true);
        $criteria->compare('end', $this->end, true);
        $criteria->compare('user_id', $this->user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Event the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
