<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#departments-grid').yiiGridView('update', {
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
                <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-map-marker"></span> <?php echo Yii::app()->params["departmentFunctionalityLabel"] ?><?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li><a href="#">Configuraci&oacute;n</a></li>
                    <li class="active"><?php echo Yii::app()->params["departmentFunctionalityLabel"] ?></li>
                </ol>
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <div class="col-lg-12">
                <div class="pull-right"><a href="<?php echo Yii::app()->createUrl('department/create'); ?>"><span title="nuevo" class="glyphicon glyphicon-plus"></span></a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'departments-grid',
                    'summaryText' => '',
                    'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                    'emptyText' => Yii::app()->params["emptyTableLabel"],
                    'dataProvider' => $model->search(),
                    'columns' => array(
                        'name',
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{ver}',
                            'buttons' => array
                                (
                                'ver' => array
                                    (
                                    'label' => Yii::app()->params["viewGridButtonLabel"],
                                    'options' => array('title' => 'ver'),
                                    'url' => 'Yii::app()->createUrl("department/view", array("id"=>$data->id))',
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
                                    'url' => 'Yii::app()->createUrl("department/update", array("id"=>$data->id))',
                                ),
                            ),
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{eliminar}',
                            'buttons' => array
                                (
                                'eliminar' => array
                                    (
                                    'label' => Yii::app()->params["deleteGridButtonLabel"],
                                    'options' => array('title' => 'eliminar'),
                                    'url' => 'Yii::app()->createUrl("department/delete", array("id"=>$data->id))',
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
