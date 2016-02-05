<?php

namespace humhub\modules\rss\controllers;

use Yii;
use humhub\modules\rss\models\ConfigureForm;
use humhub\models\Setting;

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.rss.controllers
 * @author Marjana Pesic
 */
class ConfigController extends \humhub\modules\admin\components\Controller
{

    /**
     * Configuration Action for Super Admins
     */
    public function actionConfig()
    {
        $form = new ConfigureForm();
        
        $form->rssFeed = Setting::Get('rssFeed', 'rss');
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $form->rssFeed = Setting::Set('rssFeed', $form->rssFeed, 'rss');
            return $this->redirect(['/rss/config/config']);
        }

        return $this->render('config', array(
                    'model' => $form
        ));
    }

}

?>
