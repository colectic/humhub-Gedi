<?php

namespace humhub\modules\gcm\models;

use Yii;
use humhub\components\ActiveRecord;
use humhub\models\Setting;
use humhub\modules\gcm\libs\GoogleCloudMessage;

/**
 * This is the model class for table "gcm_relation".
 *
 * The followings are the available columns in table 'gcm_relation':
 * 
 * @property integer $id
 * @property string $identity
 * @property string $register_key
 *
 * @package humhub.modules.gcm.models
 * @since 0.5
 */

class GcmRelation extends ActiveRecord {
	
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return 'gcm_relation';
	}
}