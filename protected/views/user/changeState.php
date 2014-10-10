<?php
/* @var $this UsuarioController */
/* @var $error array */
?>

<div class="row">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        'enableAjaxValidation' => false,
    ));
    ?>
        <h2><?php echo CHtml::encode($header); ?></h2>
        <h3><?php echo CHtml::encode($message); ?></h3>    
        <a href="<?php echo Yii::app()->createUrl("user/admin") ?>"><?php echo Yii::app()->params["goBackButtonLabel"] ?></a>
        <?php echo CHtml::submitButton(Yii::app()->params["confirmButtonLabel"], array("class" => "btn btn-default")); ?>       
    <?php $this->endWidget(); ?>
</div>