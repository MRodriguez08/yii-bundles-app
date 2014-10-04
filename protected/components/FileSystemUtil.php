<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FileUtil
 *
 * @author ubuntu
 */
class FileSystemUtil {

    const TMP_FOLDER_NAME = "tmp";
    const IMAGES_FOLDER_NAME = "inmuebles";
    const RIGHTS_MODE = 0755;

    function checkCurrentUserTmpFolder() {
        $currUser = Yii::app()->user->title;
        $tmpFolder = join(DIRECTORY_SEPARATOR, array(Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value, FileSystemUtil::TMP_FOLDER_NAME));
        if (!file_exists($tmpFolder . $currUser)) {
            mkdir($tmpFolder . $currUser, FileSystemUtil::RIGHTS_MODE, true);
        }
    }

    function getCurrentUserTmpFolder() {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $userTmpFolder = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::TMP_FOLDER_NAME, Yii::app()->user->id));
        if (!file_exists($userTmpFolder)) {
            mkdir($userTmpFolder, FileSystemUtil::RIGHTS_MODE, true);
        }
        return $userTmpFolder;
    }

    /**
     * 
     * @param type $fileName
     * @return type
     */
    function getTmpFile($fileName) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $file = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::TMP_FOLDER_NAME, Yii::app()->user->id, $fileName));
        return $file;
    }

    function getInmuebleFile($idInmueble, $fileName) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $file = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME, $idInmueble, $fileName));
        return $file;
    }

    function clearUserTmpFolder() {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $tmpFolder = glob(join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::TMP_FOLDER_NAME, Yii::app()->user->id)) . DIRECTORY_SEPARATOR . '*');
        foreach ($tmpFolder as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }
    }

    function deleteImagesFromProperty($idImueble) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $propertyImages = glob(join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME, $idImueble)) . DIRECTORY_SEPARATOR . '*');
        foreach ($propertyImages as $file) {
            if (is_file($file))
                unlink($file);
        }
    }

    function getTmpFilesNames() {
        $tmpFiles = glob($this->getCurrentUserTmpFolder() . DIRECTORY_SEPARATOR . '*');
        $filesNames = array();
        foreach ($tmpFiles as $file) {
            if (is_file($file)) {
                array_push($filesNames, $this->getFileName($file));
            }
        }
        return $filesNames;
    }

    /**
     * Copia el archivo con name = {fileName} del directorio temporal del usuario actualmente
     * logueado en la aplicacion, al directorio final de imagenes 
     * para el inmueble pasado como parametro {idInmueble}
     */
    function copyFileFromTmpToFs($fileName, $idInmueble) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $tmpFolder = $this->getCurrentUserTmpFolder() . DIRECTORY_SEPARATOR;
        $finalFolder = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME , $idInmueble)) . DIRECTORY_SEPARATOR;
        return copy($tmpFolder . $fileName, $finalFolder . $fileName);
    }

    function copyPropertyFilesFromFsToTmp($idInmueble) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $tmpFolder = $this->getCurrentUserTmpFolder() . DIRECTORY_SEPARATOR;
        $str = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME, $idInmueble)) . DIRECTORY_SEPARATOR . '*';
        $fsFiles = glob($str);
        foreach ($fsFiles as $file) {
            if (is_file($file)) {
                $tmpFile = join(DIRECTORY_SEPARATOR, array($tmpFolder, $this->getFileName($file)));
                if (!copy($file, $tmpFile)) {
                    die("Error copiando archivo {$file} a directorio temporal");
                }
            }
        }
    }

    /**
     * Crea un directorio en el directorio base de imagenes con el name {idInmueble}.
     * @param type $idInmueble: identificador del inmueble para el cual se creara el directorio de imagenes.
     */
    function createInmuebleImageFolder($idInmueble) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $finalFolder = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME, $idInmueble));
        if (!file_exists($finalFolder)) {
            mkdir($finalFolder, FileSystemUtil::RIGHTS_MODE, true);
        }
    }

    private function getFileName($fullPath) {
        $parts = explode(DIRECTORY_SEPARATOR, $fullPath);
        return $parts[count($parts) - 1];
    }

    public function createPropertyFoderIfNotExists($idInmueble) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $propertyFolder = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME, $idInmueble));
        if (!file_exists($propertyFolder)) {
            mkdir($propertyFolder, FileSystemUtil::RIGHTS_MODE, true);
        }
        return true;
    }

    public function createUserTmpFoderIfNotExists($nickUsuario) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        $userTmpFolder = join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::TMP_FOLDER_NAME, $nickUsuario));
        if (!file_exists($userTmpFolder)) {
            mkdir($userTmpFolder, FileSystemUtil::RIGHTS_MODE, true);
        }
        return true;
    }

    public function getPropertyFolder($idInmueble) {
        $rutaBase = Sysparam::model()->findByPk(Constantes::PARAMETRO_RUTA_BASE)->value;
        return join(DIRECTORY_SEPARATOR, array($rutaBase, FileSystemUtil::IMAGES_FOLDER_NAME, $idInmueble));
    }

    public function saveFormImages($files, $idInmueble) {

        $arr = $_FILES;
        $uploaddir = $this->getPropertyFolder($idInmueble) . DIRECTORY_SEPARATOR;

        foreach ($files['files'] as $item) {
            $uploadfile = $uploaddir . basename($item['name'][0]);

            if (move_uploaded_file($files['files']['tmp_name'], $uploadfile)) {
                $echo = "El archivo es v�lido y fue cargado exitosamente.\n";
            } else {
                $echo = "�Posible ataque de carga de archivos!\n";
            }
        }
    }

}
