<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
                <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> <?php echo Yii::app()->params["userFunctionalityLabel"] ?><?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li class="active"><?php echo Yii::app()->params["userFunctionalityLabel"] ?></li>
                </ol>
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
            </div>
            <div class="col-lg-12">
                <div class="pull-right"><a href="<?php echo Yii::app()->createUrl('user/create'); ?>"><span title="nuevo" class="glyphicon glyphicon-plus"></span></a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'user-grid',
                    'emptyText' => Yii::app()->params["emptyTableLabel"],
                    'dataProvider' => $model->search(),
                    'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                    'summaryText' => '',
                    'pager' => array(
                        'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                        'header' => Yii::app()->params["tablePagingLabel"],
                        'firstPageLabel' => '&lt;&lt;',
                        'prevPageLabel' => Yii::app()->params["prevPageLabel"],
                        'nextPageLabel' => Yii::app()->params["nextPageLabel"],
                        'lastPageLabel' => '&gt;&gt;',
                    ),
                    'columns' => array(
                        'nick',
                        'email',
                        'name',
                        'apellido',
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{ver}',
                            'buttons' => array
                                (
                                'ver' => array
                                    (
                                    'label' => Yii::app()->params["viewGridButtonLabel"],
                                    'options' => array('title' => 'ver'),
                                    'url' => 'Yii::app()->createUrl("user/view", array("id"=>$data->nick))',
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
                                    'options' => array('class' => 'grid-action-cell'),
                                    'url' => 'Yii::app()->createUrl("user/update", array("id"=>$data->nick))',
                                ),
                            ),
                        ),
                        array(            
                            'name'=>'',
                            'value'=>array($this,'renderChangeState')
                        ),
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{resetPassword}',
                            'buttons' => array
                                (
                                'resetPassword' => array
                                    (
                                    'label' => Yii::app()->params["resetPasswordButtonLabel"],
                                    'options' => array('class' => 'grid-action-cell'),
                                    'url' => 'Yii::app()->createUrl("user/resetPassword", array("id"=>$data->nick))',
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
