<?php
/* @var $thisNotificacionController */
/* @var $model Notificacion */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#notificacion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <div class="row top-admin-row">
            <div class="col-lg-12">
                <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-envelope"></span> <?php echo Yii::app()->params["labelFuncionalidadNotificaciones"] ?><?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li class="active"><?php echo Yii::app()->params["labelFuncionalidadNotificaciones"] ?></li>
                </ol>
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'notificacion-grid',
                    'dataProvider' => $model->search(),
                    'summaryText' => '',
                    'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                    'emptyText' => Yii::app()->params["labelTablaSinResultados"],
                    'pager' => array(
                        'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                        'header' => Yii::app()->params["labelPaginacionTabla"],
                        'firstPageLabel' => '&lt;&lt;',
                        'prevPageLabel' => Yii::app()->params["prevPageLabel"],
                        'nextPageLabel' => Yii::app()->params["nextPageLabel"],
                        'lastPageLabel' => '&gt;&gt;',
                    ),
                    'columns' => array(
                        'email_cliente',
                        array(            
                            'name'=>'Tipo',
                            'value'=>'$data->tipoNotificacion->nombre'
                        ),
                        array(            
                            'name'=>'Estado',
                            'value'=>'$data->estadoNotificacion->nombre'
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{ver}',
                            'buttons' => array
                                (
                                'ver' => array
                                    (
                                    'label' => Yii::app()->params["labelBotonGrillaVer"],
                                    'options' => array('title' => 'ver'),
                                    'url' => 'Yii::app()->createUrl("emailNotificacion/view", array("id"=>$data->id))',
                                ),
                            ),
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{editar}',
                            'buttons' => array
                                (
                                'editar' => array
                                    (
                                    'label' => Yii::app()->params["labelBotonGrillaEditar"],
                                    'options' => array('title' => 'editar'),
                                    'url' => 'Yii::app()->createUrl("emailNotificacion/resolve", array("id"=>$data->id))',
                                ),
                            ),
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>