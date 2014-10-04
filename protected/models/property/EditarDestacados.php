<?php

class EditarDestacados extends CFormModel {

    public $attributes;
    
    public $idDestacado1;
    public $idDestacado2;
    public $idDestacado3;
    public $idDestacado4;
    public $idDestacado5;
    public $idDestacado6;

    public function __construct() {
        $this->idDestacado1 = DestacadoInmueble::model()->findByPk(1)->id_inmueble;
        $this->idDestacado2 = DestacadoInmueble::model()->findByPk(2)->id_inmueble;
        $this->idDestacado3 = DestacadoInmueble::model()->findByPk(3)->id_inmueble;
        $this->idDestacado4 = DestacadoInmueble::model()->findByPk(4)->id_inmueble;
        $this->idDestacado5 = DestacadoInmueble::model()->findByPk(5)->id_inmueble;
        $this->idDestacado6 = DestacadoInmueble::model()->findByPk(6)->id_inmueble;
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'idDestacado1' => '1&deg; destacado',
            'idDestacado2' => '2&deg; destacado',
            'idDestacado3' => '3&deg; destacado',
            'idDestacado4' => '4&deg; destacado',
            'idDestacado5' => '5&deg; destacado',
            'idDestacado6' => '6&deg; destacado',
        );
    }

    public function getListaInmuebles() {
        return CHtml::listData(Inmueble::model()->findAll(), 'id', 'titulo');
    }

    public function save() {
        foreach (array_keys($this->attributes) as $key) {
            $valor = $this->attributes[$key];
            $destacado = new DestacadoInmueble();
            switch ($key) {
                case "idDestacado1":
                    $destacado = DestacadoInmueble::model()->findByPk(1);
                    break;
                case "idDestacado2":
                    $destacado = DestacadoInmueble::model()->findByPk(2);
                    break;
                case "idDestacado3":
                    $destacado = DestacadoInmueble::model()->findByPk(3);
                    break;
                case "idDestacado4":
                    $destacado = DestacadoInmueble::model()->findByPk(4);
                    break;
                case "idDestacado5":
                    $destacado = DestacadoInmueble::model()->findByPk(5);
                    break;
                case "idDestacado6":
                    $destacado = DestacadoInmueble::model()->findByPk(6);
                    break;
                default :
                    return false;
            }
            
            if ($destacado->id_inmueble != $valor){
                $destacado->id_inmueble = $valor;
                $dtNow = new DateTime;
                $destacado->update_timestamp = $dtNow->format(Constantes::DATETIME_STRING_FORMAT);
                if ($destacado->save() == false){
                    return false;
                }                    
            }            
        }
        return true;
    }

}
