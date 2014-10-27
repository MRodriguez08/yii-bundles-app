<?php
/* @var $this SiteController */
/* @var $error array */
?>

<div class="row">
    <div class="col-lg-12">
        <div id="SuccessMessagePanel" class="alert alert-danger" role="alert">
            <div class="row">
                <div class="col-lg-12 header">
                    <h2><?php echo $header; ?></h2>
                </div>

                <div class="col-lg-12 body">
                    <?php echo CHtml::encode($message); ?>
                </div>
                <div class="col-lg-12 footer">
                    <a href="<?php echo $returnUrl ?>">volver</a>
                    <?php if (isset($viewUrl)){ ?>
                        | <a href="<?php echo $viewUrl ?>">ver</a>
                    <?php } ?>
                </div>
            </div>            
        </div>
        
    </div>
</div>