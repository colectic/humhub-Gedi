<?php

namespace humhub\modules\rss\models;

use Yii;

class ConfigureForm extends \yii\base\Model
{

    public $rssFeed;

    public function rules()
    {
        return array(
            array('rssFeed', 'required'),
            array('rssFeed', 'url', 'defaultScheme' => 'http'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'rssFeed' => Yii::t('RssModule.base', 'Specify RSS feed URL'),
        );
    }

}
