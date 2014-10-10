<?php
/* @var $this AuditoriaController */
/* @var $model Auditoria */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#auditoria-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-lg-12">
        <div class="row top-admin-row">
            <div class="col-lg-12 ">
                <?php echo Yii::app()->params["uiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-book"></span> <?php echo Yii::app()->params["auditFunctionalityLabel"] ?><?php echo Yii::app()->params["uiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li><a href="#">Configuraci&oacute;n</a></li>
                    <li class="active"><?php echo Yii::app()->params["auditFunctionalityLabel"] ?></li>
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
                    'id' => 'auditoria-grid',
                    'dataProvider' => $model->search(),
                    'emptyText' => Yii::app()->params["emptyTableLabel"],
                    'summaryText' => '',
                    'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                    'pager' => array(
                        'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                        'header' => Yii::app()->params["tablePagingLabel"],
                        'firstPageLabel' => '&lt;&lt;',
                        'prevPageLabel' => Yii::app()->params["prevPageLabel"],
                        'nextPageLabel' => Yii::app()->params["nextPageLabel"],
                        'lastPageLabel' => '&gt;&gt;',
                    ),
                    'columns' => array(                        
                        array(
                            'name' => 'date',
                            'value'=>'date("' . Yii::app()->params["dateTimeDisplayFormat"] . '",$data->date_time)',
                        ),                        
                        'user',
                        'object',
                        'operation',
                        'description'
                    ),
                ));
                ?>
            </div>
        </div>
    </div>   
</div>