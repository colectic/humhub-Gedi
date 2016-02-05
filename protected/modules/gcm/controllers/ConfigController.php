<?php

namespace humhub\modules\gcm\controllers;

use Yii;
use humhub\modules\gcm\models\ConfigureForm;
use humhub\models\Setting;

/**
 * Defines the configure actions.
 *
 * @package humhub.modules.gcm.controllers
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
        
        $form->gcmAPIKey = Setting::Get('gcmAPIKey', 'gcm');
        //$form->gcmURL = Setting::Get('gcmURL', 'gcm');
        if (!$form->gcmURL = Setting::Get('gcmURL', 'gcm')) $form->gcmURL = 'https://android.googleapis.com/gcm/send';
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $form->gcmAPIKey = Setting::Set('gcmAPIKey', $form->gcmAPIKey, 'gcm');
            $form->gcmURL = Setting::Set('gcmURL', $form->gcmURL, 'gcm');
            return $this->redirect(['/gcm/config/config']);
        }

        return $this->render('config', array(
                    'model' => $form
        ));
    }

}

?>
