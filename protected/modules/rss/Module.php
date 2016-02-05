<?php

namespace humhub\modules\rss;

use Yii;
use yii\helpers\Url;
use humhub\models\Setting;

class Module extends \humhub\components\Module
{

    /**
     * On build of the dashboard sidebar widget, add the rss widget if module is enabled.
     *
     * @param type $event            
     */
    public static function onSidebarInit($event)
    {
        if (Yii::$app->hasModule('rss')) {

            $event->sender->addWidget(widgets\Sidebar::className(), array(), array(
                'sortOrder' => 400
            ));
        }
    }

    
    public function getConfigUrl()
    {
        return Url::to(['/rss/config/config']);
    }
    

    /**
     * Enables this module
     */
    public function enable()
    {
        if (!Yii::$app->hasModule('rss')) {
            //Actions to do on enabling
        }
        parent::enable();
    }

}

?>
