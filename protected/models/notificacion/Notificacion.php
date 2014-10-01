<?php

/**
 * This is the model class for table "emails_notificacion".
 *
 * The followings are the available columns in table 'emails_notificacion':
 * @property string $id
 * @property string $fecha_hora_envio
 * @property string $mensaje
 * @property string $id_tipo_notificacion
 * @property string $id_estado_notificacion
 * @property string $email_cliente
 * @property string $nombre_cliente
 * @property string $telefono_cliente
 *
 * The followings are the available model relations:
 * @property EstadoNotificacion $idEstadoNotificacion
 * @property TipoNotificacion $idTipoNotificacion
 */
class Notificacion extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'emails_notificacion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('fecha_hora_envio, mensaje, id_tipo_notificacion, id_estado_notificacion, email_cliente', 'required'),
            array('mensaje', 'length', 'max' => 2048),
            array('id_tipo_notificacion, id_estado_notificacion, telefono_cliente', 'length', 'max' => 20),
            array('email_cliente, nombre_cliente', 'length', 'max' => 64),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, fecha_hora_envio, mensaje, id_tipo_notificacion, id_estado_notificacion, email_cliente, nombre_cliente, telefono_cliente', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'estadoNotificacion' => array(self::BELONGS_TO, 'EstadoNotificacion', 'id_estado_notificacion'),
            'tipoNotificacion' => array(self::BELONGS_TO, 'TipoNotificacion', 'id_tipo_notificacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'fecha_hora_envio' => 'Fecha de envio',
            'mensaje' => 'Mensaje',
            'id_tipo_notificacion' => 'Tipo',
            'id_estado_notificacion' => 'Estado',
            'email_cliente' => 'Email',
            'nombre_cliente' => 'Nombre',
            'telefono_cliente' => 'Telefono',
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
        $criteria->compare('fecha_hora_envio', $this->fecha_hora_envio, true);
        $criteria->compare('mensaje', $this->mensaje, true);
        $criteria->compare('id_tipo_notificacion', $this->id_tipo_notificacion, true);
        $criteria->compare('id_estado_notificacion', $this->id_estado_notificacion, true);
        $criteria->compare('email_cliente', $this->email_cliente, true);
        $criteria->compare('nombre_cliente', $this->nombre_cliente, true);
        $criteria->compare('telefono_cliente', $this->telefono_cliente, true);

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
        if (!isset($arguments["mensaje"]))
            throw new Exception("mensaje no definido");
        if (!isset($arguments["telefonoCliente"]))
            throw new Exception("telefono no definido");
        if (!isset($arguments["nombreCliente"]))
            throw new Exception("nombre no definido");
        if (!isset($arguments["emailCliente"]))
            throw new Exception("email no definido");
        $this->mensaje = $arguments["mensaje"];
        $this->telefono_cliente = $arguments["telefonoCliente"];
        $this->nombre_cliente = $arguments["nombreCliente"];
        $this->email_cliente = $arguments["emailCliente"];
        $this->id_tipo_notificacion = /* (isset($arguments["tipoNotificacion"]) ? $arguments["tipoNotificacion"] : "") */ 1;
        $dtNow = new DateTime;
        $this->fecha_hora_envio = $dtNow->format(Constantes::DATETIME_STRING_FORMAT);
        $this->id_estado_notificacion = 1; /* ingreso notificacion como pendiente */
    }

}
