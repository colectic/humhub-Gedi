<?php

use humhub\compat\CActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('RssModule.base', 'RSS Module Configuration'); ?></div>
    <div class="panel-body">


        <p><?php echo Yii::t('RssModule.base', 'You may configure the RSS feed to be shown.'); ?></p>
        <br/>

        <?php $form = CActiveForm::begin(); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'rssFeed'); ?>
            <?php echo $form->textField($model, 'rssFeed', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'rssFeed'); ?>
        </div>

        <hr>
        <?php echo Html::submitButton(Yii::t('RssModule.base', 'Save'), array('class' => 'btn btn-primary')); ?>
        <a class="btn btn-default" href="<?php echo Url::to(['/admin/module']); ?>"><?php echo Yii::t('RssModule.base', 'Back to modules'); ?></a>

        <?php CActiveForm::end(); ?>
    </div>
</div>