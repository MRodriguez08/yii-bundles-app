<?php
/* @var $thisNotificacionController */
/* @var $model Notificacion */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#notifications-grid').yiiGridView('update', {
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
                <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-envelope"></span> <?php echo Yii::app()->params["notificationFunctionalityLabel"] ?><?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li class="active"><?php echo Yii::app()->params["notificationFunctionalityLabel"] ?></li>
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
                    'id' => 'notifications-grid',
                    'dataProvider' => $model->search(),
                    'summaryText' => '',
                    'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                    'emptyText' => Yii::app()->params["emptyTableLabel"],
                    'pager' => array(
                        'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                        'header' => Yii::app()->params["tablePagingLabel"],
                        'firstPageLabel' => '&lt;&lt;',
                        'prevPageLabel' => Yii::app()->params["prevPageLabel"],
                        'nextPageLabel' => Yii::app()->params["nextPageLabel"],
                        'lastPageLabel' => '&gt;&gt;',
                    ),
                    'columns' => array(
                        'clientemail',
                        array(            
                            'name'=>'Tipo',
                            'value'=>'$data->type->name'
                        ),
                        array(            
                            'name'=>'Estado',
                            'value'=>'$data->state->name'
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{ver}',
                            'buttons' => array
                                (
                                'ver' => array
                                    (
                                    'label' => Yii::app()->params["viewGridButtonLabel"],
                                    'options' => array('title' => 'ver'),
                                    'url' => 'Yii::app()->createUrl("notification/view", array("id"=>$data->id))',
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
                                    'label' => Yii::app()->params["editGridButtonLabel"],
                                    'options' => array('title' => 'editar'),
                                    'url' => 'Yii::app()->createUrl("notification/resolve", array("id"=>$data->id))',
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