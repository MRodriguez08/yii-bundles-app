<?php
/**
 * AssetsHelper creates the necesary assets include tags (css and js)
 */

/**
 * Description of AssetsHelper
 *
 * @author mauricio
 */
class AssetsHelper {
   
    
    public function getCssIncludes(){
        $out = "";
        if (strcmp(Yii::app()->params["runMode"], "production") == 0){ 
            $out = "<link rel='stylesheet' href='" . Yii::app()->request->baseUrl. "/css/styles.css' >";
        } else { 
            foreach (Yii::app()->params["styles"] as $s){
                $out .= $this->getCssTag($s);        
            }
        }
        return $out;
    }
    
    public function getjsIncludes(){
        $out = "";
        if (strcmp(Yii::app()->params["runMode"], "production") == 0){ 
            $out = "<script src='" . Yii::app()->request->baseUrl . "/assets/js/scripts.css'></script>";
        } else { 
            foreach (Yii::app()->params["scripts"] as $s){
                $out .= $this->getJsTag($s);
            }
        }
        return $out;
    }   
    
    private function getCssTag($s){
        if (strcmp(substr($s, 0, 2), "//") !== 0){
            return "<link rel='stylesheet' href='" . Yii::app()->request->baseUrl . "/" . $s . "'>";
        } else {
            return "<link rel='stylesheet' href='" . $s . "'>";
        }
    }
    
    private function getJsTag($s){
        if (strcmp(substr($s, 0, 2), "//") !== 0){
            return "<script src='" . Yii::app()->request->baseUrl . "/" . $s . "'></script>";        
        } else {
            return "<script src='" . $s . "'></script>";        
        }
    }
    
}
