<?php

namespace humhub\modules\gcm\controllers;

use Yii;
use yii\base\Action;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;

class DeletepairAction extends Action
{
	public $modelClass;
	public $checkAccess;
	
	/**
	 * Store pair (identity - register key)
	 */
	public function run()
	{
		$model = new $this->modelClass();
		$params = Yii::$app->getRequest()->getBodyParams();
		
		if (!$params['register_key']) 
			throw new ServerErrorHttpException('Param "register_key" not set.');
		
		$record = $model->find()->where(['register_key' => $params['register_key']])->one();
		
		if ($record->delete()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to delete the object for unknown reason.');
        }

        return $record;
	}
	
}