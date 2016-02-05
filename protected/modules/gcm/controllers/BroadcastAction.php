<?php

namespace humhub\modules\gcm\controllers;

use Yii;
use yii\base\Action;
use yii\base\Model;
use humhub\modules\user\models\User;
use humhub\models\Setting;
use humhub\modules\gcm\libs\GoogleCloudMessage;

class BroadcastAction extends Action
{
	public $modelClass;
	public $checkAccess;
	
	/**
	 * Broadcast a message to all users
	 */
	public function run()
	{	
		//Send GCM notifications
		$model = new $this->modelClass();
		$records = $model->findBySql("SELECT * FROM gcm_relation")->all();
		$params = Yii::$app->getRequest()->getBodyParams();
		$data = array('message' => $params['message'], 'url' => $params['url']);
		$results = array();
		
		foreach ($records as $record) {
			if ($record->register_key) {
				//Enviar missatge
				$gcm = new GoogleCloudMessage();
				$gcm->apiKey = Setting::Get('gcmAPIKey','gcm');
				$gcm->url = Setting::Get('gcmURL','gcm');
				$result = $gcm->send($data, array($record->register_key));
				$results[$record->register_key] = $result;
			}
		}
		
		//Send mail notificacion
		$users = User::find()->distinct()->joinWith(['httpSessions', 'profile'])->where(['status' => User::STATUS_ENABLED]);
		Yii::setAlias('@gcmmodule', Yii::$app->getModule('gcm')->getBasePath());
		
		foreach ($users->each() as $user) {
			$mail = Yii::$app->mailer->compose(['html' => '@gcmmodule/views/emails/NewMessage'], [
					'message' => $params['message'],
					'url' => $params['url'],
			]);
			$mail->setFrom([Setting::Get('systemEmailAddress', 'mailing') => Setting::Get('systemEmailName', 'mailing')]);
			$mail->setTo($user->email);
			$mail->setSubject('Nova notícia al web: '.$params['message']);
			$mail->send();
		}
		
		return true;
	}
}