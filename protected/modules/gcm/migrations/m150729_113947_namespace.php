<?php

use yii\db\Schema;
use humhub\components\Migration;
use humhub\modules\gcm\models\GcmRelation;

class m150729_113947_namespace extends Migration
{

    public function up()
    {
        $this->renameClass('GcmRelation', GcmRelation::className());
    }

    public function down()
    {
        echo "m150729_113947_namespace cannot be reverted.\n";

        return false;
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
