<?php

namespace humhub\modules\gcm\controllers;

use Yii;
use yii\base\Action;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;

class CreatepairAction extends Action
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
		
		if (!$params['identity'] || !$params['register_key']) 
			throw new ServerErrorHttpException('Params "identity" and "register_key" not set.');
		
		$identity = urldecode($params['identity']);
		$identity = explode("a:2:", $identity);
		$identity = unserialize("a:2:".$identity[1]);
		$identity = json_decode($identity[1], true);
		
		//Identity és ara un array amb ['user id', 'user guid', 'duració de la cookie']
		$model->user_id = $identity[0]; //Guardem l'id
		$model->register_key = $params['register_key'];
		
		if ($model->save()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        } elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return $model;
	}
	
}