<?php

namespace humhub\modules\gcm\models;

use Yii;

class ConfigureForm extends \yii\base\Model
{

    public $gcmAPIKey;
    public $gcmURL;

    public function rules()
    {
        return array(
            array('gcmAPIKey', 'required'),
        	array('gcmURL', 'required'),
            array('gcmURL', 'url', 'defaultScheme' => 'https'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'gcmAPIKey' => Yii::t('GcmModule.base', 'Specify the project API key for GCM service'),
        	'gcmURL' => Yii::t('GcmModule.base', 'Specify the GCM service URL'),
        );
    }

}
