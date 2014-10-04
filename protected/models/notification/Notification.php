<?php

/**
 * This is the model class for table "emails_notificacion".
 *
 * The followings are the available columns in table 'emails_notificacion':
 * @property string $id
 * @property string $datetimesent
 * @property string $message
 * @property string $type_id
 * @property string $state_id
 * @property string $clientemail
 * @property string $clientname
 * @property string $clienttelephonenumber
 *
 * The followings are the available model relations:
 * @property EstadoNotificacion $idEstadoNotificacion
 * @property TipoNotificacion $idTipoNotificacion
 */
class Notification extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'notifications';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('datetimesent, message, type_id, state_id, clientemail', 'required'),
            array('message', 'length', 'max' => 2048),
            array('type_id, state_id, clienttelephonenumber', 'length', 'max' => 20),
            array('clientemail, clientname', 'length', 'max' => 64),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, datetimesent, message, type_id, state_id, clientemail, clientname, clienttelephonenumber', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'state' => array(self::BELONGS_TO, 'NotificationState', 'state_id'),
            'type' => array(self::BELONGS_TO, 'NotificationType', 'type_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'datetimesent' => 'Fecha de envio',
            'message' => 'Mensaje',
            'type_id' => 'Tipo',
            'state_id' => 'Estado',
            'clientemail' => 'Email',
            'clientname' => 'Nombre',
            'clienttelephonenumber' => 'Telefono',
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
        $criteria->compare('datetimesent', $this->datetimesent, true);
        $criteria->compare('message', $this->message, true);
        $criteria->compare('type_id', $this->type_id, true);
        $criteria->compare('state_id', $this->state_id, true);
        $criteria->compare('clientemail', $this->clientemail, true);
        $criteria->compare('clientname', $this->clientname, true);
        $criteria->compare('clienttelephonenumber', $this->clienttelephonenumber, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Notificacion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function customSetAttributes($arguments) {
        //error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING);
        if (!isset($arguments["message"]))
            throw new Exception("mensaje no definido");
        if (!isset($arguments["messageType"]))
            throw new Exception("tipo no definido");
        if (!isset($arguments["clientTelephoneNumber"]))
            throw new Exception("telefono no definido");
        if (!isset($arguments["clientName"]))
            throw new Exception("name no definido");
        if (!isset($arguments["clientEmail"]))
            throw new Exception("email no definido");
        $this->message = $arguments["message"];
        $this->clienttelephonenumber = $arguments["clientTelephoneNumber"];
        $this->clientname = $arguments["clientName"];
        $this->clientemail = $arguments["clientEmail"];
        $this->type_id = $arguments["messageType"];
        $dtNow = new DateTime;
        $this->datetimesent = $dtNow->format(Constants::DATETIME_STRING_FORMAT);
        $this->state_id = 1; /* set the default state */
    }

}
