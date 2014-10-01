<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DateTimeHelpder
 *
 * @author ubuntu
 */
class DateTimeHelper {
  
    public function getDateTimeFromUI($uiDt){
        $dt = DateTime::createFromFormat(Yii::app()->params["dateTimeDisplayFormat"], $uiDt);
        if ($dt !== false)
        {
            return $dt;
        }
        $dt = DateTime::createFromFormat(Yii::app()->params["altDateTimeDisplayFormat"], $uiDt);
        if ($dt !== false)
        {
            return $dt;
        }
        return false;
    }
    
    /**
     * Funcion que transforma un timestamp de base de datos a un string con el formato establecido
     * por el parametro 'dateTimeDisplayFormat' en parameters.php
     * @param timestamp $timestamp
     * @return string $strDateTime
     */
    public function getUIDateTimeString($timestamp){
        if ($timestamp === null || strcmp($timestamp,'0') === 0)
            return '';
        $dt = new DateTime;
        $dt->setTimestamp($timestamp);
        return $dt->format(Yii::app()->params["dateTimeDisplayFormat"]);
    }
    
    public function getDefaultStartRangeFilter($object){
        $dt = new DateTime;
        $dt->setTime(08, 0, 0);
        return $dt;
    }
    
    public function getDefaultEndRangeFilter($object){
        $dt = new DateTime;
        $dt->setTime(23, 59, 0);
        return $dt;
    }
    
}
