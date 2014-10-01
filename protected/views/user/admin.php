<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
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
                <?php echo Yii::app()->params["UiHeadersWrapperOMarkup"]; ?><span class="glyphicon glyphicon-user"></span> <?php echo Yii::app()->params["labelFuncionalidadUsuarios"] ?><?php echo Yii::app()->params["UiHeadersWrapperCMarkup"]; ?>
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->createUrl("site/index") ?>">Inicio</a></li>
                    <li class="active"><?php echo Yii::app()->params["labelFuncionalidadUsuarios"] ?></li>
                </ol>
                    <?php
                    $this->renderPartial('_search', array(
                        'model' => $model,
                    ));
                    ?>
            </div>
            <div class="col-lg-12">
                <div class="pull-right"><a href="<?php echo Yii::app()->createUrl('usuario/create'); ?>"><span title="nuevo" class="glyphicon glyphicon-plus"></span></a></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'usuario-grid',
                    'emptyText' => Yii::app()->params["labelTablaSinResultados"],
                    'dataProvider' => $model->search(),
                    'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                    'summaryText' => '',
                    'pager' => array(
                        'cssFile' => Yii::app()->params["gridViewStyleSheet"],
                        'header' => Yii::app()->params["labelPaginacionTabla"],
                        'firstPageLabel' => '&lt;&lt;',
                        'prevPageLabel' => Yii::app()->params["prevPageLabel"],
                        'nextPageLabel' => Yii::app()->params["nextPageLabel"],
                        'lastPageLabel' => '&gt;&gt;',
                    ),
                    'columns' => array(
                        'usuario',
                        'email',
                        'nombre',
                        'apellido',
                        array(
                            'class' => 'CButtonColumn',
                            'template' => '{ver}',
                            'buttons' => array
                                (
                                'ver' => array
                                    (
                                    'label' => Yii::app()->params["labelBotonGrillaVer"],
                                    'options' => array('title' => 'ver'),
                                    'url' => 'Yii::app()->createUrl("usuario/view", array("id"=>$data->usuario))',
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
                                    'options' => array('class' => 'grid-action-cell'),
                                    'url' => 'Yii::app()->createUrl("usuario/update", array("id"=>$data->usuario))',
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
                                    'label' => Yii::app()->params["labelBotonResetPassword"],
                                    'options' => array('class' => 'grid-action-cell'),
                                    'url' => 'Yii::app()->createUrl("usuario/resetPassword", array("id"=>$data->usuario))',
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
