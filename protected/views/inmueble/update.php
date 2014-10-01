<?php
/* @var $this InmuebleController */
/* @var $model Inmueble */
?>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/open-street-map.js"></script>
<div class="row">
    <div class="col-lg-12">
        <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-home"></span> Modificar inmueble (<?php echo $model->id; ?>)<?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>