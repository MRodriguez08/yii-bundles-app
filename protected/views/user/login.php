<?php ?>
<html>
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/jquery1.11.0.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/javascript/lib/bootstrap3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lib/bootstrap.min.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-inmobiliaria.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/loginStyle.css" media="screen" />
    </head>
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">              
            </div>
            <div class="col-lg-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'login-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>
                            <h2>Ingresar</h2>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'username' , array("for" => "LoginForm_username")); ?>
                                <?php echo $form->textField($model,'username', array("class" => "form-control")); ?>
                                <?php echo $form->error($model,'username', array("class" => "yii-error-alert")); ?>
                                <!-- 
                                <label for="inputUsuario">usuario</label>
                                <input name="usuario" type="text" class="form-control" id="inputUsuario" placeholder="">
                                -->
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model,'password' , array("for" => "LoginForm_password")); ?>
                                <?php echo $form->passwordField($model,'password', array("class" => "form-control")); ?>
                                <?php echo $form->error($model,'password', array("class" => "yii-error-alert")); ?>
                            </div>
                            <?php echo CHtml::submitButton('Ingresar',array ("class" =>"btn btn-default" )); ?>
                            <!-- 
                            <button type="submit" class="btn btn-default">Ingresar</button>
                            -->
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </body>
</html>


