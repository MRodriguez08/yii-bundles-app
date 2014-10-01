<?php
/* @var $this SiteController */
/* @var $error array */
?>

<div class="row">
    <div class="col-lg-12">
        <div id="ErrorMessagePanel" class="alert alert-danger" role="alert">
            <h2>Error <?php echo $code; ?></h2>

            <div class="error">
                <?php echo CHtml::encode($message); ?>
            </div>
        </div>
    </div>
</div>