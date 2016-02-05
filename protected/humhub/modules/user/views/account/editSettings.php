<?php

use \humhub\compat\CActiveForm;
use \humhub\compat\CHtml;
use \humhub\models\Setting;
?>

<div class="panel-heading">
    <?php echo Yii::t('UserModule.views_account_editSettings', '<strong>User</strong> settings'); ?>
</div>
<div class="panel-body">
    <?php $form = CActiveForm::begin(['id' => 'basic-settings-form']); ?>

    <?php //echo $form->errorSummary($model);  ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'tags'); ?>
        <?php echo $form->textField($model, 'tags', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'tags'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'language'); ?>
        <?php echo $form->dropDownList($model, 'language', $languages, array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'language'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'timeZone'); ?>
        <?php echo $form->dropDownList($model, 'timeZone', \humhub\libs\TimezoneHelper::generateList(), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'timeZone'); ?>
    </div>

    <?php if (Setting::Get('allowGuestAccess', 'authentication_internal')): ?>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'visibility'); ?>
            <?php
            echo $form->dropDownList($model, 'visibility', array(
                1 => Yii::t('UserModule.views_account_editSettings', 'Registered users only'),
                2 => Yii::t('UserModule.views_account_editSettings', 'Visible for all (also unregistered users)'),
                    ), array('class' => 'form-control'));
            ?>
            <?php echo $form->error($model, 'visibility'); ?>
        </div>
    <?php endif; ?>

    <strong><?php echo Yii::t('UserModule.views_account_editSettings', 'Getting Started'); ?></strong>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <?php echo $form->checkBox($model, 'show_introduction_tour'); ?> <?php echo $model->getAttributeLabel('show_introduction_tour'); ?>
            </label>
        </div>
    </div>
    <hr>

    <?php echo CHtml::submitButton(Yii::t('UserModule.views_account_editSettings', 'Save'), array('class' => 'btn btn-primary')); ?>

    <!-- show flash message after saving -->
    <?php echo \humhub\widgets\DataSaved::widget(); ?>

    <?php CActiveForm::end(); ?>
</div>
