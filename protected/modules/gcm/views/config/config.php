<?php

use humhub\compat\CActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('GcmModule.base', 'GSM Server Configuration'); ?></div>
    <div class="panel-body">


        <p><?php echo Yii::t('GcmModule.base', 'You may configure the GSM server.'); ?></p>
        <br/>

        <?php $form = CActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'gcmAPIKey'); ?>
            <?php echo $form->textField($model, 'gcmAPIKey', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gcmAPIKey'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'gcmURL'); ?>
            <?php echo $form->textField($model, 'gcmURL', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'gcmURL'); ?>
        </div>

        <hr>
        <?php echo Html::submitButton(Yii::t('GcmModule.base', 'Save'), array('class' => 'btn btn-primary')); ?>
        <a class="btn btn-default" href="<?php echo Url::to(['/admin/module']); ?>"><?php echo Yii::t('GcmModule.base', 'Back to modules'); ?></a>

        <?php CActiveForm::end(); ?>
    </div>
</div>