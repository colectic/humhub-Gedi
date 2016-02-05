<?php

/**
 * @link https://www.humhub.org/
 * @copyright Copyright (c) 2015 HumHub GmbH & Co. KG
 * @license https://www.humhub.com/licences
 */

namespace humhub\modules\gcm;

use Yii;
use yii\helpers\Url;
use humhub\models\Setting;

class Module extends \humhub\components\Module
{
    public function getConfigUrl()
    {
        return Url::to(['/gcm/config/config']);
    }

    /**
     * Enables this module
     */
    public function enable()
    {
        if (!Yii::$app->hasModule('gcm')) {
            //Actions to do on enabling
        }
        parent::enable();
    }

}

?>