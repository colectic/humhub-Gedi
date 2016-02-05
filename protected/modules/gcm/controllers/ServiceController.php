<?php

namespace humhub\modules\gcm\controllers;

use yii\rest\ActiveController;

/*
 * La classe propia exten l'ActiveController que conté les operacions bàsiques a executar sobre els models
 * http://www.yiiframework.com/doc-2.0/yii-rest-activecontroller.html
 */
class ServiceController extends ActiveController
{
	/**
	 * La $modelClass defineix sobre quin model es llençaran les operacions del controlador
	 */
	public $modelClass = 'humhub\modules\gcm\models\GcmRelation';
	
	/**
	 * @inheritdoc
	 */
	public function actions() 
	{
		return [
				'broadcast' => [
					'class' => 'humhub\modules\gcm\controllers\BroadcastAction',
					'modelClass' => $this->modelClass,
					'checkAccess' => [$this, 'checkAccess'],
					],
				'createpair' => [
					'class' => 'humhub\modules\gcm\controllers\CreatepairAction',
					'modelClass' => $this->modelClass,
					'checkAccess' => [$this, 'checkAccess'],
				],
				'deletepair' => [
					'class' => 'humhub\modules\gcm\controllers\DeletepairAction',
					'modelClass' => $this->modelClass,
					'checkAccess' => [$this, 'checkAccess'],
				]
			];
	}
	
	/**
	 * @inheritdoc
	 */
	protected function verbs()
	{
		return [
				'broadcast' => ['POST'],
				'createpair' => ['POST'],
				'deletepair' => ['POST'],
		];
	}
	
	/**
	 * Checks the privilege of the current user.
	 *
	 * This method should be overridden to check whether the current user has the privilege
	 * to run the specified action against the specified data model.
	 * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
	 *
	 * @param string $action the ID of the action to be executed
	 * @param object $model the model to be accessed. If null, it means no specific model is being accessed.
	 * @param array $params additional parameters
	 * @throws ForbiddenHttpException if the user does not have access
	 */
	public function checkAccess($action, $model = null, $params = [])
	{
	}
}
