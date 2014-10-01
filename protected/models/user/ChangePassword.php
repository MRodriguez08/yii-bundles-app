 <?php


class ChangePassword extends CFormModel {

    public $oldPassword;
    public $newPassword;
    public $newPasswordConfirmation;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(            
            array('oldPassword, newPassword, newPasswordConfirmation', 'required', 'message' => Yii::app()->params["templateEmptyValueErrorMessage"]),
            /*
            array('oldPassword','checkOldPassword', 'message' => Yii::app()->params["templateEmptyValueErrorMessage"]),
            array('newPassword','checkNewPassword', 'message' => Yii::app()->params["templateEmptyValueErrorMessage"])
            */
        );
    }
    
    public function checkOldPassword() {
        $u = Usuario::model()->findByPk(Yii::app()->user->id);
        if ($u == null){
            die("Todo mal");
        }
        
        if ($u->contrasenia !== crypt($this->oldPassword, $u->contrasenia)){
            $this->addError("oldPassword", "Su contrase&ntilde;a anterior no es v&aacute;lida");
            return false;
        }        
        return true;
    }
    
    public function checkNewPassword() {
        if (strcmp($this->newPassword, $this->newPasswordConfirmation) !== 0){
            $this->addError("newPassword", "Las contrase&ntilde;as no coinciden");
            return false;
        }
        return true;
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'oldPassword' => 'Ingrese su antigua contrase&ntilde;a',
            'newPassword' => 'Nueva contrase&ntilde;a',
            'newPasswordConfirmation' => 'Confirme su nueva contrase&ntilde;a',
        );
    }
    
    public function save(){        
        $chk1 = $this->checkOldPassword();
        $chk2 = $this->checkNewPassword();
        if ($chk1 == false || $chk2 == false)
            return false;
        $u = Usuario::model()->findByAttributes(array('usuario'=>Yii::app()->user->id));
        $u->contrasenia = crypt($this->newPassword);
        return $u->save();
    }

}
